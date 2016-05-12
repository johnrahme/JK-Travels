<?php
include("../db_connect.php");
include("../database.php");
include("booking.php");
session_start();
echo printBookingsNoDel();
?>