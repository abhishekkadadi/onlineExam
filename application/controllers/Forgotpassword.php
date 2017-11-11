<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpassword extends CI_Controller {

    public function index() {      
        $this->load->view('forgotpassword');
    }

    public function send_email() {
        $this->load->model('Forgotpassword_model');
        $result = $this->Forgotpassword_model->check_n_send_password();
        if($result){
            foreach($result as $row){
                $result['name']=$row->name;
                $result['password']=$row->password;
                $email=$row->email;
            }
        $message = $this->load->view('forgotpassemail', $result, true);
        require_once(APPPATH . "/third_party/sendgrid-php/sendgrid-php.php");
        $from = new SendGrid\Email(null, "contact@civilengineeringiit.com");
        $subject = "CEIIT CIVIL ENGINEERING PASSWORD";
        $to = new SendGrid\Email(null, $email);
        $content = new SendGrid\Content("text/html", $message);
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);
        $response = $sg->client->mail()->send()->post($mail);
//           print_r($response);
           echo 1;
        }else{
            echo 0;
            
        }
    }

//end of add_question_type
}

//Forgotpassword
?>