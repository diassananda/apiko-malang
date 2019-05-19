<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

  }

  function index()
  {
    $data = array('isi'     => 'administrator/dashboard'
                  );
    $this->load->view("layouts/wrapper", $data, false);
  }



}
