<?php
session_start();
include "booking.php";

//Check if delete all bookings
if(!empty($_POST["delete"])){
    if($_POST["delete"]=="true"){
        removeBookings();
    }
}
//Adds all bookings to the session;
if(!empty($_POST["seat1"])){
    storeBooking($_POST["flightId"], !empty($_POST["child1"]), !empty($_POST["wheel1"]), !empty($_POST["diet1"]));
}
if(!empty($_POST["seat2"])){
    storeBooking($_POST["flightId"], !empty($_POST["child2"]), !empty($_POST["wheel2"]), !empty($_POST["diet2"]));
}
if(!empty($_POST["seat3"])){
    storeBooking($_POST["flightId"], !empty($_POST["child3"]), !empty($_POST["wheel3"]), !empty($_POST["diet3"]));
}
if(!empty($_POST["seat4"])){
    storeBooking($_POST["flightId"], !empty($_POST["child4"]), !empty($_POST["wheel4"]), !empty($_POST["diet4"]));
}
if(!empty($_POST["seat5"])){
    storeBooking($_POST["flightId"], !empty($_POST["child5"]), !empty($_POST["wheel5"]), !empty($_POST["diet5"]));

}
header("Location:../bookings/"); /* Redirect browser */
exit();
?>