<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Instruktur_Model');
    $this->load->model('Event_Model');
    $this->load->model('Member_Model');
    $this->load->model('Order_Model');
    $this->load->model('Reguler_Model');
    $this->load->model('Paket_Model');
    date_default_timezone_set('Asia/Jakarta');
  }

  function detail($id_instruktur, $id, $jenis)
  {
    if ($jenis == 'event') {
      $instruktur_detail  = $this->Event_Model->get_detail_event($id_instruktur, $id);
      $member_detail      = $this->Member_Model->get_detail_member($this->session->userdata('id'));
      $data     = array(
        'isi'               => 'pemesanan',
        'instruktur_detail' => $instruktur_detail,
        'member_detail'     => $member_detail,
        'jenis'             => $jenis,
        'cari'    => NULL
      );
    } else if ($jenis == 'reguler') {
      $instruktur_detail  = $this->Reguler_Model->get_detail_reguler($id_instruktur, $id);
      $member_detail      = $this->Member_Model->get_detail_member($this->session->userdata('id'));
      $jam_rentang        = explode("-", $instruktur_detail->rentang_jam);
      $time               = $jam_rentang[0];

      $jam = [];
      while ($time != $jam_rentang[1]) {
        $timestamp = strtotime($time) + 60 * 60;
        $time = date('H:i', $timestamp);
        array_push($jam, $time);
      }
      $data     = array(
        'isi'               => 'pemesanan-reguler',
        'instruktur_detail' => $instruktur_detail,
        'member_detail'     => $member_detail,
        'jam'               => $jam,
        'jenis'             => $jenis,
        'cari'    => NULL
      );
    } else if ($jenis == 'paket') {
      $instruktur_detail  = $this->Paket_Model->get_detail_paket($id_instruktur, $id);
      $member_detail      = $this->Member_Model->get_detail_member($this->session->userdata('id'));
      $jam_rentang        = explode("-", $instruktur_detail->rentang_jam);
      $time               = $jam_rentang[0];
      $jam = [];
      while ($time != $jam_rentang[1]) {
        $timestamp = strtotime($time) + 60 * 60;
        $time = date('H:i', $timestamp);
        array_push($jam, $time);
      }
      $data     = array(
        'isi'               => 'pemesanan-paket',
        'instruktur_detail' => $instruktur_detail,
        'member_detail'     => $member_detail,
        'jam'               => $jam,
        'jenis'             => $jenis,
        'error'             => NULL,
        'cari'              =>NULL
      );
    }
    $this->load->view("layouts/default-wrapper", $data, false);
  }

  function pesan_event()
  {
    $i = $this->input;
    $data = array(
      'id_instruktur'   =>  $i->post('id_instruktur'),
      'id_member'       =>  $i->post('id_member'),
      'id_event'        =>  $i->post('id_event'),
      'status'          =>  0,
      'kodebayar'       =>  uniqid()
    );

    $pendaftar = array(
      'id'              => $i->post('id_event'),
      'pendaftar'       => $i->post('pendaftar') + 1
    );

    $this->Event_Model->edit_event($pendaftar);
    $id_pemesanan = $this->Order_Model->pesan_event($data);
    redirect('order/pembayaran/' . $i->post('id_member') . '/' . $id_pemesanan . '/event');
    // return $this->pembayaran($i->post('id_member'), $i->post('id_instruktur'), $i->post('id_event'));
  }

  function pesan_reguler()
  {
    $i = $this->input;
    $cek = array(
      'id_instruktur'   => $i->post('id_instruktur'),
      'jadwal'          => $i->post('jadwal'),
      'jam'             => $i->post('jam')
    );
    $num = $this->Order_Model->cek_order_reguler($cek);
    if ($num > 0) {
      echo "<script type='text/javascript'>
      alert('Tanggal " . $i->post('jadwal') . " Jam " . $i->post('jam') . " penuh');
      window.location.href = '" . site_url() . "/order/detail/" . $i->post('id_instruktur') . "/" . $i->post('id_reguler') . "/reguler" . "';
      </script>";
    } else {
      $i = $this->input;
      $data = array(
        'id_instruktur'   =>  $i->post('id_instruktur'),
        'id_member'       =>  $i->post('id_member'),
        'id_reguler'      =>  $i->post('id_reguler'),
        'status'          =>  0,
        'kodebayar'       =>  uniqid(),
        'jadwal'          => $i->post('jadwal'),
        'jam'             => $i->post('jam'),
        'lokasi'          => $i->post('lokasi')
      );
      $id_pemesanan = $this->Order_Model->pesan_reguler($data);
      redirect('order/pembayaran/' . $i->post('id_member') . '/' . $id_pemesanan . '/reguler');
    }
  }

  public function pesan_paket()
  {
    $i          = $this->input;
    $cek = False;
    if ($i->post('sesi') == '8') {
      if ($i->post('hari1') == $i->post('hari2')) {
        $instruktur_detail  = $this->Paket_Model->get_detail_paket($i->post('id_instruktur'), $i->post('id_paket'));
        $member_detail      = $this->Member_Model->get_detail_member($this->session->userdata('id'));
        $jam_rentang        = explode("-", $instruktur_detail->rentang_jam);
        $time               = $jam_rentang[0];
        $jam = [];
        while ($time != $jam_rentang[1]) {
          $timestamp = strtotime($time) + 60 * 60;
          $time = date('H:i', $timestamp);
          array_push($jam, $time);
        }
        $data     = array(
          'isi'               => 'pemesanan-paket',
          'instruktur_detail' => $instruktur_detail,
          'member_detail'     => $member_detail,
          'jam'               => $jam,
          'jenis'             => 'paket',
          'error'             => 'Error ! Anda memasukkan hari yang sama. Silahkan masukkan hari yang berbeda',
          'cari'              => NULL
        );
        $this->load->view("layouts/default-wrapper", $data, false);

        $cek = True;
      }
    } else if ($i->post('sesi') == '12') {
      if ($i->post('hari1') == $i->post('hari2') or $i->post('hari1') == $i->post('hari3') or $i->post('hari2') == $i->post('hari3')) {
        $instruktur_detail  = $this->Paket_Model->get_detail_paket($i->post('id_instruktur'), $i->post('id_paket'));
        $member_detail      = $this->Member_Model->get_detail_member($this->session->userdata('id'));
        $jam_rentang        = explode("-", $instruktur_detail->rentang_jam);
        $time               = $jam_rentang[0];
        $jam = [];
        while ($time != $jam_rentang[1]) {
          $timestamp = strtotime($time) + 60 * 60;
          $time = date('H:i', $timestamp);
          array_push($jam, $time);
        }
        $data     = array(
          'isi'               => 'pemesanan-paket',
          'instruktur_detail' => $instruktur_detail,
          'member_detail'     => $member_detail,
          'jam'               => $jam,
          'jenis'             => 'paket',
          'error'             => 'Error ! Anda memasukkan hari yang sama. Silahkan masukkan hari yang berbeda',
          'cari'              => NULL
        );
        $this->load->view("layouts/default-wrapper", $data, false);
        $cek = True;
      }
    }
    if ($cek == False) {
      $dateToday  = date("d-m-Y");
      $date       = DateTime::createFromFormat('d-m-Y', $dateToday);

      $jumlah     = (int)$i->post('sesi');
      $temp       = 0;

      //CEK APAKAH JADWAL SUDAH ADA DI DATABASE
      $err = array();
      while ($temp < $jumlah) {
        if ($this->getDay($date->format('l')) == $i->post('hari1')) {
          $data = array(
            'p.id_instruktur' => $i->post('id_instruktur'),
            'j.tanggal' => $date->format('d-m-Y'),
            'j.jam'      => $i->post('jam1')
          );
          $num = $this->Order_Model->cek_jadwal_paket($data);
          if ($num > 0) {
            array_push($err, array($this->getDay($date->format('l')), $date->format('d-m-Y'), $i->post('jam1')));
          }
          $temp++;
        } else if ($this->getDay($date->format('l')) == $i->post('hari2')) {
          $data = array(
            'p.id_instruktur' => $i->post('id_instruktur'),
            'j.tanggal' => $date->format('d-m-Y'),
            'j.jam'      => $i->post('jam2')
          );
          $num = $this->Order_Model->cek_jadwal_paket($data);
          if ($num > 0) {
            array_push($err, array($this->getDay($date->format('l')), $date->format('d-m-Y'), $i->post('jam1')));
          }
          $temp++;
        } else if ($this->getDay($date->format('l')) == $i->post('hari3')) {
          $data = array(
            'p.id_instruktur' => $i->post('id_instruktur'),
            'j.tanggal' => $date->format('d-m-Y'),
            'j.jam'      => $i->post('jam3')
          );
          $num = $this->Order_Model->cek_jadwal_paket($data);
          if ($num > 0) {
            array_push($err, array($this->getDay($date->format('l')), $date->format('d-m-Y'), $i->post('jam1')));
          }
          $temp++;
        }
        $date->modify('+1 day');
      }
      if (count($err) > 0) {
        $instruktur_detail  = $this->Paket_Model->get_detail_paket($i->post('id_instruktur'), $i->post('id_paket'));
        $member_detail      = $this->Member_Model->get_detail_member($this->session->userdata('id'));
        $jam_rentang        = explode("-", $instruktur_detail->rentang_jam);
        $time               = $jam_rentang[0];
        $jam = [];
        while ($time != $jam_rentang[1]) {
          $timestamp = strtotime($time) + 60 * 60;
          $time = date('H:i', $timestamp);
          array_push($jam, $time);
        }
        $data     = array(
          'isi'               => 'pemesanan-paket',
          'instruktur_detail' => $instruktur_detail,
          'member_detail'     => $member_detail,
          'jam'               => $jam,
          'jenis'             => 'paket',
          'error'             => $err,
          'cari'              => NULL
        );
        $this->load->view("layouts/default-wrapper", $data, false);
      } else {
        //INSERT DATABASE PAKET
        $data = array(
          'id_member'     => $i->post('id_member'),
          'id_instruktur' => $i->post('id_instruktur'),
          'id_paket'      => $i->post('id_paket'),
          'status'        => 0,
          'kodebayar'     =>  uniqid(),
          'lokasi'        => $i->post('lokasi')
        );
        $id_pemesanan = $this->Order_Model->pesan_paket($data);

        $dateToday  = date("d-m-Y");
        $date       = DateTime::createFromFormat('d-m-Y', $dateToday);
        $jumlah     = (int)$i->post('sesi');
        $temp       = 0;
        //INSERT DATABASE JADWAL PAKET
        while ($temp < $jumlah) {
          if ($this->getDay($date->format('l')) == $i->post('hari1')) {
            $jadwal = array(
              'id_pesan' => $id_pemesanan,
              'tanggal'  => $date->format('d-m-Y'),
              'hari'     => $this->getDay($date->format('l')),
              'jam'      => $i->post('jam1')
            );
            $this->Order_Model->add_jadwal_paket($jadwal);
            $temp++;
          } else if ($this->getDay($date->format('l')) == $i->post('hari2')) {
            $jadwal = array(
              'id_pesan' => $id_pemesanan,
              'tanggal'  => $date->format('d-m-Y'),
              'hari'     => $this->getDay($date->format('l')),
              'jam'      => $i->post('jam2')
            );
            $this->Order_Model->add_jadwal_paket($jadwal);
            $temp++;
          } else if ($this->getDay($date->format('l')) == $i->post('hari3')) {
            $jadwal = array(
              'id_pesan' => $id_pemesanan,
              'tanggal'  => $date->format('d-m-Y'),
              'hari'     => $this->getDay($date->format('l')),
              'jam'      => $i->post('jam3')
            );
            $this->Order_Model->add_jadwal_paket($jadwal);
            $temp++;
          }
          $date->modify('+1 day');
        }
        // echo "<script type='text/javascript'>
        // window.location.href = '" . site_url() . "/order/pembayaran/" . $i->post('id_member') .'/'. $id_pemesanan . '/paket'. "';
        // </script>";
        redirect('order/pembayaran/' . $i->post('id_member') . '/' . $id_pemesanan . '/paket');
      }
    }
  }

  public function getDay($day)
  {
    switch ($day) {
      case 'Sunday':
        $hari_ini = "Minggu";
        break;

      case 'Monday':
        $hari_ini = "Senin";
        break;

      case 'Tuesday':
        $hari_ini = "Selasa";
        break;

      case 'Wednesday':
        $hari_ini = "Rabu";
        break;

      case 'Thursday':
        $hari_ini = "Kamis";
        break;

      case 'Friday':
        $hari_ini = "Jumat";
        break;

      case 'Saturday':
        $hari_ini = "Sabtu";
        break;

      default:
        $hari_ini = "Tidak di ketahui";
        break;
    }
    return $hari_ini;
  }

  public function pembayaran($id_member, $id_pemesanan = NULL, $jenis = NULL)
  {
    if ($id_pemesanan != NULL && $jenis != NULL) {
      $data_bayar_sekarang    = $this->Order_Model->get_detail_order($id_member, $jenis, $id_pemesanan);
      $data_bayar_event       = $this->Order_Model->get_detail_order($id_member, 'event');
      $data_bayar_reguler     = $this->Order_Model->get_detail_order($id_member, 'reguler');
      $data_bayar_paket     = $this->Order_Model->get_detail_order($id_member, 'paket');
      $jadwal_paket           = $this->Order_Model->get_jadwal_paket();
      $data     = array(
        'isi'                     => 'pembayaran',
        'data_bayar_sekarang'     => $data_bayar_sekarang,
        'data_bayar_event'        => $data_bayar_event,
        'data_bayar_reguler'      => $data_bayar_reguler,
        'data_bayar_paket'        => $data_bayar_paket,
        'jadwal_paket'            => $jadwal_paket,
        'status'                  => 1,
        'cari'    => NULL
      );

      $this->load->view("layouts/setting-wrapper", $data, false);
    } else {
      $data_bayar_event       = $this->Order_Model->get_detail_order($id_member, 'event');
      $data_bayar_reguler     = $this->Order_Model->get_detail_order($id_member, 'reguler');
      $data_bayar_paket       = $this->Order_Model->get_detail_order($id_member, 'paket');
      $jadwal_paket           = $this->Order_Model->get_jadwal_paket();
      $data     = array(
        'isi'                     => 'pembayaran',
        'data_bayar_event'        => $data_bayar_event,
        'data_bayar_reguler'      => $data_bayar_reguler,
        'data_bayar_paket'        => $data_bayar_paket,
        'jadwal_paket'            => $jadwal_paket,
        'status'                  => 0,
        'cari'    => NULL
      );
      $this->load->view("layouts/setting-wrapper", $data, false);
    }
  }

  public function konfirmasi_pembayaran()
  {
    $config['upload_path']          = './resources/img/bukti/';
    $config['allowed_types']        = 'jpg|png';
    $config['max_size']             = 3000;
    $config['max_width']            = 5000;
    $config['max_height']           = 5000;
    $config['encrypt_name']         = TRUE;
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('foto')) {
      $i  = $this->input;
      // $this->session->set_flashdata('success', 'Update foto alumni gagal.');
      // redirect('member/profile/'.$i->post('edit_photo_id'));
      echo $this->upload->display_errors();
      exit();
    } else {
      $i  = $this->input;
      $data = array(
        'bukti_transfer'         =>  $this->upload->data('file_name'),
        'id_pesan'               =>  $i->post('id_pesan'),
        'status'                 =>  '1'
      );
      $this->Order_Model->konfirmasi_pembayaran($i->post('jenis'), $data);
      $this->session->set_flashdata('success', 'Update foto alumni berhasil.');
      echo "<script type='text/javascript'>
			alert('Anda berhasil mengonfirmasi pembayaran. Silahkan tunggu pembayaran anda dikonfirmasi oleh admin.');
			window.location.href = '" . site_url() . "/order/pembayaran/" . $i->post('id_member') . "';
			</script>";
    }
  }

  public function batalkan_pemesanan()
  {
    $i  = $this->input;
    $data = array(
      'id_pesan'               =>  $i->post('id_pesan'),
      'status'                 =>  '4'
    );
    if ($i->post('jenis') == 'pemesanan') {
      $pendaftar = array(
        'id'              => $i->post('id_event'),
        'pendaftar'       => $i->post('pendaftar') - 1
      );
      $this->Event_Model->edit_event($pendaftar);
    }
    else if ($i->post('jenis') == 'pemesanan_paket') {
      $id_pesan = array(
        'id_pesan'              => $i->post('id_pesan')
      );
      $this->Order_Model->delete_jadwal_paket($id_pesan);
    }

    $this->Order_Model->batalkan_pemesanan($i->post('jenis'), $data);
    echo "<script type='text/javascript'>
    alert('Berhasil membatalkan pemesanan.');
    window.location.href = '" . site_url() . "/order/pembayaran/" . $i->post('id_member') . "';
    </script>";
  }
}
