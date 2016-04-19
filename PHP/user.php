<?php
function storeUser($firstName,$lastName,$address1,$address2,$suburb,$state,$postCountry,$email,$mobileP,$businessP,$workP){    
    $_SESSION["user"] = array($firstName,$lastName,$address1,$address2,$suburb,$state,$postCountry,$email,$mobileP,$businessP,$workP);    
}
function addExampleUser(){
      storeUser("Jacob","Andersson","Långgatan 9","Ser nandersVäg 20","Uppsala","Uppsala St","754 25","jacob.andersson@gmail.com","0706084873","12314123123","12312312313");
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
function removeUser(){
    session_unset();
}

?>