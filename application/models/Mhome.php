<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhome extends CI_Model{

	public function simpanmember($tabel, $data){

		return $this->db->insert($tabel, $data);
	}

	public function getkota(){

		return $this->db->get('kota');
	}
}