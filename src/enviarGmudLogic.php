<?php
date_default_timezone_set('Etc/UTC');

require_once 'PHPMailer-master/PHPMailerAutoload.php';


//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.gmail.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "leeung@casafreitas.com.br";
//Password to use for SMTP authentication
$mail->Password = "L@am0401";
//Set who the message is to be sent from
$mail->setFrom('leeung@casafreitas.com.br', 'First Last');
//Set an alternative reply-to address
$mail->addReplyTo('leeung@casafreitas.com.br', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('leeung@casafreitas.com.br', 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML("<p>teste</p>");
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
	echo "Mailer Error: " . $mail->ErrorInfo;
} else {
	echo "Message sent!";
}
