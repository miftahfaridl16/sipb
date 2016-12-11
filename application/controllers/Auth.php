<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

  public function __construct(){
    
    parent::__construct();

    $this->load->model('mauth');

  }

  public function index(){

    $this->load->view('login');
  }


  public function login(){

    $user = $this->input->post('username');
    $pass = $this->input->post('password');

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if($this->form_validation->run()==FALSE){

        $this->load->view('login');

      } else {

        $cek = $this->mauth->ceklogin($user, $pass);

        if($cek == 1){

          $ambil = $this->mauth->ambildata($user, $pass);
            
            foreach($ambil->result() as $row){
              
              $data_diri = array(
                'nama_lkp' => $row->user_lkp,
                'logged_in' => TRUE
              );

              $this->session->set_userdata($data_diri);

            }

          redirect('dashboard');
          //echo 'benar';

        } else {

            $this->session->set_flashdata('pesan', 'Username/Password salah!');
            redirect('auth');
          }


    }
  }


  public function logout(){
    $this->session->sess_destroy();
    redirect('auth');
  }

}
