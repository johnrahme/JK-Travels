<?php 


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
function getAssocFromQuery($query){
    global $link;
    $result = mysqli_query($link,$query);
    return mysqli_fetch_assoc($result);
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
		print "<td><input type='radio' name='trip' value='$currentFlightId'></td></tr>";
		 
	}
	print "</tbody>";
	print "</table>";	

}
//For old php where json encode does not exist
if (!function_exists('json_encode'))
{
  function json_encode($a=false)
  {
    if (is_null($a)) return 'null';
    if ($a === false) return 'false';
    if ($a === true) return 'true';
    if (is_scalar($a))
    {
      if (is_float($a))
      {
        // Always use "." for floats.
        return floatval(str_replace(",", ".", strval($a)));
      }
      if (is_string($a))
      {
        static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
        return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
      }
      else
        return $a;
    }
    $isList = true;
    for ($i = 0, reset($a); $i < count($a); $i++, next($a))
    {
      if (key($a) !== $i)
      {
        $isList = false;
        break;
      }
    }
    $result = array();
    if ($isList)
    {
      foreach ($a as $v) $result[] = json_encode($v);
      return '[' . join(',', $result) . ']';
    }
    else
    {
      foreach ($a as $k => $v) $result[] = json_encode($k).':'.json_encode($v);
      return '{' . join(',', $result) . '}';
    }
  }
}
?>