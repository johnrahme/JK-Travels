<html>
  <head>
      <?php
      //include '../PHP/database.php';
      ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>JK Travels</title>

    <!-- Bootstrap -->
    <link href="/~jorahme/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body background = "/~jorahme/img/background.jpg">
            <!-- Static navbar -->
    <?php
      $active = "contact";
  		include '../layout/navbar.php';
	   ?>
    <div class="container">


      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Welcome <?php echo $_SESSION["user"];?> to JK travels contact page</h1>
        <p>Please klick below to get in contact with us </p>
        <p>
          <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">Get in concatc</a>
        </p>
      </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/~jorahme/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>