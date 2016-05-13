<?php
      include "../PHP/setup.php";
      //Setup title, active and number of subfolders
      setup("About", "about","../"); 
      include $rootPath.'PHP/db_connect.php';
      include $rootPath.'PHP/database.php';
      include $rootPath.'PHP/booking/booking.php';
     include $rootPath.'layout/header.php';
     include $rootPath.'layout/navbar.php';
?>
<!-- INSERT BODY HTML HERE START-->
<div class="container clear-top" style="box-shadow: 0px 0px 5px 2px #888888; background-color: #fff; padding: 18px">
    <h2>About us</h2>
    JK Travels number one priority is booking flights at the best price possible while providing excellent customer service. Our booking team are trained to assist in all of your flight travel needs so you can have a memorable holiday experience.
    <br>

    We offer 24 hour customer support and can be contacted at the following:
        <br>

    Kim     123456789
    <br>
    John    225689215
</div>

<!-- INSERT BODY HTML HERE END-->
<?php include $rootPath."layout/footer.php";?>
<!-- INSERT SCRIPTS HERE HERE START-->


<!-- INSERT SCRIPTS HERE HERE END-->
<?php include $rootPath."layout/endHtml.php";?>