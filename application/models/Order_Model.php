<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function pesan_event($data)
  {
    $this->db->insert('pemesanan', $data);
    $id_pesan = $this->db->insert_id();
    return $id_pesan;
  }

  public function pesan_reguler($data)
  {
    $this->db->insert('pemesanan_reguler', $data);
    $id_pesan = $this->db->insert_id();
    return $id_pesan;
  }

  public function pesan_paket($data)
  {
    $this->db->insert('pemesanan_paket', $data);
    $id_pesan = $this->db->insert_id();
    return $id_pesan;
  }

  public function cek_order_reguler($data)
  {
    $query = $this->db->get_where('pemesanan_reguler', $data);
    return $query->num_rows();
  }

  public function get_detail_order($id_member = NULL, $jenis = NULL, $id_pemesanan = NULL)
  {
    if ($id_pemesanan != NULL && $jenis != NULL) {
      if ($jenis == 'event') {
        $this->db->order_by('p.id_pesan', 'DESC');
        $this->db->select('e.id_instruktur, i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, p.id_event,  e.jumlah_sesi, e.jumlah_murid, e.pendaftar, e.durasi, e.harga, e.jadwal, e.tempat, e.agenda, e.verified, p.id_pesan, p.status, p.kodebayar,  p.bukti_transfer, m.nama as nama_member, m.jenis_kelamin as jenis_kelamin_member, m.email as email_member, m.no_telepon as no_telepon_member, m.alamat as alamat_member');
        $this->db->from('pemesanan p');
        $this->db->join('instruktur i', 'i.id = p.id_instruktur');
        $this->db->join('event e', 'e.id = p.id_event');
        $this->db->join('member m', 'm.id = p.id_member');
        $this->db->where('p.id_pesan', $id_pemesanan);
        $query  = $this->db->get();
        return $query->row();
      } else if ($jenis == 'reguler') {
        $this->db->select('e.id_instruktur, i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, p.id_reguler,  e.jumlah_sesi, e.jumlah_murid, e.durasi, e.harga, e.agenda,  p.id_pesan, p.status, p.kodebayar, p.bukti_transfer, p.jadwal, p.jam, p.lokasi, m.nama as nama_member, m.jenis_kelamin as jenis_kelamin_member, m.email as email_member, m.no_telepon as no_telepon_member, m.alamat as alamat_member');
        $this->db->from('pemesanan_reguler p');
        $this->db->join('instruktur i', 'i.id = p.id_instruktur');
        $this->db->join('reguler e', 'e.id = p.id_reguler');
        $this->db->join('member m', 'm.id = p.id_member');
        $this->db->where('p.id_pesan', $id_pemesanan);
        $query  = $this->db->get();
        return $query->row();
      } else if ($jenis == 'paket') {
        $this->db->select('e.id_instruktur, i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, p.id_paket,  e.jumlah_sesi, e.jumlah_murid, e.durasi, e.harga, e.agenda,  p.id_pesan, p.status, p.kodebayar, p.bukti_transfer, p.lokasi, m.nama as nama_member, m.jenis_kelamin as jenis_kelamin_member, m.email as email_member, m.no_telepon as no_telepon_member, m.alamat as alamat_member');
        $this->db->from('pemesanan_paket p');
        $this->db->join('instruktur i', 'i.id = p.id_instruktur');
        $this->db->join('paket e', 'e.id = p.id_paket');
        $this->db->join('member m', 'm.id = p.id_member');
        $this->db->where('p.id_pesan', $id_pemesanan);
        $query  = $this->db->get();
        return $query->row();
      }
    } else if ($id_member != NULL) {
      if ($jenis == 'event') {
        $this->db->select('e.id_instruktur, i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, p.id_event, e.jumlah_sesi, e.jumlah_murid, e.pendaftar, e.durasi, e.harga, e.jadwal, e.tempat, e.agenda, e.verified,p.id_pesan, p.status, p.kodebayar, p.bukti_transfer, p.id_member, m.nama as nama_member, m.jenis_kelamin as jenis_kelamin_member, m.email as email_member, m.no_telepon as no_telepon_member, m.alamat as alamat_member');
        $this->db->from('pemesanan p');
        $this->db->join('instruktur i', 'i.id = p.id_instruktur');
        $this->db->join('member m', 'm.id = p.id_member');
        $this->db->join('event e', 'e.id = p.id_event');
        $this->db->where('m.id', $id_member);
        $query  = $this->db->get();
        return $query->result();
      } else if ($jenis == 'reguler') {
        $this->db->select('e.id_instruktur, i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, p.id_reguler,  e.jumlah_sesi, e.jumlah_murid, e.durasi, e.harga, e.agenda,  p.id_pesan, p.status, p.kodebayar, p.bukti_transfer, p.jadwal, p.jam, p.lokasi, m.nama as nama_member, m.jenis_kelamin as jenis_kelamin_member, m.email as email_member, m.no_telepon as no_telepon_member, m.alamat as alamat_member');
        $this->db->from('pemesanan_reguler p');
        $this->db->join('instruktur i', 'i.id = p.id_instruktur');
        $this->db->join('reguler e', 'e.id = p.id_reguler');
        $this->db->join('member m', 'm.id = p.id_member');
        $this->db->where('m.id', $id_member);
        $query  = $this->db->get();
        return $query->result();
      } else if ($jenis == 'paket') {
        $this->db->select('e.id_instruktur, i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, p.id_paket,  e.jumlah_sesi, e.jumlah_murid, e.durasi, e.harga, e.agenda,  p.id_pesan, p.status, p.kodebayar, p.bukti_transfer, p.lokasi, m.nama as nama_member, m.jenis_kelamin as jenis_kelamin_member, m.email as email_member, m.no_telepon as no_telepon_member, m.alamat as alamat_member');
        $this->db->from('pemesanan_paket p');
        $this->db->join('instruktur i', 'i.id = p.id_instruktur');
        $this->db->join('paket e', 'e.id = p.id_paket');
        $this->db->join('member m', 'm.id = p.id_member');
        $this->db->where('m.id', $id_member);
        $query  = $this->db->get();
        return $query->result();
      }
    } else {
      if ($jenis == 'event') {
        $this->db->select('e.id_instruktur, i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, p.id_event, e.jumlah_sesi, e.jumlah_murid, e.pendaftar, e.durasi, e.harga, e.jadwal, e.tempat, e.agenda, e.verified,p.id_pesan, p.status, p.kodebayar, p.bukti_transfer, p.id_member, m.nama as nama_member, m.jenis_kelamin as jenis_kelamin_member, m.email as email_member, m.no_telepon as no_telepon_member, m.alamat as alamat_member');
        $this->db->from('pemesanan p');
        $this->db->join('instruktur i', 'i.id = p.id_instruktur');
        $this->db->join('member m', 'm.id = p.id_member');
        $this->db->join('event e', 'e.id = p.id_event');
        $query  = $this->db->get();
        return $query->result();
      } else if ($jenis == 'reguler') {
        $this->db->select('e.id_instruktur, i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, p.id_reguler,  e.jumlah_sesi, e.jumlah_murid, e.durasi, e.harga, e.agenda,  p.id_pesan, p.status, p.kodebayar, p.bukti_transfer, p.jadwal, p.jam, p.lokasi, m.nama as nama_member, m.jenis_kelamin as jenis_kelamin_member, m.email as email_member, m.no_telepon as no_telepon_member, m.alamat as alamat_member');
        $this->db->from('pemesanan_reguler p');
        $this->db->join('instruktur i', 'i.id = p.id_instruktur');
        $this->db->join('reguler e', 'e.id = p.id_reguler');
        $this->db->join('member m', 'm.id = p.id_member');
        $query  = $this->db->get();
        return $query->result();
      } else if ($jenis == 'paket') {
        $this->db->select('e.id_instruktur, i.nama, i.jenis_kelamin, i.alamat, i.no_telepon, i.lama_melatih, i.pengalaman_melatih, i.keahlian_khusus, i.sertifikasi, i.email, i.foto, p.id_paket,  e.jumlah_sesi, e.jumlah_murid, e.durasi, e.harga, e.agenda,  p.id_pesan, p.status, p.kodebayar, p.bukti_transfer, p.lokasi, m.nama as nama_member, m.jenis_kelamin as jenis_kelamin_member, m.email as email_member, m.no_telepon as no_telepon_member, m.alamat as alamat_member');
        $this->db->from('pemesanan_paket p');
        $this->db->join('instruktur i', 'i.id = p.id_instruktur');
        $this->db->join('paket e', 'e.id = p.id_paket');
        $this->db->join('member m', 'm.id = p.id_member');
        $query  = $this->db->get();
        return $query->result();
      }
    }
  }

  public function konfirmasi_pembayaran($table, $data)
  {
    $this->db->where('id_pesan', $data['id_pesan']);
    $this->db->update($table, $data);
  }

  public function batalkan_pemesanan($table, $data)
  {
    $this->db->where('id_pesan', $data['id_pesan']);
    $this->db->update($table, $data);
  }

  public function add_jadwal_paket($data)
  {
    $this->db->insert('jadwal_paket', $data);
  }

  public function cek_jadwal_paket($data)
  {
    $this->db->select('*');
    $this->db->from('pemesanan_paket p');
    $this->db->join('jadwal_paket j', 'j.id_pesan = p.id_pesan');
    $this->db->where($data);
    $query  = $this->db->get();
    return $query->num_rows();
  }

  public function get_jadwal_paket()
  {
    return $this->db->get('jadwal_paket')->result();
  }

  public function delete_jadwal_paket($data)
  {
    $this->db->delete('jadwal_paket', $data);
  }
}
