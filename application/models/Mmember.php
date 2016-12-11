<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmember extends CI_Model{

	public function getpaket(){

		return $this->db->query('SELECT p.paket_id, p.paket_jenis, p.id_kota, k.kota_id, k.kota_nama
								 FROM paket p, kota k
								 WHERE p.id_kota = k.kota_id ');
	}


	public function simpanorder($tabel, $data){

		return $this->db->insert($tabel, $data);
	}


	public function getkota(){

		return $this->db->get('kota');
	}

	public function lihatpesan($id){

		return $this->db->query("SELECT t.no_resi, t.id_pelanggan, t.penerima_nama, t.id_kota, c.kota_id, c.kota_nama,
										t.id_layanan, l.layanan_id, l.layanan_nama,
										t.id_paket, k.paket_id, k.paket_jenis,
										t.status
								 FROM   pemesanan t, paket k, layanan l, kota c
								 WHERE  t.id_paket = k.paket_id 
								 	    AND t.id_layanan = l.layanan_id
								 	    AND t.id_kota = c.kota_id	
									    AND t.id_pelanggan = $id")->result();
	}

	public function ambilpaket($id){

		return $this->db->query("SELECT p.paket_id, p.paket_jenis, p.id_kota, k.kota_id, k.kota_nama 
								 FROM paket p, kota k WHERE p.id_kota = k.kota_id AND p.id_kota = $id");
	}
	
	public function ambillayanan($id){

		return $this->db->query("SELECT l.layanan_id, l.layanan_nama, l.layanan_estimasi, l.id_paket, 
		 								p.paket_id, p.paket_jenis
								 FROM 	layanan l, paket p
								 WHERE  l.id_paket = p.paket_id AND l.id_paket = $id");
	}

	public function ambilharga($id){

		return $this->db->query("SELECT l.layanan_id, l.layanan_nama, l.layanan_estimasi, h.harga_id, h.harga, h.harga_lebih, 
										h.id_layanan
								 FROM layanan l, harga h
								 WHERE l.layanan_id = h.id_layanan AND l.layanan_id = $id");
	}
}