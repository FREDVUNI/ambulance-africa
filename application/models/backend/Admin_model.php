<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function admins($id = FALSE){
        if ($id  === FALSE) :
            $query  = $this->db->get('admins');
            return $query->result_array();
        endif;
        $query =  $this->db->get_where('admins', array('admins.id' => $id));
        return $query->row_array();
    }
    public function save(array $data){
        $insert = $this->db->insert("admins");
        return $insert?$this->db->insert_id():FALSE;
    }
    public function admin($id){
        $this->db->from('admins');
        $this->db->where('id', $id);
        $result = $this->db->get('');

        if ($result->num_rows() > 0) {
            return $result->row();
        }
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('admins', array('id' => $id));
        return TRUE;
    }
    //count the number of admins in the table admins
    public function countadmins(){
        $this->db->from('admins'); 
        return $count = $this->db->count_all_results();
    }
}
