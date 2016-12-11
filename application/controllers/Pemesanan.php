<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('nama_lkp')==''){
      		redirect('auth');
    	}

    	$this->load->model('mpesan');
    	$this->load->library('fpdf');
	}


	public function index(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Pemesanan';
		$data['tpesan'] = $this->mpesan->getpesan()->result();

		$this->load->view('admin/pemesanan', $data);
	}

	public function cetak(){
		
		$id = $this->uri->segment(3);
		$data['pesan'] = $this->mpesan->ambilpemesanan($id);
		$this->load->view('admin/cetakresi', $data);
	}
	
	public function editstatus(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Edit Pemesanan';

		$kd = $this->uri->segment(3);

		if($kd == NULL){
			redirect('pemesanan');
		}

		$data['edit'] = $this->mpesan->editstatus($kd)->result();
		$this->load->view('admin/editpesan', $data);
	}

	public function updatepesan(){

		$id = $this->input->post('id');
		$this->mpesan->updatepesan($id);

		redirect('pemesanan');
	}
}