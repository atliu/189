<?php
$user=$_POST["usr"];
$name=$_POST["name"];
$card=$_POST["card"];
$expd=$_POST["date"];
$secur=$_POST["code"];
$cookie_name = "sell";
$cookie_name1 = "ticketid";
$cookie_name2 = "user";

$servername = "localhost";
$username = "root";
$password = "";
$database = "etes";


if($user){
	//&&$name&&$card&&$expd&&$secur
$connect = mysql_connect($servername, $username, $password);
@mysql_select_db($database) or ("Database not found");

$query = "SELECT * FROM `users` WHERE userid='{$user}'";
$result = mysql_query($query);
$row = mysql_fetch_assoc($result);
           
$query1 = "SELECT * FROM `users` WHERE userid='{$_COOKIE[$cookie_name]}'";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_assoc($result1);

$query2 = "SELECT * FROM `tickets` WHERE TicketID='{$_COOKIE[$cookie_name1]}'";
$result2 = mysql_query($query2);
$row2 = mysql_fetch_assoc($result2);

 mysql_query("INSERT INTO `drivers`(`user`, `name`, `cardnum`, `expiration`, `security`) VALUES ('$user', '$name', '$card', '$expd', '$secur')");

 mysql_query("INSERT INTO `Orders`(`OrderID`, `ticketID`, `sellerid`, `buyerid`) VALUES ('$user', '$_COOKIE[$cookie_name1]', '$_COOKIE[$cookie_name]', '$user')");

$query3 = "SELECT * FROM `Orders` WHERE TicketID='{$_COOKIE[$cookie_name1]}'";
$result3 = mysql_query($query3);

$buyerAddress = $row1["address"].$row1["city"];
$sellerAddress = $row["address"].$row["city"];

mysql_close();
}

?>

<!DOCTYPE html>
<html>
  <head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ETES - Events</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="text-align:right">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Electronic Ticket Exchange Service</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                <ul class="nav navbar-nav">
                    <li>
                        <a href="mainpage.php">Events</a>
                    </li>
                    <li>
                        <a href="tickets.html">Post Tickets</a>
                    </li>
                    <li class="dropdown">
                        <a href="index.php">Sign out</a>
                    </li>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
        <header class="jumbotron hero-spacer" align="center">
            <br>
              Your ticket is on the way!
        </header>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Final Page</title>
    <style>
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 1.px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size:5px;
      }


      #right-panel i {
        font-size: 7px;
      }
      html, body {
        height: 100%;
        margin: 10px;
        padding: 0;
      }
      #map {
        height: 100%;
        float: left;
        width: 40%;
        height: 60%;
      }
      #right-panel {
        float: right;
        width: 50%;
        height: 100%;
      }
      .panel {
        height: 80%;
        overflow: auto;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <div id="right-panel">
      <p>Total Distance: <span id="total"></span></p>
      <p>Total Time: <span id="time"></span></p>
          <?php
          echo "Order Number : ";
          $row3 = mysql_fetch_assoc($result3);
          echo $row3["OrderID"] ;
          ?>
    </div>
    <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: {lat: -24.345, lng: 134.46}  // Australia.
        });

        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer({
          draggable: true,
          map: map,
          panel: document.getElementById('right-panel')
        });

        directionsDisplay.addListener('directions_changed', function() {
          computeTotalDistance(directionsDisplay.getDirections());
        });

        displayRoute('<?php echo $buyerAddress ?>', '<?php echo $sellerAddress ?>', directionsService,
            directionsDisplay);
      }

      function displayRoute(origin, destination, service, display) {
        service.route({
          origin: origin,
          destination: destination,
          waypoints: [],
          travelMode: 'DRIVING',
          avoidTolls: true
        }, function(response, status) {
          if (status === 'OK') {
            display.setDirections(response);
          } else {
            alert('Could not display directions due to: ' + status);
          }
        });
      }

      function computeTotalDistance(result) {
        var total = 0;
        var time = 0
        var myroute = result.routes[0];
        for (var i = 0; i < myroute.legs.length; i++) {
          total += myroute.legs[i].distance.value;
          time += myroute.legs[i].duration.value;
        }
        total = total / 1000;
        time = parseFloat(time/60).toFixed(2)
        document.getElementById('total').innerHTML = total + ' km';
        document.getElementById('time').innerHTML = time + ' minutes';
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCllZgQfYIMTDEaAUFmXw2oLwY99DYBW38&callback=initMap">
    </script>
    
  </body>
</html>

