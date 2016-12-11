<?php

echo $name     = $_POST['name']; 
echo $subject  = $_POST['subject'];
echo $email    = $_POST['email'];
echo $message  = $_POST['message'];

exit;


$mailto   = "me@aishamandel.com"; // Enter your mail addres here. 
$name     = $_POST['name']; 
$subject  = $_POST['subject'];
$email    = $_POST['email'];
$message  = $_POST['message'];

$html = "";
		$html .= "Name: " . $name . "<br>\n";
		$html .= "Email: " . $email . "<br>\n";
		$html .= "Message: " . $message . "<br>\n";
		$html .= "subject: " . $subject . "<br>\n";
		
		$headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\n";
		$headers .= "From: " . $name."<". $email .">\r\n";
		$headers .= "Reply-To: " .  $email . "\r\n";
				
		mail($to, $subject, $html, $headers);	

?>