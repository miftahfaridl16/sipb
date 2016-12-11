<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mauthc extends CI_Model{

    public function ceklogin($username, $password){
        $query = $this->db->get_where('kurir', array('kurir_usr' => $username, 'kurir_psw' => $password));
        return $query->num_rows();
    }

    public function ambildata($username, $password){
        $query = $this->db->get_where('kurir', array('kurir_usr' => $username, 'kurir_psw' => $password));
        return $query;
    }

}
