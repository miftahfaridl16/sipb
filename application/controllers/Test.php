<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->model('mtest');
	}

	public function index(){

		$data['paket'] = $this->mtest->getpaket()->result();
		$this->load->view('test', $data);
	}

	public function gethargaest(){

		$id = $this->input->post('paket_id');
		$hrg = $this->mtest->gethargaest($id)->result_array();

		foreach ($hrg as $data) {
			# code...
			echo $data['paket_harga']."|".$data['paket_estimasi'];
		}

		//echo $data;
	}

	public function cetak(){

		$this->load->library('fpdf');
		
		$this->fpdf->FPDF('P','cm','A4');
		$this->fpdf->AddPage();
		$this->fpdf->SetFont('Arial','',10);
		$teks = "Ini hasil Laporan PDF menggunakan Library FPDF di CodeIgniter";
		$this->fpdf->Cell(3, 0.5, $teks, 1, '0', 'L', true);
		$this->fpdf->Ln();
		$this->fpdf->Output();
		
	}
}