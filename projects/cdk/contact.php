<?php
session_start(); 
$errors = '';
if(empty($_POST['captcha']))
{
	$errors .= "\n Error: captcha is required";
}

if($_POST['captcha'] != $_SESSION['captcha']['code'])
{
	$errors .= "\n Error: incorrect captcha code";
}

if(empty($_POST['user_email']))
{
    $errors .= "\n Error: all fields are required";
}
$user_name = $_POST['user_name']; 
$user_email = $_POST['user_email'];
$user_tel = $_POST['user_tel'];
$user_address = $_POST['user_address']; 
$user_question = $_POST['user_question']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$user_email))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = 'suhel491@gmail.com';
	$email_subject = "Contact form submission from: $user_name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $user_name \n Email: $user_email \n Address \n $user_address \n Question : \n $user_question"; 
	
	$headers = "From: $to\n"; 
	$headers .= "Reply-To: $user_email";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: thanks.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>
