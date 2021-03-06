<?php
      include '../PHP/setup.php';
      setup("First page", "search", "../"); 
      include $rootPath.'PHP/db_connect.php';
      include $rootPath.'PHP/database.php';
      include $rootPath.'PHP/booking/booking.php';
      //$baseDir = "/public_html";
      //For server
      //$baseDir = "/~jorahme";
     include $rootPath.'layout/header.php';

      $allFlights = getFormResults();
      $printFlights = isset($_GET["from"])&&isset($_GET["to"]);
    ?>
    
    
      <!-- Static navbar -->
    <?php
      include $rootPath.'layout/navbar.php';
     ?>
     <div class="container clear-top" style="box-shadow: 0px 0px 5px 2px #888888; background-color: #fff; padding: 18px">
         <?php if(isset($_SESSION["message"])) {
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
        }
         
         
         ?>
     <div class="jumbotron">
        <h2>Search flights below</h2>
        <p>
          <!--START SEARCH FORM-->
          <form method = "GET" action = "<?php echo $baseDir; ?>/search">
            <div class = "row">
              <div class = "col-md-6">      
                <div class="form-group">
                    <label for="searchAutoCompleteFrom">From:</label>
                    <input id="searchAutoCompleteFrom" class = "form-control" name="from" >
                </div>
              </div>
              <div class = "col-md-6">
                <div class="form-group">
                    <label for="searchAutoCompleteTo">To:</label>
                    <input id="searchAutoCompleteTo" type = "text" class = "form-control" name="to">
                </div>
              </div>
            </div>
              <div class="form-group">
                <input id="submitSearch" onclick="return checkForInput()" type = "submit" class = "btn btn-lg btn-primary" value = "Search for flights »" >
              </div>                                         
          </form>
          <!--END SEARCH FORM-->
        </p>
      </div>

        <?php
         //Check if results should be printed
         if($printFlights){
        ?>
      <input id = "search" placeholder = "Filter..." class = "form-control" name = "search" type = "text">
      <br>
      <form action = "<?php echo $baseDir; ?>/details/" method = "post" >
          <input type = "hidden" value="test" name="test">
         <div class = "table-responsive">
          <?php
            printResults($allFlights);
          ?>
         </div>
         <div class = "row" style= "margin: auto; max-width: 300px;">
             <div class = "col-md-6">      
                 <div class="form-group">
                    <button id="submitFlight" type = "submit" class = "btn btn-lg btn-primary disabled" onClick = "return flightSelected()">
                    Make booking for selected flight
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true">
                    </button>
                </div>
              </div>
         </div>
      </form>
      
    <?php }?>
      <!-- Main component for a primary marketing message or call to action -->
      

    </div>
    <?php 
    include $rootPath."layout/footer.php";
    ?>
    <script>
    (function ($) {


    $('#search').keyup(function () {


        var rex = new RegExp($(this).val(), 'i');
        $('.searchable').hide();
        $('.searchable').filter(function () {
            return rex.test($(this).text());
        }).show();

    });

    $(function() {
            var availableFromLocations = [
               <?php 
                getJSArrayFromQuery("select from_city from flights GROUP BY from_city");
                ?>
            ];
             var availableToLocations = [
               <?php 
                getJSArrayFromQuery("select to_city from flights GROUP BY to_city");
                ?>
            ];           
            $("#searchAutoCompleteFrom" ).autocomplete({
               source: availableFromLocations,
               autoFocus: true
            });
            $("#searchAutoCompleteTo" ).autocomplete({
               source: availableToLocations,
               autoFocus: true
            });
         });

}(jQuery));
    </script>
    <script>
        function flightSelected(){
            if($("#submitFlight").hasClass("disabled")){
                alert("No flight selected!");
                return false;
            }
            return true;
        }
        //Check if a radiobutton has been selected
        $("input[name='trip']").change(function(){
            document.getElementById("submitFlight").disabled = false;
            $("#submitFlight").removeClass("disabled");
        });
        if($("input[name='trip']").is(':checked')){
            document.getElementById("submitFlight").disabled = false;
            $("#submitFlight").removeClass("disabled");
        }
        $("#submitFlight").hover(function(){
           
        });
        
        //Check if any flight has been searched for
        function checkForInput(){
            if($("#searchAutoCompleteFrom").val()==""&&$("#searchAutoCompleteTo").val()==""){
                alert("No cities selected!")
                return false;
            }
            return true;
        }
        
    </script>

<?php include $rootPath."layout/endHtml.php" ?>