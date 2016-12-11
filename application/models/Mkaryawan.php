<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Mkaryawan extends CI_Model{

	public function allkary(){

		return $this->db->get('users');
	}

	public function inskary($tabel, $data){

		$this->db->insert($tabel, $data);
	}

	public function editkary($id){

		$d = $this->db->get_where('users', array('user_id' => $id))->row();
		return $d;
	}


	public function updatekary($id){

		$nm = $this->input->post('nm');
		$al = $this->input->post('alm');
		$hp = $this->input->post('hp');
		$us = $this->input->post('usr');
		$pw = $this->input->post('psw');

		$data = array(
			'user_namalkp' => $nm,
			'user_alamat' => $al,
			'user_hp' => $hp,
			'user_name' => $us,
			'user_sandi' => $pw
		);

		$this->db->where('user_id', $id);
		$this->db->update('users', $data);

	}


	public function hapuskary($id){

		$this->db->delete('users', array('user_id' => $id));
		return;
	}

}