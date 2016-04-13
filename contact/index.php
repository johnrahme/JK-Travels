<?php
      include "../PHP/setup.php";
      setup("Contact", "contact","../"); 
      include $rootPath.'PHP/db_connect.php';
      include $rootPath.'PHP/database.php';
      include $rootPath.'PHP/booking.php';

      //For server
      //$baseDir = "/~jorahme";
     include $rootPath.'layout/header.php';
     include $rootPath.'layout/navbar.php';
?>


<?php 
    include $rootPath."layout/footer.php";
?>

<?php
    include $rootPath."layout/endHtml.php";
?>