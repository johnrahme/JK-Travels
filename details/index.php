<?php
      include "../PHP/setup.php";
      //Setup title, active and number of subfolders
      setup("Contact", "search","../"); 

        if(!isset($_POST['trip'])){
        header("Location:".$baseDir); /* Redirect browser */
        exit();
       }
      include $rootPath.'PHP/db_connect.php';
      include $rootPath.'PHP/database.php';
      include $rootPath.'PHP/booking/booking.php';
      include $rootPath.'layout/header.php';
      include $rootPath.'layout/navbar.php';
?>
<!-- INSERT BODY HTML HERE START-->
<div class="container clear-top" style="box-shadow: 0px 0px 5px 2px #888888; background-color: #fff; padding: 18px">
        

    <?php
    $result = mysqli_query($link, "select * FROM flights WHERE route_no = ".$_POST['trip']);
    $flightArray = mysqli_fetch_assoc($result);
    ?>
    <div class = "row">
   
        <div class = col-xs-5 id="fromDiv">
            <h2 id="fromLabel" ><?php echo $flightArray['from_city']; ?></h2>           
        </div>
        <div class = col-xs-2>
            <h2 id="fromLabel" style = "text-align:center;" >To</h2>
        </div>        
        <div class = "col-xs-5" id="toDiv">
            <h2 id="toLabel" style="text-align:right;"> <?php echo $flightArray['to_city']; ?></h2>        
            
        </div>
    </div>
    <img id="book" src="<?php echo $baseDir; ?>/img/plane.png" alt="" width="100" height="70"
  style="position: relative; left: 10px;">    
    
    <form method = "post" action = "<?php echo $baseDir; ?>/PHP/booking/storeBooking.php">
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Child</th>
                    <th>Wheelchair</th>
                    <th>Special Diet</th>
                </tr>
            </thead>
            <tbody>
                <input type = "hidden" name="flightId" value = "<?php echo $flightArray['route_no'] ?>">
                <tr id = "trSeat1">
                    <td>Seat 1 <input type = "checkbox" name = "seat1" id = "seat1"></td>
                    <td><input type = "checkbox" name = "child1"></td>
                    <td><input type = "checkbox" name = "wheel1"></td>
                    <td><input type = "checkbox" name = "diet1"></td>
                </tr>
                <tr id = "trSeat2">
                    <td>Seat 2 <input type = "checkbox" name = "seat2" id = seat2></td>
                    <td><input type = "checkbox" name = "child2"></td>
                    <td><input type = "checkbox" name = "wheel2"></td>
                    <td><input type = "checkbox" name = "diet2"></td>
                </tr>
                <tr id = "trSeat3">
                    <td>Seat 3 <input type = "checkbox" name = "seat3" id = seat3></td>
                    <td><input type = "checkbox" name = "child3"></td>
                    <td><input type = "checkbox" name = "wheel3"></td>
                    <td><input type = "checkbox" name = "diet3"></td>
                </tr>
                <tr id = "trSeat4">
                    <td>Seat 4 <input type = "checkbox" name = "seat4" id = seat4></td>
                    <td><input type = "checkbox" name = "child4"></td>
                    <td><input type = "checkbox" name = "wheel4"></td>
                    <td><input type = "checkbox" name = "diet4"></td>
                </tr>
                <tr id = "trSeat5">
                    <td>Seat 5 <input type = "checkbox" name = "seat5" id = seat5></td>
                    <td><input type = "checkbox" name = "child5"></td>
                    <td><input type = "checkbox" name = "wheel5"></td>
                    <td><input type = "checkbox" name = "diet5"></td>
                </tr>
            </tbody>
        </table>
        <div class = "row" style= "margin: auto; max-width: 300px;">
         <div class = "col-md-12">      
             <div class="form-group">
                <button id="addBooking" type = "submit" class = "btn btn-lg btn-primary" >
                Add to bookings 
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true">
                </button>
            </div>
          </div>
        </div>        
    </form>
    <h2 id = "dispSeats">Number of seats: </h2>
</div>


<!-- INSERT BODY HTML HERE END-->
<?php include $rootPath."layout/footer.php";?>
<!-- INSERT SCRIPTS HERE HERE START-->
<script>
    var loadValueArray;
    function updateCheckedSeats(){
        var loadValue1 = $("#seat1").prop( "checked");
        var loadValue2 = $("#seat2").prop( "checked");
        var loadValue3 = $("#seat3").prop( "checked");
        var loadValue4 = $("#seat4").prop( "checked");
        var loadValue5 = $("#seat5").prop( "checked");
        loadValueArray = [loadValue1, loadValue2, loadValue3, loadValue4, loadValue5];
    }
    function isAnySeatSelected(){
        updateCheckedSeats();
        for (i= 0; i<5 ; i++){
            if(loadValueArray[i]){
                return true;
            }
        }
        return false;
    }
    updateCheckedSeats();
    
    var trObjects = [$( "#trSeat1" ),$( "#trSeat2" ), $( "#trSeat3" ), $( "#trSeat4" ), $( "#trSeat5" )];
    var nrOfSeats = 0;
    
    for(i = 0; i<5; i++){
       
        if(loadValueArray[i]) {
         trObjects[i].find( "input" ).slice(1).removeAttr("disabled"); 
            $("#addBooking").removeAttr("disabled");
            nrOfSeets++;
        }
        else{
         trObjects[i].find( "input" ).slice(1).attr("disabled","disabled");
            $("#addBooking").attr("disabled","disabled");
        }
        
             
    }
    $("#dispSeats").html("Number of seats: "+nrOfSeats);
    
    $.each( trObjects, function( key, value ) {
        value.find("input").first().change(function() {
        if(this.checked) {
         value.find( "input" ).slice(1).removeAttr("disabled"); 
         $("#addBooking").removeAttr("disabled");
        nrOfSeats++;
         $("#dispSeats").html("Number of seats: "+nrOfSeats);
        }
        else{
        nrOfSeats--;
         value.find( "input" ).slice(1).attr("disabled","disabled");
        if(!isAnySeatSelected()){
                $("#addBooking").attr("disabled","disabled");
         }     
        $("#dispSeats").html("Number of seats: "+nrOfSeats);
            
        }
    })
    });
    
    
    
        
   

</script>
  <script src="<?php echo $baseDir; ?>/js/animatePlane.js"></script>

<!-- INSERT SCRIPTS HERE HERE END-->
<?php include $rootPath."layout/endHtml.php";?>