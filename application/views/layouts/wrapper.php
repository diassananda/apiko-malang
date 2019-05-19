<?php

if($this->session->userdata('akses_level') == "Administrator"){
require_once('head.php');
require_once('sidebar.php');
require_once('navbar.php');
require_once('main.php');
}else{
      redirect(site_url('admin'), 'refresh');
}
 ?>
