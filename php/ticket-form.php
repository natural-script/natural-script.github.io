<?php
// Variables
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$plan = trim($_POST['plan']);


if( isset($name) && isset($email) ) {

	// Avoid Email Injection and Mail Form Script Hijacking
	$pattern = "/(content-type|bcc:|cc:|to:)/i";
	if( preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $plan) ) {
		exit;
	}

	// Email will be send
	$to = "mailexample62@gmail.com"; // Change with your email address
	$sub = "$plan for ENO Conf"; // You can define email subject
	// HTML Elements for Email Body
	$body = <<<EOD
	<strong>Name:</strong> $name <br>
	<strong>Email:</strong> <a href="mailto:$email?subject=feedback" "email me">$email</a> <br> <br>
	<strong>Seat Plan:</strong> $plan <br>
EOD;
//Must end on first column
	
	$headers = "From: $name <$email>\r\n";
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// PHP email sender
	mail($to, $sub, $body, $headers);
}


?>
