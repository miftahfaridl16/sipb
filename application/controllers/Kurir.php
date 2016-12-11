<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('nama_lkp')==''){
      		redirect('auth');
    	}

		$this->load->model('mkurir');

	}

	public function index(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Kurir';
		$data['kurir'] = $this->mkurir->allkurir()->result();

		$this->load->view('admin/kurir', $data);
	}

	public function tambahkurir(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Tambah Kurir';
		$data['kota'] = $this->mkurir->getkota()->result();

		$this->load->view('admin/tambahkurir', $data);
	}

	public function simpankurir(){

		$nm = $this->input->post('nama');
		$al = $this->input->post('alamat');
		$hp = $this->input->post('hp');
		$em = $this->input->post('email');
		$wl = $this->input->post('wil');
		$us = $this->input->post('usr');
		$pw = $this->input->post('psw');

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('hp', 'No.HP', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('wil', 'Wilayah', 'required');
		$this->form_validation->set_rules('usr', 'Username', 'required');
		$this->form_validation->set_rules('psw', 'Password', 'required');

		if($this->form_validation->run()==FALSE){

			$data['nama'] = $this->session->userdata('nama_lkp');
			$data['title'] = 'Rush App | Tambah Kurir';

			$this->load->view('admin/tambahkurir', $data);

		} else {

			$data = array(
				'kurir_nama' => $nm,
				'kurir_alamat' => $al,
				'kurir_notelp' => $hp,
				'kurir_email' => $em,
				'kurir_wilayah' => $wl,
				'kurir_usr' => $us,
				'kurir_psw' => $pw
			);

			//print_r($data);

			$this->mkurir->inskurir('kurir', $data);
			redirect('kurir');

		}

	}

	public function editkurir(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Edit Kurir';
		$data['kota'] = $this->mkurir->getkota()->result();

		$kd = $this->uri->segment(3);

		if($kd == NULL){
			redirect('kurir');
		}

		$data['edit'] = $this->mkurir->editkurir($kd)->result();

		/*$data['id'] = $dt->kurir_id;
		$data['nm'] = $dt->kurir_nama;
		$data['al'] = $dt->kurir_alamat;
		$data['hp'] = $dt->kurir_notelp;
		$data['em'] = $dt->kurir_email;
		$data['wl'] = $dt->kurir_wilayah;
		$data['ki'] = $dt->kota_id;
		$data['kn'] = $dt->kota_nama;
		$data['us'] = $dt->kurir_usr;
		$data['pw'] = $dt->kurir_psw;*/

		$this->load->view('admin/editkurir', $data);
	}


	public function updatekurir(){

		$id = $this->input->post('id');
		$this->mkurir->updatekurir($id);

		redirect('kurir');
	}

	public function hapuskurir(){

		$id = $this->uri->segment(3);
		$this->mkurir->hapuskurir($id);
		
		redirect('kurir');
	}
}