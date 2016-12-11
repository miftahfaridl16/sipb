<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('nama_lkp')==''){
      		redirect('auth');
    	}

    	$this->load->model('mkota');
	}


	public function index(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Kota';
		$data['kota'] = $this->mkota->allkota()->result();

		$this->load->view('admin/kota', $data);
	}

	public function tambahkota(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Kota';

		$this->load->view('admin/tambahkota', $data);
	}

	public function simpankota(){

		$id = $this->input->post('id');
		$kt = $this->input->post('kt');

		$this->form_validation->set_rules('id', 'ID Kota', 'required');
		$this->form_validation->set_rules('kt', 'Nama Kota', 'required');
		
		if($this->form_validation->run()== FALSE){

			$data['nama'] = $this->session->userdata('nama_lkp');
			$data['title'] = 'Rush App | Kota';

			$this->load->view('admin/tambahkota', $data);
		
		}else{

			$data = array(
				'kota_id' => $id,
				'kota_nama' => $kt
			);

			$this->mkota->inskota('kota', $data);
			redirect('kota');
		}

	}


	public function editkota(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Edit Kota';

		$kd = $this->uri->segment(3);

		if($kd == NULL){
			redirect('kota');
		}

		$dt = $this->mkota->editkota($kd);

			$data['id'] = $dt->kota_id;
			$data['kt'] = $dt->kota_nama;

		$this->load->view('admin/editkota', $data);

	}


	public function updatekota(){

		$id = $this->input->post('id');
		$this->mkota->updatekota($id);

		redirect('kota');
	}


	public function hapuskota(){

		$id = $this->uri->segment(3);
		$this->mkota->hapuskota($id);
		
		redirect('kota');
	}
}