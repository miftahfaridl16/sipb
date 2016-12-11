<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpesan extends CI_Model{

	public function getpesan(){

		return $this->db->query("SELECT tp.no_resi, tp.id_pelanggan, p.pelanggan_id, p.pelanggan_nama,tp.penerima_nama, 
										tp.penerima_alamat, k.kota_id, k.kota_nama, tp.id_paket, t.paket_id, 
										t.paket_jenis, tp.berat, tp.biaya, tp.total_biaya, tp.tgl_pesan, tp.tgl_kirim, tp.status
								FROM 	pemesanan tp, pelanggan p, kota k, paket t
								WHERE 	tp.id_pelanggan = p.pelanggan_id AND tp.id_kota = k.kota_id AND 
										tp.id_paket = t.paket_id");
	}

	
	public function ambilpemesanan($id){

		$query = $this->db->query("SELECT tp.no_resi, tp.id_pelanggan, p.pelanggan_id, p.pelanggan_nama, p.pelanggan_alamat,
										  p.pelanggan_kota, p.pelanggan_telp, tp.penerima_nama, tp.penerima_alamat, 
										  tp.penerima_telp,
										  tp.id_kota, k.kota_id, k.kota_nama, tp.id_paket, t.paket_id, t.paket_jenis, 
										  tp.id_layanan, l.layanan_id, l.layanan_nama ,tp.berat, tp.biaya, tp.total_biaya
									FROM  pemesanan tp, pelanggan p, kota k, paket t, layanan l
									WHERE tp.id_pelanggan = p.pelanggan_id AND tp.id_kota = k.kota_id AND tp.id_paket = t.paket_id  AND tp.id_layanan = l.layanan_id AND tp.no_resi = '$id'");
		return $query->result();
	} 	
	
	public function editstatus($id){

		return $this->db->query("SELECT no_resi, status FROM pemesanan WHERE no_resi = '$id'");
	}

	public function updatepesan($id){

		$st = $this->input->post('st');

		$data = array(
			'no_resi' => $id,
			'status' => $st
		);

		$this->db->where('no_resi', $id);
		$this->db->update('pemesanan', $data);
	}
}