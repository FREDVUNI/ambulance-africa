<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';
class Certificate extends REST_Controller{
    public function __construct(){
		parent::__construct(); 
		
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		
        $this->load->model('api/Certificate_model','Certificate_model');
    }
    public function certificates_get(){
        $students = $this->Certificate_model->certificates();
        if(count($students) > 0):
            $this->response(array(
                "status" => 1,
                "message" =>"certificates Found",
                "data" => $students
                       
            ), REST_Controller::HTTP_OK);
        else:
            $this->response(array(
                "status" => 0,
                "message" =>"No certificates Found",
                "data" => $students
                       
            ), REST_Controller::HTTP_NOT_FOUND);
        endif;     
    }
    public function certificate_post() {
        $searchQuery = $this->input->post('searchQuery');
        $certificates = $this->Search_model->get_certificate($searchQuery);

        if(!empty($certificates)){
            $this->response($certificates, REST_Controller::HTTP_OK);
        }else{
            $this->response([
            'status' => FALSE,
            'message' => 'No certificate was found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
     }
    public function index_options() {
		return $this->response(NULL, REST_Controller::HTTP_OK);
	}
}
