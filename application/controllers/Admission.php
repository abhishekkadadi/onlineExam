<?php



class Admission extends CI_Controller {
	
	public function enroll() {
	$result=array();
	 	//$this->load->helper('form');
    	 //$form_data = $this->input->post();
    	// echo $_POST["name"];
    	//$this->load->view('index');
    	 
    	/*  $name=$this->input->post("name");
    	  $email=$this->input->post("email");
    	  $phone = $this->input->post("phone");
    	  $address = $this->input->post("address");
    	  $type_of_course = $this->input->post("type_of_course");
    	  $this->load->model('Admission_model');
    	  if($this->Admission_model->insert_entry($name,$email,$phone,$address,$type_of_course)){
		  	echo '1';
		  }else{
		  	echo '0';
		  }
    	   */
    	   $this->load->helper('crypto_helper');
    	   
    	   $workingKey='69969BEB6488004FD2B841A9BFEE52DE';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
	}
	
	if($order_status==="Success"){
    	 for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($information[0]=='amount'){$payment_amount=$information[1];}
		if($information[0]=='billing_email'){$email=$information[1];}
		if($information[0]=='delivery_name'){$name=$information[1];}
		if($information[0]=='delivery_address'){$address=$information[1];}
		if($information[0]=='merchant_param1'){$type_of_course=$information[1];}
		if($information[0]=='billing_tel'){$phone=$information[1];}
		if($information[0]=='order_status'){$payment_ack=$order_status;}
		if($information[0]=='order_id'){$orderId=$information[1];}
		
	}
	$result['name']=$name;
	$result['orderId']=$orderId;
	$result['courseType']=$type_of_course;
	$result['email']=$email;
	$this->load->model('Admission_model');
	 if($this->Admission_model->insert_entry($name,$email,$phone,$address,$type_of_course,$payment_ack,$payment_amount)){
		  	$this->load->view('thankyou',$result);
		  }else{
		  	$this->load->view('failed');
		  }
	
}else{
$this->load->view('failed');

}
    }
	
	
}//controller ends