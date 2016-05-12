<?php
function storeUser($firstName,$lastName,$address1,$address2,$suburb,$state,$postcode,$country,$email,$mobileP,$businessP,$workP){    
    $_SESSION["user"] = array($firstName,$lastName,$address1,$address2,$suburb,$state,$postcode,$country,$email,$mobileP,$businessP,$workP);    
}
function addExampleUser(){
      storeUser("Jacob","Andersson","Långgatan 9","Ser nandersVäg 20","Uppsala","Uppsala St","754 25","Sweden","jacob.andersson@gmail.com","0706084873","12314123123","12312312313");
}
function printUser(){
    global $baseDir;
    if(isset($_SESSION["user"])){
    
     foreach($_SESSION["user"] as $key => $attribute){
         print "$attribute <br>";
     }
    }
    
    else{
        echo "No user registered!";
    }
}
function printUserTable(){
    $returnString = "";
    if(isset($_SESSION["user"])){
    
     foreach($_SESSION["user"] as $key => $attribute){
         $returnString = $returnString."$attribute <br>";
     }
    }
    
    else{
        $returnString = $returnString. "No user registered!";
    }
    return $returnString;
    
}
function removeUser(){
    session_unset();
}

?>