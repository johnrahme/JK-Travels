<?php 

//Session test


$_SESSION["user"] = "john";

$link = mysqli_connect("rerun.it.uts.edu.au","potiro","pcXZb(kL", "poti");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

/*if(!$link)
	die("Could not connect to Server");
mysqli_select_db("poti", $link); */


function printFlights(){
    global $link;
	$query_string = "select * from flights";
	$result = mysqli_query($link, $query_string);


	$num_rows = mysqli_num_rows($result);

	if($num_rows>0){
		while($a_row = mysqli_fetch_row($result)){
			foreach ($a_row as $key => $field) {
				print " $field ";
			}
			print "<br>"; 
		}
	}
}
function getAllFlights(){
    global $link;
	$query_string = "select * from flights";
	$result = mysqli_query($link,$query_string);


	$num_rows = mysqli_num_rows($result);

	if($num_rows>0){
		return $result;
	}
}
function getJSArrayFromQuery($query){
    global $link;
	$query_string = $query;
	$results = mysqli_query($link,$query_string);


	$num_rows = mysqli_num_rows($results);

	if($num_rows>0){
				$first = true;
               while($a_row = mysqli_fetch_row($results)){
                if(!$first){
                    echo ",";
                }
                $first = false;
                  foreach ($a_row as $key => $field) {
                    
                      print "'$field'";
                    
                  }
                }
	}
}
function getFormResults(){
    global $link;
    $from = "";
    $to = "";
    if(isset($_GET["from"])){
        $from = $_GET["from"];
    }
	if(isset($_GET["to"])){
        $to = $_GET["to"];
    }
	
	$query_string = "select * from flights WHERE from_city LIKE '%".$from."%' and to_city LIKE '%".$to."%'";

	$result = mysqli_query($link,$query_string);


	$num_rows = mysqli_num_rows($result);

	if($num_rows>0){
		return $result;
	}
}
function printResults($result){
	print "<table class='table table-striped table-bordered'>";
	print "<thead>";
		print "<tr><th>ID</th><th>From</th><th>To</th><th>Cost</th><th>Select</th></tr>";
	print "</thead>";
	print "<tbody>";
    $currentFlightId = 0;
	while($a_row = mysqli_fetch_row($result)){
		print "<tr class = 'searchable'>";
		foreach ($a_row as $key => $field) {
			print "<td>$field</td>";
            if($key == 0){
                $currentFlightId = $field;
            }
		}
		print "<td><input type='radio' name='trip' value='flightId".$currentFlightId."'></td></tr>";
		 
	}
	print "</tbody>";
	print "</table>";	

}
?>