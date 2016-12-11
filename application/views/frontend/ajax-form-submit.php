<?php
//$to="mahendra.vaghasia@gmail.com";
$to="drake_designer@yahoo.com";
$email	=isset($_POST['email'])?$_POST['email']:'';
$subject=isset($_POST['subject'])?$_POST['subject']:'';
$name	=isset($_POST['name'])?$_POST['name']:'';
$message=isset($_POST['message'])?$_POST['message']:'';
$error='';
if(empty($name)){
   $error='<br/>Enter name'; 
}
if(empty($email)){
   $error.='<br/>Enter email address';
}
if(empty($subject)){
   $error.='<br/>Enter subject'; 
}
if(empty($message)){
   $error.='<br/>Enter message'; 
}
$output=array();
if(empty($error)){
	// More headers
	$headers ='From: <'.$email.'>'."\r\n";
	$headers.='X-Mailer: PHP/' . phpversion()."\r\n".		
	$headers.='Content-type: text/html; charset=iso-8859-1'."\r\n";
	$headers.='MIME-Version: 1.0'."\r\n\r\n";
	if(mail($to,$subject,$message,$headers)){
		$output = array('sucess'=>true,'mess'=>'Your email sent sucessfully.');
	}else{
		$output = array('sucess'=>false,'mess'=>'Your email not sent sucessfully.');	
	
	}
}else{
	$output=array('sucess'=>false,'mess'=>"Cheeck following validation<br/>".$error);
}
echo json_encode($output);
?>