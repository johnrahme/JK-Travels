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
    <h2>Complete booking - stage 1 of 4 - Personal details</h2>
    <div class="progress">
      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
          <p style = "color:white"></p>
      </div>
    </div>
    <?php
    addExampleUser();
    //printUser();
    ?>
    <!-- These fields needs to be added! -->
    <!--Given Name, Family Name, Address Line 1, Address Line 2, Suburb, State, Postcode Country, email address, mobile phone, business phone and work phone -->
    <style>
        .required::after{color: #e32;
    content: ' *';};
    </style>
    <form>
        <div class = "form-group">
            <label for="firstName" id = "firstNameL" class = "required">Given name:</label>
            <input type = "text" class = "form-control" name = "firstName" id ="firstName">
        </div>
        <div class = "form-group">
            <label for="lastName" id = "lastNameL" class = "required">Family name:</label>
            <input type = "text" class = "form-control" name = "lastName" id = "lastName">
        </div>
        <div class = "form-group" class = "required">
            <label for="address1" id = "address1L" class = "required">Address 1:</label>
            <input type = "text" class = "form-control" name = "address1" id = "address1">
        </div>
        <div class = "form-group">
            <label for="address2" id = "address2L">Address 2:</label>
            <input type = "text" class = "form-control" name = "address2" id = "address2">
        </div>
        <div class = "form-group">
            <label for="suburb" id = "suburbL" class = "required">Suburb: </label>
            <input type = "text" class = "form-control" name = "suburb" id = "suburb">
        </div>
        <div class = "form-group">
            <label for="state" id = "stateL">State: </label>
            <input type = "text" class = "form-control" name = "state" id = "state">
        </div>
        <div class = "form-group">
            <label for="country" id = "countryL" class = "required" >Country: </label>
            <select class = "form-control" name = "country" id = "country">
                <option value = "notSet">
                Choose
                </option>
                <option value = "australia">
                Australia
                </option>
                <option value = "newZealand">
                New Zealand
                </option>
                <option value = "us">
                United States
                </option>
            </select>
        </div>
        <div class = "form-group">
            <label for="postCode" id = "postcodeL">Postcode: </label>
            <input type = "text" class = "form-control" name = "postCode" id = "postCode">
        </div>
        <div class = "form-group">
            <label for="email" id = "emailL" class = "required">Email address: </label>
            <input type = "text" class = "form-control" name = "email" id = "email">
        </div>
        <div class = "form-group">
            <label for="mobileP" id = "mobilePL">Mobile phone: </label>
            <input type = "text" class = "form-control" name = "mobileP" id = "mobileP">
        </div>
        <div class = "form-group">
            <label for="businessP" >Business phone: </label>
            <input type = "text" class = "form-control" name = "businessP" id = "businessP">
        </div>
        <div class = "form-group">
            <label for="workP">Work phone: </label>
            <input type = "text" class = "form-control" name = "workP" id = "workP">
        </div>
    </form>
</div>

<!-- INSERT BODY HTML HERE END-->
<?php include $rootPath."layout/footer.php";?>
<!-- INSERT SCRIPTS HERE HERE START-->
<script>
$("#country").change(function(){
    
    if($("#country").val()=="australia"){
        $("#firstNameL").addClass("required");
        $("#lastNameL").addClass("required");
        $("#address1L").addClass("required");
        $("#suburbL").addClass("required");
        $("#stateL").addClass("required");
        $("#postcodeL").addClass("required");
        $("#countyL").addClass("required");
        $("#emailL").addClass("required");
    }
    else{
        $("#stateL").removeClass("required");
        $("#postcodeL").removeClass("required");
    }   
});
    
</script>


 <script src="<?php echo $baseDir; ?>/js/ajax.js"></script>
<!-- INSERT SCRIPTS HERE HERE END-->
<?php include $rootPath."layout/endHtml.php";?>