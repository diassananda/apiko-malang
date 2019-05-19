<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_Model');
        $this->load->model('Member_Model');
        $this->load->model('Event_Model');
    }

    function index()
    {
        $data_bayar_event  = $this->Order_Model->get_detail_order(NULL, 'event');
        $data_bayar_reguler  = $this->Order_Model->get_detail_order(NULL, 'reguler');
        $data_bayar_paket  = $this->Order_Model->get_detail_order(NULL, 'paket');
        $jadwal_paket           = $this->Order_Model->get_jadwal_paket();
        $data     = array(
            'isi'                   => 'administrator/view-pembayaran',
            'data_bayar_event'      =>  $data_bayar_event,
            'data_bayar_reguler'    => $data_bayar_reguler,
            'data_bayar_paket'      => $data_bayar_paket,
            'jadwal_paket'            => $jadwal_paket
        );
        $this->load->view("layouts/wrapper", $data, false);
    }

    public function confirm_order($id_pesan, $jenis)
    {
        $i  = $this->input;
        $data = array(
            'id_pesan'               =>  $id_pesan,
            'status'                 =>  '2'
        );
        $this->Order_Model->konfirmasi_pembayaran($jenis, $data);
        echo "<script type='text/javascript'>
        alert('Berhasil mengonfirmasi pembayaran.');
        window.location.href = '" . site_url() . "/administrator/order/';
        </script>";
    }

    public function cancel_order($id_pesan, $id_event, $jenis, $pendaftar = NULL)
    {
        $i  = $this->input;
        $data = array(
            'id_pesan'               =>  $id_pesan,
            'status'                 =>  '3'
        );

        if ($pendaftar != NULL) {
            $pendaftar = array(
                'id'               =>  $id_event,
                'pendaftar'        =>  $pendaftar - 1
            );
            $this->Event_Model->edit_event($pendaftar);
        }

        if ($jenis== 'pemesanan_paket') {
            $id_pesan = array(
              'id_pesan'              => $id_pesan
            );
            $this->Order_Model->delete_jadwal_paket($id_pesan);
          }

        $this->Order_Model->konfirmasi_pembayaran($jenis, $data);
        echo "<script type='text/javascript'>
        alert('Berhasil menolak pembayaran.');
        window.location.href = '" . site_url() . "/administrator/order/';
        </script>";
    }
}
