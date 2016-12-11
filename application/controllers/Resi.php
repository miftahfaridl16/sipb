<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resi extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->library('fpdf');

		if($this->session->userdata('nama_lkp')==''){
      		redirect('auth');
    	}

	}

	public function index(){

		$this->load->model('mresi');
		$id = $this->uri->segment(3);
		$data['pesan'] = $this->mresi->ambilpesanan($id);
		$this->load->view('admin/cetakresi', $data);
	}
}