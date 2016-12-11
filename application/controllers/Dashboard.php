<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct(){
    
    parent::__construct();

    if($this->session->userdata('nama_lkp')==''){
      redirect('auth');
    }

    $this->load->model('mdashboard');

  }

  public function index(){
    
    $data['nama'] = $this->session->userdata('nama_lkp');
    $data['jmlpel'] = $this->mdashboard->countpel();
    $data['jmlpesan'] = $this->mdashboard->countpesanan();
    $data['jmlkirim'] = $this->mdashboard->countpengiriman();
    $data['totals'] = $this->mdashboard->countomset()->result();
    $data['list'] = $this->mdashboard->listpesan();

    $this->load->view('admin/dashboard', $data);
  }

  
}
