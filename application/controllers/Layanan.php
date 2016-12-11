<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('nama_lkp')==''){
      		redirect('auth');
    	}

    	$this->load->model('mlayanan');

	}


	public function index(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Layanan';
		$data['layanan'] = $this->mlayanan->allay()->result();

		$this->load->view('admin/layanan', $data);
	}


	public function tambahlayanan(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Layanan';
		$data['paket'] = $this->mlayanan->pilihpaket()->result();

		$this->load->view('admin/tambahlayanan', $data);
	}


	public function simpanlayanan(){

		$ly = $this->input->post('ly');
		$tf = $this->input->post('tf');
		$et = $this->input->post('et');

		$this->form_validation->set_rules('ly', 'Layanan', 'required');
		$this->form_validation->set_rules('tf', 'Layanan', 'required');
		$this->form_validation->set_rules('et', 'Layanan', 'required');

		if($this->form_validation->run()==FALSE){

			$data['nama'] = $this->session->userdata('nama_lkp');
			$data['title'] = 'Rush App | Layanan';

			$this->load->view('admin/tambahlayanan', $data);
		
		} else {

			$data = array(
				'nm_layanan' => $ly,
				'tarif' => $tf,
				'estimasi' => $et
			);

			$this->mlayanan->inslayanan('layanan', $data);
			redirect('layanan');
		}
	}


	public function editlayanan(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Edit Layanan';

		$kd = $this->uri->segment(3);

		if($kd == NULL){
			redirect('layanan');
		}

		$data['layanan'] = $this->mlayanan->editlayanan($kd)->result();
		$data['paket'] = $this->mlayanan->pilihpaket()->result();

		$this->load->view('admin/editlayanan', $data);

	}


	public function updatelayanan(){

		$id = $this->input->post('id');
		$this->mlayanan->updatelayanan($id);

		redirect('layanan');
	}


	public function hapuslayanan(){

		$id = $this->uri->segment(3);
		$this->mlayanan->hapuslayanan($id);
		
		redirect('layanan');
	}

}