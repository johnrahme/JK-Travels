<?php 
session_start();
include("../database.php");
echo json_encode($_SESSION["user"]);
?>