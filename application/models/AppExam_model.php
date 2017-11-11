<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AppExam_model extends CI_Model {
                public function GetSubjects()
                {
                 $language=$_POST['language'];
                 if($language=='english'){
                          $this->db->order_by("sequence","asc");
                    $query=$this->db->get_where('subjects',array('active'=>1));
                 }else{
                 $this->db->order_by("sequence","asc");
                    $query=$this->db->get_where('subjects_marathi',array('active'=>1));
                 }
                         return $query->result_array();
                }
                
                 public function getFullsyllabus()
                {
                   $language=$_POST['language'];
                   if($language=='english'){
                   return $this->db->get_where('question_set', array('mixedChapter' =>'1','active'=>1))->result_array();
                   }else{
                    return $this->db->get_where('question_set_marathi', array('mixedChapter' =>'1','active'=>1))->result_array();
                   }
                }
                
                 public function getQuestions()
                {
                   $set_id=$_POST['set_id'];
                   $language=$_POST['language'];
                   if($language=='english'){
                        return $this->db->get_where('questions', array('set_no' => $set_id))->result_array();
                   }else{
                         return $this->db->get_where('questions_marathi', array('set_no' => $set_id))->result_array();
                   }
                }//end fetch_question_set_entry
                
                 public function getSets()
                {
                   $subject_id=$_POST['subject_id'];
                  // $set_id=$_POST['set_id'];
                   $language=$_POST['language'];
                   if($language=='english'){
                        return $this->db->get_where('question_set', array('subjectId' => $subject_id,'active'=>'1'))->result_array();
                   }else{
                       return $this->db->get_where('question_set_marathi', array('subjectId' => $subject_id,'active'=>'1'))->result_array();
                   }
                }//end fetch_question_set_entry
                
                
                public function LoginCheck() {
                $username=$_POST['username'];
                $password=$_POST['password'];
                $IMEI=$_POST['IMEI'];

        $query = $this->db->get_where('student_login', array('username' => $username, 'password' => $password));
        foreach($query->result() as $row){
             $id=$row->student_id;
             $expiry=$row->end_date;
             $name=$row->name;
             $IMEI1=$row->IMEI;
        }
        
        $count = $query->num_rows() > 0;
        if ($count == 1) {
        if(!empty($IMEI1)){
        
              if($IMEI1==$IMEI){
              
                
               if(strtotime($expiry) < strtotime('today')){
                   return '-1';
               }
            $query2 = $this->db->get_where('student_registration', array('id' => $id));
            foreach($query2->result() as $row2){
                $address=$row2->address;
                $phone=$row2->phone;

            }
            $newdata = array(
                'username' => $username,
                'id'=>$id,
                'expiry'=>$expiry,
                'name'=>$name,
                'address'=>$address,
                'phone'=>$phone,
                'logged_in' => TRUE
            );       
            return $newdata;
              
              
              }else{
              
                 return 'imeinomatch';
              
              }
        
        }else{
         $data=array('IMEI'=>$IMEI);
             $this->db->where('student_id',$id);
             $this->db->update('student_login', $data);
              
               if(strtotime($expiry) < strtotime('today')){
                   return '-1';
               }
            $query2 = $this->db->get_where('student_registration', array('id' => $id));
            foreach($query2->result() as $row2){
                $address=$row2->address;
                $phone=$row2->phone;

            }
            $newdata = array(
                'username' => $username,
                'id'=>$id,
                'expiry'=>$expiry,
                'name'=>$name,
                'address'=>$address,
                'phone'=>$phone,
                'logged_in' => TRUE
            );       
            return $newdata;
              
        
        }
        
        
       
        } else {
            return FALSE;
        }
    }


 public function insert_answer()
                {

                    $set_id=$_POST['set_id'];
                    $student_id=$_POST['user_id'];
                    $language=$_POST['language'];
                    
                 $check_function=$this->check($set_id,$student_id,$language);
                 
                     $data1=$_POST['finaldata'];
                     $data2=json_decode($data1);
                     foreach($data2 as $row){
                                        if(!empty($row->UserAns)){
                                         $data[] = array(
                                         'student_id' => $student_id,
                                         'set_no' => $set_id ,
                                         'question_no' => $row->ID,
                                         'student_answer'=> $row->UserAns);//1st array  
                                         }                             
                              }                        
                if($language=='english'){
                    $this->db->insert_batch('student_answers', $data);  
                }else{
                     $this->db->insert_batch('student_answers_marathi', $data);  
                }
                 return ($this->db->affected_rows() < 1) ? false : true;    
                
                
             }//  insert_answer





public function check($set_id,$student_id,$language)//check if previous exam of same set give/if yes delete that records
                {
                    if($language=='english'){
                     $this->db->from('student_answers');
                }else{
                     $this->db->from('student_answers_marathi');
                }
                    $array = array('set_no' => $set_id,'student_id' => $student_id);
                   
                    $row1=$this->db->get();
                    $count = $row1->num_rows();
                    if($count===0){
                        return TRUE;
                    }else{
                   
                    $array1 = array('set_no' => $set_id,'student_id' => $student_id);
                    if($language=='english'){
                        $this->db->where($array);
                        $this->db->delete('student_answers',$array1);
                        //$db->reset_query();
                        $this->db->delete('student_result',$array1);
                         
                    }else{
                     
                        $this->db->where($array);
                        $this->db->delete('student_answers_marathi',$array1);
                        
                        $this->db->delete('student_result_marathi',$array1);
                    }
                     return TRUE;
                  
                    }
                }
             



   /**below this add**/
                public function getSetforCompare()
                {
                    $language=$_POST['language'];
                    if($language=='english'){
                         $query = $this->db->get_where('questions', array('set_no' => $_POST['set_id']));
                    }else{
                        $query = $this->db->get_where('questions_marathi', array('set_no' => $_POST['set_id']));
                    }
                   return $query;
                }//end fetch_question_set_entrr

                 public function getStudentAnswersForCompare($set_id,$student_id,$language)
                {
                   if($language=='english'){
                        $query = $this->db->get_where('student_answers', array('set_no' => $set_id,'student_id'=>$student_id));
                    }else{
                        $query = $this->db->get_where('student_answers_marathi', array('set_no' => $set_id,'student_id'=>$student_id));
                    }   
                  
                   return $query;
                }//end fetch_question_set_entr

                 public function get_set_details($set_id,$language)
                {
                    if($language=='english'){
                        return $this->db->get_where('question_set',array('id'=>$set_id))->result_array();
                    }else{
                         return $this->db->get_where('question_set_marathi',array('id'=>$set_id))->result_array();
                    }
                   
                }
                
                 public function get_student_result($set_id,$student_id,$language)
                {
                    if($language=='english'){
                            return $this->db->get_where('student_result',array('set_no'=>$set_id,'student_id'=>$student_id))->result_array();
                    }else{
                        return $this->db->get_where('student_result_marathi',array('set_no'=>$set_id,'student_id'=>$student_id))->result_array();
                    }

                   
                }

                public function insert_result($correct_count,$wrong_count,$percentage,$set_id,$total_questions,$not_answered,$student_id,$language)
                {
                $this->set_no= $set_id; // please read the below note
                $this->wrong_ans_count= $wrong_count;
                $this->right_ans_count=$correct_count;
                $this->student_id=$student_id; // please read the below note
                $this->percentage= $percentage;
                $this->total_questions=$total_questions;
                $this->not_answered=$not_answered;
                $this->forRank=$correct_count-$wrong_count;
                if($language=='english'){
                    $this->db->insert('student_result', $this);
                }else{
                     $this->db->insert('student_result_marathi', $this); 
                }
                return ($this->db->affected_rows() != 1) ? false : true;
                }   

               public function sendDetailedResultExam(){
                $student_id=$_POST['user_id'];
                $language=$_POST['language'];
                if($language=='english'){
                    $this->db->select('*');
                    $this->db->from('student_result');
                    $this->db->where('student_result.student_id',$student_id);
                    $this->db->join('question_set','question_set.id=student_result.set_no');
                    $query = $this->db->get()->result_array();
                }else{
                    $this->db->select('*');
                    $this->db->from('student_result_marathi');
                    $this->db->where('student_result_marathi.student_id',$student_id);
                    $this->db->join('question_set_marathi','question_set_marathi.id=student_result_marathi.set_no');
                    $query = $this->db->get()->result_array();
                }
                    return $query;
               
                }   
                
                public function change_password()
                {
                $user_id=$_POST['user_id'];
                $this->password = $_POST['new_password']; // please read the below note
                $this->db->where('student_id', $user_id);
                $this->db->update('student_login', $this);
                return ($this->db->affected_rows() != 1) ? false : true;
                }
    
                public function check_old_password()
                {
                   $user_id=$_POST['user_id'];
                   $query = $this->db->get_where('student_login',array('student_id' => $user_id));
                   return $query->result();
                }  
                
                
                 public function updateUserProfile()
                {
                $user_id=$_POST['user_id'];
                $data= array(
                                         'name' =>  $_POST['name'],
                                         'phone' => $_POST['mobile'],
                                         'address' =>$_POST['address']);//1st array  
                                          
         
                $this->db->where('id', $user_id);
                $query=$this->db->update('student_registration', $data);
                $this->updateLoginname($user_id,$_POST['name']);
                /* $data2= array(
                                         'name' =>  $_POST['name']
                                         );//1st array  
                                $this->db->where('id', $user_id);
                $query=$this->db->update('student_login', $data2);*/
                return ($this->db->affected_rows() != 1) ? false : true;
                }
              
            public function updateLoginname($user_id,$name){
            
            	$data2= array(
                                         'name' =>  $name
                                         );//1st array  
                                $this->db->where('student_id', $user_id);
                $query=$this->db->update('student_login', $data2);
                 return;
            
            }
            
            
            
            public function syncContacts(){
                     
                     $userId=$_POST['user_id'];
                     $userContacts=$this->getContacts($userId);
                     foreach($userContacts as $row){
                       $userContacts1[]=$row['Contactnumber'];
                     
                     }
                     
                  
                    
            	     $data1=$_POST['contactdata'];
                     $data2=json_decode($data1);
                     foreach($data2 as $row){
                     if(isset($userContacts1)){
                      if(!in_array($row->Number,$userContacts1)){
                     		$data[] = array(
                                         'Contactname' => $row->Name,
                                         'Contactnumber' => $row->Number,
                                         'userId' =>  $userId
                                          );//1st array  
                     }
                    }else{
                    
                    	$data[] = array(
                                         'Contactname' => $row->Name,
                                         'Contactnumber' => $row->Number,
                                         'userId' =>  $userId
                                          );//1st array  
                    
                    }
                                                                             
                 } 
                       
                      $this->db->insert_batch('synccontacts', $data);   
                      return ($this->db->affected_rows() != 1) ? false : true;          
            
            }//syncContacts
            
            
            public function getContacts($userId){
            	
            	$this->db->select('Contactnumber');
            	$this->db->from('synccontacts');
            	$this->db->where('userId',$userId);
            	return $this->db->get()->result_array();
            
            }//for sybcContacts
            
            public function getNotices(){
            	
            	$query=$this->db->get('notices');
            	return $query->result_array();
            
            }//for getNotices
            
             public function getSetMarks()
                {
                   //$subject_id=$_POST['subject_id'];
                   $set_id=$_POST['set_id'];
                   $language=$_POST['language'];
                   if($language=='english'){
                        $query=$this->db->get_where('questions',array('set_no' => $set_id));
                        return $query->num_rows();
                   }else{
                        $query=$this->db->get_where('questions_marathi',array('set_no' => $set_id));
                        return $query->num_rows();
                   }
                }//end getSetMarks
                
}//model ends
?>