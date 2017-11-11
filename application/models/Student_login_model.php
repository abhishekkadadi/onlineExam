<?php

class Student_login_model extends CI_Model {

    public function login($username, $password) {

        $query = $this->db->get_where('student_registration', array('email' => $username, 'password' => $password));
        foreach ($query->result() as $row) {
            $id = $row->id;
            $phone = $row->phone;
            $name = $row->name;
            $address = $row->address;
            $payment_amount = $row->payment_amount;
            $login_status = $row->login_status;
            $active = $row->active;
            $email = $row->email;
        }
        $count = $query->num_rows() > 0;
        if ($count == 1) {
            if ($login_status == 1) {
                if ($active == 1) {
                    $newdata = array(
                        'username' => $name,
                        'id' => $id,
                        'payment_amount' => $payment_amount,
                        'email' => $email,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($newdata);
                    return "1";
                } else {
                    return "2";
                }
            } else {
                return "3";
            }
        } else {
            return "4";
        }
    }

    public function CreateNewUser($Name, $Email, $Password, $Mobile) {
        $query = $this->db->get_where('student_registration', array('email' => $Email));
        $count = $query->num_rows() > 0;
        if ($count == 1) {
            return 3;
        } else {
            $this->name = $Name; // please read the below note
            $this->email = $Email;
            $this->password = $Password;
            $this->phone = $Mobile; // please read the below note
            $this->address = "";
            $this->payment_amount = 0;
            $this->db->insert('student_registration', $this);
            $this->mailmetoactivate($Email, $Name);
            return true;
        }
    }

    function mailmetoactivate($email, $Name) {
        $toaa = $email;
        $encrypted_email = base64_encode($toaa);
        $link = base_url() . "index.php/Student_login/AccountActivate?email=" . $encrypted_email . "";
        $result['link'] = $link;
        $result['name'] = $Name;
        $message = $this->load->view('email', $result, true);
        require_once(APPPATH . "/third_party/sendgrid-php/sendgrid-php.php");
        $from = new SendGrid\Email(null, "contact@civilengineeringiit.com");
        $subject = "CEIIT CIVIL ENGINEERING ACTIVATE ACCOUNT";
        $to = new SendGrid\Email(null, $email);
        $content = new SendGrid\Content("text/html", $message);
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);
        $response = $sg->client->mail()->send()->post($mail);
    }

    public function UpdateCredits($Getamount,$orderId,$payment_ack) {
        $getSessionAmount = $this->session->userdata('payment_amount');
        $finalamount = $getSessionAmount + $Getamount;
        $this->payment_amount = $finalamount;
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('student_registration', $this);
        $this->session->set_userdata('payment_amount', $finalamount);

        $this->db->reset_query();
        $data = array(
            'transactionAmount' => $Getamount,
            'orderId' => $orderId,
            'paymentStatus' => $payment_ack,
            'studentId' => $this->session->userdata('id'),
            'payment_status' => 'A'
        );
        $this->db->insert('paymenthistory', $data);

        return true;
    }
    
    public function UpdatePurchaseExam($Getamount,$percaseSetId) {
        $getSessionAmount = $this->session->userdata('payment_amount');
        $finalamount = $getSessionAmount - $Getamount;
        $this->payment_amount = $finalamount;
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('student_registration', $this);
        $this->session->set_userdata('payment_amount', $finalamount);

        $this->db->reset_query();
        $data = array(
            'student_id ' => $this->session->userdata('id'),
            'set_id' => $percaseSetId           
        );
        $this->db->insert('purchasedexams', $data);
        return $this->fetch_AlreadyParchaseExamId($percaseSetId);
    }
    
    public function fetch_AlreadyParchaseExamId($id) { 
        $query = $this->db->get_where('purchasedexams',array('set_id'=>$id,'exam_status'=>0,'student_id'=>$this->session->userdata('id')));
        $purc_id=0;
        foreach ($query->result() as $row) {
            $purc_id = $row->purc_id;     
        }
        return $purc_id;
    }
    

}

//Student_login_model
?>