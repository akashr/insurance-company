<?php

require_once('class.phpgmailer.php');

function send_init($agent_email_id, $agent_name, $subject, $cust_email,$body ) {
	$mail = new PHPGMailer();
	$mail->Username = 'abrar2002as@gmail.com';
	$mail->Password = 'abrarnitk';
	$mail->From = $agent_email_id;
	$mail->FromName = $agent_name;
	$mail->Subject = $subject;
	$mail->AddAddress($cust_email);
	$mail->Body = $body;
	$mail->Send();
}
?>


