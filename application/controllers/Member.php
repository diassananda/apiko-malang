<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Member_Model');
    $this->load->model('Event_Model');
  }

  function register()
  {
    $valid = $this->form_validation;
    $valid->set_rules(
      'nama',
      'nama',
      'required',
      array('required'  =>  'Anda belum mengisikan Nama.')
    );

    $valid->set_rules(
      'jenis_kelamin',
      'jenis_kelamin',
      'required',
      array('required'  =>  'Anda belum memilih Jenis Kelamin.')
    );

    $valid->set_rules(
      'alamat',
      'alamat',
      'required',
      array('required'  =>  'Anda belum mengisikan Alamat.')
    );

    $valid->set_rules(
      'email',
      'email',
      'required',
      array('required'  =>  'Anda belum mengisikan Email.')
    );

    $valid->set_rules(
      'no_telepon',
      'no_telepon',
      'required|is_natural',
      array(
        'required'   =>  'Anda belum mengisikan Nomor Telepon.',
        'is_natural' =>  'Nomor telepon harus berupa angka'
      )
    );

    $valid->set_rules(
      'password',
      'password',
      'required',
      array('required'  =>  'Anda belum mengisikan Password.')
    );

    if ($valid->run() === false) {
      $data     = array(
        'isi'     => 'home',
        'cari'    => NULL
      );
      $this->load->view("layouts/default-wrapper", $data, false);
    } else {
      $i  = $this->input;
      $data = array(
        'nama'          =>  $i->post('nama'),
        'jenis_kelamin' =>  $i->post('jenis_kelamin'),
        'alamat'        =>  $i->post('alamat'),
        'email'         =>  $i->post('email'),
        'no_telepon'    =>  $i->post('no_telepon'),
        'password'      =>  md5($i->post('password'))
      );
      $this->Member_Model->add_member($data);
      $this->session->set_flashdata('sukses', 'Berhasil menambah member.');
      redirect('home');
    }
  }

  function profile($id)
  {
    $member_details = $this->Member_Model->get_detail_member($id);
    $data = array(
      'isi'             => 'profile-member',
      'member_details'  => $member_details,
      'cari'    => NULL
    );
    $this->load->view("layouts/setting-wrapper", $data, false);
  }

  function edit_member()
  {
    $valid = $this->form_validation;
    $valid->set_rules(
      'edit_nama',
      'edit_nama',
      'required',
      array('required'  =>  'Anda belum mengisikan Nama.')
    );

    $valid->set_rules(
      'edit_jenis_kelamin',
      'edit_jenis_kelamin',
      'required',
      array('required'  =>  'Anda belum memilih Jenis Kelamin.')
    );

    $valid->set_rules(
      'edit_alamat',
      'edit_alamat',
      'required',
      array('required'  =>  'Anda belum mengisikan Alamat.')
    );

    $valid->set_rules(
      'edit_email',
      'edit_email',
      'required',
      array('required'  =>  'Anda belum mengisikan Email.')
    );

    $valid->set_rules(
      'edit_no_telepon',
      'edit_no_telepon',
      'required',
      array('required'  =>  'Anda belum mengisikan Nomor Telepon.')
    );

    $valid->set_rules(
      'edit_password',
      'edit_password',
      'required',
      array('required'  =>  'Anda belum mengisikan Password.')
    );

    if ($valid->run() === false) {
      $i  = $this->input;
      redirect('member/profile/' . $i->post('edit_id'));
    } else {
      $i  = $this->input;
      $data = array(
        'id'            =>  $i->post('edit_id'),
        'nama'          =>  $i->post('edit_nama'),
        'jenis_kelamin' =>  $i->post('edit_jenis_kelamin'),
        'alamat'        =>  $i->post('edit_alamat'),
        'email'         =>  $i->post('edit_email'),
        'no_telepon'    =>  $i->post('edit_no_telepon'),
        'password'      =>  md5($i->post('edit_password'))
      );
      $this->Member_Model->edit_member($data);
      $this->session->set_flashdata('sukses', 'Berhasil mengupdate member.');
      redirect('member/profile/' . $i->post('edit_id'));
    }
  }

  function edit_photo()
  {
    $config['upload_path']          = './resources/img/member_photo/';
    $config['allowed_types']        = 'jpg|png';
    $config['max_size']             = 3000;
    $config['max_width']            = 5000;
    $config['max_height']           = 5000;
    $config['encrypt_name']         = TRUE;
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('foto')) {
      $i  = $this->input;
      // $this->session->set_flashdata('success', 'Update foto alumni gagal.');
      // redirect('member/profile/'.$i->post('edit_photo_id'));
      echo $this->upload->display_errors();
      exit();
    } else {
      $i  = $this->input;
      $data = array(
        'foto'         =>  $this->upload->data('file_name'),
        'id'           =>  $i->post('edit_photo_id'),
        'cari'    => NULL
      );
      $this->Member_Model->edit_member($data);
      $this->session->set_flashdata('success', 'Update foto alumni berhasil.');
      redirect('member/profile/' . $i->post('edit_photo_id'));
    }
  }

  function hapus($id)
  {
    $member_details = $this->Member_Model->get_detail_member($id);
    $data = array(
      'isi'     => 'profile-member',
      'member_details' => $member_details
    );
    $this->load->view("layouts/setting-wrapper", $data, false);
  }  
}