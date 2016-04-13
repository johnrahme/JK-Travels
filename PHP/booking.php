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
function addExampleBooking(){
      storeBooking("1","3","5D");
      storeBooking("2","6","5F");
}
function printBookings(){
      $existingBookings = $_SESSION["bookings"];
      foreach($existingBookings as $booking){
          echo $booking[2];
      }
}
function removeBookings(){
    session_unset();
}

?>