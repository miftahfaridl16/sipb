<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlayanan extends CI_Model{

	public function allay(){

		return $this->db->query("SELECT l.layanan_id, l.layanan_nama, l.layanan_estimasi, l.id_paket, p.paket_id, p.paket_jenis 
								 FROM layanan l, paket p
								 WHERE l.id_paket = p.paket_id");
	}

	public function inslayanan($tabel, $data){

		return $this->db->insert($tabel, $data);
	}

	public function editlayanan($id){

		return $this->db->query("SELECT l.layanan_id, l.layanan_nama, l.layanan_estimasi, l.id_paket, p.paket_id, p.paket_jenis
								 FROM layanan l, paket p
								 WHERE l.id_paket = p.paket_id AND l.layanan_id = $id");
	}

	public function updatelayanan($id){

		$ly = $this->input->post('ly');
		$et = $this->input->post('et');
		$pt = $this->input->post('pt');

		$data = array(
				'layanan_nama' => $ly,
				'layanan_estimasi' => $et,
				'id_paket' => $pt
			);

		$this->db->where('layanan_id', $id);
		$this->db->update('layanan', $data);
		
	}


	public function hapuslayanan($id){

		$this->db->delete('layanan', array('layanan_id'=>$id));
		return;
	}


	public function pilihpaket(){

		return $this->db->query("SELECT p.paket_id, p.paket_jenis, p.id_kota, k.kota_id, k.kota_nama
									FROM paket p, kota k
									WHERE p.id_kota = k.kota_id");
	}
}