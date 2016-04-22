<?php
session_start();
include "user.php";

storeUser($_POST['firstName'],$_POST['lastName'],$_POST['address1'],$_POST['address2'],$_POST['suburb'],$_POST['state'],$_POST['postcode'],$_POST['country'],$_POST['email'],$_POST['mobileP'],$_POST['businessP'],$_POST['workP']);

echo json_encode($_SESSION["user"]);
?>