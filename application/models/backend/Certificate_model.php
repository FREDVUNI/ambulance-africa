<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Certificate_model extends CI_Model
{
    public function get_certificates($slug = FALSE){
        $this->db->select('certificates.*');
        
        if ($slug  === FALSE) :
            $query  = $this->db->get('certificates');
            return $query->result_array();
        endif;
        $query =  $this->db->get_where('certificates', array('certificates.slug' => $slug));
        return $query->row_array();
    }
    public function save($data, $slug){
        $datetime =  date('Y-m-d h:i:s');
        $data = array(
            'slug' => $slug,
            'student' => $data['student'],
            'student_no' => $data['student_no'],
            'expiration' => $data['expiration'],
            'certificate' => $data['userfile']
        );
        return $this->db->insert('certificates', $data);
    }
    public function getCertificate($id){
        $this->db->from('certificates');
        $this->db->where('id', $id);
        $result = $this->db->get('');

        if ($result->num_rows() > 0) {
            return $result->row();
        }
    }

    public function deleteCertificate($id){
        $this->db->where('id', $id);
        $this->db->delete('certificates', array('id' => $id));
        return TRUE;
    }

    public function countCertificates(){
        $this->db->from('certificates');
        return $count = $this->db->count_all_results();
    }
}