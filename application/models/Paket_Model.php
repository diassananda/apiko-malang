<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add_paket($data)
    {
        $this->db->insert('paket', $data);
    }

    public function get_all_paket()
    {
        $this->db->select('i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, e.id, e.id_instruktur, e.jumlah_sesi, e.jumlah_murid, e.durasi, e.harga, e.agenda');
        $this->db->order_by('e.id_instruktur');
        $this->db->from('paket e');
        $this->db->join('instruktur i', 'i.id = e.id_instruktur');
        $query  = $this->db->get();
        return $query->result();
    }

    public function get_detail_paket($id_instruktur, $id_paket)
    {
        $this->db->select('i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, e.id, e.id_instruktur, e.jumlah_sesi, e.jumlah_murid, e.durasi, e.harga, e.agenda, e.rentang_jam');
        $this->db->from('paket e');
        $this->db->join('instruktur i', 'i.id = e.id_instruktur');
        $this->db->where('i.id', $id_instruktur);
        $this->db->where('e.id', $id_paket);
        $query  = $this->db->get();
        return $query->row();
    }
    
    public function get_paket_where($agenda)
    {
        $this->db->select('i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, e.id, e.id_instruktur, e.jumlah_sesi, e.jumlah_murid, e.durasi, e.harga, e.agenda');
        $this->db->order_by('e.id_instruktur');
        $this->db->from('paket e');
        $this->db->join('instruktur i', 'i.id = e.id_instruktur');
        $this->db->where('e.agenda', $agenda);
        $query  = $this->db->get();
        return $query->result();
    }

    public function get_paket_nama($nama)
    {
        $this->db->select('i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, e.id, e.id_instruktur, e.jumlah_sesi, e.jumlah_murid, e.durasi, e.harga, e.agenda');
        $this->db->order_by('e.id_instruktur');
        $this->db->from('paket e');
        $this->db->join('instruktur i', 'i.id = e.id_instruktur');
        $this->db->where('i.nama', $nama);
        $query  = $this->db->get();
        return $query->result();
    }
}
