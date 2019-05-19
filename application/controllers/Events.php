<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Events extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Event_Model');
    $this->load->model('Instruktur_Model');
  }

  function index()
  { 
    $events  = $this->Event_Model->get_all_event();
    // header("Content-type:application/json");
    // echo json_encode($events);
    $data = array(
      'isi'     => 'events',
      'events'  => $events,
      'cari'      => NULL
    );    
    $this->load->view("layouts/default-wrapper", $data, false);
  }

  function create_event()
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

    $valid->set_rules(
      'jadwal',
      'jadwal',
      'required',
      array('required'  =>  'Anda belum mengisikan Jadwal.')
    );

    $valid->set_rules(
      'tempat',
      'tempat',
      'required',
      array('required'  =>  'Anda belum mengisikan Tempat.')
    );

    $valid->set_rules(
      'agenda',
      'agenda',
      'required',
      array('required'  =>  'Anda belum mengisikan Agenda.')
    );
    // var_dump($valid->form_error());
    if ($valid->run() === false) {
      $data = array(
        'isi'                 => 'add-event',
        'instruktur_details'  => $instruktur_details,
        'cari'    => NULL
      );
      $this->load->view("layouts/setting-wrapper", $data, false);
    } 
    else {
      $i  = $this->input;
      $data = array(
        'id_instruktur'       => $this->session->userdata('id'),
        'jumlah_sesi'         =>  $i->post('jumlah_sesi'),
        'jumlah_murid'        =>  $i->post('jumlah_murid'),
        'durasi'              =>  $i->post('durasi'),
        'harga'               =>  $i->post('harga'),
        'jadwal'              =>  $i->post('jadwal'),
        'tempat'              =>  $i->post('tempat'),
        'agenda'              =>  $i->post('agenda'),
        'verified'            =>  0
      );
      $this->Event_Model->add_event($data);
      $this->session->set_flashdata('sukses', 'Sukses mendaftar Event');
      echo "<script type='text/javascript'>
			alert('Sukses mendaftar event');
			window.location.href = '" . base_url() . "index.php/events/create_event';
			</script>";
      // redirect('events/create_event');
    }
  }
}
