<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{

  public function __construct(){
    
    parent::__construct();

    if($this->session->userdata('nama_lkp')==''){
      redirect('authen');
    }

    $this->load->model('mmember');

  }


  public function index(){
    
    $data['nama'] = $this->session->userdata('nama_lkp');

    $this->load->view('member/members', $data);
  }


  public function tambahorder(){
    
    $data['idpel'] = $this->session->userdata('id');
    $data['nama'] = $this->session->userdata('nama_lkp'); 
    $data['resi'] = koderesi(10);
    $data['paket'] = $this->mmember->getpaket()->result();
    $data['kota'] = $this->mmember->getkota()->result();
   
    $this->load->view('member/tambahpesan', $data);
  }


  public function simpanorder(){

    $nr = $this->input->post('noresi');
    $ip = $this->input->post('idpel'); // opsi
    $pn = $this->input->post('penerima');
    $al = $this->input->post('alamat');
    $hp = $this->input->post('tlp');
    $ct = $this->input->post('kota');
    $pt = $this->input->post('paket');
    $ly = $this->input->post('layanan');
    $ba = $this->input->post('harga');
    $hl = $this->input->post('hrglbh');
    $tp = date_to_en($this->input->post('tglpsn'));
    $es = $this->input->post('estimasi'); //opsi
    $bt = $this->input->post('berat');

    $this->form_validation->set_rules('noresi', 'No. Resi', 'required');
    $this->form_validation->set_rules('tglpsn', 'Tanggal Pesan', 'required');
    $this->form_validation->set_rules('penerima', 'Penerima', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('tlp', 'Telepon', 'required');
    $this->form_validation->set_rules('berat', 'Berat', 'required');

    if($this->form_validation->run()==FALSE){

      $data['idpel'] = $this->session->userdata('id');
      $data['nama'] = $this->session->userdata('nama_lkp');

      $this->load->view('member/tambahorder', $data);

    } else {

        // Kondisi Penambahan Waktu

        if($es == 3){

              $tk = date('Y-m-d', strtotime('+3 days', strtotime($tp)));

          } elseif($es == 1){

              $tk = date('Y-m-d', strtotime('+1 days', strtotime($tp)));

            } else {

              $tk = $tp;

            }


        // Kondisi Harga Total

        if($bt > 3){

           $tt = $ba + ($bt-3) * $hl;

        } else {

           $tt = $ba;

        }


        $data = array(
          'no_resi' => $nr,
          'id_pelanggan' => $ip,
          'penerima_nama' => $pn,
          'penerima_alamat' => $al,
          'penerima_telp' => $hp,
          'id_kota' => $ct,
          'id_paket' => $pt,
          'id_layanan' => $ly,
          'berat' => $bt,
          'biaya' =>$ba,
          'total_biaya' => $tt,
          'tgl_pesan' => $tp,
          'tgl_kirim' => $tk
        );

        $this->mmember->simpanorder('pemesanan', $data);
        redirect('member');

    }

    
  }


  public function lihatstatus(){

    $id = $this->session->userdata('id');
    $data['nama'] = $this->session->userdata('nama_lkp');
    $data['pesan'] = $this->mmember->lihatpesan($id); 

    $this->load->view('member/lihatstatus', $data);
  }


  public function getpaket(){

    $id = $this->input->post('kota_id');

    $pkt = $this->mmember->ambilpaket($id)->result_array();
    $data .= "<option value=''>- Pilih Paket -</option>";
    foreach ($pkt as $p) {
      # code...
      $data .= "<option value='$p[paket_id]'>$p[paket_jenis] ($p[kota_nama])</option>\n";
    }

    echo $data;
  }

  public function ambillayanan(){

    $id = $this->input->post('paket_id');

    $lyn = $this->mmember->ambillayanan($id)->result_array();
    $data .= "<option value=''>- Pilih Layanan -</option>";

    foreach($lyn as $n){

      $data .= "<option value='$n[layanan_id]'>$n[layanan_nama]</option>\n";
    }

    echo $data;

    /*foreach ($hrg as $data) {
      # code...
      echo $data['harga']."|".$data['layanan_estimasi'];
    }*/

    //echo $data;
  }


  public function ambilharga(){

    $id = $this->input->post('layanan_id');

    $hrg = $this->mmember->ambilharga($id)->result_array();

    foreach($hrg as $data){

      echo $data['harga']."|".$data['layanan_estimasi']."|".$data['harga_lebih'];

    }
  }

  
}
