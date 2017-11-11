<?php

header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');
class Creditswallethistory extends CI_Controller {

    public function index() {
        $newdata = $this->session->all_userdata();
        if (empty($newdata['username'])) {
            $this->load->view('login');
        } else {
            $this->load->model('Creditswallethistory_model');
            $data1 = $this->Creditswallethistory_model->fetch_Creditswallethistory();
            $data['creditswallethistory'] = $data1;
            $this->load->view('header', $data);
            $this->load->view('creditswallethistory', $data);
        }
    }

    
}

?>


