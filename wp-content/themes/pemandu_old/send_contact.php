<?php
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
$age=$_POST['age'];
$location=$_POST['location'];
$to = "feedback.gtp@pemandu.gov.my";
$subject = "Contact Form on GTP Feedback Page";
 
$body = "This is a message from the contact form located on the Feedback page at the address: http://pemandu.gov.my/gtp.\n\n Sent By: $name\n Their e-mail address: $email\n Their age:\n $age\n Their location:\n $location\n Their message:\n $message";

echo "Data has been submitted to $to!";
mail($to, $subject, $body);
?>
