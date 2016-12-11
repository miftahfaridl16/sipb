<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mauth extends CI_Model{

    public function ceklogin($username, $password){
        $query = $this->db->get_where('users', array('user_nama' => $username, 'user_pass' => $password));
        return $query->num_rows();
    }

    public function ambildata($username, $password){
        $query = $this->db->get_where('users', array('user_nama' => $username, 'user_pass' => $password));
        return $query;
    }

}
