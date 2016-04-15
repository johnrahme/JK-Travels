<?php
      include "../PHP/setup.php";
      //Setup title, active and number of subfolders
      setup("Contact", "contact","../"); 
      include $rootPath.'PHP/db_connect.php';
      include $rootPath.'PHP/database.php';
      include $rootPath.'PHP/booking.php';
     include $rootPath.'layout/header.php';
     include $rootPath.'layout/navbar.php';
?>
<!-- INSERT BODY HTML HERE-->

<div class="container clear-top" style="box-shadow: 0px 0px 5px 2px #888888; background-color: #fff; padding: 18px">


</div>

<?php 
    include $rootPath."layout/footer.php";
?>

<!-- INSERT SCRIPTS HERE HERE-->




<?php
    include $rootPath."layout/endHtml.php";
?>