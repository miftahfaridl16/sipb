<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mauthen extends CI_Model{

	public function ceklogin($username, $password){
        $query = $this->db->get_where('pelanggan', array('pelanggan_user' => $username, 'pelanggan_psw' => $password));
        return $query->num_rows();
    }

    public function ambildata($username, $password){
        $query = $this->db->get_where('pelanggan', array('pelanggan_user' => $username, 'pelanggan_psw' => $password));
        return $query;
    }
}