<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instrukturs extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Instruktur_Model');
  }

  function index(){
    $instrukturs  = $this->Instruktur_Model->get_all_instruktur();
    $data     = array('isi'     => 'administrator/view-instruktur',
                      'instrukturs' =>  $instrukturs
                  );
    $this->load->view("layouts/wrapper", $data, false);
  }

  function get_detail_instruktur($id){
    $data = $this->Instruktur_Model->get_detail_instruktur($id);
    echo json_encode($data);
  }

  function add_instruktur(){
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

    $valid->set_rules(
        'lama_melatih',
        'lama_melatih',
        'required',
        array(  'required'  =>  'Anda belum mengisikan Lama Melatih.')
      );

    $valid->set_rules(
        'pengalaman_melatih',
        'pengalaman_melatih',
        'required',
        array(  'required'  =>  'Anda belum mengisikan Pengalaman Melatih.')
      );

    $valid->set_rules(
        'keahlian_khusus',
        'keahlian_khusus',
        'required',
        array(  'required'  =>  'Anda belum mengisikan Keahlian Khusus.')
      );

    $valid->set_rules(
        'sertifikasi',
        'sertifikasi',
        'required',
        array(  'required'  =>  'Anda belum mengisikan Sertifikasi.')
      );

      if ($valid->run()===false)
      {
        $instrukturs  = $this->Instruktur_Model->get_all_instruktur();
        $data     = array('isi'     => 'administrator/view-instruktur',
                          'instrukturs' =>  $instrukturs
                      );
        $this->load->view("layouts/wrapper", $data, false);
      }
      else
      {
          $i  = $this->input;
          $data = array(
                'nama'               =>  $i->post('nama'),
                'jenis_kelamin'      =>  $i->post('jenis_kelamin'),
                'alamat'             =>  $i->post('alamat'),
                'email'              =>  $i->post('email'),
                'no_telepon'         =>  $i->post('no_telepon'),
                'lama_melatih'       =>  $i->post('lama_melatih'),
                'pengalaman_melatih' =>  $i->post('pengalaman_melatih'),
                'keahlian_khusus'    =>  $i->post('keahlian_khusus'),
                'sertifikasi'        =>  $i->post('sertifikasi'),
                'verified'           =>  1,
                'password'           =>  md5($i->post('password'))
              );
          $this->Instruktur_Model->add_instruktur($data);
          $this->session->set_flashdata('sukses', 'Berhasil menambah instruktur.');
          redirect('administrator/instrukturs');
      }
  }

  function edit_instruktur(){
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
        'required|is_natural',
        array(  'required'   =>  'Anda belum mengisikan Nomor Telepon.',
                'is_natural' =>  'Nomor telepon harus berupa angka')
      );

    $valid->set_rules(
        'edit_password',
        'edit_password',
        'required',
        array(  'required'  =>  'Anda belum mengisikan Password.')
      );

    $valid->set_rules(
        'edit_lama_melatih',
        'edit_lama_melatih',
        'required',
        array(  'required'  =>  'Anda belum mengisikan Lama Melatih.')
      );

    $valid->set_rules(
        'edit_pengalaman_melatih',
        'edit_pengalaman_melatih',
        'required',
        array(  'required'  =>  'Anda belum mengisikan Pengalaman Melatih.')
      );

    $valid->set_rules(
        'edit_keahlian_khusus',
        'edit_keahlian_khusus',
        'required',
        array(  'required'  =>  'Anda belum mengisikan Keahlian Khusus.')
      );

    $valid->set_rules(
        'edit_sertifikasi',
        'edit_sertifikasi',
        'required',
        array(  'required'  =>  'Anda belum mengisikan Sertifikasi.')
      );

      if ($valid->run()===false)
      {
        $instrukturs  = $this->Instruktur_Model->get_all_instruktur();
        $data     = array('isi'     => 'administrator/view-instruktur',
                          'instrukturs' =>  $instrukturs
                      );
        $this->load->view("layouts/wrapper", $data, false);
      }
      else
      {
          $i  = $this->input;
          $data = array(
                'id'                 =>  $i->post('edit_id'),
                'nama'               =>  $i->post('edit_nama'),
                'jenis_kelamin'      =>  $i->post('edit_jenis_kelamin'),
                'alamat'             =>  $i->post('edit_alamat'),
                'email'              =>  $i->post('edit_email'),
                'no_telepon'         =>  $i->post('edit_no_telepon'),
                'lama_melatih'       =>  $i->post('edit_lama_melatih'),
                'pengalaman_melatih' =>  $i->post('edit_pengalaman_melatih'),
                'keahlian_khusus'    =>  $i->post('edit_keahlian_khusus'),
                'sertifikasi'        =>  $i->post('edit_sertifikasi'),
                'verified'           =>  1,
                'password'           =>  md5($i->post('edit_password'))
              );
          $this->Instruktur_Model->edit_instruktur($data);
          $this->session->set_flashdata('sukses', 'Berhasil mengupdate instruktur.');
          redirect('administrator/instrukturs');
      }
  }

  function delete_instruktur($id){
    $data = array('id'  =>  $id);
    $this->Instruktur_Model->delete_instruktur($data);
    $this->session->set_flashdata('notification', 'Berhasil menghapus instruktur.');
    redirect('administrator/instrukturs');
  }

  function requested(){
    $instrukturs  = $this->Instruktur_Model->get_requested_instruktur();
    $data     = array('isi'     => 'administrator/view-requested-instruktur',
                      'instrukturs' =>  $instrukturs
                  );
    $this->load->view("layouts/wrapper", $data, false);
  }

  function confirm_instruktur($id){
    $data = array(
          'id'                 =>  $id,
          'verified'           =>  1
        );
    $requestor_instruktor = $this->Instruktur_Model->get_detail_instruktur($id);
    $this->Instruktur_Model->edit_instruktur($data);
    $this->load->library('email');
    $config = array();
    $config['charset'] = 'utf-8';
    $config['useragent'] = 'Codeigniter';
    $config['protocol']= "smtp";
    $config['mailtype']= "html";
    $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
    $config['smtp_port']= "465";
    $config['smtp_timeout']= "400";
    $config['smtp_user']= "apikomalang@gmail.com"; // isi dengan email kamu
    $config['smtp_pass']= "dummyemailfordev"; // isi dengan password kamu
    $config['crlf']="\r\n";
    $config['newline']="\r\n";
    $config['wordwrap'] = true;
    //memanggil library email dan set konfigurasi untuk pengiriman email

    $this->email->initialize($config);
    //konfigurasi pengiriman
    $this->email->from($config['smtp_user']);
    $this->email->to($requestor_instruktor->email);
    $this->email->subject("Pendaftaran anda diterima!");
    $message  ="Hi ".$requestor_instruktor->nama."<br>";
    $message .="Pendaftaran anda sebagai Instruktur di APIKO Ngalam telah diterima<br>";
    $message .="Silahkan login menggunakan email dan password yang sudah terdaftar untuk melakukan perubahan profil, pembuatan kelas dan event<br>";
    $message .="<br>";
    $message .="<br>";
    $message .="============<br>";
    $message .="APIKO Ngalam<br>";
    $message .="<a href='localhost/apikomalang'>www.apiko-ngalam.com</a>";
    $this->email->message($message);

    if ($this->email->send()) {
      $this->session->set_flashdata('notification', 'Email berhasil dikirim.');
      redirect('administrator/instrukturs/requested');
    } else {
      // $this->session->set_flashdata('notification', 'Email gagal dikirim.');
      // redirect('administrator/instrukturs/requested');
      echo "Gagall bosku";
      exit();
    }
    $this->session->set_flashdata('notification', 'Berhasil menerima pendaftar instruktur.');
    redirect('administrator/instrukturs/requested');
  }

  function reject_instruktur($id){
    $data = array(
          'id'                 =>  $id
        );
    $requestor_instruktor = $this->Instruktur_Model->get_detail_instruktur($id);
    $this->Instruktur_Model->delete_instruktur($data);
    $this->load->library('email');
    $config = array();
    $config['charset'] = 'utf-8';
    $config['useragent'] = 'Codeigniter';
    $config['protocol']= "smtp";
    $config['mailtype']= "html";
    $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
    $config['smtp_port']= "465";
    $config['smtp_timeout']= "400";
    $config['smtp_user']= "apikomalang@gmail.com"; // isi dengan email kamu
    $config['smtp_pass']= "dummyemailfordev"; // isi dengan password kamu
    $config['crlf']="\r\n";
    $config['newline']="\r\n";
    $config['wordwrap'] = true;
    //memanggil library email dan set konfigurasi untuk pengiriman email

    $this->email->initialize($config);
    //konfigurasi pengiriman
    $this->email->from($config['smtp_user']);
    $this->email->to($requestor_instruktor->email);
    $this->email->subject("Pendaftaran anda tidak diterima!");
    $message  ="Hi ".$requestor_instruktor->nama."<br>";
    $message .="Mohon maaf, pendaftaran anda sebagai Instruktur di APIKO Ngalam tidak diterima<br>";
    $message .="Data pendaftaran tidak lengkap / tidak benar, silahkan mendaftar kembali dengan data yang benar. Jika ada permasalahan pendaftaran atau data sudah benar namun tidak diterima, silahkan hubungi kami. <br>";
    $message .="<br>";
    $message .="<br>";
    $message .="============<br>";
    $message .="APIKO Ngalam<br>";
    $message .="<a href='localhost/apikomalang'>www.apiko-ngalam.com</a>";
    $this->email->message($message);

    if ($this->email->send()) {
      $this->session->set_flashdata('notification', 'Email berhasil dikirim.');
      redirect('administrator/instrukturs/requested');
    } else {
      $this->session->set_flashdata('notification', 'Email gagal dikirim.');
      redirect('administrator/instrukturs/requested');
    }
    $this->session->set_flashdata('notification', 'Berhasil menerima pendaftar instruktur.');
    redirect('administrator/instrukturs/requested');
  }


}
