<?php
      include "setup.php";
      //Setup title, active and number of subfolders
      setup("Mail", "contact","../"); 
      include $rootPath.'PHP/db_connect.php';
      include $rootPath.'PHP/database.php';
      include $rootPath.'PHP/booking/booking.php';

$to = "john.rahme.se@gmail.com";
$subject = "Booking Confirmation";
$user = $_SESSION["user"];
$booking = $_SESSION["bookings"];

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
$headers .= 'From: <NO-REPLY@jrstravels.uts.edu.au>' . "\r\n";

mail($to,$subject,$message,$headers);


header("Location:../checkout/confirmation.php"); /* Redirect browser */
exit();
?>