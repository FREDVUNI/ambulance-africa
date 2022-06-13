<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Fire extends CI_Controller{
        public function __construct(){
            parent::__construct();
            is_logged_in();
            $this->load->helper('text');
            $this->load->model('backend/Fire_model');
        }
        public function index(){
            $data['user'] = $this->db->get_where('admins',['email'=>
            $this->session->userdata('email')])->row_array();
            
            $data['title'] = 'Fire extinguishers';
            
            $data['fire'] = $this->Fire_model->get_fire();
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('backend/fire/index',$data);
            
            $this->load->view('templates/footer',$data);
        }
        public function create(){
            $data['user'] = $this->db->get_where('admins',['email'=>
            $this->session->userdata('email')])->row_array();

            $data['title'] = 'Fire extinguisher';

            $this->form_validation->set_rules('client','validation','required|trim');
            $this->form_validation->set_rules('fill_date','validation','required|trim');
            $this->form_validation->set_rules('expiration','validation','required|trim');

            if($this->form_validation->run() == FALSE) :
                $this->load->view('templates/header', $data);
                $this->load->view('backend/fire/create', $data);
                $this->load->view('templates/sidebar');
                $this->load->view('templates/footer');
            else :
                $data['client'] = $this->input->post('client');
                $data['fill_date'] = $this->input->post('fill_date');
                $data['expiration'] = $this->input->post('expiration');
                $slug = $this->generate_slug(md5(microtime()));

                 $this->Fire_model->save($data, $slug);
                 $this->session->set_flashdata('message', '<div class="alert alert-success role=" alert">
                 	The fire extinguisher details have been saved.</div>');
                 return redirect('fire-extinguishers');
            endif;
        }
        public function edit($slug){
            $data['user'] = $this->db->get_where('admins', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data["title"] ="Edit details";

            $data['fire'] = $this->Fire_model->get_fire($slug);

            if(empty($data['fire'])) :
                return redirect('admin/404');
            endif;

            $this->form_validation->set_rules('client','validation','required|trim');
            $this->form_validation->set_rules('fill_date','validation','required|trim');
            $this->form_validation->set_rules('expiration','validation','required|trim');

            if($this->form_validation->run() == FALSE) :
                $this->load->view('templates/header', $data);
                $this->load->view('backend/fire/edit', $data);
                $this->load->view('templates/sidebar');
                $this->load->view('templates/footer');
            else :
                $client = $this->input->post('client');
                $fill_date = $this->input->post('fill_date');
                $expiration = $this->input->post('expiration');
                $id = $this->input->post('id');

                $this->db->set('client', $client);
                $this->db->set('fill_date', $fill_date);
                $this->db->set('expiration', $expiration);
                $this->db->set('slug', $slug);
                $this->db->where('id', $id);

                $this->db->update('fire');
                $this->session->set_flashdata('message', '<div class="alert alert-success role=" alert">
                    The fire extinguisher details have been updated.</div>');
                redirect(base_url('fire-extinguishers'));
            endif;
        }

        public function delete($id){
            $data = $this->Fire_model->getFire($id);

                if ($this->Fire_model->deleteFire($id)) :
                    $this->session->set_flashdata('message', '<div class="alert alert-success role=" alert">
                        The fire extinguisher details have been deleted.</div>');
                    redirect('fire-extinguishers');
                endif;
        	}

        public function generate_slug($slug, $separator = '-'){
            $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
            $special_cases = array('&' => 'and', "'" => '');
            $slug = mb_strtolower(trim($slug), 'UTF-8');
            $slug = str_replace(array_keys($special_cases), array_values($special_cases), $slug);
            $slug = preg_replace($accents_regex, '$1', htmlentities($slug, ENT_QUOTES, 'UTF-8'));
            $slug = preg_replace("/[^a-z0-9]/u", "$separator", $slug);
            $slug = preg_replace("/[$separator]+/u", "$separator", $slug);
            return $slug;
        }
        
    } 
