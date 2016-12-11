<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mresi extends CI_Model{

	public function ambilpemesanan($id){

		$query = $this->db->query("SELECT t.noresi, 
		 								t.id_pelanggan, 
		 								p.pelanggan_id, 
		 								p.pelanggan_nama, 
									 	t.tgl_pesan,
									 	t.tgl_kirim, t.nama_penerima, 
									 	t.alamat_penerima, t.id_kota, c.kota_id, c.nama_kota, c.nama_kec, t.telp_penerima, 
									 	t.id_paket, k.paket_id, k.jns_paket, 
									 	t.berat, t.biaya, t.total_biaya, t.status
								  FROM 	transaksi_pesan t, pelanggan p, paket k, kota c
								  WHERE 	t.id_pelanggan = p.pelanggan_id AND t.id_paket = k.paket_id AND t.id_kota = c.kota_id AND t.noresi = $id");
		$return $query->result();
	}
}