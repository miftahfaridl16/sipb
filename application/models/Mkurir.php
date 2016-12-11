<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkurir extends CI_Model{

	public function allkurir(){

		return $this->db->get('kurir');
	}

	public function getkota(){

		return $this->db->get('kota');
	}


	public function inskurir($table, $data){

		return $this->db->insert($table, $data);
	}


	public function editkurir($id){

		$k = $this->db->query("SELECT kurir_id, kurir_nama, kurir_alamat, kurir_telp, kurir_wilayah, kurir_usr, kurir_psw
							   FROM kurir 
							   WHERE kurir_id = $id");
		return $k;
	}

	public function updatekurir($id){

		$nm = $this->input->post('nm');
		$al = $this->input->post('al');
		$hp = $this->input->post('hp');
		$wl = $this->input->post('wl');
		$us = $this->input->post('us');
		$pw = $this->input->post('pw');

		$data = array(
			'kurir_nama' => $nm,
			'kurir_alamat' => $al,
			'kurir_telp' => $hp,
			'kurir_wilayah' => $wl,
			'kurir_usr' => $us,
			'kurir_psw' => $pw
		);

		$this->db->where('kurir_id', $id);
		$this->db->update('kurir', $data);

	}


	public function hapuskurir($id){

		$this->db->delete('kurir', array('kurir_id'=>$id));
		return;
	}

}