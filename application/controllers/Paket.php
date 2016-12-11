<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('nama_lkp')==''){
      		redirect('auth');
    	}

    	$this->load->model('mpaket');
	}


	public function index(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Paket';
		$data['paket'] = $this->mpaket->allpaket()->result();

		$this->load->view('admin/paket', $data);
	}


	public function tambahpaket(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Paket';
		$data['kota'] = $this->mpaket->getkota()->result();

		$this->load->view('admin/tambahpaket', $data);
	}


	public function simpanpaket(){

		$pt = $this->input->post('pt');
		$ln = $this->input->post('ln');
		$kt = $this->input->post('kt');

		$this->form_validation->set_rules('pt', 'Paket', 'required');
		$this->form_validation->set_rules('ln', 'Layanan', 'required');
		$this->form_validation->set_rules('kt', 'Kota', 'required');

		if($this->form_validation->run()==FALSE){

			$data['nama'] = $this->session->userdata('nama_lkp');
			$data['title'] = 'Rush App | Paket';

			$this->load->view('admin/tambahpaket', $data);

		} else {

			$data = array(
				'paket_nama' => $pt,
				'paket_layanan' => $ln,
				'paket_kota' => $kt
			);

			$this->mpaket->inspaket('paket', $data);
			redirect('paket');
		}

	}


	public function editpaket(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Edit Paket';

		$kd = $this->uri->segment(3);

		if($kd == NULL){
			redirect('paket');
		}

		$dt = $this->mpaket->editpaket($kd);

		$data['editp'] = $this->mpaket->editpaket($kd)->result();
		$data['pkota'] = $this->mpaket->pilihankota()->result();

		$this->load->view('admin/editpaket', $data);
	}


	public function updatepaket(){

		$id = $this->input->post('id');
		$this->mpaket->updatepaket($id);

		redirect('paket');
	}

}