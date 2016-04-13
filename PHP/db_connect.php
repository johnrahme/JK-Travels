<?php

//Server
//$link = mysqli_connect("rerun","potiro","pcXZb(kL", "poti");
$link = mysqli_connect("localhost","root","root", "poti");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?> 