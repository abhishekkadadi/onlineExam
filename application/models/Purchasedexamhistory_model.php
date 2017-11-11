<?php

class Purchasedexamhistory_model extends CI_Model {   

    
    public function fetch_Purchasedexamhistory() { 
       $this->db->select('ph.*,qs.set_name');
       $this->db->from('purchasedexams as ph');
       $this->db->join('question_set as qs','qs.id=ph.set_id');
       $this->db->where('student_id',$this->session->userdata('id'));
       return $this->db->get()->result_array();
    }
 

}

//Student_login_model
?>