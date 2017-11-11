<?php

class Forgotpassword_model extends CI_Model {

    public function check_n_send_password() {
        $email_id = $_POST['email'];
        $data = $this->db->get_where('student_registration', array('email' => $email_id));
        $count = $data->num_rows() > 0;
        if ($count == 1) {
           
                return $data->result();
            
        } else {
            return FALSE;
        }
    }

//ends check_n_send_password
}

?>