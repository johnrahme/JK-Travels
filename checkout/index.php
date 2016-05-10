<?php
      include "../PHP/setup.php";
      //Setup title, active and number of subfolders
      setup("Checkout", "bookings","../"); 
      include $rootPath.'PHP/db_connect.php';
      include $rootPath.'PHP/database.php';
      include $rootPath.'PHP/booking/booking.php';
     include $rootPath.'layout/header.php';
     include $rootPath.'layout/navbar.php';
     include $rootPath.'PHP/user/user.php';
?>
<!-- INSERT BODY HTML HERE START-->
<div class="container clear-top" style="box-shadow: 0px 0px 5px 2px #888888; background-color: #fff; padding: 18px">
    <!-- These fields needs to be added! -->
    <!--Given Name, Family Name, Address Line 1, Address Line 2, Suburb, State, Postcode Country, email address, mobile phone, business phone and work phone -->
    <div id = "step1">
        <?php include  $rootPath."layout/step1form.php";?>
    </div>
    <div id = "step2" hidden>
        <?php include  $rootPath."layout/step2form.php";?>
    </div>
    <div id = "step3" hidden>
        <?php include  $rootPath."layout/step3.php";?>
    </div
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
//Makes popovers trigger!
$(function () {
  
   $('.popups').popover().on('click', function(e) {e.preventDefault();});
   
});
    
function show(step){
    switch (step){
        case "step1":
            $("#step1").show();
            $("#step2").hide();
            $("#step3").hide();
            break;
        case "step2":
            if(!validateStep1()){
                break;
            }
            $("#step1").hide();
            $("#step2").show();
            $("#step3").hide();
            storeUser();
            break;
        case "step2nr2":
            
            $("#step1").hide();
            $("#step2").show();
            $("#step3").hide();
            break;
        case "step3":
            if(!validateStep2()){
                break;
            }
            $("#step1").hide();
            $("#step2").hide();
            $("#step3").show();
            storePayment();
            break;
    }
}
</script>


 <script src="<?php echo $baseDir; ?>/js/ajax.js"></script>
 <script src="<?php echo $baseDir; ?>/js/user/storeUser.js"></script>
<script src="<?php echo $baseDir; ?>/js/validation.js"></script>
 <script src="<?php echo $baseDir; ?>/js/payment/storePayment.js"></script>
<!-- INSERT SCRIPTS HERE HERE END-->
<?php include $rootPath."layout/endHtml.php";?>