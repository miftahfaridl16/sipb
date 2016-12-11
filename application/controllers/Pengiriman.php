<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('nama_lkp')==''){
      		redirect('auth');
    	}

		$this->load->model('mpengiriman');

	}


	public function index(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Pengiriman';
		$data['ambil'] = $this->mpengiriman->getpengambilan()->result();
		$data['kirim'] = $this->mpengiriman->getallkirim();
		
		$this->load->view('admin/pengiriman', $data);
	}


	public function tambahkirim(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Pengiriman';
		$data['kurir'] = $this->mpengiriman->getkurir();

		$this->load->view('admin/tambahkirim', $data);
	}


	public function simpankirim(){

		$nr = $this->input->post('noresi');
		$tg = $this->input->post('tgl_kirim');
		$kr = $this->input->post('kurir');
		$st = $this->input->post('sts');
		$pr = $this->input->post('pr');

		$this->form_validation->set_rules('noresi', 'No Resi', 'required');
		$this->form_validation->set_rules('tgl_kirim', 'Tgl Kirim', 'required');
		$this->form_validation->set_rules('kurir', 'Kurir', 'required');
		$this->form_validation->set_rules('sts', 'Status', 'required');
		$this->form_validation->set_rules('pr', 'Prioritas', 'required');

		if($this->form_validation->run()==FALSE){

			$data['nama'] = $this->session->userdata('nama_lkp');
			$data['title'] = 'Rush App | Pengiriman';

			$this->load->view('admin/tambahkirim', $data);

		} else {

			$data = array(
				'no_resi' => $nr,
				'kirim_tgl' => $tg,
				'kirim_kurir' => $kr,
				'kirim_status' => $st,
				'kirim_prioritas' => $pr
			);

			$this->mpengiriman->simpankirim('t_pengiriman', $data);
			redirect('pengiriman');
		}
	}

	public function editkirim(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Edit Pengiriman';

		$kd = $this->uri->segment(3);

		if($kd == NULL){
			redirect('pengiriman');
		}

		$data['edit'] = $this->mpengiriman->editkirim($kd)->result();
		$this->load->view('admin/editkirim', $data);
	}

	public function updatekirim(){

		$id = $this->input->post('id');
		$this->mpengiriman->updatekirim($id);

		redirect('pengiriman');
	}

}