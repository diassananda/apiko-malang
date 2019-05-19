<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Member_Model');
    $this->load->model('Instruktur_Model');
    $this->load->model('Event_Model');
    $this->load->model('Reguler_Model');
    $this->load->model('Paket_Model');
  }

  function index()
  {
    $events  = $this->Event_Model->get_all_event();
    $regulers = $this->Reguler_Model->get_all_reguler();
    $pakets = $this->Paket_Model->get_all_paket();
    // header("Content-type:application/json");
    // echo json_encode($events);
    $data = array(
      'isi'     => 'home',
      'events'  => $events,
      'regulers' => $regulers,
      'pakets'  => $pakets,
      'cari'      => NULL
    );
    $this->load->view("layouts/default-wrapper", $data, false);
  }

  function login()
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
      $data = array(
        'isi'     => 'home'
      );
      $this->load->view("layouts/default-wrapper", $data, false);
    } else {
      $i            = $this->input;
      $email        = $i->post('email');
      $password     = md5($i->post('password'));
      $check_login_instruktur     = $this->Instruktur_Model->login_instruktur($email, $password);
      $check_login_member         = $this->Member_Model->login_member($email, $password);
      if ($check_login_instruktur['count_instruktur'] > 0) {
        if ($check_login_instruktur['detail_instruktur']->verified == 1) {
          $this->session->set_userdata('email', $email);
          $this->session->set_userdata('id', $check_login_instruktur['detail_instruktur']->id);
          $this->session->set_userdata('nama', $check_login_instruktur['detail_instruktur']->nama);
          $this->session->set_userdata('foto', $check_login_instruktur['detail_instruktur']->foto);
          $this->session->set_userdata('akses_level', 'Instruktur');
          redirect(site_url('home'), 'refresh');
        } else {
          $this->session->set_flashdata('notifikasi', 'Akun belum aktif. Silahkan menunggu proses verifikasi dari administrator');
          // redirect(site_url('home'), 'refresh');
          echo "<script type='text/javascript'>
          alert('" . $this->session->flashdata('notifikasi') . "');
          window.location.href = '" . site_url() . "/home';
          </script>";
        }
      } else if ($check_login_member['count_member'] > 0) {
        // var_dump($check_login_member['detail_member']);
        $this->session->set_userdata('email', $email);
        $this->session->set_userdata('id', $check_login_member['detail_member']->id);
        $this->session->set_userdata('nama', $check_login_member['detail_member']->nama);
        $this->session->set_userdata('foto', $check_login_member['detail_member']->foto);
        $this->session->set_userdata('akses_level', 'Member');
        redirect(site_url('home'), 'refresh');
      } else {
        $this->session->set_flashdata('notifikasi', 'Akun Tidak Terdaftar / Password Salah<br> Pastikan Email & Password sudah benar');
        // redirect(site_url('home'), 'refresh');
        echo "<script type='text/javascript'>
        alert('" . $this->session->flashdata('notifikasi') . "');
        window.location.href = '" . site_url() . "/home';
        </script>";
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
    redirect(site_url('home'));
  }

  function hapus($id)
  {
    if ($this->session->userdata('akses_level') == 'Member') {
      $this->Member_Model->delete_member($id);
    } else if ($this->session->userdata('akses_level') == 'Instruktur') {
      $this->Instruktur_Model->delete_instruktur($id);
    }

    session_destroy();
    echo "<script type='text/javascript'>
			alert('Akun anda berhasil dihapus');
			window.location.href = '" . site_url() . "/home';
			</script>";
  }

  public function search()
  {
    if ($this->input->get('url') == 'regulers') {
      $regulers = $this->Reguler_Model->get_reguler_where($this->input->get('agenda'));

      $data = array(
        'isi'       => 'regulers',
        'regulers'  => $regulers,
        'cari'      => $this->input->get('agenda')
      );

      $this->load->view("layouts/default-wrapper", $data, false);
    } else if ($this->input->get('url') == 'pakets') {
      $pakets   = $this->Paket_Model->get_paket_where($this->input->get('agenda'));

      $data = array(
        'isi'       => 'pakets',
        'pakets'    => $pakets,
        'cari'      => $this->input->get('agenda')
      );

      $this->load->view("layouts/default-wrapper", $data, false);
    } else if ($this->input->get('url') == 'events') {
      $events   = $this->Event_Model->get_event_where($this->input->get('agenda'));

      $data = array(
        'isi'       => 'events',
        'events'    => $events,
        'cari'      => $this->input->get('agenda')
      );

      $this->load->view("layouts/default-wrapper", $data, false);
    } else {
      $events   = $this->Event_Model->get_event_where($this->input->get('agenda'));
      $regulers = $this->Reguler_Model->get_reguler_where($this->input->get('agenda'));
      $pakets   = $this->Paket_Model->get_paket_where($this->input->get('agenda'));

      $data = array(
        'isi'       => 'home',
        'events'    => $events,
        'regulers'  => $regulers,
        'pakets'    => $pakets,
        'cari'      => $this->input->get('agenda')
      );

      $this->load->view("layouts/default-wrapper", $data, false);
    }
  }
}
