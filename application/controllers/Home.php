<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->model('mhome');

	}

	public function index(){

		$this->load->view('frontend/home');
	}

	public function regmember(){

		$data['kota'] = $this->mhome->getkota()->result();
		$this->load->view('frontend/regmember', $data);
	}

	public function simpanmember(){
		
		$nm = $this->input->post('nama');
		$al = $this->input->post('alamat');
		$kt = $this->input->post('kota');
		$hp = $this->input->post('notlp');
		$em = $this->input->post('email');
		$us = $this->input->post('user');
		$ps = $this->input->post('pass');

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
		$this->form_validation->set_rules('notlp', 'No Telepon', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('user', 'User', 'required');
		$this->form_validation->set_rules('pass', 'Password', 'required');

		if($this->form_validation->run()==FALSE){

			$this->load->view('frontend/regmember');
		
		} else {

			$data = array(
				'pelanggan_nama' => $nm,
				'pelanggan_alamat' => $al,
				'pelanggan_kota' => $kt,
				'pelanggan_telp' => $hp,
				'pelanggan_email' => $em,
				'pelanggan_user' => $us,
				'pelanggan_psw' => $ps
			);

			$this->mhome->simpanmember('pelanggan', $data);
			redirect('home', 'refresh');
		}
	}

	public function pelpesan(){

		$this->load->view('frontend/pesankirim');
	}
}