<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_Model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_all_administrator(){
    $this->db->select('*');
    $this->db->from('administrator');
    $this->db->order_by('id');
    $query  = $this->db->get();
    return $query->result();
  }

  public function add_administrator($data){
    $this->db->insert('administrator', $data);
  }

  public function get_detail_administrator($id){
    $this->db->select('*');
    $this->db->from('administrator');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->row();
  }

  public function edit_administrator($data){
    $this->db->where('id', $data['id']);
    $this->db->update('administrator', $data);
  }

  public function delete_administrator($data){
    $this->db->where('id',$data['id']);
    $this->db->delete('administrator', $data);
  }

  public function login_administrator($email, $password){
    $this->db->select('*');
    $this->db->from('administrator');
    $this->db->where(array( 'email'  =>  $email,
                            'password'  =>  $password));
    $this->db->order_by('email','DESC');
    $query = $this->db->get();
    $detail_administrator = $query->row();
    $count_administrator = $query->num_rows();
    return array(
    'detail_administrator' => $detail_administrator,
    'count_administrator'  => $count_administrator
    );
  }

}
