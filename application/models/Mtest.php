<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtest extends CI_Model{

	public function getpaket(){

		return $this->db->query('SELECT p.paket_id, p.paket_nama, p.paket_layanan, p.paket_kota, k.kota_id, k.kota_nama, p.paket_harga, p.paket_estimasi
								 FROM paket p, kota k
								 WHERE p.paket_kota = k.kota_id ');
	}

	public function gethargaest($id){

		return $this->db->query("SELECT p.paket_id, p.paket_nama, p.paket_layanan, p.paket_kota, k.kota_id, k.kota_nama, p.paket_harga, p.paket_estimasi
						  			FROM paket p, kota k
						  			WHERE p.paket_kota = k.kota_id AND p.paket_id= $id");
	}
}