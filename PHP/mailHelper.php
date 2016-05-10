<?php
function printHeader(){
    $string = "<!-- HEADER -->
<table class='head-wrap' bgcolor='#999999' style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', Helvetica, sans-serif;width:100%;\" >
	<tr style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" >
		<td style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" ></td>
		<td class='header container' style=\"font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;display:block!important;max-width:600px!important;margin-top:0 !important;margin-bottom:0 !important;margin-right:auto !important;margin-left:auto !important;clear:both!important;\" >
				
				<div class='content' style=\"font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;display:block;\" >
				<table bgcolor='#999999' style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', Helvetica, sans-serif;width:100%;\" >
					<tr style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" >
						<td style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" ><img src='http://placehold.it/200x50/' style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;max-width:100%;\" /></td>
						<td align='right' style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" ><h6 class='collapse' style=\"font-family:'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;line-height:1.1;font-weight:900;font-size:14px;text-transform:uppercase;color:#444;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin-top:0 !important;margin-bottom:0 !important;margin-right:0 !important;margin-left:0 !important;\" >JK Travels</h6></td>
					</tr>
				</table>
				</div>
				
		</td>
		<td style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" ></td>
	</tr>
</table><!-- /HEADER -->";
    $string = "";
return $string;
}
function printTotalCost(){
    $totalCost = 0;
    $existingBookings = $_SESSION["bookings"];
    foreach($existingBookings as $booking){
          //Get the current route
         $flight = getAssocFromQuery("select * FROM flights WHERE route_no = ".$booking[0]);
         $totalCost += $flight["price"];
    }
    return $totalCost;
}
function printTable(){
    $string = "";
    $existingBookings = $_SESSION["bookings"];
      foreach($existingBookings as $booking){
          //Get the current route
          $flight = getAssocFromQuery("select * FROM flights WHERE route_no = ".$booking[0]);
          $extraString = "";
          if($booking[1]){
              $extraString = $extraString."Child ";
          }
          if($booking[2]){
              $extraString = $extraString."Wheelchair ";
          }
          if($booking[3]){
              $extraString = $extraString."Special diet ";
          }
          
          $string = $string."<tr style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" >
                              <td style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" >".$flight["from_city"]."</td>
                              <td style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" >".$flight["to_city"]."</td>
                              <td style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" >".$extraString."</td>
                              <td style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" >$".$flight["price"]."</td>
                            </tr>";
          
      }
    return $string;
}
function printMail($user){
    $users = $_SESSION["user"];
    $returnString = "

<html xmlns='http://www.w3.org/1999/xhtml' style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" >
<head style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" >
<!-- If you delete this meta tag, Half Life 3 will never be released. -->
<meta name='viewport' content='width=device-width' style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" />

<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" />
<title style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" >JK Travel Receipt</title>
	

    
<style style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" >
    
* { 
	margin:0;
	padding:0;
}
* { font-family: \"Helvetica Neue\", \"Helvetica\", Helvetica, Arial, sans-serif; }

img { 
	max-width: 100%; 
}
.collapse {
	margin:0;
	padding:0;
}
body {
	-webkit-font-smoothing:antialiased; 
	-webkit-text-size-adjust:none; 
	width: 100%!important; 
	height: 100%;
}



a { color: #2BA6CB;}

.btn {
	text-decoration:none;
	color: #FFF;
	background-color: #666;
	padding:10px 16px;
	font-weight:bold;
	margin-right:10px;
	text-align:center;
	cursor:pointer;
	display: inline-block;
}

p.callout {
	padding:15px;
	background-color:#ECF8FF;
	margin-bottom: 15px;
}
.callout a {
	font-weight:bold;
	color: #2BA6CB;
}

table.social {

	background-color: #ebebeb;
	
}
.social .soc-btn {
	padding: 3px 7px;
	font-size:12px;
	margin-bottom:10px;
	text-decoration:none;
	color: #FFF;font-weight:bold;
	display:block;
	text-align:center;
}
a.fb { background-color: #3B5998!important; }
a.tw { background-color: #1daced!important; }
a.gp { background-color: #DB4A39!important; }
a.ms { background-color: #000!important; }

.sidebar .soc-btn { 
	display:block;
	width:100%;
}


table.head-wrap { width: 100%;}

.header.container table td.logo { padding: 15px; }
.header.container table td.label { padding: 15px; padding-left:0px;}



table.body-wrap { width: 100%;}



table.footer-wrap { width: 100%;	clear:both!important;
}
.footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
.footer-wrap .container td.content p {
	font-size:10px;
	font-weight: bold;
	
}



h1,h2,h3,h4,h5,h6 {
font-family: \"HelveticaNeue-Light\", \"Helvetica Neue Light\", \"Helvetica Neue\", Helvetica, Arial, \"Lucida Grande\", sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
}
h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

h1 { font-weight:200; font-size: 44px;}
h2 { font-weight:200; font-size: 37px;}
h3 { font-weight:500; font-size: 27px;}
h4 { font-weight:500; font-size: 23px;}
h5 { font-weight:900; font-size: 17px;}
h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}

.collapse { margin:0!important;}

p, ul { 
	margin-bottom: 10px; 
	font-weight: normal; 
	font-size:14px; 
	line-height:1.6;
}
p.lead { font-size:17px; }
p.last { margin-bottom:0px;}

ul li {
	margin-left:5px;
	list-style-position: inside;
}


ul.sidebar {
	background:#ebebeb;
	display:block;
	list-style-type: none;
}
ul.sidebar li { display: block; margin:0;}
ul.sidebar li a {
	text-decoration:none;
	color: #666;
	padding:10px 16px;

	margin-right:10px;

	cursor:pointer;
	border-bottom: 1px solid #777777;
	border-top: 1px solid #FFFFFF;
	display:block;
	margin:0;
}
ul.sidebar li a.last { border-bottom-width:0px;}
ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}






.container {
	display:block!important;
	max-width:600px!important;
	margin:0 auto!important; 
	clear:both!important;
}


.content {
	padding:15px;
	max-width:600px;
	margin:0 auto;
	display:block; 
}


.content table { width: 100%; }



.column {
	width: 300px;
	float:left;
}
.column tr td { padding: 15px; }
.column-wrap { 
	padding:0!important; 
	margin:0 auto; 
	max-width:600px!important;
}
.column table { width:100%;}
.social .column {
	width: 280px;
	min-width: 279px;
	float:left;
}


.clear { display: block; clear: both; }



@media only screen and (max-width: 600px) {
	
	a[class=\"btn\"] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

	div[class=\"column\"] { width: auto!important; float:none!important;}
	
	table.social div[class=\"column\"] {
		width:auto!important;
	}

}
    
table {
  font-family: \"Helvetica Neue\", Helvetica, sans-serif
}

caption {
  text-align: left;
  color: silver;
  font-weight: bold;
  text-transform: uppercase;
  padding: 5px;
}

thead {
  background: SteelBlue;
  color: white;
}

th,
td {
  padding: 5px 10px;
}

tbody tr:nth-child(even) {
  background: WhiteSmoke;
}

tbody tr td:nth-child(2) {
  text-align:center;
}

tbody tr td:nth-child(3),
tbody tr td:nth-child(4) {
  text-align: right;
  font-family: monospace;
}

tfoot {
  background: SeaGreen;
  color: white;
  text-align: right;
}

tfoot tr th:last-child {
  font-family: monospace;
}

</style>

</head>
 
<body bgcolor='#FFFFFF' style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width:100%!important;height:100%;\" >

".printHeader()."


<!-- BODY -->
<table class='body-wrap' style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', Helvetica, sans-serif;width:100%;\" >
	<tr style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" >
		<td style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" ></td>
		<td class='container' bgcolor='#FFFFFF' style=\"font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;display:block!important;max-width:600px!important;margin-top:0 !important;margin-bottom:0 !important;margin-right:auto !important;margin-left:auto !important;clear:both!important;\" >
			<div class='content' style=\"font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;display:block;\" >
			<table style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', Helvetica, sans-serif;width:100%;\" >
				<tr style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" >
					<td style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" >
						<h3 style=\"margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;line-height:1.1;margin-bottom:15px;color:#000;font-weight:500;font-size:27px;\" >Hi  ".$user[0]." ".$user[1]."</h3>
						<p class='lead' style=\"margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;margin-bottom:10px;font-weight:normal;line-height:1.6;font-size:17px;\" >Thank you for booking flights with us!</p>
						<p style=\"margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;margin-bottom:10px;font-weight:normal;font-size:14px;line-height:1.6;\" >
                        Below we have listed all the flights you ordered as well as your provided contact details, make sure everything is correct and if something as amiss please do not hesitate to contact us!<br>
                        ".$user[2].", ".$user[4].", ".$user[5].", ".$user[6].", ".$user[7]."<br> Credit card information provided!
                        </p>

                        <table style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', Helvetica, sans-serif;width:100%;\" >
                          <caption style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;text-align:left;color:silver;font-weight:bold;text-transform:uppercase;padding-top:5px;padding-bottom:5px;padding-right:5px;padding-left:5px;\" >Bookings</caption>
                          <thead style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;background-color:SteelBlue;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;color:white;\" >
                            <tr style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" >
                              <th style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" >From</th>
                              <th style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" >To</th>
                              <th style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" >Specifications</th>
                              <th style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" >Cost</th>
                            </tr>
                          </thead>
                          <tbody style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" >
                            ".printTable()."
                          </tbody>
                          <tfoot style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;background-color:SeaGreen;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;color:white;text-align:right;\" >
                            <tr style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" >
                              <th colspan=\"3\" style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" >Total</th>
                              <th style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" >$".printTotalCost()."</th>
                            </tr>
                          </tfoot>
                        </table>
												
						<!-- social & contact -->
						<table class='social' width='100%' style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', Helvetica, sans-serif;background-color:#ebebeb;width:100%;\" >
							<tr style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" >
								<td style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" >
									
									<!-- column 1 -->
									<table align='left' class='column' style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', Helvetica, sans-serif;width:280px;min-width:279px;float:left;\" >
										<tr style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" >
											<td style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;\" >				
												
												<h5 class='' style=\"margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;line-height:1.1;margin-bottom:15px;color:#000;font-weight:900;font-size:17px;\" >Connect with Us:</h5>
												<p class='' style=\"margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;margin-bottom:10px;font-weight:normal;font-size:14px;line-height:1.6;\" ><a href='#' class='soc-btn fb' style=\"margin-top:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;background-color:#3B5998!important;padding-top:3px;padding-bottom:3px;padding-right:7px;padding-left:7px;font-size:12px;margin-bottom:10px;text-decoration:none;color:#FFF;font-weight:bold;display:block;text-align:center;\" >Facebook</a> <a href='#' class='soc-btn tw' style=\"margin-top:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;background-color:#1daced!important;padding-top:3px;padding-bottom:3px;padding-right:7px;padding-left:7px;font-size:12px;margin-bottom:10px;text-decoration:none;color:#FFF;font-weight:bold;display:block;text-align:center;\" ></a> <a href='#' class='soc-btn gp' style=\"margin-top:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;background-color:#DB4A39!important;padding-top:3px;padding-bottom:3px;padding-right:7px;padding-left:7px;font-size:12px;margin-bottom:10px;text-decoration:none;color:#FFF;font-weight:bold;display:block;text-align:center;\" >Google+</a></p>
						
												
											</td>
										</tr>
									</table><!-- /column 1 -->	
									
									<!-- column 2 -->
									<table align='left' class='column' style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', Helvetica, sans-serif;width:280px;min-width:279px;float:left;\" >
										<tr style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" >
											<td style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;\" >				
																			
												<h5 class='' style=\"margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;line-height:1.1;margin-bottom:15px;color:#000;font-weight:900;font-size:17px;\" >Contact Info:</h5>												
												<p style=\"margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;margin-bottom:10px;font-weight:normal;font-size:14px;line-height:1.6;\" >Phone: <strong style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" >408.341.0600</strong><br style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" />
                Email: <strong style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" ><a href='emailto:test@test.se' style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;color:#2BA6CB;\" >contact@jktravels.com</a></strong></p>
                
											</td>
										</tr>
									</table><!-- /column 2 -->
									
									<span class='clear' style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;display:block;clear:both;\" ></span>	
									
								</td>
							</tr>
						</table><!-- /social & contact -->
						
					</td>
				</tr>
			</table>
			</div><!-- /content -->
									
		</td>
		<td style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" ></td>
	</tr>
</table><!-- /BODY -->

<!-- FOOTER -->
<table class='footer-wrap' style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', Helvetica, sans-serif;width:100%;clear:both!important;\" >
	<tr style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" >
		<td style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" ></td>
		<td class='container' style=\"font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;display:block!important;max-width:600px!important;margin-top:0 !important;margin-bottom:0 !important;margin-right:auto !important;margin-left:auto !important;clear:both!important;\" >
			
				<!-- content -->
				<div class='content' style=\"font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;display:block;\" >
				<table style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', Helvetica, sans-serif;width:100%;\" >
				<tr style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;\" >
					<td align='center' style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" >
						<p style=\"margin-top:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;margin-bottom:10px;font-weight:normal;font-size:14px;line-height:1.6;\" >
							<a href='#' style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;color:#2BA6CB;\" >Terms</a> |
							<a href='#' style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;color:#2BA6CB;\" >Privacy</a>
						</p>
					</td>
				</tr>
			</table>
				</div><!-- /content -->
				
		</td>
		<td style=\"margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;padding-top:5px;padding-bottom:5px;padding-right:10px;padding-left:10px;\" ></td>
	</tr>
</table><!-- /FOOTER -->

</body>
</html>";
return $returnString;
}
?>