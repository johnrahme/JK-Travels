<?php
function storeBooking($flightId,$tickets,$chair){
    if(isset($_SESSION["bookings"])){
        $bookings = $_SESSION["bookings"];
        array_push($bookings,array($flightId,$tickets,$chair));
        $_SESSION["bookings"] = $bookings;
    }
    else{
        $bookings = array(
            array($flightId,$tickets,$chair)
        );
        $_SESSION["bookings"] = $bookings;
    }    
}

?>