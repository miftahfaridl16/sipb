<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Momset extends CI_Model{

	public function grafik(){

	$sql = $this->db->query("SELECT
	  ifnull((SELECT SUM(total_biaya) FROM (pemesanan)WHERE((Month(tgl_kirim)=1)AND (YEAR(tgl_kirim)=2016))),0) AS 'Januari',
	  ifnull((SELECT SUM(total_biaya) FROM (pemesanan)WHERE((Month(tgl_kirim)=2)AND (YEAR(tgl_kirim)=2016))),0) AS 'Februari',
	  ifnull((SELECT SUM(total_biaya) FROM (pemesanan)WHERE((Month(tgl_kirim)=3)AND (YEAR(tgl_kirim)=2016))),0) AS 'Maret',
	  ifnull((SELECT SUM(total_biaya) FROM (pemesanan)WHERE((Month(tgl_kirim)=4)AND (YEAR(tgl_kirim)=2016))),0) AS 'April',
	  ifnull((SELECT SUM(total_biaya) FROM (pemesanan)WHERE((Month(tgl_kirim)=5)AND (YEAR(tgl_kirim)=2016))),0) AS 'Mei',
	  ifnull((SELECT SUM(total_biaya) FROM (pemesanan)WHERE((Month(tgl_kirim)=6)AND (YEAR(tgl_kirim)=2016))),0) AS 'Juni',
	  ifnull((SELECT SUM(total_biaya) FROM (pemesanan)WHERE((Month(tgl_kirim)=7)AND (YEAR(tgl_kirim)=2016))),0) AS 'Juli',
	  ifnull((SELECT SUM(total_biaya) FROM (pemesanan)WHERE((Month(tgl_kirim)=8)AND (YEAR(tgl_kirim)=2016))),0) AS 'Agustus',
	  ifnull((SELECT SUM(total_biaya) FROM (pemesanan)WHERE((Month(tgl_kirim)=9)AND (YEAR(tgl_kirim)=2016))),0) AS 'September',
	  ifnull((SELECT SUM(total_biaya) FROM (pemesanan)WHERE((Month(tgl_kirim)=10)AND (YEAR(tgl_kirim)=2016))),0) AS 'Oktober',
	  ifnull((SELECT SUM(total_biaya) FROM (pemesanan)WHERE((Month(tgl_kirim)=11)AND (YEAR(tgl_kirim)=2016))),0) AS 'November',
	  ifnull((SELECT SUM(total_biaya) FROM (pemesanan)WHERE((Month(tgl_kirim)=12)AND (YEAR(tgl_kirim)=2016))),0) AS 'Desember'
		FROM pemesanan GROUP BY YEAR(tgl_kirim)");

	return $sql;

	}


	public function qcetak($bulan, $tahun){

		return $this->db->query("SELECT no_resi, penerima_nama, berat, biaya, total_biaya, tgl_kirim, month(tgl_kirim) as bulan,
			year(tgl_kirim) as tahun
FROM pemesanan
WHERE month(tgl_kirim)=$bulan and year(tgl_kirim)=$tahun")->result();


	}


	public function qtotal($bulan, $tahun){

		return $this->db->query("SELECT SUM(total_biaya) AS total
								 FROM pemesanan
								 WHERE MONTH(tgl_kirim)='$bulan' AND YEAR(tgl_kirim)='$tahun'")->result();

	}
	
}