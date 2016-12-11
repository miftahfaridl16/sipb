<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Harga extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('nama_lkp')==''){
      		redirect('auth');
    	}

    	$this->load->model('mharga');

	}

	public function index(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Harga';
		$data['harga'] = $this->mharga->allharga()->result();

		$this->load->view('admin/harga', $data);
	}

	public function tambahharga(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Harga';
		$data['layanan'] = $this->mharga->pilihlayanan()->result();

		$this->load->view('admin/tambahharga', $data);
	}

	public function editharga(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Edit Harga';

		$kd = $this->uri->segment(3);

		if($kd == NULL){
			redirect('harga');
		}

		$data['edith'] = $this->mharga->editharga($kd)->result();
		$data['layanan'] = $this->mharga->pilihlayanan()->result();

		$this->load->view('admin/editharga', $data);
	}

	public function hapusharga(){

		$id = $this->uri->segment(3);
		$this->mharga->hapusharga($id);
		
		redirect('harga');
	}
}