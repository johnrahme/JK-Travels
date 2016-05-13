<?php
session_start();
$_SESSION["message"] = "Email has been sent to us, we will contact you shortly";


$to = "john.O.rahme@student.uts.edu.au";
$subject = $_POST["contact-subject"];
$messageString = 
    
"<html> <head></head> <body>".
    $_POST["contact-text"]." <br> Contact me on: ".$_POST["contact-email"]."</body><html>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.$_POST["contact-email"].'>' . "\r\n";
mail($to,$subject,$messageString, $headers);

//Confirmation email
$to2 = $_POST["contact-email"];
$subject2 = "Confirmation on contact enquire ". $_POST["contact-subject"];
$messageString2 = 
    
"<html> <head></head> <body>".
    $_POST["contact-text"]." <br> Contact me on: ".$_POST["contact-email"]."</body><html>";

$headers2 = "MIME-Version: 1.0" . "\r\n";
$headers2 .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers2 .= 'From: <NO-REPLY-JKT@jktravels.uts.edu.au>' . "\r\n";

mail($to2,$subject2,$messageString2, $headers2);

header("Location:../"); /* Redirect browser */
exit();
?>