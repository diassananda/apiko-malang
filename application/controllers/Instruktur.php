<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instruktur extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Instruktur_Model');
    $this->load->model('Event_Model');
    $this->load->model('Reguler_Model');
    $this->load->model('Paket_Model');
  }

  function profile($id_instruktur, $id = NULL, $jenis = NULL)
  {
    if ($id == NULL) {
      $instruktur_details = $this->Instruktur_Model->get_detail_instruktur($id_instruktur);
      $data = array(
        'isi'                 => 'profile-instruktur',
        'instruktur_details'  => $instruktur_details,
        'cari'                => NULL
      );
    } else {
      if ($jenis == 'event') {
        $instruktur_details = $this->Event_Model->get_detail_event($id_instruktur, $id);
        $data = array(
          'isi'                 => 'profile-instruktur',
          'instruktur_details'  => $instruktur_details,
          'jenis'               => $jenis,
          'cari'                => NULL
        );
      }
      else if ($jenis == 'reguler') {
        $instruktur_details = $this->Reguler_Model->get_detail_reguler($id_instruktur, $id);
        $data = array(
          'isi'                 => 'profile-instruktur',
          'instruktur_details'  => $instruktur_details,
          'jenis'               =>  $jenis,
          'cari'                => NULL
        );
      }
      else if ($jenis == 'paket') {
        $instruktur_details = $this->Paket_Model->get_detail_paket($id_instruktur, $id);
        $data = array(
          'isi'                 => 'profile-instruktur',
          'instruktur_details'  => $instruktur_details,
          'jenis'               =>  $jenis,
          'cari'                => NULL
        );
      }
    }
    // header("Content-type:application/json");
    // echo json_encode($data);
    $this->load->view("layouts/setting-wrapper", $data, false);
  }

  public function kelas()
  {
    $events  = $this->Event_Model->get_event_nama($this->input->get('nama'));
    $regulers = $this->Reguler_Model->get_reguler_nama($this->input->get('nama'));
    $pakets = $this->Paket_Model->get_paket_nama($this->input->get('nama'));
    
    $data = array(
      'isi'     => 'home',
      'events'  => $events,
      'regulers' => $regulers,
      'pakets'  => $pakets,
      'cari'      => NULL
    );
    // header("Content-type:application/json");
    // echo json_encode($this->input->get('nama'));
    $this->load->view("layouts/default-wrapper", $data, false);
  }

  function add_instruktur()
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

    $valid->set_rules(
      'lama_melatih',
      'lama_melatih',
      'required',
      array('required'  =>  'Anda belum mengisikan Lama Melatih.')
    );

    $valid->set_rules(
      'pengalaman_melatih',
      'pengalaman_melatih',
      'required',
      array('required'  =>  'Anda belum mengisikan Pengalaman Melatih.')
    );

    $valid->set_rules(
      'keahlian_khusus',
      'keahlian_khusus',
      'required',
      array('required'  =>  'Anda belum mengisikan Keahlian Khusus.')
    );

    $valid->set_rules(
      'sertifikasi',
      'sertifikasi',
      'required',
      array('required'  =>  'Anda belum mengisikan Sertifikasi.')
    );


    if ($valid->run() === false) {
      $data     = array(
        'isi'     => 'home'
      );
      $this->load->view("layouts/default-wrapper", $data, false);
    } else {
      $i  = $this->input;
      $data = array(
        'nama'               =>  $i->post('nama'),
        'jenis_kelamin'      =>  $i->post('jenis_kelamin'),
        'alamat'             =>  $i->post('alamat'),
        'email'              =>  $i->post('email'),
        'no_telepon'         =>  $i->post('no_telepon'),
        'lama_melatih'       =>  $i->post('lama_melatih'),
        'pengalaman_melatih' =>  $i->post('pengalaman_melatih'),
        'keahlian_khusus'    =>  $i->post('keahlian_khusus'),
        'sertifikasi'        =>  $i->post('sertifikasi'),

        'verified'           =>  0,
        'password'           =>  md5($i->post('password'))
      );
      $this->Instruktur_Model->add_instruktur($data);
      $this->session->set_flashdata('sukses', 'Sukses mendaftar Instruktur');
      echo "<script type='text/javascript'>
          alert('Sukses Mendaftar Instruktur');
          window.location.href = '" . site_url() . "/home';
          </script>";
    }
  }

  function edit_instruktur()
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
      'required|is_natural',
      array(
        'required'   =>  'Anda belum mengisikan Nomor Telepon.',
        'is_natural' =>  'Nomor telepon harus berupa angka'
      )
    );

    $valid->set_rules(
      'edit_password',
      'edit_password',
      'required',
      array('required'  =>  'Anda belum mengisikan Password.')
    );

    $valid->set_rules(
      'edit_lama_melatih',
      'edit_lama_melatih',
      'required',
      array('required'  =>  'Anda belum mengisikan Lama Melatih.')
    );

    $valid->set_rules(
      'edit_pengalaman_melatih',
      'edit_pengalaman_melatih',
      'required',
      array('required'  =>  'Anda belum mengisikan Pengalaman Melatih.')
    );

    $valid->set_rules(
      'edit_keahlian_khusus',
      'edit_keahlian_khusus',
      'required',
      array('required'  =>  'Anda belum mengisikan Keahlian Khusus.')
    );

    $valid->set_rules(
      'edit_sertifikasi',
      'edit_sertifikasi',
      'required',
      array('required'  =>  'Anda belum mengisikan Sertifikasi.')
    );

    if ($valid->run() === false) {
      $i  = $this->input;
      redirect('instruktur/profile/' . $i->post('edit_id'));
    } else {
      $i  = $this->input;
      $data = array(
        'id'                 =>  $i->post('edit_id'),
        'nama'               =>  $i->post('edit_nama'),
        'jenis_kelamin'      =>  $i->post('edit_jenis_kelamin'),
        'alamat'             =>  $i->post('edit_alamat'),
        'email'              =>  $i->post('edit_email'),
        'no_telepon'         =>  $i->post('edit_no_telepon'),
        'lama_melatih'       =>  $i->post('edit_lama_melatih'),
        'pengalaman_melatih' =>  $i->post('edit_pengalaman_melatih'),
        'keahlian_khusus'    =>  $i->post('edit_keahlian_khusus'),
        'sertifikasi'        =>  $i->post('edit_sertifikasi'),


        'password'           =>  md5($i->post('edit_password'))
      );
      $this->Instruktur_Model->edit_instruktur($data);
      $this->session->set_flashdata('sukses', 'Sukses merubah profil');
      redirect('instruktur/profile/' . $i->post('edit_id'));
    }
  }

  // function hapus_instruktur($id){
  //   $data = array('id'  =>  $id);
  //   $this->Instruktur_Model->hapus_instruktur($data);
  //   $this->session->set_flashdata('notification', 'Berhasil menghapus instruktur.');
  //   redirect('instrukturs');
  // }

  function edit_photo()
  {
    $config['upload_path']          = './resources/img/instruktur_photo/';
    $config['allowed_types']        = 'jpg|png';
    $config['max_size']             = 3000;
    $config['max_width']            = 5000;
    $config['max_height']           = 5000;
    $config['encrypt_name']         = TRUE;
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('foto')) {
      $i  = $this->input;
      // $this->session->set_flashdata('success', 'Update foto alumni gagal.');
      // redirect('instruktur/profile/'.$i->post('edit_photo_id'));
      echo $this->upload->display_errors();
      exit();
    } else {
      $i  = $this->input;
      $data = array(
        'foto'         =>  $this->upload->data('file_name'),
        'id'           =>  $i->post('edit_photo_id')
      );
      $this->Instruktur_Model->edit_instruktur($data);
      $this->session->set_flashdata('success', 'Update foto alumni berhasil.');
      redirect('instruktur/profile/' . $i->post('edit_photo_id'));
    }
  }
}
