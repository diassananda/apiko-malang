<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_all_event()
  {
    $this->db->select('i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, e.id, e.id_instruktur, e.jumlah_sesi, e.jumlah_murid, e.pendaftar, e.durasi, e.harga, e.jadwal, e.tempat, e.agenda, e.verified');
    $this->db->order_by('e.id_instruktur');
    $this->db->from('event e');
    $this->db->join('instruktur i', 'i.id = e.id_instruktur');
    $this->db->where('i.verified', 1);
    $query  = $this->db->get();
    return $query->result();
  }

  public function get_detail_event($id_instruktur, $id_event)
  {
    $this->db->select('i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, e.id, e.id_instruktur, e.jumlah_sesi, e.jumlah_murid, e.pendaftar, e.durasi, e.harga, e.jadwal, e.tempat, e.agenda, e.verified');
    $this->db->from('event e');
    $this->db->join('instruktur i', 'i.id = e.id_instruktur');
    $this->db->where('i.id', $id_instruktur);
    $this->db->where('e.id', $id_event);
    $query  = $this->db->get();
    return $query->row();
  }
  public function add_event($data)
  {
    $this->db->insert('event', $data);
  }

  public function edit_event($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->update('event', $data);
  }
  public function delete_event($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->delete('event', $data);
  }

  public function get_event_where($agenda)
  {
    $this->db->select('i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, e.id, e.id_instruktur, e.jumlah_sesi, e.jumlah_murid, e.pendaftar, e.durasi, e.harga, e.jadwal, e.tempat, e.agenda, e.verified');
    $this->db->from('event e');
    $this->db->join('instruktur i', 'i.id = e.id_instruktur');
    $this->db->where('e.agenda', $agenda);
    $query  = $this->db->get();
    return $query->result();
  }

  public function get_event_nama($nama)
  {
    $this->db->select('i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, e.id, e.id_instruktur, e.jumlah_sesi, e.jumlah_murid, e.pendaftar, e.durasi, e.harga, e.jadwal, e.tempat, e.agenda, e.verified');
    $this->db->from('event e');
    $this->db->join('instruktur i', 'i.id = e.id_instruktur');
    $this->db->where('i.nama', $nama);
    $query  = $this->db->get();
    return $query->result();
  }
}
