<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Appdetailedresult_model extends CI_Model {
	            public function fetch_studentset($student_id)
                {
             		$this->db->select('*');
					$this->db->from('student_result');
					$this->db->where('student_result.student_id',$student_id);
					$this->db->join('question_set','question_set.id=student_result.set_no');
					$query = $this->db->get()->result_array();
					return $query;
                }
                public function fetch_questionset($set_id,$language)
                {
             		$this->db->select('*');
             		if($language=='english'){
						$this->db->from('questions');
					}else{
						$this->db->from('questions_marathi');
					}
					$array = array('set_no'=>$set_id);
					$this->db->order_by("id", "asc");
					$this->db->where($array);
					$query = $this->db->get()->result_array();
					return $query;
                }
                
                 public function fetch_setandstudentanswer($set_id,$student_id,$language)
                {
             		$this->db->select('*');
             		if($language=='english'){
					$this->db->from('student_answers');
					}else{
						$this->db->from('student_answers_marathi');
					}
					$array = array('student_id'=>$student_id,'set_no'=>$set_id);
					$this->db->where($array);
					$this->db->order_by("question_no", "asc");
					$query = $this->db->get()->result_array();
					return $query;
                }
                
                 public function fetch_result($set_id,$student_id,$language)
                {
                   $this->db->select('*');
                   if($language=='english'){
                   		$this->db->from('student_result');
                   }else{
						$this->db->from('student_result_marathi');
					}
                   $array = array('set_no'=>$set_id,'student_id'=>$student_id);
                   $this->db->where($array);
                   $query = $this->db->get()->result_array();
                   return $query;
                }//end fetch_question_set_entry
                
                 public function fetch_set_count($set_id,$language)
                {
                 	    if($language=='english'){
	                       $this->db->select('qt.chapterId,qt.chapterName,count(q.chapterId) as total');
					    $this->db->from('questions as q');
					    $this->db->join('chapters as qt','qt.chapterId = q.chapterId');
					   // $this->db->join('subjects as sub','sub.id=q.subjectId');
					    $this->db->where('q.set_no',$set_id);
					    //$this->db->where('ov.is_bot',0);
					    $this->db->group_by('q.chapterId');
					    $this->db->order_by('q.chapterId',"asc");
	                        $query = $this->db->get()->result_array();
                   		}else{
                   			$this->db->select('qt.chapterId,qt.chapterName,count(q.chapterId) as total');
						    $this->db->from('questions_marathi as q');
						    $this->db->join('chapters_marathi as qt','qt.chapterId = q.chapterId');
						    $this->db->where('q.set_no',$set_id);
						    $this->db->group_by('q.chapterId');
						    $this->db->order_by('q.chapterId',"asc");
	                        $query = $this->db->get()->result_array();
                    	}
                        return $query; 
          		}//fetch_set_count

          		 public function fetch_subjects_for_google($set_id,$language)
                {
                 		if($language=='english'){
	                        $this->db->select('sub.id as sub_id,sub.question_type as sub_name,count(q.subjectId) as total');
						    $this->db->from('questions as q');
						    $this->db->join('subjects as sub','sub.id=q.subjectId');
						    $this->db->where('q.set_no',$set_id);
						    $this->db->group_by('sub.question_type');
						    $this->db->order_by('total',"asc");
	                        $query = $this->db->get()->result_array();
	                    }else{
	                    	$this->db->select('sub.id as sub_id,sub.question_type as sub_name,count(q.subjectId) as total');
						    $this->db->from('questions_marathi as q');
						    $this->db->join('subjects_marathi as sub','sub.id=q.subjectId');
						    $this->db->where('q.set_no',$set_id);
						    $this->db->group_by('sub.question_type');
						    $this->db->order_by('total',"asc");
	                        $query = $this->db->get()->result_array();
	                    }
                        return $query; 
                   
          		}//fetch_subjects_for_google


          
          public function fetch_question_type_breakdown($set_id,$student_id,$language)
                {
                        if($language=='english'){
	                        $this->db->select('q.set_no,q.chapterId,q.answer_option,sa.student_answer,q.subjectId,q.id');
						    $this->db->from('questions as q');
						    $this->db->join('student_answers as sa','sa.question_no = q.id');
						    $this->db->where('q.set_no',$set_id);
						    $this->db->where('sa.student_id',$student_id);
						    $this->db->order_by('q.id',"asc");
	                        $query = $this->db->get()->result_array();
                      }else{
                      		 $this->db->select('q.set_no,q.chapterId,q.answer_option,sa.student_answer,q.subjectId,q.id');
						    $this->db->from('questions_marathi as q');
						    $this->db->join('student_answers_marathi as sa','sa.question_no = q.id');
						    $this->db->where('q.set_no',$set_id);
						    $this->db->where('sa.student_id',$student_id);
						    $this->db->order_by('q.id',"asc");
	                        $query = $this->db->get()->result_array();
                      }
                        return $query; 
                   
          }//fetch_set_count
          
          public function get_set_details($set_id,$language)
                {
                	if($language=='english'){
                    	return $this->db->get_where('question_set',array('id'=>$set_id))->result_array(); 
                    }else{
                    	return $this->db->get_where('question_set_marathi',array('id'=>$set_id))->result_array(); 
                    }       
                }//end fetch_question_set_entry

          public function getChapForEachSubject($set_id,$language)
                {
                	if($language=='english'){
                	$this->db->select('q.*,qt.chapterName,qt.chapterId,sub.question_type');
				    $this->db->from('questions as q');
				    $this->db->join('chapters as qt','qt.chapterId = q.chapterId');
				    $this->db->join('subjects as sub','sub.id = q.subjectId');
				    $this->db->where('q.set_no',$set_id);
                    $query = $this->db->get()->result_array();
                }else{
                	$this->db->select('q.*,qt.chapterName,qt.chapterId,sub.question_type');
				    $this->db->from('questions_marathi as q');
				    $this->db->join('chapters_marathi as qt','qt.chapterId = q.chapterId');
				    $this->db->join('subjects_marathi as sub','sub.id = q.subjectId');
				    $this->db->where('q.set_no',$set_id);
                    $query = $this->db->get()->result_array();
                }

                    return $query; 
                
                   
                }//end fetch_question_set_entry
                
                
                
                public function countChapter($chap_id, $set_id,$language) {
        $newdata = $this->session->all_userdata();
        if ($language== "english") {
            $this->db->select('q.chapterId');
            $this->db->from('questions as q');
            $this->db->where('q.set_no', $set_id);
            $this->db->where('q.chapterId', $chap_id);
            $query = $this->db->get();
            return $query->num_rows();
        } else if ($language == "marathi") {
            $this->db->select('q.chapterId');
            $this->db->from('questions_marathi as q');
            $this->db->where('q.set_no', $set_id);
            $this->db->where('q.chapterId', $chap_id);
            $query = $this->db->get();
            return $query->num_rows();
        }
    }
          
                
 }//Admission
?>