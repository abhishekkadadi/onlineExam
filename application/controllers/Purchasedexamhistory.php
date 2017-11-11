<?php

header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');
class Purchasedexamhistory extends CI_Controller {

    public function index() {
        $newdata = $this->session->all_userdata();
        if (empty($newdata['username'])) {
            $this->load->view('login');
        } else {
            $this->load->model('Purchasedexamhistory_model');
            $data1 = $this->Purchasedexamhistory_model->fetch_Purchasedexamhistory();
            $data['purchasedexamhistory'] = $data1;
            $this->load->view('header', $data);
            $this->load->view('purchasedexamhistory', $data);
        }
    }

    
}

?>


