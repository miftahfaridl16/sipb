<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('nama_lkp')==''){
      		redirect('auth');
    	}

    	$this->load->model('mpelanggan');
	}

	
	public function index(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Pelanggan';
		$data['pelanggan'] = $this->mpelanggan->allpelanggan()->result();

		$this->load->view('admin/pelanggan', $data);
	}

	
	public function tambahpel(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Pelanggan';
		$data['kota'] = $this->mpelanggan->pilihkota()->result();
		$this->load->view('admin/tambahpel', $data);
	}


	public function simpanpel(){

		$nm = $this->input->post('nm');
		$al = $this->input->post('al');
		$kt = $this->input->post('kt');
		$hp = $this->input->post('hp');
		$em = $this->input->post('em');
		$us = $this->input->post('us');
		$pw = $this->input->post('pw');

		$this->form_validation->set_rules('nm', 'Nama', 'required');
		$this->form_validation->set_rules('al', 'Alamat', 'required');
		$this->form_validation->set_rules('hp', 'HP', 'required');
		$this->form_validation->set_rules('em', 'Email', 'required');
		$this->form_validation->set_rules('us', 'Username', 'required');
		$this->form_validation->set_rules('pw', 'Password', 'required');

		if($this->form_validation->run()==FALSE){

			$data['nama'] = $this->session->userdata('nama_lkp');
			$data['title'] = 'Rush App | Pelanggan';

			$this->load->view('admin/tambahpel', $data);

		} else {

			$data = array(
				'pelanggan_nama' => $nm,
				'pelanggan_alamat' => $al,
				'pelanggan_kota' => $kt,
				'pelanggan_hp' => $hp,
				'pelanggan_email' => $em,
				'pelanggan_usr' => $us,
				'pelanggan_psw' => $pw
			);

			$this->mpelanggan->inspel('pelanggan', $data);
			redirect('pelanggan');

		}

	}

	public function editpel(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Edit Pelanggan';

		$kd = $this->uri->segment(3);

		if($kd == NULL){
			redirect('pelanggan');
		}

		$data['kota'] = $this->mpelanggan->getkota()->result();
		$data['edit'] = $this->mpelanggan->editpel($kd)->result();
		//$data['kota'] = $this->mpelanggan->pilihkota()->result();

		$this->load->view('admin/editpel', $data);

	}

	public function updatepel(){

		$id = $this->input->post('id');
		$this->mpelanggan->updatepel($id);

		redirect('pelanggan');

	}


	public function hapuspel(){

		$id = $this->uri->segment(3);
		$this->mpelanggan->hapuspel($id);

		redirect('pelanggan');
	}


}