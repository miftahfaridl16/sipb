<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Omset extends CI_Controller{

	public function __construct(){

		parent::__construct();

		if($this->session->userdata('nama_lkp')==''){
      		redirect('auth');
    	}

    	$this->load->library('fpdf');
    	$this->load->model('momset');
	}

	public function index(){

		$mg = $this->momset->grafik()->result_array();

		foreach($mg as $row){
			$data['grafik'][] = (float)$row['Januari'];
			$data['grafik'][] = (float)$row['Februari'];
			$data['grafik'][] = (float)$row['Maret'];
			$data['grafik'][] = (float)$row['April'];
			$data['grafik'][] = (float)$row['Mei'];
			$data['grafik'][] = (float)$row['Juni'];
			$data['grafik'][] = (float)$row['Juli'];
			$data['grafik'][] = (float)$row['Agustus'];
			$data['grafik'][] = (float)$row['September'];
			$data['grafik'][] = (float)$row['Oktober'];
			$data['grafik'][] = (float)$row['November'];
			$data['grafik'][] = (float)$row['Desember'];
		}

		$data['nama'] = $this->session->userdata('nama_lkp');
		$data['title'] = 'Rush App | Kota';
		
		$this->load->view('admin/laporanomset', $data);
	}

	public function cetaklaporan(){

		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data['isi'] = $this->momset->qcetak($bulan,$tahun);
		//print_r($isi);
		$data['tot'] = $this->momset->qtotal($bulan,$tahun);

		$this->load->view('admin/cetakomset', $data);
		
	}
}