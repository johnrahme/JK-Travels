<?php
session_start();
include "booking.php";

//Check if delete all bookings
    unset($_SESSION["bookings"]);

header("Location:../../bookings/"); /* Redirect browser */
exit();
?>