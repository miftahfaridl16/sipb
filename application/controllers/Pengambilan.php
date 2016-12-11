<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengambilan extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('nama_lkp')==''){
      		redirect('auth');
    	}

		$this->load->model('mpengambilan');

	}

	public function index(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Pengambilan';
		$data['ambil'] = $this->mpengambilan->getall();
		$data['pesan'] = $this->mpengambilan->getpemesanan()->result();
		$this->load->view('admin/pengambilan', $data);
	}

	public function tambahambil(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Pengambilan';
		$data['kurir'] = $this->mpengambilan->getkurir()->result();

		$this->load->view('admin/tambahambil', $data);
	}

	public function simpanambil(){

		$nr = $this->input->post('noresi');
		$ta = $this->input->post('tgl_ambil');
		$ik = $this->input->post('kurir');
		$st = $this->input->post('sts');
		$pr = $this->input->post('pr');

		$this->form_validation->set_rules('noresi', 'No. Resi', 'required');
		$this->form_validation->set_rules('tgl_ambil', 'Tanggal Ambil', 'required');
		$this->form_validation->set_rules('kurir', 'Kurir', 'required');
		$this->form_validation->set_rules('sts', 'Status', 'required');
		$this->form_validation->set_rules('pr','Prioritas', 'required');

		if($this->form_validation->run()==FALSE){

			$data['nama'] = $this->session->userdata('nama_lkp');
			$data['title'] = 'Rush App | Pengambilan';

			$this->load->view('admin/tambahambil', $data);

		} else {

			$data = array(
				'no_resi' => $nr,
				'ambil_tgl' => $ta,
				'ambil_kurir' => $ik,
				'ambil_status' => $st,
				'ambil_prioritas' => $pr
			);

			$this->mpengambilan->simpanambil('pengambilan', $data);
			redirect('pengambilan');
		}
	}


	public function editambil(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Edit Pengambilan';

		$kd = $this->uri->segment(3);

		if($kd == NULL){
			redirect('pengambilan');
		}

		$data['edit'] = $this->mpengambilan->editambil($kd)->result();
		$this->load->view('admin/editambil', $data);
	}

	public function updateambil(){

		$id = $this->input->post('id');
		$this->mpengambilan->updateambil($id);

		redirect('pengambilan');
	}

}