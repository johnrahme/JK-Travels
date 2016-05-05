<?php
session_start();
include "payment.php";
include("../database.php");

storePayment($_POST["cardType"], $_POST["number"], $_POST["name"], $_POST["expMonth"], $_POST["expYear"], $_POST["secCode"]);

echo json_encode($_SESSION["payment"]);
?>