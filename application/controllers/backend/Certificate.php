<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Certificate extends CI_Controller{
        public function __construct(){
            parent::__construct();
            is_logged_in();
            $this->load->helper('text');
            $this->load->model('backend/Certificate_model');
        }
        public function index(){
            $data['user'] = $this->db->get_where('admins',['email'=>
            $this->session->userdata('email')])->row_array();
            
            $data['title'] = 'Certificates';
            
            $data['student'] = $this->Certificate_model->get_certificates();
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('backend/certificate/index',$data);
            
            $this->load->view('templates/footer',$data);
        }
        public function create(){
            $data['user'] = $this->db->get_where('admins',['email'=>
            $this->session->userdata('email')])->row_array();

            $data['title'] = 'Certificate';

            $this->form_validation->set_rules('student','validation','required|trim');
            $this->form_validation->set_rules('student_no','validation','required|trim');
            $this->form_validation->set_rules('expiration','validation','required|trim');

            if($this->form_validation->run() == FALSE) :
                $this->load->view('templates/header', $data);
                $this->load->view('backend/certificate/create', $data);
                $this->load->view('templates/sidebar');
                $this->load->view('templates/footer');
            else :
                $data['student'] = $this->input->post('student');
                $data['student_no'] = $this->input->post('student_no');
                $data['expiration'] = $this->input->post('expiration');
                $slug = $this->generate_slug(md5(microtime()));

                if($_FILES['userfile']['name'] != '' || $_FILES['userfile']['size'] != 0):
                    //uploading the image link to the database.
                    $config['upload_path'] = './assets/uploads/certificates/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '2048';
                    $config['max_width'] = '9024';
                    $config['max_height'] = '9024';
                    $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if(!$this->upload->do_upload('userfile')):
                    $error = array('error' => $this->upload->display_errors());
                    $_FILES['userfile']['name'] = 'noimage.png';
                else:
                    $fileData = $this->upload->data();
                    $data['userfile'] = $fileData['file_name'];
                    
                endif;
            else :
                $this->session->set_flashdata('message', '<div class="alert alert-danger role=" alert">
                    Invalid image.please try again.</div>');
                return redirect('certificate');
            endif;
                $this->Certificate_model->save($data, $slug);
                $this->session->set_flashdata('message', '<div class="alert alert-success role=" alert">
                    The student certificate has been saved.</div>');
                return redirect('certificates');
            endif;
        }
        public function edit($slug){
            $data['user'] = $this->db->get_where('admins', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data["title"] ="Edit certificate";

            $data['student'] = $this->Certificate_model->get_certificates($slug);

            if(empty($data['student'])) :
                return redirect('admin/404');
            endif;

            $this->form_validation->set_rules('student','validation','required|trim');
            $this->form_validation->set_rules('student_no','validation','required|trim');
            $this->form_validation->set_rules('expiration','validation','required|trim');

            if($this->form_validation->run() == FALSE) :
                $this->load->view('templates/header', $data);
                $this->load->view('backend/certificate/edit', $data);
                $this->load->view('templates/sidebar');
                $this->load->view('templates/footer');
            else :
                $id = $this->input->post('id');
                if($_FILES['userfile']['name'] != $data['certificate']["image"]):
                    //uploading the image link to the database.
                    $config['upload_path'] = './assets/uploads/certificates/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '2048';
                    $config['max_width'] = '9024';
                    $config['max_height'] = '9024';
                    $config['encrypt_name'] = true;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('userfile')) :
                        $old_image = $data['certificate']['image'];
                        if ($old_image != 'noimage.png') :
                            unlink(FCPATH . './assets/uploads/certificate/' . $old_image);
                        endif;
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('certificate', $new_image);
                    else :
                        $error = array('error' => $this->upload->display_errors());
                    endif;
                else :
                $this->session->set_flashdata('message', '<div class="alert alert-danger role=" alert">
        	    Invalid image.please try again.</div>');
                return redirect($data['certificate']["slug"].'/certificate');
            endif;
                $student = $this->input->post('student');
                $fill_date = $this->input->post('fill_date');
                $student_no = $this->input->post('student_no');
                $id = $this->input->post('id');
                $this->db->where('id', $id);

                $this->db->update('certificates');
                $this->session->set_flashdata('message', '<div class="alert alert-success role=" alert">
                    The certificate has been updated.</div>');
                redirect(base_url('certificates'));
            endif;
        }

        public function delete($id){
            $data = $this->Certificate_model->getCertificate($id);
            $path = './assets/uploads/certificates/';

                @unlink($path . $data->certificate);
                if ($this->Certificate_model->deleteCertificate($id)) :
                    $this->session->set_flashdata('message', '<div class="alert alert-success role=" alert">
                        The certificate has been deleted.</div>');
                    redirect('certificates');
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
