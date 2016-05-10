<?php
session_start();
$_SESSION["message"] = "Email has been sent to us, we will contact you shortly";
$to = "john_rahme92@hotmail.com";
$subject = "Enquiry from ".$_POST["contact-name"];
$messageString = 
    
"<html> <head></head> <body>".
    $_POST["contact-text"]." <br> Contact me on: ".$_POST["contact-email"]."</body><html>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.$_POST["contact-email"].'>' . "\r\n";
mail($to,$subject,$messageString, $headers);

header("Location:../"); /* Redirect browser */
exit();
?>