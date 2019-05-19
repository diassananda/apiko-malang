<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Member_Model');
  }

  function index(){
    $members  = $this->Member_Model->get_all_member();
    $data     = array('isi'     => 'administrator/view-member',
                      'members' =>  $members
                  );
    $this->load->view("layouts/wrapper", $data, false);
  }

  function get_detail_member($id){
    $data = $this->Member_Model->get_detail_member($id);
    echo json_encode($data);
  }

  function add_member(){
    $valid = $this->form_validation;
    $valid->set_rules(
        'nama',
        'nama',
        'required',
        array(  'required'  =>  'Anda belum mengisikan Nama.')
      );

    $valid->set_rules(
        'jenis_kelamin',
        'jenis_kelamin',
        'required',
        array(  'required'  =>  'Anda belum memilih Jenis Kelamin.')
      );

    $valid->set_rules(
        'alamat',
        'alamat',
        'required',
        array(  'required'  =>  'Anda belum mengisikan Alamat.')
      );

    $valid->set_rules(
        'email',
        'email',
        'required',
        array(  'required'  =>  'Anda belum mengisikan Email.')
      );

    $valid->set_rules(
        'no_telepon',
        'no_telepon',
        'required|is_natural',
        array(  'required'   =>  'Anda belum mengisikan Nomor Telepon.',
                'is_natural' =>  'Nomor telepon harus berupa angka')
      );

    $valid->set_rules(
        'password',
        'password',
        'required',
        array(  'required'  =>  'Anda belum mengisikan Password.')
      );

      if ($valid->run()===false)
      {
        $members  = $this->Member_Model->get_all_member();
        $data     = array('isi'     => 'administrator/view-member',
                          'members' =>  $members
                      );
        $this->load->view("layouts/wrapper", $data, false);
      }
      else
      {
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
          redirect('administrator/members');
      }
  }

  function edit_member(){
    $valid = $this->form_validation;
    $valid->set_rules(
        'edit_nama',
        'edit_nama',
        'required',
        array(  'required'  =>  'Anda belum mengisikan Nama.')
      );

    $valid->set_rules(
        'edit_jenis_kelamin',
        'edit_jenis_kelamin',
        'required',
        array(  'required'  =>  'Anda belum memilih Jenis Kelamin.')
      );

    $valid->set_rules(
        'edit_alamat',
        'edit_alamat',
        'required',
        array(  'required'  =>  'Anda belum mengisikan Alamat.')
      );

    $valid->set_rules(
        'edit_email',
        'edit_email',
        'required',
        array(  'required'  =>  'Anda belum mengisikan Email.')
      );

    $valid->set_rules(
        'edit_no_telepon',
        'edit_no_telepon',
        'required',
        array(  'required'  =>  'Anda belum mengisikan Nomor Telepon.')
      );

    $valid->set_rules(
        'edit_password',
        'edit_password',
        'required',
        array(  'required'  =>  'Anda belum mengisikan Password.')
      );

      if ($valid->run()===false)
      {
        $members  = $this->Member_Model->get_all_member();
        $data     = array('isi'     => 'administrator/view-member',
                          'members' =>  $members
                      );
        $this->load->view("layouts/wrapper", $data, false);
      }
      else
      {
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
          redirect('administrator/members');
      }
  }

  function delete_member($id){
    $data = array('id'  =>  $id);
    $this->Member_Model->delete_member($data);
    $this->session->set_flashdata('notification', 'Berhasil menghapus member.');
    redirect('administrator/members');
  }
}
