<?php
      include 'PHP/setup.php';
      setup("First page", "home", ""); 
      include $rootPath.'PHP/db_connect.php';
      include $rootPath.'PHP/database.php';
      include $rootPath.'PHP/booking.php';
      //$baseDir = "/public_html";
      //For server
      //$baseDir = "/~jorahme";
     include $rootPath.'layout/header.php';

      $allFlights = getFormResults();
    ?>
    
    
      <!-- Static navbar -->
    <?php
      include $rootPath.'layout/navbar.php';
     ?>
     <div class="container clear-top" style="box-shadow: 0px 0px 5px 2px #888888; background-color: #fff; padding: 18px">
     <div class="jumbotron">
        <h1>Welcome to JK travels!</h1>
        <p>Please click below to get going and book some flights!!</p>
        <p>
          <!--START SEARCH FORM-->
          <form method = "GET" action = "<?php echo $baseDir; ?>">
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
                <input id="submitSearch" type = "submit" class = "btn btn-lg btn-primary" value = "Search for flights »" >
              </div>                                         
          </form>
          <!--END SEARCH FORM-->
        </p>
      </div>


      <input id = "search" placeholder = "Filter..." class = "form-control" name = "search" type = "text">
      <br>
     <div class = "table-responsive">
      <?php
        printResults($allFlights);
      ?>
     </div>
      
      <form method = "POST" action = "<?php echo $baseDir; ?>/configure">
            <div class = "row">
              <div class = "col-md-6">      
                <div class="form-group">
                    <input id="submitFlight" type = "submit" class = "btn btn-lg btn-primary disabled" value = "Continue" >
                </div>
              </div>
          </div>
      </form>
      
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
        //Check if a radiobutton has been selected
        $("input[name='trip']").change(function(){
            $("#submitFlight").removeClass("disabled");
        });
        
    </script>

<?php include $rootPath."layout/endHtml.php" ?>