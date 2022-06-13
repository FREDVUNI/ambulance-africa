<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use SendGrid\Mail\Mail;
    class Auth extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->helper('text');
            $this->load->model("backend/Auth_model");
           
        }
        public function index(){
	        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
	        $this->form_validation->set_rules('password','Password','required|trim');

	        if($this->form_validation->run() == false):
	            $this->load->view('backend/login');
	        else:
	           $this->_login();
	        endif;
        }
        private function _login(){
            $email = $this->input->post('email');
            $password =$this->input->post('password');
            $remember_me = $this->input->post('remember_me', true);
    
            $admins =$this->db->get_where('admins',['email' => $email])->row_array();
            if($admins):
            if($admins['is_active'] == 1):
                if(password_verify($password,$admins['password'])):
                    $data =[
                        'email' => $admins['email'],
                        'role_id' =>$admins['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                else:
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Invalid email password combination.</div>');
                    redirect('/');
                endif;
            else:
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email address has not been activated.</div>');
                redirect('/');
            endif;
            if ($remember_me == 1):
                $this->Auth_model->remember_me($admins["id"]);
            endif;
        else:
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Invalid email password combination.</div>');
            redirect('/');
        endif;
    }
    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message','<div class="alert alert-success role=" alert">
            You have been logged out.</div>');
        return redirect('login');
    }
}
