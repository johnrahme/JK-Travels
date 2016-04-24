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
function getBookingsString(){
    $string = "";
    $existingBookings = $_SESSION["bookings"];
      foreach($existingBookings as $booking){
          //Get the current route
          $flight = getAssocFromQuery("select * FROM flights WHERE route_no = ".$booking[0]);
          
          $string = $string.$flight["from_city"]." to ".$flight["to_city"]."<br>";
          $string = $string."Price: ".$flight["price"]."<br>";
          $string = $string."Is child?: ".$booking[1];
          $string = $string."<br><br>";
          
      }
    return $string;
}
function printBookings(){
    global $baseDir;
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
          echo "<td>From ".$flight['from_city']." to ".$flight["to_city"]."</td>";
          print "<td>";
          if($booking[1]){
             echo "<i class='fa fa-child'></i> ";
          }
          if($booking[2]){
              echo "<i class='fa fa-wheelchair'></i> "; 
          }        
          if($booking[3]){
             echo "<i class='fa fa-cutlery'></i> ";
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