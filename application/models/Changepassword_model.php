<?php

class Changepassword_model extends CI_Model {

    public function change_password() {
        $this->password = $_POST['password']; // please read the below note
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('student_registration', $this);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function check_old_password() {

        $query = $this->db->get_where('student_registration', array('id' => $this->session->userdata('id')));
        return $query->result();
    }

}

//ends Changepassword_model
?>