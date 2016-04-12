<?php
      include 'PHP/database.php';
      include 'PHP/booking.php';
      storeBooking("1","3","5D");
      storeBooking("2","6","5F");
      
      $baseDir = "/public_html";
      //For server
      //$baseDir = "/~jorahme";
      $existingBookings = $_SESSION["bookings"];
      foreach($existingBookings as $booking){
          echo $booking[2];
      }
    ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>JK Travels </title>

    <!-- Bootstrap -->
    <link href="<?php echo $baseDir; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--
    
    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">

    -->
      
    <link href="<?php echo $baseDir; ?>/css/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo $baseDir; ?>/css/jquery-ui.theme.css" rel="stylesheet">
    <link href="<?php echo $baseDir; ?>/css/jquery-ui.theme.structure.css" rel="stylesheet">
                                                            

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body background = "<?php echo $baseDir; ?>/img/background.jpg">

      <!-- Static navbar -->
    <?php
      $active = "home";
      include 'layout/navbar.php';
      $allFlights = getFormResults();
     ?>
     <div class="container clear-top" style="box-shadow: 0px 0px 5px 2px #888888; background-color: #fff; padding: 18px">
     <div class="jumbotron">
        <h1>Welcome to JK travels, <?php echo $_SESSION["user"] ?>!</h1>
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
                    <input id="searchAutoCompleteTo" class = "form-control" name="to">
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src = "http://code.jquery.com/ui/1.10.4/jquery-ui.js"> </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $baseDir; ?>/bootstrap/js/bootstrap.min.js"></script>

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
  </body>
</html>