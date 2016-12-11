<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authc extends CI_Controller{

  public function __construct(){
    
    parent::__construct();

    $this->load->model('mauthc');

  }

  public function index(){

    $this->load->view('kurir/login');
  }


  public function login(){

    $user = $this->input->post('username');
    $pass = $this->input->post('password');

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if($this->form_validation->run()==FALSE){

        $this->load->view('kurir/login');

      } else {

        $cek = $this->mauthc->ceklogin($user, $pass);

        if($cek == 1){

          $ambil = $this->mauthc->ambildata($user, $pass);
            
            foreach($ambil->result() as $row){
              
              $data_diri = array(
                'id' => $row->kurir_id,
                'nama_lkp' => $row->kurir_nama,
                'logged_in' => TRUE
              );

              $this->session->set_userdata($data_diri);

            }

          redirect('courier');
          //echo 'benar';

        } else {

            $this->session->set_flashdata('pesan', 'Username/Password salah!');
            redirect('authc');
          }


    }
  }


  public function logout(){
    $this->session->sess_destroy();
    redirect('authc');
  }

}
