<?php
function storeBooking($flightId,$child,$wheel,$diet){
    
    if(isset($_SESSION["bookings"])){
        $bookings = $_SESSION["bookings"];
        array_push($bookings,array($flightId,$child,$wheel,$diet));
        $_SESSION["bookings"] = $bookings; 
    }
    else{
        $bookings = array(
            array($flightId,$child,$wheel,$diet)
        );
        $_SESSION["bookings"] = $bookings;
    }    
}
function addExampleBooking(){
      storeBooking("1",true,true,false);
      storeBooking("2",true,false,true);
}
function printBookings(){
    if(isset($_SESSION["bookings"])){
    $existingBookings = $_SESSION["bookings"];
      foreach($existingBookings as $booking){
          echo "BookingID: ".$booking[0]."<br>";
          if($booking[1]){
             echo "Child <br>";
          }
          if($booking[2]){
              echo "Wheelchair <br>";
          }        
          if($booking[3]){
             echo "Special diet <br>"; 
          } 
          echo "<br>";
      } 
    }
    else{
        echo "You got no bookings!";
    }
}
function removeBookings(){
    session_unset();
}

?>