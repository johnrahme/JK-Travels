<?php
session_start();
include "booking.php";

//Check if delete all bookings
if(isset($_POST['bookings'])){
    foreach($_POST['bookings'] as $id){
        removeBooking($id);
    }
}
header("Location:../../bookings/"); /* Redirect browser */
exit();
?>