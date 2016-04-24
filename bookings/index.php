<?php
      include "../PHP/setup.php";
      //Setup title, active and number of subfolders
      setup("Contact", "contact","../"); 
      include $rootPath.'PHP/db_connect.php';
      include $rootPath.'PHP/database.php';
      include $rootPath.'PHP/booking/booking.php';
     include $rootPath.'layout/header.php';
     include $rootPath.'layout/navbar.php';
?>
<!-- INSERT BODY HTML HERE START-->
<div class="container clear-top" style="box-shadow: 0px 0px 5px 2px #888888; background-color: #fff; padding: 18px">
    
    <div class = "bookingContainer" id = "bookCont">
    <?php
    printBookings();
    ?>
    </div>
    
    <form id = "removeBooking" action = "<?php echo $baseDir;?>/PHP/booking/storeBooking.php" method = "post">
        <input type = "hidden" name ="delete" value="true">    
    </form>
    <a href = "<?php echo $baseDir;?>"><button class = "btn btn-primary">Book more flights</button></a>
    <a href = "<?php echo $baseDir;?>/checkout/"><button class = "btn btn-success">Proceed to checkout</button></a>
    <button class = "btn btn-danger" type = "submit" form="removeBooking">Clear all booked flights</button>
</div>

<!-- INSERT BODY HTML HERE END-->
<?php include $rootPath."layout/footer.php";?>
<!-- INSERT SCRIPTS HERE HERE START-->

<!-- INSERT SCRIPTS HERE HERE END-->
<?php include $rootPath."layout/endHtml.php";?>