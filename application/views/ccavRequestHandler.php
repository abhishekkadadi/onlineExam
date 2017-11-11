<html>
<head>
<title> Non-Seamless-kit</title>
</head>
<body>
<center>

<?php include(APPPATH.'helpers/Crypto.php')?>
<?php 
      
        $newdata = $this->session->all_userdata();
        $name=$newdata['username'];
        $id=$newdata['id'];
        $email=$newdata['email']; 
        $merchant_id="128243";
        $currency="INR";
        $redirect_url= site_url('CcavRequestHandler/enroll');
	error_reporting(0);	
	$merchant_data='';
	$working_key='AD607144FAA143562789B6F224E9FB49';//Shared by CCAVENUES
	$access_code='AVLJ69EC84BW79JLWB';//Shared by CCAVENUES	
//	foreach ($_POST as $key => $value){
//		$merchant_data.=$key.'='.$value.'&';
//	}
      
        $merchant_data.='currency'.'='.$currency.'&';
        $merchant_data.='merchant_id'.'='.$merchant_id.'&';
        $merchant_data.='billing_name'.'='.$name.'&';
        $merchant_data.='billing_email'.'='.$email.'&';
        $merchant_data.='amount'.'='.$Amount.'&';
	$merchant_data.='redirect_url'.'='.$redirect_url.'&';
	$merchant_data.='order_id'.'='.rand().'&';
	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
?>
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>

