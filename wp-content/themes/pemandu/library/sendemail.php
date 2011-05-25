<?php 
include("myemailclass.php");
// send email
$confirm_to= stripslashes('askar_khn@yahoo.com,askar.khn@gmail.com,mshahid_kt@yahoo.com,mshahid_ph@hotmail.com');
$confirm_from = stripslashes($mom_usr_email);

sendemail($confirm_to, $cc, $confirm_from, $confim_newslettersub, $confim_newslettermessage, $filename, $filepath);
?>