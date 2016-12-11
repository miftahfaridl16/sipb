<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkota extends CI_Model{

	public function allkota(){

		return $this->db->get('kota');
	}

	public function inskota($tabel, $data){

		return $this->db->insert($tabel, $data);
	}

	public function editkota($id){

		$c = $this->db->get_where('kota', array('kota_id' => $id))->row();
		return $c;
	}

	public function updatekota($id){

		$kt = $this->input->post('kt');

		$data = array(
			'kota_id' => $id,
			'nama_kota' => $kt
		);

		$this->db->where('kota_id', $id);
		$this->db->update('kota', $data);
	}

	public function hapuskota($id){

		$this->db->delete('kota', array('kota_id'=>$id));
		return;
	}
}