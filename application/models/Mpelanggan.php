<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpelanggan extends CI_Model{

	public function allpelanggan(){

		return $this->db->get('pelanggan');

	}

	
	public function pilihkota(){

		return $this->db->get('kota');
	}


	public function inspel($table, $data){

		return $this->db->insert($table, $data);
	}


	public function editpel($id){

		return $this->db->query("SELECT p.pelanggan_id, p.pelanggan_nama, p.pelanggan_alamat, 
								 p.pelanggan_kota, k.kota_id, k.kota_nama, p.pelanggan_hp, p.pelanggan_email,
								 p.pelanggan_usr, p.pelanggan_psw
								 FROM pelanggan p, kota k 
								 WHERE p.pelanggan_kota = k.kota_id AND p.pelanggan_id = $id");
	}

	public function getkota(){

		return $this->db->get('kota');
	}


	public function updatepel($id){

		$nm = $this->input->post('nm');
		$al = $this->input->post('al');
		$kt = $this->input->post('kt');
		$hp = $this->input->post('hp');
		$em = $this->input->post('em');
		$us = $this->input->post('us');
		$pw = $this->input->post('pw');

		$data = array(
				'pelanggan_nama' => $nm,
				'pelanggan_alamat' => $al,
				'pelanggan_kota' => $kt,
				'pelanggan_hp' => $hp,
				'pelanggan_email' => $em,
				'pelanggan_usr' => $us,
				'pelanggan_psw' => $pw
			);


		$this->db->where('pelanggan_id', $id);
		$this->db->update('pelanggan', $data);
	}

	public function hapuspel($id){

		$this->db->delete('pelanggan', array('pelanggan_id'=>$id));
		return;
	}

}