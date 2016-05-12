<?php 
session_start();
include("../database.php");
include("user.php");
echo printUserTable();
?>