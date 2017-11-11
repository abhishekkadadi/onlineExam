<?php

class Subjects_model extends CI_Model {

    public function Subject_Set($set_id) {
       
        $newdata = $this->session->all_userdata();
        if ($newdata['language'] == "English") {
            return $this->db->get_where('question_set', array('subjectId' => $set_id, 'active' => '1'))->result_array();
        } elseif ($newdata['language'] == "Marathi") {
            return $this->db->get_where('question_set_marathi', array('subjectId' => $set_id, 'active' => '1'))->result_array();
        } else {
            return $this->db->get_where('question_set', array('subjectId' => $set_id, 'active' => '1'))->result_array();
        }
    }

//end fetch_question_set_entry
}
?>
	
