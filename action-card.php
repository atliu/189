<?php

$user=$_POST["usr"];
// $name=$_POST["name"];
// $card=$_POST["card"];
// $expd=$_POST["date"];
// $secur=$_POST["code"];


// $database= "etes";
// $password="";
// $username="root";

// if($user&&$name&&$card&&$expd&&$secur){

// 	$connect = mysql_connect("localhost", $username, $password);
// 	@mysql_select_db($database, $connect) or ("Database not found");

// 	mysql_query("INSERT INTO `drivers`(`user`, `name`, `cardnum`, `expiration`, `security`) VALUES ('$user', '$name', '$card', '$expd', '$secur')");

// 	mysql_close($connect);

// 	header("Location: googleapi.php");
// } else{
// 	echo "Must fill out all requirements";

// }

?>
<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "etes";


$connect = mysql_connect($servername, $username, $password);
@mysql_select_db($database) or ("Database not found");


$query = "SELECT `address` FROM `users` WHERE userid='{$user}'";
$result = mysql_query($query);
$row = mysql_fetch_assoc($result);


$sellerAddress = "San Francisco";
 $buyerAddress = $result;
mysql_close();
?>

<!DOCTYPE html>
<html>
  <head>
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
        float: left;
        width: 80%;
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

<!-- <form action="addcard.html" align="center" method="post">
  <br><br>
  <input type="submit" value="Back"><br>
</form> -->