<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpengiriman extends CI_Model{

	public function getallkirim(){

		return $this->db->query("SELECT tk.kirim_id, tk.no_resi, tp.no_resi, tp.penerima_nama, tp.penerima_alamat, 
										tk.kirim_tgl, tk.kirim_kurir, k.kurir_id, k.kurir_nama, 
										tk.kirim_status, tk.kirim_prioritas, tk.kirim_foto
								 FROM   pengiriman tk, pemesanan tp, kurir k
								 WHERE  tk.no_resi = tp.no_resi AND tk.kirim_kurir = k.kurir_id")->result();
	}


	public function getkurir(){

		return $this->db->get('kurir')->result();
	}

	public function simpankirim($tabel, $data){

		return $this->db->insert($tabel, $data);
	}

	public function getpengambilan(){

		return $this->db->query("SELECT a.ambil_id, a.no_resi, b.no_resi, b.penerima_nama, b.penerima_alamat, b.id_kota, 
										b.tgl_pesan, b.tgl_kirim,
		 								k.kota_id, k.kota_nama, a.ambil_tgl, a.ambil_kurir, a.ambil_status
								 FROM   pengambilan a, pemesanan b, kota k
								 WHERE  a.no_resi = b.no_resi AND b.id_kota = k.kota_id AND a.ambil_status = 'TERAMBIL'");
	}

	public function editkirim($id){

		return $this->db->query("SELECT kirim_id, kirim_status FROM pengiriman WHERE kirim_id = '$id'");
	}

	public function updatekirim($id){

		$st = $this->input->post('st');

		$data = array(
			'kirim_id' => $id,
			'kirim_status' => $st
		);

		$this->db->where('kirim_id', $id);
		$this->db->update('pengiriman', $data);
	}

}