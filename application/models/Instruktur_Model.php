<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instruktur_Model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_all_instruktur(){
    $this->db->select('*');
    $this->db->from('instruktur');
    $this->db->where('verified',1);
    $this->db->order_by('id');
    $query  = $this->db->get();
    return $query->result();
  }

  public function get_requested_instruktur(){
    $this->db->select('*');
    $this->db->from('instruktur');
    $this->db->where('verified',0);
    $this->db->order_by('id');
    $query  = $this->db->get();
    return $query->result();
  }

  public function add_instruktur($data){
    $this->db->insert('instruktur', $data);
  }

  public function get_detail_instruktur($id){
    $this->db->select('*');
    $this->db->from('instruktur');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->row();
  }

  public function edit_instruktur($data){
    $this->db->where('id', $data['id']);
    $this->db->update('instruktur', $data);
  }

  public function delete_instruktur($id){
    $this->db->delete('instruktur', array('id' => $id));
    $this->db->delete('event', array('id_instruktur' => $id));
  }

  public function hapus_instruktur($data){
    $this->db->where('id',$data['id']);
    $this->db->delete('instruktur', $data);
  }


  public function login_instruktur($email, $password){
    $this->db->select('*');
    $this->db->from('instruktur');
    $this->db->where(array( 'email'  =>  $email,
                            'password'  =>  $password));
    $this->db->order_by('email','DESC');
    $query = $this->db->get();
    $detail_instruktur = $query->row();
    $count_instruktur = $query->num_rows();
    return array(
    'detail_instruktur' => $detail_instruktur,
    'count_instruktur'  => $count_instruktur
    );
  }

}
