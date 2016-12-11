<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpaket extends CI_Model{

	public function allpaket(){

		return $this->db->query("SELECT p.paket_id, p.paket_jenis, p.id_kota, k.kota_id, k.kota_nama
								 FROM paket p, kota k WHERE p.id_kota = k.kota_id");
	}

	public function getkota(){

		return $this->db->get('kota');
	}

	public function inspaket($tabel, $data){

		return $this->db->insert($tabel, $data);
	}


	public function editpaket($id){

		return $this->db->query("SELECT p.paket_id, p.paket_jenis, p.id_kota, k.kota_id, k.kota_nama
								 FROM paket p, kota k WHERE p.id_kota = k.kota_id AND p.paket_id = $id");
	}

	public function pilihankota(){

		return $this->db->query("SELECT * FROM kota");
	}


	public function updatepaket($id){

		$pn = $this->input->post('pn');
		$pk = $this->input->post('pk');

		$data = array(
			'paket_id' => $id,
			'paket_jenis' => $pn,
			'paket_kota' => $pk
		);

		$this->db->where('paket_id', $id);
		$this->db->update('paket', $data);
	}

}