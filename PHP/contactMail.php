<?php
session_start();
$_SESSION["message"] = "Email has been sent to us, we will contact you shortly";

header("Location:../"); /* Redirect browser */
exit();
?>