<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdashboard extends CI_Model{

	public function countpel(){

		return $this->db->count_all('pelanggan');
	}

	public function listpesan(){

		return $this->db->query("SELECT p.no_resi, p.id_pelanggan, l.pelanggan_id, l.pelanggan_nama, p.id_paket, k.paket_id, k.paket_jenis, p.tgl_pesan, p.status FROM pemesanan p, pelanggan l, paket k WHERE p.id_pelanggan = l.pelanggan_id AND p.id_paket = k.paket_id AND p.tgl_pesan = DATE(NOW()) LIMIT 5")->result();
	}

	public function countpesanan(){

		return $this->db->count_all('pemesanan');
	}

	public function countpengiriman(){

		return $this->db->count_all('pengiriman');
	}

	public function countomset(){

		return $this->db->query("SELECT sum(total_biaya) as total FROM pemesanan");
	}
}