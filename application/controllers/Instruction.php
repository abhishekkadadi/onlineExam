<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Instruction extends CI_Controller {

    public function index($id = NULL,$ParchaseExamId = NULL) {
        $data['set_id'] = $id;
        $data['ParchaseExamId'] = $ParchaseExamId;
        $this->load->view('header');
        $this->load->view('instruction', $data);
    }

}

//student login
?>