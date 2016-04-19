<?php
      include "../PHP/setup.php";
      //Setup title, active and number of subfolders
      setup("Checkout", "home","../"); 
      include $rootPath.'PHP/db_connect.php';
      include $rootPath.'PHP/database.php';
      include $rootPath.'PHP/booking.php';
     include $rootPath.'layout/header.php';
     include $rootPath.'layout/navbar.php';
     include $rootPath.'PHP/user.php';
?>
<!-- INSERT BODY HTML HERE START-->
<div class="container clear-top" style="box-shadow: 0px 0px 5px 2px #888888; background-color: #fff; padding: 18px">
    <div class="progress">
      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
          <p style = "color:white">Step 1/4</p>
      </div>
    </div>
    <?php
    addExampleUser();
    printUser();
    ?>
    <h2>Personal details</h2>
    <!-- These fields needs to be added! -->
    <!--Given Name, Family Name, Address Line 1, Address Line 2, Suburb, State, Postcode Country, email address, mobile phone, business phone and work phone -->
    <form>
        <div class = "form-group">
            <label for="firstName">Given name:</label>
            <input type = "text" class = "form-control" name = "firstName" id ="firstName">
        </div>
        <div class = "form-group">
            <label for="lastName">Family name:</label>
            <input type = "text" class = "form-control" name = "lastName" id = "lastName">
        </div>
        <div class = "form-group">
            <label for="address1">Address 1:</label>
            <input type = "text" class = "form-control" name = "address1" id = "address1">
        </div>
        <div class = "form-group">
            <label for="address2">Address 2:</label>
            <input type = "text" class = "form-control" name = "address2" id = "address2">
        </div>
        
    </form>
</div>

<!-- INSERT BODY HTML HERE END-->
<?php include $rootPath."layout/footer.php";?>
<!-- INSERT SCRIPTS HERE HERE START-->

 <script src="<?php echo $baseDir; ?>/js/ajax.js"></script>
<!-- INSERT SCRIPTS HERE HERE END-->
<?php include $rootPath."layout/endHtml.php";?>