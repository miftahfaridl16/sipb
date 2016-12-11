<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpengambilan extends CI_Model{

	public function getall(){

		$qry = $this->db->query("SELECT a.ambil_id, a.no_resi, p.no_resi, p.penerima_nama, p.penerima_alamat ,a.ambil_tgl, 
										 a.ambil_kurir, k.kurir_id, k.kurir_nama, a.ambil_status, a.ambil_prioritas
								  FROM 	 pengambilan a, pemesanan p, kurir k
								  WHERE  a.no_resi = p.no_resi AND a.ambil_kurir = k.kurir_id");
		
		return $qry->result();
	}

	public function getkurir(){

		return $this->db->get('kurir');
	}


	public function simpanambil($tabel, $data){

		return $this->db->insert($tabel, $data);
	}

	public function getpemesanan(){

		return $this->db->query("SELECT tp.no_resi, tp.penerima_nama, tp.penerima_alamat, tp.id_kota, c.kota_id
										, c.kota_nama, tp.tgl_pesan, tp.tgl_kirim, tp.status
								 FROM pemesanan tp, kota c
								 WHERE tp.id_kota = c.kota_id AND tp.status = 'PESAN'");
	}

	public function editambil($id){

		return $this->db->query("SELECT ambil_id, ambil_status FROM pengambilan WHERE ambil_id = '$id'");
	}

	public function updateambil($id){

		$st = $this->input->post('st');

		$data = array(
			'ambil_id' => $id,
			'ambil_status' => $st
		);

		$this->db->where('ambil_id', $id);
		$this->db->update('pengambilan', $data);
	}

}