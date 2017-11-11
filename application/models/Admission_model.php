<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admission_model extends CI_Model {
	            public function insert_entry($name,$email,$phone,$address,$type_of_course,$payment_ack,$payment_amount)
                {
                $this->	name= $name; // please read the below note
                $this->	email= $email;
                $this->	address= $address; // please read the below note
                $this->	type_of_course= $type_of_course;
                $this->	payment_amount=$payment_amount; // please read the below note
                $this->	phone= $phone;
                $this->	payment_ack= $payment_ack;
                $this->db->insert('student_registration', $this);
                return ($this->db->affected_rows() != 1) ? false : true;
                }
 }//Admission
 ?>