<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller {

    public function index() {
        $name = $this->session->userdata('username');
        $newdata = $this->session->all_userdata();
        if (empty($newdata['username'])) {
            redirect(base_url(), 'refresh');
        } else {
            $this->load->view('header');
            $this->load->view('changepassword');
        }
    }

    public function change_password() {
        $this->load->model('Changepassword_model');
        $result = $this->Changepassword_model->check_old_password();
        foreach ($result as $row) {
            $old_pass = $row->password;
        }
        $old_pass_check = $_POST['old_password'];
        if ($old_pass_check == $old_pass) {
            $result = $this->Changepassword_model->change_password();
            echo "1";
        } else {
            echo "0";
        }
    }

//end of add_question_type
}

//end Changepassword
?>