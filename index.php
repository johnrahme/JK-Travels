<?php
      include 'PHP/setup.php';
      setup("First page", "home", ""); 
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
        <h1>Welcome to JK travels!</h1>
        <p>To start searching hit the button below!</p>
         <a href = "<?php echo $baseDir; ?>/search"><button class = "btn btn-primary">Start searching</button></a>
      </div>

       
    <?php 
    include $rootPath."layout/footer.php";
    ?>
    <?php include $rootPath."layout/endHtml.php" ?>