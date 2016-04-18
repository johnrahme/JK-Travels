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
    $sum = 0;
    //Print the table if bookings is set
    print "<table class='table table-striped table-bordered'>";
	print "<thead>";
    print "<tr><th>Route</th><th>Specifications</th><th>Cost</th></tr>";
	print "</thead>";
	print "<tbody>";    
    
    $existingBookings = $_SESSION["bookings"];
      foreach($existingBookings as $booking){
          //Get the current route
          $flight = getAssocFromQuery("select * FROM flights WHERE route_no = ".$booking[0]);
          print "<tr>";
          print "<td>$booking[0]</td>";
          print "<td>";
          if($booking[1]){
             echo "Child <br>";
          }
          if($booking[2]){
              echo "Wheelchair <br>";
          }        
          if($booking[3]){
             echo "Special diet <br>"; 
          } 
          print "</td>";
         echo '<td>'.$flight["price"]."</td";
         print "</tr>"; 
          $sum +=$flight["price"];
      } 
        
    print "</tbody>";

	print "</table>";
    print "<h3>Total cost will be $sum</h3>";
    }
    
    else{
        echo "You got no bookings!";
    }
}
function removeBookings(){
    session_unset();
}

?>