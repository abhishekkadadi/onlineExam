<?php

class Questionset_model extends CI_Model {

    public function fetch_question_set_entry($id) {
        $newdata = $this->session->all_userdata();
        $this->db->where('active', 1);
        $this->db->where('subjectId', $id);
        //return $this->db->from('question_set')->get()->result_array();
        foreach ($this->db->from('question_set')->get()->result_array() as $row) {
            $id1 = $row['id'];
            $set_name = $row['set_name'];
            $set_time = $row['set_time'];
            $subjectId = $row['subjectId'];
            $negativeMarks = $row['negativeMarks'];
            $ismixedtest = $row['ismixedtest'];
            $setAmount = $row['setAmount'];
            $newdata1[] = array(
                'id' => $id1,
                'set_name' => $set_name,
                'set_time' => $set_time,
                'subjectId' => $subjectId,
                'negativeMarks' => $negativeMarks,
                'ismixedtest' => $ismixedtest,
                'setAmount' => $setAmount,
                'NumberOfAttempts' => $this->fetch_NumberOfattempts($id1),
                'NumberOfperchaseExam' => $this->fetch_NumberOfperchaseExamCount($id1),
                'AlreadyParchaseExamId' => $this->fetch_AlreadyParchaseExamId($id1)
            );
        }
        return $newdata1;
    }

    
    public function fetch_question_set_entryNew() {
        $newdata = $this->session->all_userdata();
        $this->db->where('active', 1);       
        //return $this->db->from('question_set')->get()->result_array();
        foreach ($this->db->from('question_set')->get()->result_array() as $row) {
            $id1 = $row['id'];
            $set_name = $row['set_name'];
            $set_time = $row['set_time'];
            $subjectId = $row['subjectId'];
            $negativeMarks = $row['negativeMarks'];
            $ismixedtest = $row['ismixedtest'];
            $setAmount = $row['setAmount'];
            $newdata1[] = array(
                'id' => $id1,
                'set_name' => $set_name,
                'set_time' => $set_time,
                'subjectId' => $subjectId,
                'negativeMarks' => $negativeMarks,
                'ismixedtest' => $ismixedtest,
                'setAmount' => $setAmount,
                'NumberOfAttempts' => $this->fetch_NumberOfattempts($id1),
                'NumberOfperchaseExam' => $this->fetch_NumberOfperchaseExamCount($id1),
                'AlreadyParchaseExamId' => $this->fetch_AlreadyParchaseExamId($id1)
            );
        }
        return $newdata1;
    }
    
    
    public function fetch_FullSylabusTests($id) {
        $newdata = $this->session->all_userdata();
        $this->db->where('active', 1);
        $this->db->where('ismixedtest', 1);
        $this->db->where('stream_id', $id);
        //return $this->db->from('question_set')->get()->result_array();
        foreach ($this->db->from('question_set')->get()->result_array() as $row) {
            $id1 = $row['id'];
            $set_name = $row['set_name'];
            $set_time = $row['set_time'];
            $subjectId = $row['subjectId'];
            $negativeMarks = $row['negativeMarks'];
            $ismixedtest = $row['ismixedtest'];
            $setAmount = $row['setAmount'];
            $newdata1[] = array(
                'id' => $id1,
                'set_name' => $set_name,
                'set_time' => $set_time,
                'subjectId' => $subjectId,
                'negativeMarks' => $negativeMarks,
                'ismixedtest' => $ismixedtest,
                'setAmount' => $setAmount,
                'NumberOfAttempts' => $this->fetch_NumberOfattempts($id1),
                'NumberOfperchaseExam' => $this->fetch_NumberOfperchaseExamCount($id1),
                'AlreadyParchaseExamId' => $this->fetch_AlreadyParchaseExamId($id1)
            );
        }
        if(isset($newdata1)){
        return $newdata1;    
        }  else {
          return  $newdata1[]=array( );
        }
        
    }

    public function fetch_AlreadyParchaseExamId($id) {
        $query = $this->db->get_where('purchasedexams', array('set_id' => $id, 'exam_status' => 0, 'student_id' => $this->session->userdata('id')));
        $purc_id = 0;
        foreach ($query->result() as $row) {
            $purc_id = $row->purc_id;
        }
        return $purc_id;
    }

    public function fetch_NumberOfattempts($id) {
        $query = $this->db->get_where('purchasedexams', array('set_id' => $id, 'exam_status' => 1, 'student_id' => $this->session->userdata('id')));
        return $query->num_rows();
    }

    public function fetch_NumberOfperchaseExamCount($id) {
        $query = $this->db->get_where('purchasedexams', array('set_id' => $id, 'student_id' => $this->session->userdata('id')));
        return $query->num_rows();
    }

    public function fetch_question_set_subject($id) {
        $newdata = $this->session->all_userdata();
        $this->db->where('active', 1);
        $this->db->where('streamId', $id);
        return $this->db->from('subjects')->get()->result_array();
    }

    public function fetch_stream_entry() {
        $newdata = $this->session->all_userdata();
        $this->db->where('active', 1);
        return $this->db->from('stream')->get()->result_array();
    }

    public function fetch_subjects() {
        $newdata = $this->session->all_userdata();
        if ($newdata['language'] == "English") {
            $this->db->where('active', 1);
            return $this->db->from('subjects')->get()->result_array();
        } elseif ($newdata['language'] == "Marathi") {
            $this->db->where('active', 1);
            return $this->db->from('subjects_marathi')->get()->result_array();
        } else {
            $this->db->where('active', 1);
            return $this->db->from('subjects')->get()->result_array();
        }
    }

}

//Student_login_model
?>