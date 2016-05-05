<?php
      include "../PHP/setup.php";
      //Setup title, active and number of subfolders
      setup("Contact", "contact","../"); 
      include $rootPath.'PHP/db_connect.php';
      include $rootPath.'PHP/database.php';
      include $rootPath.'PHP/booking/booking.php';
        if(!isset($_SESSION['user'])){
            header("Location:../"); /* Redirect browser */
            exit();
        }


     include $rootPath.'layout/header.php';
     include $rootPath.'layout/navbar.php';
?>
<!-- INSERT BODY HTML HERE START-->

<div class="container clear-top" style="box-shadow: 0px 0px 5px 2px #888888; background-color: #fff; padding: 18px">
    
    <h3 align = "center">    Thank you! <?php echo $_SESSION['user'][0]." ".$_SESSION['user'][1]; ?> your booking has been completed and a confirmation email has been sent to your email address.</h3>
    <br>
    <a href = "<?php echo $rootPath;?>"><button class = "btn btn-primary">Homepage</button></a>
</div>


<?php session_unset();?>
<!-- INSERT BODY HTML HERE END-->
<?php include $rootPath."layout/footer.php";?>
<!-- INSERT SCRIPTS HERE HERE START-->


<!-- INSERT SCRIPTS HERE HERE END-->
<?php include $rootPath."layout/endHtml.php";?>