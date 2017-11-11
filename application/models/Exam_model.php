<?php

class Exam_model extends CI_Model {

    public function fetch_question_set_entry($set_id) {

        $query = $this->db->get_where('questionsets', array('setId' => $set_id));
        foreach ($query->result_array() as $key) {
            $ids[] = $key['questionId'];
        }
        $this->db->select('*');
        $this->db->from('questions');
        $this->db->where_in('id', $ids);
        return $this->db->get()->result_array();
    }

//end fetch_question_set_entry
    public function UpdatePymenthistory($set_id) {
        $query = $this->db->get_where('question_set', array('id' => $set_id));
        foreach ($query->result_array() as $key) {
            $setAmount = $key['setAmount'];
            $setName = $key['set_name'];
        }
        $this->db->reset_query();
        $data = array(
            'transactionAmount' => $setAmount,
            'orderId' => '',
            'paymentStatus' => 'Success',
            'studentId' => $this->session->userdata('id'),
            'payment_status' => 'D',
            'set_Name'=>$setName
        );
        $this->db->insert('paymenthistory', $data);
        return ($this->db->affected_rows() < 1) ? false : true;
    }

    public function UpdateParchaseExamId($ParchaseExamId) {
        $this->exam_status = 1;
        $this->db->where('purc_id', $ParchaseExamId);
        $this->db->where('student_id', $this->session->userdata('id'));
        $this->db->update('purchasedexams', $this);
        return ($this->db->affected_rows() < 1) ? false : true;
    }

    public function insert_answer() {
        $set_id = $_POST['set_id'];
        $purchaseId = $_POST['ParchaseExam_Id'];
        //$check_function = $this->check($set_id);
        //if($check_function){
        foreach ($_POST as $question => $answer) {
            if ($question != 'set_id' && $question != 'ParchaseExam_Id') {
                $data[] = array(
                    'student_id' => $this->session->userdata('id'),
                    'set_no' => $set_id,
                    'question_no' => $question,
                    'student_answer' => $answer,
                    'ParchaseExamId' => $purchaseId); //1st array                              } 
            }//if      	       
        }//end  
        $newdata = $this->session->all_userdata();

        $this->db->insert_batch('student_answers', $data);
        return ($this->db->affected_rows() < 1) ? false : true;


        // }   
    }

//  insert_answer

    /* public function check($set_id) {//check if previous exam of same set give/if yes delete that records
      $newdata = $this->session->all_userdata();
      if ($newdata['language'] == "English") {
      $this->db->from('student_answers');
      $array = array('set_no' => $set_id, 'student_id' => $this->session->userdata('id'));
      $this->db->where($array);
      $row1 = $this->db->get();
      $count = $row1->num_rows();
      if ($count === 0) {
      return TRUE;
      } else {
      $array1 = array('set_no' => $set_id, 'student_id' => $this->session->userdata('id'));
      $this->db->where($array1);
      $this->db->delete('student_answers');
      //also delete student result
      $this->db->where($array1);
      $this->db->delete('student_result');
      return TRUE;
      }
      } elseif ($newdata['language'] == "Marathi") {
      $this->db->from('student_answers_marathi');
      $array = array('set_no' => $set_id, 'student_id' => $this->session->userdata('id'));
      $this->db->where($array);
      $row1 = $this->db->get();
      $count = $row1->num_rows();
      if ($count === 0) {
      return TRUE;
      } else {
      $array1 = array('set_no' => $set_id, 'student_id' => $this->session->userdata('id'));
      $this->db->where($array1);
      $this->db->delete('student_answers_marathi');
      //also delete student result
      $this->db->where($array1);
      $this->db->delete('student_result_marathi');
      return TRUE;
      }
      } else {
      $this->db->from('student_answers');
      $array = array('set_no' => $set_id, 'student_id' => $this->session->userdata('id'));
      $this->db->where($array);
      $row1 = $this->db->get();
      $count = $row1->num_rows();
      if ($count === 0) {
      return TRUE;
      } else {
      $array1 = array('set_no' => $set_id, 'student_id' => $this->session->userdata('id'));
      $this->db->where($array1);
      $this->db->delete('student_answers');
      //also delete student result
      $this->db->where($array1);
      $this->db->delete('student_result');
      return TRUE;
      }
      }
      } */

    public function fetch_set($set_id) {
        $newdata = $this->session->all_userdata();
        $this->db->select('*');
        $this->db->from('questions as q');
        $this->db->join('questionsets as qs', 'qs.questionId=q.id');
        $this->db->where('qs.setId', $set_id);
        //$query = $this->db->get_where('questions', array('set_no' => $set_id));

        return $this->db->get();
    }

//end fetch_question_set_entry

    public function fetch_set_time($set_id) {
        $newdata = $this->session->all_userdata();
        $query = $this->db->get_where('question_set', array('id' => $set_id))->result_array();
        return $query;
    }

//end fetch_question_set_entry

    public function insert_result($correct_count, $wrong_count, $percentage, $set_id, $total_questions, $not_answered, $purchaseId) {
        $newdata = $this->session->all_userdata();
        $this->set_no = $set_id; // please read the below note
        $this->wrong_ans_count = $wrong_count;
        $this->right_ans_count = $correct_count;
        $this->student_id = $this->session->userdata('id'); // please read the below note
        $this->percentage = $percentage;
        $this->total_questions = $total_questions;
        $this->not_answered = $not_answered;
        $this->ParchaseExamId = $purchaseId;
        $this->db->insert('student_result', $this);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function get_set_details($set_id) {
        $newdata = $this->session->all_userdata();
        return $this->db->get_where('question_set', array('id' => $set_id))->result_array();
    }

}

//model ends
?>