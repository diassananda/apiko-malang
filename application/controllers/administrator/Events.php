<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Event_Model');
  }

  function index()
  {
    $events  = $this->Event_Model->get_all_event();
    // header("Content-type:application/json");
    // echo json_encode($events);
    $data     = array('isi'     => 'administrator/view-event',
                      'events' =>  $events
                  );
    $this->load->view("layouts/wrapper", $data, false);
  }

  function confirm_event($id){
    $data = array(
          'id'                 =>  $id,
          'verified'           =>  1
        );
    $this->Event_Model->edit_event($data);
    $this->session->set_flashdata('notification', 'Berhasil menerima event.');
    echo "<script type='text/javascript'>

			alert('Berhasil menerima event');
			window.location.href = '" . base_url() . "index.php/administrator/events/';
			</script>";
    // redirect('administrator/events/');
  }

  function delete_event($id){
    $data = array('id'  =>  $id);
    $this->Event_Model->delete_event($data);
    $this->session->set_flashdata('notification', 'Berhasil menghapus event.');

    echo "<script type='text/javascript'>

			alert('Berhasil menghapus event');
			window.location.href = '" . base_url() . "index.php/administrator/events/';
			</script>";
    // redirect('administrator/events');
  }

}
