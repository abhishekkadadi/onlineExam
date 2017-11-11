<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AppExam extends CI_Controller {

    public function getSubjects() {
        $this->load->model('AppExam_model');
        $result = $this->AppExam_model->GetSubjects();
        if ($result) {
            $final_data = array('status' => '1', 'message' => 'Successfully fetched data');
            $data['status'] = $final_data;
            $data['data'] = $result;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $final_data = array('status' => '0', 'message' => 'Opps! Some thing went wrong');
            $data['status'] = $final_data;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

//student login

    public function getFullsyllabus() {
        $this->load->model('AppExam_model');
        $result = $this->AppExam_model->getFullsyllabus();
        if ($result) {
            $final_data = array('status' => '1', 'message' => 'Successfully fetched data');
            $data['status'] = $final_data;
            $data['data'] = $result;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $final_data = array('status' => '0', 'message' => 'Opps! Some thing went wrong');
            $data['status'] = $final_data;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

//getFullsyllabus

    public function fetchQuestions() {

        $this->load->model('AppExam_model');
        $data1 = $this->AppExam_model->getQuestions();
        $data2['Contact'] = $data1;
        //$data2['set_info']=$this->Exam_model->fetch_set_time($set_id);
        if ($data1) {
            $final_data = array('status' => '1', 'message' => 'Successfully fetched data');
            $data['status'] = $final_data;
            $data['data'] = $data1;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $final_data = array('status' => '0', 'message' => 'Opps! Some thing went wrong');
            $data['status'] = $final_data;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function getSets() {

        $this->load->model('AppExam_model');
        $data1 = $this->AppExam_model->getSets();
        if ($data1) {
            $final_data = array('status' => '1', 'message' => 'Successfully fetched data');
            $data['status'] = $final_data;
            $data['data'] = $data1;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $final_data['status'] = array('status' => '0', 'message' => 'Opps! Some thing went wrong');
            $this->output->set_content_type('application/json')->set_output(json_encode($final_data));
        }
    }

    public function Login() {

        $this->load->model('AppExam_model');
        $data1 = $this->AppExam_model->LoginCheck();

        if ($data1 == 'imeinomatch') {
            $final_data['status'] = array('status' => '-2', 'message' => 'Device not matching');
            $this->output->set_content_type('application/json')->set_output(json_encode($final_data));
        } else if ($data1 == '-1') {
            $final_data['status'] = array('status' => '-1', 'message' => 'Your login expired');
            $this->output->set_content_type('application/json')->set_output(json_encode($final_data));
        } else if ($data1) {
            $final_data = array('status' => '1', 'message' => 'Successfully fetched data');
            $data['status'] = $final_data;
            $data['data'] = array($data1);
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {

            $final_data['status'] = array('status' => '0', 'message' => 'Invalid username/password');
            $this->output->set_content_type('application/json')->set_output(json_encode($final_data));
        }
    }

    public function insertAnswers() {
        $set_id = $_POST['set_id'];
        $student_id = $_POST['user_id'];
        $language = $_POST['language'];
        $this->load->model('AppExam_model');
        $data1 = $this->AppExam_model->insert_answer();
        if ($data1) {
            $data2 = $this->AppExam_model->getSetforCompare();
            $total_questions = $data2->num_rows();
            $data3 = $this->AppExam_model->getStudentAnswersForCompare($set_id, $student_id, $language);

            foreach ($data2->result_array() as $row) {
                $all_ans[$row['id']] = $row['answer_option'];
            }

            foreach ($data3->result_array() as $answers) {
                $data[$answers['question_no']] = $answers['student_answer'];
            }

            $questions_answered = count($data);
            $correct_count = count(array_intersect_assoc($all_ans, $data));
            $not_answered = $total_questions - $questions_answered;
            $wrong_count = $questions_answered - $correct_count;
            $percentage1 = ($correct_count / $total_questions) * 100;
            $percentage = number_format((float) $percentage1, 2, '.', '');
            $this->load->model('Exam_model');
            $data7 = $this->AppExam_model->get_set_details($set_id, $language);
            $result = $this->AppExam_model->insert_result($correct_count, $wrong_count, $percentage, $set_id, $total_questions, $not_answered, $student_id, $language);

            $final_data = array('status' => '1', 'message' => 'Successfully insertred data');
            $data['status'] = $final_data;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $final_data['status'] = array('status' => '0', 'message' => 'Opps! Some thing went wrong');
            $this->output->set_content_type('application/json')->set_output(json_encode($final_data));
            // print_r($data);
        }
    }

    public function sendResult() {
        $set_id = $_POST['set_id'];
        $student_id = $_POST['user_id'];
        $language = $_POST['language'];
        $this->load->model('AppExam_model');
        $data7 = $this->AppExam_model->get_set_details($set_id, $language);
        $data8 = $this->AppExam_model->get_student_result($set_id, $student_id, $language);
        if ($data7) {
            foreach ($data7 as $key) {
                $isSubjectTest = $key['subjectId'];
                $negativeMarking = $key['negativeMarks'];
            }
            foreach ($data8 as $key1) {
                $set_no = $key1['set_no'];
                $wrong_count = $key1['wrong_ans_count'];
                $correct_count = $key1['right_ans_count'];
                $student_id = $key1['student_id'];
                $total_questions = $key1['total_questions'];
                $not_answered = $key1['not_answered'];
            }
            $marksDeducted = $wrong_count * $negativeMarking;
            $TotalTestMarks = ($correct_count + $wrong_count + $not_answered);
            $questions_answered = $correct_count + $wrong_count;
            $marksGained = ($correct_count) - $marksDeducted;
            $percentage1 = ($marksGained / $TotalTestMarks) * 100;
            $percentage1 = number_format((float) $percentage1, 2, '.', '');
            $data3 = array('success' => '1', 'question_answered' => $questions_answered, 'correct_count' => $correct_count, 'not_answered' => $not_answered, 'wrong_count' => $wrong_count, 'percentage' => $percentage1, 'total_questions' => $total_questions, 'marks_gained' => $marksGained, 'total_test_marks' => $TotalTestMarks, 'marks_deducted' => $marksDeducted);

            $final_data = array('status' => '1', 'message' => 'Successfully fetched data');
            $data4['status'] = $final_data;
            $data4['data'] = array($data3);
            $this->output->set_content_type('application/json')->set_output(json_encode($data4));

            //echo json_encode($data);
        } else {
            $final_data = array('status' => '0', 'message' => 'Oops!something went wrong');

            $this->output->set_content_type('application/json')->set_output(json_encode($final_data));
        }
    }

    public function getresult() {
        $set_id = $_GET['set_id'];
        $student_id = $_GET['user_id'];
        $language = $_GET['language'];
        //$set_id=1;
        //$student_id=2;
        $this->load->model('Appdetailedresult_model');
        $data1 = $this->Appdetailedresult_model->fetch_questionset($set_id, $language);
        $data2 = $this->Appdetailedresult_model->fetch_setandstudentanswer($set_id, $student_id, $language);
        $data3 = $this->Appdetailedresult_model->fetch_result($set_id, $student_id, $language);
        $data4 = $this->Appdetailedresult_model->fetch_set_count($set_id, $language);

        $data5 = $this->Appdetailedresult_model->fetch_question_type_breakdown($set_id, $student_id, $language);
        $data6 = $this->Appdetailedresult_model->fetch_subjects_for_google($set_id, $language);
        $data7 = $this->Appdetailedresult_model->get_set_details($set_id, $language);
        $data8 = $this->Appdetailedresult_model->getChapForEachSubject($set_id, $language);
        // print_r($data8);
        ///making one array of student answer and all question
        $sent_assoc = array();
        $detailed_result = array();
        $feed_google = array();
        $feed_google3 = array();
        foreach ($data2 as $el1) {

            $sent_assoc[$el1['question_no']] = $el1;
        }
        $default_sent = array('student_answer' => null);
        foreach ($data1 as &$el) {
            $id = $el['id'];
            $sent = isset($sent_assoc[$id]) ? $sent_assoc[$id] : $default_sent;
            $detailed_result[] = array_merge($el, $sent);
        }

        foreach ($data7 as $key) {
            $isSubjectTest = $key['subjectId'];
            $negativeMarking = $key['negativeMarks'];
        }

        foreach ($data4 as $object) {

            $right = $this->seperate_result2($object['chapterId'], $data5);
            $gfeed_question_type = $object['chapterName'];
            $gfeed_total = $object['total'];
            $wrong = $right['1'];
            //$wrong=$gfeed_total-$right['0'];
            $feed_google[] = array($object['chapterName'], (int) $right['0'], $wrong, $gfeed_total, $this->generateRandomString());
        }

        $gfeed_json = json_encode($feed_google);


        foreach ($data6 as $object1) {
            $right = $this->seperate_result($object1['sub_id'], $data5);
            $gfeed_question_type = $object1['sub_name'];
            $gfeed_total = $object1['total'];
            $wrong = $right[1];
            $feed_google1[] = array($object1['sub_name'], (int) $right[0], (int) $wrong, $gfeed_total, $this->generateRandomString());
        }
        //$gfeed_json1=json_encode($feed_google1);				
        //print_r($gfeed_json1);
        $check = array();
        $random_number = '';
        foreach ($data8 as $object2) {
            $this->load->model('Detailedresult_model');
            $right = $this->seperate_result3($object2['id'], $data5);
            $data9 = $this->Appdetailedresult_model->countChapter($object2['chapterId'], $set_id,$language);
            if (!in_array($object2['chapterId'], $check)) {
                $random_number = $this->generateRandomString();
                $feed_google3[] = array($object2['question_type'] => array($object2['chapterName'], (int) $right[0], $right[1], $data9, $random_number),);
                array_push($check, $object2['chapterId']);
            } else {
                $feed_google3[] = array($object2['question_type'] => array($object2['chapterName'], (int) $right[0], $right[1], $data9, $random_number),);
            }
            //$gfeed_question_type=$object2['chapterName'];
            //$gfeed_total=$object2['total'];
            //$wrong=$gfeed_total-$right;
            //$feed_google3[]=array($object2['question_type']=>array($object2['chapterName'],(int)$right[0],$right[1],$data9,$this->generateRandomString()),);
        }
        //$gfeed_json3=json_encode($feed_google3);
        //echo '<pre>';
        //print_r($feed_google3);
        $result = array();

        foreach ($feed_google3 as $item) {
            $artist = key($item);
            $album = current($item);

            if (!isset($result[$artist])) {
                $result[$artist] = array();
            }
            $result[$artist][] = $album;
        }
        foreach ($result as $key => $value) {
            $result1 = array();
            foreach ($value as $key2) {
                $feed_google22 = array($key2[0], (int) $key2[1], (int) $key2[2], (int) $key2[3], $key2[4]);


                if (!isset($result1[$feed_google22['0']])) {
                    $result1[$feed_google22['0']] = $feed_google22;
                } else {
                    $result1[$feed_google22['0']]['1'] += $feed_google22['1'];
                    $result1[$feed_google22['0']]['2'] += $feed_google22['2'];
                    $result1[$feed_google22['0']]['3'] = $feed_google22['3'];
                    $result1[$feed_google22['0']]['4'] = $feed_google22['4'];
                }
                $result2 = array_values($result1);
            }

            //	echo ".........$key";
            //print_r($result2);
        }
        //print_r($data5);
        //print_r($feed_google3);
        //viewdetailedresult
        //  echo '</pre>';
        //added for rank
        $topRankedData = $this->Detailedresult_model->getTopRanked($language, $set_id);
        $data['topRanked'] = $topRankedData;
        $topRankedData = $this->Detailedresult_model->getYourRanked($language, $set_id);
        $myrank = 0;

        foreach ($topRankedData as $row) {
            $myrank++;
            if ($row['student_id'] == $student_id) {

                break; // No more iterating
            }
        }
        $data['myRank'] = $myrank;
        //added for rank ends
        $data['detailed_result'] = $detailed_result;
        $data['student_result'] = $data3;
        $data['set_count'] = $data4;
        $data['break_down'] = $data5;
        $data['google_feed_json'] = $gfeed_json;
        $data['fusion_feed_array'] = $feed_google; //for fusion chart

        if (empty($isSubjectTest)) {
            $data['google_feed_json1'] = $feed_google1;
            $data['google_feed_json2'] = $result;
        }
        $data['negativeMarksIfAny'] = $negativeMarking;
        //$this->load->view('header',$data);
        if ($language == 'english') {
            $this->load->view('viewdetailedresultrtoenglish', $data);
        } else {

            $this->load->view('viewdetailedresultrtomarathi', $data);
        }
    }

    public function seperate_result($key, $data5) {
        //print_r($data5);
        //print_r($key);
        $right = 0;
        $wrong = 0;
        $rightWrong = array();
        foreach ($data5 as $item) {
            if ($item['subjectId'] == $key) {
                if ($item['answer_option'] == $item['student_answer']) {
                    $right = $right + 1;
                } else {
                    $wrong = $wrong + 1;
                    continue;
                }
            }
        }
        $rightwrong1 = array($right, $wrong);
        return $rightwrong1;
    }

    public function seperate_result2($key, $data5) {
        //print_r($data5);
        //print_r($break_down);
        $right = 0;
        $wrong = 0;
        $rightWrong = array();
        foreach ($data5 as $item) {
            if ($item['chapterId'] == $key) {
                if ($item['answer_option'] == $item['student_answer']) {
                    $right = $right + 1;
                } else {
                    $wrong = $wrong + 1;
                    continue;
                }
            }
        }
        $data12 = array($right, $wrong);
        return $data12;
    }

    public function seperate_result3($key, $data5) {

        //echo "$key".",";
        $right = 0;
        $wrong = 0;
        $total = 0;
        $rightWrong = array();
        foreach ($data5 as $item) {

            if ($item['id'] == $key) {
                $total = $total + 1;
                if ($item['answer_option'] == $item['student_answer']) {
                    $right = $right + 1;
                } else {
                    $wrong = $wrong + 1;
                    continue;
                }
            }
        }
        $data12 = array($right, $wrong, $total);
        return $data12;
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function updateProfile() {

        $this->load->model('AppExam_model');
        $data1 = $this->AppExam_model->updateProfile();
        if ($data1) {
            $final_data = array('status' => '1', 'message' => 'Successfully fetched data');
            $data['status'] = $final_data;
            $data['data'] = array($data1);
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else if ($data1 == '-1') {
            $final_data['status'] = array('status' => '-1', 'message' => 'Your login expired');
            $this->output->set_content_type('application/json')->set_output(json_encode($final_data));
        } else {

            $final_data['status'] = array('status' => '0', 'message' => 'Invalid username/password');
            $this->output->set_content_type('application/json')->set_output(json_encode($final_data));
        }
    }

    public function sendDetailedResultExam() {

        $this->load->model('AppExam_model');
        $data1 = $this->AppExam_model->sendDetailedResultExam();
        if ($data1) {
            $final_data = array('status' => '1', 'message' => 'Successfully fetched data');
            $data['status'] = $final_data;
            $data['data'] = ($data1);
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {

            $final_data['status'] = array('status' => '0', 'message' => 'NO exams found');
            $this->output->set_content_type('application/json')->set_output(json_encode($final_data));
        }
    }

    public function changePassword() {
        $this->load->model('AppExam_model');
        $result = $this->AppExam_model->check_old_password();
        foreach ($result as $row) {
            $old_pass = $row->password;
        }
        $old_pass_check = $_POST['old_password'];
        if ($old_pass_check == $old_pass) {
            $result = $this->AppExam_model->change_password();
            if ($result) {
                $final_data = array('status' => '1', 'message' => 'Password successfully changed');
                $data['status'] = $final_data;
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            } else {
                $final_data = array('status' => '0', 'message' => 'Oops! Something went wrong');
                $data['status'] = $final_data;
                $this->output->set_content_type('application/json')->set_output(json_encode($data));
            }
        } else {
            $final_data = array('status' => '-1', 'message' => 'Old password did not match');
            $data['status'] = $final_data;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

//end of change_password

    public function updateUserProfile() {
        $this->load->model('AppExam_model');
        $result = $this->AppExam_model->updateUserProfile();

        if ($result) {
            $final_data = array('status' => '1', 'message' => 'Profile successfully updated');
            $data['status'] = $final_data;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $final_data = array('status' => '1', 'message' => 'Profile successfully updated');
            $data['status'] = $final_data;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

//end of updateProfile

    public function syncContacts() {
        $this->load->model('AppExam_model');
        $result = $this->AppExam_model->syncContacts();

        /*   if($result){
          $final_data=array('status'=>'1','message'=>'successfully sync');
          $data['status']=$final_data;
          $this->output->set_content_type('application/json')->set_output(json_encode($data));
          }else{
          $final_data=array('status'=>'0','message'=>'Nothing to update');
          $data['status']=$final_data;
          $this->output->set_content_type('application/json')->set_output(json_encode($data));
          }

         */
    }

//end of syncContacts

public function getNotices() {
        $this->load->model('AppExam_model');
        $result = $this->AppExam_model->getNotices();
        if ($result) {
            $final_data = array('status' => '1', 'message' => 'Successfully fetched data');
            $data['status'] = $final_data;
            $data['data'] = $result;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $final_data = array('status' => '0', 'message' => 'No notices');
            $data['status'] = $final_data;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }
    
public function getSetMarks() {
        $this->load->model('AppExam_model');
        $result = $this->AppExam_model->getSetMarks();
        if ($result) {
            $final_data = array('status' => '1', 'message' => 'Successfully fetched data');
            $data['status'] = $final_data;
            $marks['marks']=$result;
            $data['data'] = $marks;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $final_data = array('status' => '0', 'message' => 'No notices');
            $data['status'] = $final_data;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }
}

?>