<?php
      include "../PHP/setup.php";
      //Setup title, active and number of subfolders
      setup("Contact", "bookings","../"); 
      include $rootPath.'PHP/db_connect.php';
      include $rootPath.'PHP/database.php';
      include $rootPath.'PHP/booking/booking.php';
     include $rootPath.'layout/header.php';
     include $rootPath.'layout/navbar.php';
?>
<!-- INSERT BODY HTML HERE START-->
<div class="container clear-top" style="box-shadow: 0px 0px 5px 2px #888888; background-color: #fff; padding: 18px">
    <h2>All booked flights</h2>
    <form id = "removeBooking" action = "<?php echo $baseDir;?>/PHP/booking/deleteBooking.php" method = "post">
        <div class = "bookingContainer" id = "bookCont">
        <?php
        printBookings();
        ?>
        </div>       
    </form>
    <a href = "<?php echo $baseDir;?>/search"><button class = "btn btn-primary">Book more flights</button></a>
    <?php if(isset($_SESSION["bookings"])&&count($_SESSION["bookings"])!=0){?>
    <a href = "<?php echo $baseDir;?>/checkout/"><button class = "btn btn-success">Proceed to checkout</button></a>
    <button class = "btn btn-danger" type = "submit" form="removeBooking" onclick = "return checkDeleteSelected()">Clear selected flights</button>
    <button class = "btn btn-danger" type = "submit" form="removeAllBookings">Clear All flights</button>
    <form id = "removeAllBookings" action = "<?php echo $baseDir;?>/PHP/booking/deleteAllBookings.php" method = "post">
    </form>
    <?php } ?>
    
    
</div>

<!-- INSERT BODY HTML HERE END-->
<?php include $rootPath."layout/footer.php";?>
<!-- INSERT SCRIPTS HERE HERE START-->
<script>
function checkDeleteSelected(){
    var result = false;
    $("input[type=checkbox]").each(function(){
       if(this.checked){
           result =  true;
       } 
    });
    if(!result){
            alert("No flights where selected for deletion");
    }
    return result;
}
</script>

<!-- INSERT SCRIPTS HERE HERE END-->
<?php include $rootPath."layout/endHtml.php";?>