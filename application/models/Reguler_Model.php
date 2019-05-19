<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reguler_Model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_all_reguler(){
    $this->db->select('i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, e.id, e.id_instruktur, e.jumlah_sesi, e.jumlah_murid, e.durasi, e.harga, e.agenda');
    $this->db->order_by('e.id_instruktur');
    $this->db->from('reguler e');
    $this->db->join('instruktur i','i.id = e.id_instruktur');
    $query  = $this->db->get();
    return $query->result();
  }

  public function add_reguler($data){
      $this->db->insert('reguler', $data);
  }

  public function edit_reguler($data){
    $this->db->where('id', $data['id']);
    $this->db->update('reguler', $data);
  }
  public function delete_reguler($data){
    $this->db->where('id',$data['id']);
    $this->db->delete('reguler', $data);
  }

  public function get_detail_reguler($id_instruktur, $id_reguler)
  {
    $this->db->select('i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, e.id, e.id_instruktur, e.jumlah_sesi, e.jumlah_murid, e.durasi, e.harga, e.agenda, e.rentang_jam');
    $this->db->from('reguler e');
    $this->db->join('instruktur i','i.id = e.id_instruktur');
    $this->db->where('i.id',$id_instruktur);
    $this->db->where('e.id',$id_reguler);
    $query  = $this->db->get();
    return $query->row();
  }

  public function get_reguler_where($agenda)
  {
    $this->db->select('i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, e.id, e.id_instruktur, e.jumlah_sesi, e.jumlah_murid, e.durasi, e.harga, e.agenda, e.rentang_jam');
    $this->db->from('reguler e');
    $this->db->join('instruktur i','i.id = e.id_instruktur');
    $this->db->where('e.agenda',$agenda);
    $query  = $this->db->get();
    return $query->result();
  }

  public function get_reguler_nama($nama)
  {
    $this->db->select('i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, e.id, e.id_instruktur, e.jumlah_sesi, e.jumlah_murid, e.durasi, e.harga, e.agenda, e.rentang_jam');
    $this->db->from('reguler e');
    $this->db->join('instruktur i','i.id = e.id_instruktur');
    $this->db->where('i.nama',$nama);
    $query  = $this->db->get();
    return $query->result();
  }
}
