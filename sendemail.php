<?php
	header('Content-type: application/json');
	$status = array(
		'type'=>'success',
		'message'=>'Thanks! Your Email has been sent!'
	);

    $name = @trim(stripslashes($_POST['name'])); 
    $subject = @trim(stripslashes($_POST['subject']));
    $email = @trim(stripslashes($_POST['email']));  
    $message = @trim(stripslashes($_POST['message'])); 

    $email_from = $email;
    $email_to = 'suhel491@gmail.com';

    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

    $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

    echo json_encode($status);
    die; 