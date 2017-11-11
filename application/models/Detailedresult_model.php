<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Detailedresult_model extends CI_Model {

    public function fetch_studentset() {
        $newdata = $this->session->all_userdata();
        
            $this->db->select('*');
            $this->db->from('student_result');
            $this->db->where('student_result.student_id', $this->session->userdata('id'));
            $this->db->join('question_set', 'question_set.id=student_result.set_no');
            $this->db->order_by("student_result.set_no", "asc");
            $query = $this->db->get()->result_array();
            return $query;
        
    }

    public function fetch_questionset($set_id) {
        $newdata = $this->session->all_userdata();
//     
//            $this->db->select('*');
//            $this->db->from('questions');
//            $array = array('set_no' => $set_id);
//            $this->db->order_by("id", "asc");
//            $this->db->where($array);
            $this->db->select('*');
            $this->db->from('questions as q');
            $this->db->join('questionsets as qs','qs.questionId=q.id');
            $this->db->where('qs.setId',$set_id);
            $query = $this->db->get()->result_array();
            return $query;
        
    }

    public function fetch_setandstudentanswer($set_id,$purchaseId) {
        $newdata = $this->session->all_userdata();
      
            $this->db->select('*');
            $this->db->from('student_answers');
            $array = array('student_id' => $this->session->userdata('id'), 'set_no' => $set_id,'ParchaseExamId'=>$purchaseId);
            //$this->db->join('questions','questions.id=student_answers.question_no');
            $this->db->where($array);
            $this->db->order_by("question_no", "asc");
            $query = $this->db->get()->result_array();
            return $query;
        
    }

    public function fetch_result($set_id,$purchaseId) {
        $newdata = $this->session->all_userdata();
        
            $this->db->select('*');
            $this->db->from('student_result');
            $array = array('set_no' => $set_id, 'student_id' => $this->session->userdata('id'),'ParchaseExamId'=>$purchaseId);
            $this->db->where($array);
            $query = $this->db->get()->result_array();
            return $query;
     
    }

//end fetch_question_set_entry

    public function fetch_set_count($set_id) {
        $newdata = $this->session->all_userdata();
        $questions_ids=$this->guestionsIds($set_id);
            $this->db->select('qt.chapterId,qt.chapterName,count(q.chapterId) as total');
            $this->db->from('questions as q');
            $this->db->join('chapters as qt', 'qt.chapterId = q.chapterId');
            
           // $this->db->where('q.set_no', $set_id);
            $this->db->where_in('q.id', $questions_ids);
            $this->db->group_by('q.chapterId');
            $this->db->order_by('q.chapterId', "asc");
            $query = $this->db->get()->result_array();
            return $query;
       
    }

//fetch_set_count

    public function fetch_subjects_for_google($set_id) {
        $newdata = $this->session->all_userdata();
       $questions_ids=$this->guestionsIds($set_id);
            $this->db->select('sub.id as sub_id,sub.question_type as sub_name,count(q.subjectId) as total');
            $this->db->from('questions as q');
            $this->db->join('subjects as sub', 'sub.id=q.subjectId');
            //$this->db->where('q.set_no', $set_id);
             $this->db->where_in('q.id', $questions_ids);
            $this->db->group_by('sub.question_type');
            $this->db->order_by('total', "asc");
            $query = $this->db->get()->result_array();
            return $query;
       
    }

//fetch_subjects_for_google

    public function fetch_question_type_breakdown($set_id,$purchaseId) {
        $newdata = $this->session->all_userdata();
         $questions_ids=$this->guestionsIds($set_id);
            $this->db->select('q.chapterId,q.answer_option,sa.student_answer,q.subjectId,q.id');
            $this->db->from('questions as q');
            
            $this->db->where_in('q.id', $questions_ids);
            $this->db->join('student_answers as sa', 'sa.question_no = q.id');
            
            //$this->db->where('q.set_no', $set_id);
           
            $this->db->where('sa.ParchaseExamId',$purchaseId);
            $this->db->where('sa.student_id', $this->session->userdata('id'));
            $this->db->order_by('q.id', "asc");
            $query = $this->db->get()->result_array();
            return $query;
        
    }

//fetch_set_count

    public function get_set_details($set_id) {
        $newdata = $this->session->all_userdata();
      
            return $this->db->get_where('question_set', array('id' => $set_id))->result_array();
        
    }

//end fetch_question_set_entry

    public function getChapForEachSubject($set_id) {
        $newdata = $this->session->all_userdata();
         $questions_ids=$this->guestionsIds($set_id);
            $this->db->select('q.*,qt.chapterName,qt.chapterId,sub.question_type');
            $this->db->from('questions as q');
             $this->db->where_in('q.id', $questions_ids);
            $this->db->join('chapters as qt', 'qt.chapterId = q.chapterId');
            $this->db->join('subjects as sub', 'sub.id = q.subjectId');
        
            //$this->db->where('q.set_no', $set_id);
           
           
            
            $this->db->order_by('qt.chapterId', "asc");
            $query = $this->db->get()->result_array();
            return $query;
      
    }

//end fetch_question_set_entry

    public function countChapter($chap_id, $set_id) {
        $newdata = $this->session->all_userdata();
       $questions_ids=$this->guestionsIds($set_id);
            $this->db->select('q.chapterId');
            $this->db->from('questions as q');
            
            $this->db->where_in('q.id', $questions_ids);
            //$this->db->where('q.set_no', $set_id);
            $this->db->where('q.chapterId', $chap_id);
            $query = $this->db->get();
            return $query->num_rows();
     
    }

//end fetch_question_set_entry

    public function getTopRanked($set_id) {
       
            $this->db->select('srm.*,sr.name,qs.negativeMarks');
            $this->db->from('student_result as srm');
            $this->db->where('srm.set_no', $set_id);
            $this->db->join('student_registration as sr', 'sr.id=srm.student_id');
            $this->db->join('question_set as qs', 'qs.id=srm.set_no');
            $this->db->order_by('srm.percentage', 'desc');
            $this->db->limit(1);
            return $this->db->get()->result_array();
        
    }

//end getTopRanked

    public function getYourRanked($set_id) {
       
            $this->db->select('srm.*');
            $this->db->from('student_result as srm');
            $this->db->where('srm.set_no', $set_id);
            $this->db->order_by('srm.forRank', 'desc');
            return $this->db->get()->result_array();
       
    }

     public function guestionsIds($set_id) {

        $query = $this->db->get_where('questionsets', array('setId' => $set_id));
        foreach ($query->result_array() as $key) {
            $ids[] = $key['questionId'];
        }
       
        return $ids;
     }
//end getYourRanked
}

//Admission
?>