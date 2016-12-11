<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mjadwal extends CI_Model{

	public function getjadwal($id){

		return $this->db->query("SELECT DISTINCT k.kurir_id, k.kurir_nama, pn.no_resi, pe.no_resi, pe.penerima_nama, 
												 pe.penerima_alamat ,pn.ambil_kurir, 
					 							 pn.ambil_id, pn.ambil_tgl, pn.ambil_status,
		 			 							 pn.ambil_prioritas
								 FROM kurir k, pengambilan pn, pemesanan pe
								 WHERE pn.ambil_kurir = k.kurir_id AND pn.no_resi = pe.no_resi AND k.kurir_id = $id

								 UNION ALL

								 SELECT DISTINCT k.kurir_id, k.kurir_nama, pk.no_resi, pe.no_resi, pe.penerima_nama, 
												 pe.penerima_alamat, pk.kirim_kurir, 
												 pk.kirim_id, pk.kirim_tgl, pk.kirim_status,
									 			 pk.kirim_prioritas
								 FROM kurir k, pengiriman pk, pemesanan pe
								 WHERE pk.kirim_kurir = k.kurir_id AND pk.no_resi = pe.no_resi AND k.kurir_id = $id
 
								 order by ambil_prioritas")->result();
	}
}