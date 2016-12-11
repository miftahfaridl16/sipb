<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mharga extends CI_Model{

	public function allharga(){

		return $this->db->query("SELECT h.harga_id, h.id_layanan, h.harga, l.layanan_id, l.layanan_nama, l.id_paket, p.paket_id, 
										p.id_kota, p.paket_jenis, k.kota_id, k.kota_nama
								 FROM harga h, layanan l, paket p, kota k
								 WHERE h.id_layanan = l.layanan_id AND l.id_paket = p.paket_id AND p.id_kota = k.kota_id");
	}

	public function pilihlayanan(){

		return $this->db->query("SELECT h.harga_id, h.id_layanan, h.harga, l.layanan_id, l.layanan_nama, l.id_paket, p.paket_id, 
										p.id_kota, p.paket_jenis, k.kota_id, k.kota_nama
								 FROM harga h, layanan l, paket p, kota k
								 WHERE h.id_layanan = l.layanan_id AND l.id_paket = p.paket_id AND p.id_kota = k.kota_id");
	}

	public function editharga($id){

		$c = $this->db->query("SELECT h.harga_id, h.id_layanan, h.harga, h.harga_lebih, l.layanan_id, l.layanan_nama, l.id_paket, 							p.paket_id, p.id_kota, p.paket_jenis, k.kota_id, k.kota_nama
							   FROM harga h, layanan l, paket p, kota k
							   WHERE h.id_layanan = l.layanan_id AND l.id_paket = p.paket_id AND p.id_kota = k.kota_id AND
							   		 h.harga_id = $id");
		return $c;
	}


	public function hapusharga($id){

		$this->db->delete('harga', array('harga_id'=>$id));
		return;
	}
}