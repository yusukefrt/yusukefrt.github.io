<?php
// Check for empty fields
if (
   empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
) {
   echo "No arguments Provided!";
   return false;
}

$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];

// Create the email and send the message
$to = 'yusuke@furuta.dev';
$email_subject = "Website Contact Form:  $name";
$email_body = "Webサイトの問い合わせフォーム経由でメッセージを受信しました。\n\n" . "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: yusuke@furuta.dev\n";
$headers .= "Reply-To: $email_address";
mail($to, $email_subject, $email_body, $headers);
return true;
?>