<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authen extends CI_Controller{

  public function __construct(){
    
    parent::__construct();

    $this->load->model('mauthen');

  }

  public function index(){

    $this->load->view('member/login');
  }


  public function login(){

    $user = $this->input->post('username');
    $pass = $this->input->post('password');

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if($this->form_validation->run()==FALSE){

        $this->load->view('member/login');

      } else {

        $cek = $this->mauthen->ceklogin($user, $pass);

        if($cek == 1){

          $ambil = $this->mauthen->ambildata($user, $pass);
            
            foreach($ambil->result() as $row){
              
              $data_diri = array(
                'id' => $row->pelanggan_id,
                'nama_lkp' => $row->pelanggan_nama,
                'logged_in' => TRUE
              );

              $this->session->set_userdata($data_diri);

            }

          redirect('member');
          //echo 'benar';

        } else {

            $this->session->set_flashdata('pesan', 'Username/Password salah!');
            redirect('authen');
          }


    }
  }


  public function logout(){
    $this->session->sess_destroy();
    redirect('home');
  }

}
