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
    $returnString .= '<span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$_SESSION["user"][0]." ". $_SESSION["user"][1];
    //address
    $state = "";
    $postcode = "";
    $address2 = "";
    if($_SESSION["user"][3]!=""){
        $address2 = " ".$_SESSION["user"][3];
    }
    if($_SESSION["user"][5]!=""){
        $state = " ".$_SESSION["user"][5]."";
    }
    if($_SESSION["user"][6]!=""){
        $postcode = " ".$_SESSION["user"][6];
    }
    
    //Print address
    $returnString .= '<br><span class="glyphicon glyphicon-home" aria-hidden="true"></span> ';
    $returnString .= $_SESSION["user"][2].$address2.$state.$postcode.", ".$_SESSION["user"][7];
        
    //Print mail
    $returnString .= '<br><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> ';  
    $returnString .= $_SESSION["user"][8];
    
    //Print phones
    if($_SESSION["user"][9]!=""){
        $returnString .= '<br><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> ';
        $returnString .= $_SESSION["user"][9];
    }
    if($_SESSION["user"][10]!=""){
        $returnString .= '<br><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> ';
        $returnString .= $_SESSION["user"][10];
    }
    if($_SESSION["user"][11]!=""){
        $returnString .= '<br><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> ';
        $returnString .= $_SESSION["user"][11];
    }        
     /*
     foreach($_SESSION["user"] as $key => $attribute){
         $returnString = $returnString."$attribute <br>";
     }*/
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