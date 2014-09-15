<?php

	// Replace this with your own email address
	$to="ChuckZipkin@gmail.com";

	// Extract form contents
	$INFO = $_POST['info'];
	$name = $_POST['name'];
	$email = $_POST['email'];
		
	// Validate email address
	function valid_email($str) {
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str) ? FALSE : TRUE);
	}
	

	// Send email
	if(!empty($name) || valid_email($email)) {

		$headers =  'From: '. $email . "\r\n" .
					'Reply-To: '.$email.' '. "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		$email_subject = "Website Contact Form: " .$name;
		$message = "";
		foreach($_POST as $input => $val){
			$message .= $input . ": " . $val . "\r\n";		
		}
	
		mail($to, $email_subject, $message, $headers);
		echo "true";
	
	} else {
		echo "false";
	}
	
?>