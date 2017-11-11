<?php

header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_login extends CI_Controller {

     public function login_Load() {       
             $this->load->view('login');        
    }    
    
    public function login_check() {       
        $username = $this->input->post("username");
        $password = $this->input->post("password");        
        $this->load->model('Student_login_model');
        $getdata=$this->Student_login_model->login($username, $password);
        if ($getdata=="1") {           
            redirect(site_url("Student_login/load_stream"));
        } else if ($getdata=="2"){
            redirect(base_url("?status=block"));
        } else if ($getdata=="3"){
            redirect(base_url("?status=notverify"));
        } else {
             redirect(base_url("?status=invalid"));
        }
    }    
    
    public function AddCredits() {
        $recievedData = $_POST['data'];
        $recieveddatajson = json_decode($recievedData);
        $Getamount = $recieveddatajson->{'Getamount'};
        $this->load->model('Student_login_model');
        $data=$this->Student_login_model->UpdateCredits($Getamount);
        echo $data;
    }
    
    
    public function PurchaseExam() {
        $recievedData = $_POST['data'];
        $recieveddatajson = json_decode($recievedData);
        $percaseSetId = $recieveddatajson->{'percaseSetId'};
        $GetAmount = $recieveddatajson->{'GetAmount'};
        $this->load->model('Student_login_model');
        $data=$this->Student_login_model->UpdatePurchaseExam($GetAmount,$percaseSetId);
        echo $data;
    }
    
    public function CreateNewUser() {
        $recievedData = $_POST['data'];
        $recieveddatajson = json_decode($recievedData);
        $Name = $recieveddatajson->{'Name'};
        $Email = $recieveddatajson->{'Email'};
        $Password = $recieveddatajson->{'Password'};
        $Mobile = $recieveddatajson->{'Mobile'};        
        $this->load->model('Student_login_model');
        $data=$this->Student_login_model->CreateNewUser($Name,$Email,$Password,$Mobile);
        echo $data;
    }

    
    public function AccountActivate() {
        $email = base64_decode($_GET['email']);
        $data = array('login_status' => 1);
        $this->db->where('email', $email);
        $this->db->update('student_registration', $data);
        redirect('Thankuforactivation');
    }
    public function load_stream() {
        $newdata = $this->session->all_userdata();
        if (!empty($newdata['username'])) {
            $this->load->model('Questionset_model');           
            $data2 = $this->Questionset_model->fetch_stream_entry();            
            $data['stream'] = $data2;
            $this->load->view('header');
            $this->load->view('select_exam_strem', $data);
        } else {
            $this->load->view('login');
        }
    }
    
     public function load_subjects($id = NULL) {
        $newdata = $this->session->all_userdata();        
        if (!empty($newdata['username'])) {
            $this->load->model('Questionset_model');
            $data1 = $this->Questionset_model->fetch_question_set_subject($id);
            //$data2 = $this->Questionset_model->fetch_FullSylabusTests($id);
            $data2 = $this->Questionset_model->fetch_question_set_entryNew();           
            $data['subjects1'] = $data2;
            $data['subjects'] = $data1;
            $data['fullsyllabustests_StreamId'] = $id;            
            $this->load->view('header');
            $this->load->view('select_exam_subject', $data);
        } else {
            $this->load->view('login');
        }
    }
    
    public function load_FullSyllabusTests($id = NULL) {
        $newdata = $this->session->all_userdata();        
        if (!empty($newdata['username'])) {
            $this->load->model('Questionset_model');        
            $data2 = $this->Questionset_model->fetch_FullSylabusTests($id);           
            $data['subjects'] = $data2;            
            $this->load->view('header');
            $this->load->view('select_exam_FullSyllabusTests', $data);
        } else {
            $this->load->view('login');
        }
    }
    
    
    public function load_sets($id = NULL) {
        $newdata = $this->session->all_userdata();
        
        if (!empty($newdata['username'])) {
            $this->load->model('Questionset_model');
            $data1 = $this->Questionset_model->fetch_question_set_entry($id);           
            $data['subjects'] = $data1;
            $this->load->view('header');
            $this->load->view('select_exam', $data);
        } else {
            $this->load->view('login');
        }
    }

//load sets
}

//student login
?>