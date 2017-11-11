<?php

class Creditswallethistory_model extends CI_Model {   

    
    public function fetch_Creditswallethistory() { 
       $this->db->select('*');
       $this->db->from('paymenthistory as ph');      
       $this->db->where('studentId',$this->session->userdata('id'));
       return $this->db->get()->result_array();
    } 

}

//Student_login_model
?>