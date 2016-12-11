<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courier extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('nama_lkp')==''){
      		redirect('authc');
    	}

    	$this->load->model('mcourier');
    	$this->load->library('fpdf');
	}

	public function index(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$this->load->view('kurir/courier', $data);
	}

	public function lihatjadwal(){
		$nm = $this->session->userdata('nama_lkp');
		$data['id'] = $this->session->userdata('id');
		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['jadwal'] = $this->mcourier->alljadwal($nm)->result();
		
		$this->load->view('kurir/lihatjadwal', $data);
	}

	public function statusfoto(){
		$nm = $this->session->userdata('nama_lkp');
		$data['ufo'] = $this->mcourier->statusfoto($nm)->result();
		$data['nama'] = $this->session->userdata('nama_lkp');
		
		$this->load->view('kurir/updatekirim', $data);
	}

	public function editcourier(){

		$data['nama'] = $this->session->userdata('nama_lkp');

		$kd = $this->uri->segment(3);

		if($kd == NULL){
			redirect('courier');
		}

		$data['kirim'] = $this->mcourier->editcourier($kd)->result();
		
		$this->load->view('kurir/editcourier', $data);
	}

	public function cetak(){

		$data['nama'] = $this->session->userdata('nama_lkp');
		$kd = $this->uri->segment(3);
		$data['kirim'] = $this->mcourier->cetakjadwal($kd);
		
		$this->load->view('kurir/cetakjadwal', $data);
	}

	public function updatecourier(){

		$this->load->library('upload');
		$nmfile = "file_".time(); // nama file diikuti fungsi time
		$config['upload_path'] = './assets/uploads/'; // Path Folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; // Tipe yang dapat diakses
		$config['max_size'] = '2048'; // Maksimum besar file 2M
		$config['max_width'] = '1288'; // Lebar Maksimum 1288px
		$config['max_height'] = '768'; // Tinggi Maksimum 768px
		$config['file_name'] = $nmfile; // Nama yang akan terupload

		$this->upload->initialize($config);

		if($_FILES['filefoto']['name']){

			if($this->upload->do_upload('filefoto')){

				$gbr = $this->upload->data();
				$data = array(
					//'kirim_id' => $this->input->post('id');
					'no_resi' => $this->input->post('noresi'),
					'kirim_status' => $this->input->post('statuskirim'),
					'kirim_foto' => $gbr['file_name'],
					'tipe_foto' => $gbr['file_type']
				);

				$id = $this->input->post('id');
				$this->mcourier->uploadfoto($id, $data);

				redirect('courier');
			}
		}

	}
}