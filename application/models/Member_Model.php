<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_Model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_all_member(){
    $this->db->select('*');
    $this->db->from('member');
    $this->db->order_by('id');
    $query  = $this->db->get();
    return $query->result();
  }

  public function add_member($data){
    $this->db->insert('member', $data);
  }

  public function get_detail_member($id){
    $this->db->select('*');
    $this->db->from('member');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->row();
  }

  public function edit_member($data){
    $this->db->where('id', $data['id']);
    $this->db->update('member', $data);
  }

  public function delete_member($id){
    $this->db->delete('member', $id);
  }

  public function login_member($email, $password){
    $this->db->select('*');
    $this->db->from('member');
    $this->db->where(array( 'email'  =>  $email,
                            'password'  =>  $password));
    $this->db->order_by('email','DESC');
    $query = $this->db->get();
    $detail_member = $query->row();
    $count_member = $query->num_rows();
    return array(
    'detail_member' => $detail_member,
    'count_member'  => $count_member
    );
  }
}
