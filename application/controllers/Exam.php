<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {

    public function index($set_id = NULL,$ParchaseExamId = NULL) {
        //echo site_url();
        $newdata = $this->session->all_userdata();
        $data = $newdata['username'];

        if (empty($newdata['username'])) {
            echo "-1";
        } else {
            $this->load->model('Exam_model');
            $this->Exam_model->UpdateParchaseExamId($ParchaseExamId);
            $this->Exam_model->UpdatePymenthistory($set_id);
            $data1 = $this->Exam_model->fetch_question_set_entry($set_id);
            $data2['questions'] = $data1;
            $data2['set_info'] = $this->Exam_model->fetch_set_time($set_id);
            $data2['set_id'] = $set_id;
            $data2['ParchaseExamId'] = $ParchaseExamId;
            $this->load->view('header');
            $this->load->view('exam', $data2);
        }
    }

    public function store_answer() {
        //echo site_url();
        //echo $_POST['set_id'];
        $this->load->model('Exam_model');
        $result = $this->Exam_model->insert_answer();
        //echo $result;
        if ($result) {//calculating marks for quick display
            $set_id = $_POST['set_id'];
            $purchaseId=$_POST['ParchaseExam_Id'];
            $result = $this->Exam_model->fetch_set($set_id);
            $total_questions = $result->num_rows();
            //echo 'total',$total_questions;
            $count = 0;
            $score = 0;
            foreach ($result->result_array() as $row) {
                //$all_ans[]=array($row['id']=>$row['answer_option']);
                $all_ans[$row['id']] = $row['answer_option'];
            }
            foreach ($_POST as $question => $answer) {
                $data[$question] = $answer;
            }
          
            $questions_answered = count($data) - 2;
            $correct_count = count(array_intersect_assoc($all_ans, $data));
            $not_answered = $total_questions - $questions_answered;
            $wrong_count = $questions_answered - $correct_count;
            $percentage1 = ($correct_count / $total_questions) * 100;
            $percentage = number_format((float) $percentage1, 2, '.', '');
            $this->load->model('Exam_model');
            $data7 = $this->Exam_model->get_set_details($set_id);
            $result = $this->Exam_model->insert_result($correct_count, $wrong_count, $percentage, $set_id, $total_questions, $not_answered,$purchaseId);
            if ($result) {
                foreach ($data7 as $key) {
                    $isSubjectTest = $key['subjectId'];
                    $negativeMarking = $key['negativeMarks'];
                }
                $marksDeducted = $wrong_count * $negativeMarking;
                $TotalTestMarks = ($correct_count + $wrong_count + $not_answered);
                $marksGained = ($correct_count) - $marksDeducted;
                $percentage1 = ($marksGained / $TotalTestMarks) * 100;
                $data = array('success' => '1', 'question_answered' => $questions_answered, 'correct_count' => $correct_count, 'not_answered' => $not_answered, 'wrong_count' => $wrong_count, 'percentage' => $percentage1, 'total_questions' => $total_questions, 'marks_gained' => $marksGained, 'total_test_marks' => $TotalTestMarks, 'marks_deducted' => $marksDeducted);
                echo json_encode($data);
            } else {
                echo "Some thing went wrong. Exam is not recorded..";
            }
        } else {
            echo "Some thing went wrong. Exam is not recorded..";
        }
    }

}

//student login
?>


