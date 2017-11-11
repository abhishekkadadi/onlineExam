<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CcavRequestHandler extends CI_Controller {

    public function index($Amount = NULL) {
        $data['Amount'] = $Amount;
        $this->load->view('header');
        $this->load->view('ccavRequestHandler', $data);
    }

    public function enroll() {
        $result = array();
        $this->load->helper('crypto_helper');
        $workingKey = 'AD607144FAA143562789B6F224E9FB49';  //Working Key should be provided here.
        $encResponse = $_POST["encResp"];   //This is the response sent by the CCAvenue Server
        $rcvdString = decrypt($encResponse, $workingKey);  //Crypto Decryption used as per the specified working key.
        $order_status = "";
        $decryptValues = explode('&', $rcvdString);
        $dataSize = sizeof($decryptValues);
        for ($i = 0; $i < $dataSize; $i++) {
            $information = explode('=', $decryptValues[$i]);
            if ($i == 3)
                $order_status = $information[1];
        }

        if ($order_status === "Success") {
            for ($i = 0; $i < $dataSize; $i++) {
                $information = explode('=', $decryptValues[$i]);
                if ($information[0] == 'amount') {
                    $payment_amount = $information[1];
                }
                if ($information[0] == 'billing_email') {
                    $email = $information[1];
                }
                if ($information[0] == 'delivery_name') {
                    $name = $information[1];
                }
                if ($information[0] == 'delivery_address') {
                    $address = $information[1];
                }
                if ($information[0] == 'merchant_param1') {
                    $type_of_course = $information[1];
                }
                if ($information[0] == 'billing_tel') {
                    $phone = $information[1];
                }
                if ($information[0] == 'order_status') {
                    $payment_ack = $order_status;
                }
                if ($information[0] == 'order_id') {
                    $orderId = $information[1];
                }
            }
            $result['name'] = $name;
            $result['orderId'] = $orderId;
            $result['courseType'] = $type_of_course;
            $result['email'] = $email; 
            $Getamount = $recieveddatajson->{'Getamount'};
            $this->load->model('Student_login_model');
            $data = $this->Student_login_model->UpdateCredits($payment_amount,$orderId,$payment_ack);           
            if ($data) {
                $this->load->view('thankyouforpayment', $result);
            } else {
                $this->load->view('failed');
            }
        } else {
            $this->load->view('failed');
        }
    }

}