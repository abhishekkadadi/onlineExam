<?php

header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class Detailedresult extends CI_Controller {

    public function index() {
        $newdata = $this->session->all_userdata();
        if (empty($newdata['username'])) {
            echo '-1';
        } else {
            $this->load->model('Detailedresult_model');
            $data1 = $this->Detailedresult_model->fetch_studentset();
            $data['sets'] = $data1;
            $this->load->view('header', $data);
            $this->load->view('detailedresult', $data);
        }
    }

    public function getresult($set_id = NULL,$purchaseId=NULL) {
        $newdata = $this->session->all_userdata();
        if (empty($newdata['username'])) {
            echo '-1';
        } else {
           
            $this->load->model('Detailedresult_model');
            $data1 = $this->Detailedresult_model->fetch_questionset($set_id);
            
            $data2 = $this->Detailedresult_model->fetch_setandstudentanswer($set_id,$purchaseId);
            
            $data3 = $this->Detailedresult_model->fetch_result($set_id,$purchaseId);
         
            $data4 = $this->Detailedresult_model->fetch_set_count($set_id);
               
            $data5 = $this->Detailedresult_model->fetch_question_type_breakdown($set_id,$purchaseId);
           
            $data6 = $this->Detailedresult_model->fetch_subjects_for_google($set_id);
             
            $data7 = $this->Detailedresult_model->get_set_details($set_id);
           
            $data8 = $this->Detailedresult_model->getChapForEachSubject($set_id);
            
             
            ///making one array of student answer and all question
            $sent_assoc = array();
            $detailed_result = array();
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
            //print_r($gfeed_json);

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

                $right = $this->seperate_result3($object2['id'], $data5);
                $data9 = $this->Detailedresult_model->countChapter($object2['chapterId'], $set_id);
               
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
            //  echo '</pre>';
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
            $this->load->view('header', $data);
            $this->load->view('viewdetailedresult', $data);
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

}

//student login
?>


