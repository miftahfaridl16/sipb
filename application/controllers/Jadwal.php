<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->library('fpdf');

		if($this->session->userdata('nama_lkp')==''){
      		redirect('auth');
    	}

    	$this->load->model('mjadwal');

	}

	public function index(){

		//$data['id'] = $this->session->userdata('id');
		$data['nama'] = $this->session->userdata('nama_lkp');

		$kd = $this->uri->segment(3);

		if($kd == NULL){
			redirect('courier');
		}

		$data['jadwal'] = $this->mjadwal->getjadwal($kd);

		$this->load->view('kurir/cetakjadwal', $data);
	}