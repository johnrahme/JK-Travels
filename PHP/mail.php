<?php
      include "setup.php";
      //Setup title, active and number of subfolders
      setup("Mail", "contact","../"); 
      include $rootPath.'PHP/db_connect.php';
      include $rootPath.'PHP/database.php';
      include $rootPath.'PHP/booking/booking.php';
      include $rootPath.'PHP/mailHelper.php';

$to = "john.rahme.se@gmail.com";
$subject = "Booking Confirmation JK travels";
$user = $_SESSION["user"];
$booking = $_SESSION["bookings"];

$messageString = printMail($user);

$message = "
<h1>
Hi ".$user[0]." ".$user[1].
"!</h1>
You have ordered the following things: <br>

".getBookingsString()
;

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <NO-REPLY-JKT@jktravels.uts.edu.au>' . "\r\n";
//Uncommented to not get spammed...


mail($to,$subject,$messageString,$headers);


header("Location:../checkout/confirmation.php"); /* Redirect browser */
exit();
?>