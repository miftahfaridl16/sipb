<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('nama_lkp')==''){
      		redirect('auth');
    	}
		
		$this->load->model('mkaryawan');

	}

	public function index(){
		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Karyawan';
		$data['karyawan'] = $this->mkaryawan->allkary()->result();
		$this->load->view('admin/karyawan', $data);
	}


	public function tambahkary(){
		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Tambah Karyawan';
		$this->load->view('admin/tambahkary', $data);
	}

	public function simpankary(){

		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$hp = $this->input->post('hp');
		$usr = $this->input->post('usr');
		$psw = $this->input->post('psw');

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('hp', 'HP', 'required');
		$this->form_validation->set_rules('usr', 'Username', 'required');
		$this->form_validation->set_rules('psw', 'Password', 'required');

		if($this->form_validation->run()==FALSE){

			$data['nama'] = $this->session->userdata('nama_lkp');
			$data['title'] = 'Rush App | Tambah Users';

			$this->load->view('admin/tambahkary', $data);

		} else {

			$data = array(
				'user_namalkp' => $nama,
				'user_alamat' => $alamat,
				'user_hp' => $hp,
				'user_name' => $usr,
				'user_sandi' => $psw
			);

			
			$this->mkaryawan->inskary('users', $data);
			redirect('karyawan');

		}

	}


	public function editkary(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Edit Karyawan';


		$kd = $this->uri->segment(3);

		if($kd == NULL){
			redirect('karyawan');
		}

		$dt = $this->mkaryawan->editkary($kd);
		$data['id'] = $dt->user_id;
		$data['nm'] = $dt->user_namalkp;
		$data['al'] = $dt->user_alamat;
		$data['hp'] = $dt->user_hp;
		$data['us'] = $dt->user_name;
		$data['pw'] = $dt->user_sandi;

		$this->load->view('admin/editkary', $data);

	} 


	public function updatekary(){

		$id = $this->input->post('id');
		$this->mkaryawan->updatekary($id);

		redirect('karyawan');
	}


	public function hapuskary($id){

		$id = $this->uri->segment(3);
		$this->mkaryawan->hapuskary($id);
		
		redirect('karyawan');
	}


}