<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Certificate_model extends CI_Model{
        public function certificates($slug = FALSE){
            $this->db->select('certificates.*'); 
            if($slug  === FALSE):
        		$query  = $this->db->get('certificates');
        		return $query->result_array();
        	endif;
        	$query =  $this->db->get_where('certificates',array('certificates.slug'=>$slug));
        	return $query->row_array();
        }
        public function get_certificate($searchQuery= null){
            $searchQuery = '%' . $searchQuery . '%';
            $sql = "SELECT *
            FROM certificates c
            WHERE c.student_no like ? OR c.student like ?
            ORDER BY c.id DESC";
            $query = $this->db->query($sql,array($searchQuery,$searchQuery));
            return $query->result_array();
        }
    }
