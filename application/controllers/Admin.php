<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Administrator_Model');
  }

  function index()
  {
    $this->load->view("administrator-login");
  }

  function login_administrator()
  {
    $valid = $this->form_validation;
    $valid->set_rules(
      'email',
      'Email',
      'required',
      array('required'  =>  'Email harus diisi')
    );

    $valid->set_rules(
      'password',
      'Password',
      'required|min_length[6]',
      array(
        'required'  =>  'Password harus diisi',
        'min_length' =>  'Password minimal 6 karakter'
      )
    );

    if ($valid->run() == false) {
      $this->load->view("administrator-login");
    } else {
      $i            = $this->input;
      $email        = $i->post('email');
      $password     = md5($i->post('password'));
      $check_login_administrator     = $this->Administrator_Model->login_administrator($email, $password);
      if ($check_login_administrator['count_administrator'] > 0) {
        $this->session->set_userdata('email', $email);
        $this->session->set_userdata('id', $check_login_administrator['detail_administrator']->id);
        $this->session->set_userdata('nama', $check_login_administrator['detail_administrator']->nama);
        // $this->session->set_userdata('foto', $check_login_administrator['detail_administrator']->foto);
        $this->session->set_userdata('akses_level', 'Administrator');
        redirect(site_url('administrator/dashboard'), 'refresh');
      } else {
        $this->session->set_flashdata('notifikasi', '<center>Akun Tidak Terdaftar / Password Salah<br> Pastikan Email & Password sudah benar</center>');
        redirect(site_url('admin'), 'refresh');
      }
    }
  }

  function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('akses_level');
    // $this->session->unset_userdata('foto');
    $this->session->unset_userdata('nama');
    $this->session->set_flashdata('notifikasi', '<center>Anda berhasil logout</center>');
    redirect(site_url('admin'));
  }
}
