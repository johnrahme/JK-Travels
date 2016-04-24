<?php
function storePayment($cardType, $number, $name, $expMonth,$expYear,$secCode){
    $_SESSION["payment"] = array($cardType, $number, $name, $expMonth, $expYear, $secCode);
 
}
function addExamplePayment(){
      storeBooking("visa",124123124,"john rahme",10,2018, 342);
}
function printPayment(){
    global $baseDir;
    if(isset($_SESSION["payment"])){
    
     foreach($_SESSION["payment"] as $key => $attribute){
         print "$attribute <br>";
     }
    }
    
    else{
        echo "No payment registered!";
    }
}
function removePayment(){
    session_unset();
}

?>