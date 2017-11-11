<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {

    public function SubjectSets($set_id = NULL) {
        $newdata = $this->session->all_userdata();
        if (!empty($newdata['username'])) {
            $this->load->model('Subjects_model');
            $data1 = $this->Subjects_model->Subject_Set($set_id);
            $data['subjectsSets'] = $data1;
            $this->load->view('header');
            $this->load->view('subjectsets', $data);
        } else {
            $this->load->view('login');
        }
    }

}