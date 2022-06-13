<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fire_model extends CI_Model
{
    public function get_fire($slug = FALSE){
        $this->db->select('fire.*');
        
        if ($slug  === FALSE) :
            $query  = $this->db->get('fire');
            return $query->result_array();
        endif;
        $query =  $this->db->get_where('fire', array('fire.slug' => $slug));
        return $query->row_array();
    }
    public function save($data, $slug){
        $datetime =  date('Y-m-d h:i:s');
        $data = array(
            'slug' => $slug,
            'client' => $data['client'],
            'fill_date' => $data['fill_date'],
            'expiration' => $data['expiration'],
        );
        return $this->db->insert('fire', $data);
    }
    public function getFire($id){
        $this->db->from('fire');
        $this->db->where('id', $id);
        $result = $this->db->get('');

        if ($result->num_rows() > 0) {
            return $result->row();
        }
    }

    public function deleteFire($id){
        $this->db->where('id', $id);
        $this->db->delete('fire', array('id' => $id));
        return TRUE;
    }

    public function countFire(){
        $this->db->from('fire');
        return $count = $this->db->count_all_results();
    }
}
