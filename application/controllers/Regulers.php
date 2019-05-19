<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Regulers extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Reguler_Model');
    $this->load->model('Instruktur_Model');
  }

  function index()
  { 
    $regulers  = $this->Reguler_Model->get_all_reguler();
    // header("Content-type:application/json");
    // echo json_encode($regulers);
    $data = array(
      'isi'     => 'regulers',
      'regulers'  => $regulers,
      'cari'      => NULL
    );    
    $this->load->view("layouts/default-wrapper", $data, false);
  }

  function create_reguler()
  {
    $instruktur_details = $this->Instruktur_Model->get_detail_instruktur($this->session->userdata('id'));
    $valid = $this->form_validation;

    $valid->set_rules(
      'jumlah_sesi',
      'jumlah_sesi',
      'required',
      array('required'  =>  'Anda belum memilih Jumlah Sesi.')
    );

    $valid->set_rules(
      'jumlah_murid',
      'jumlah_murid',
      'required',
      array('required'  =>  'Anda belum mengisikan Jumlah Murid.')
    );

    $valid->set_rules(
      'durasi',
      'durasi',
      'required',
      array('required'  =>  'Anda belum mengisikan Durasi.')
    );

    $valid->set_rules(
      'harga',
      'harga',
      'required|is_natural',
      array('required'   =>  'Anda belum mengisikan Harga.')
    );

    if ($valid->run() === false) {
      $data = array(
        'isi'     => 'add-reguler',
        'instruktur_details' => $instruktur_details,
        'cari'    => NULL
      );
      $this->load->view("layouts/setting-wrapper", $data, false);
    } else {
      $i  = $this->input;
      $rentang_jam = $i->post('jam_mulai').'-'.$i->post('jam_selesai');
      $data = array(
        'id_instruktur'      =>  $this->session->userdata('id'),
        'jumlah_sesi'        =>  $i->post('jumlah_sesi'),
        'jumlah_murid'       =>  $i->post('jumlah_murid'),
        'durasi'             =>  $i->post('durasi'),
        'harga'              =>  $i->post('harga'),
        'agenda'             =>  $i->post('agenda'),
        'rentang_jam'        =>  $rentang_jam
      );
      $this->Reguler_Model->add_reguler($data);
      $this->session->set_flashdata('sukses', 'Sukses mendaftar Reguler');
      echo "<script type='text/javascript'>
			alert('".$this->session->flashdata('sukses')."');
			window.location.href = '" . site_url() . "/regulers/create_reguler/" . $i->post('id_member') . "';
			</script>";
      // redirect('regulers/create_reguler');
    }
  }

  
}
