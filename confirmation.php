<!DOCTYPE html>
<html lang="en">

<form action="addcard.html" align="left" method="post">
  <br><br>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "etes";


$connect = mysql_connect($servername, $username, $password);
@mysql_select_db($database) or ("Database not found");

$seller = $_POST["seller"];
$id = $_POST["usr"];
$query = "SELECT * FROM `users` WHERE userid='{$id}'";
$result = mysql_query($query);
$query1 = "SELECT * FROM `users` WHERE userid='{$seller}'";
$result1 = mysql_query($query1);
$query2 = "SELECT `Price` FROM `tickets` WHERE Sellerid='{$seller}'";
$result2 = mysql_query($query2);

$cookie_name = "sell";
$cookie_value = $_POST["seller"];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

mysql_close();

?>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<style>
  table, th, td {
    border: 1px solid black;
    padding: 5px;
}
table {
    border-spacing: 15px;
}
</style>


</head>

<body>


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
              Confirmation 
        </header>


<table>
Sellers Information:<br>
  <thead>
  <tr>
      <td>First Name </td>
      <td>Last Name </td>
      <td>Address </td>
      <td>City </td>
      <td>State </td>
      <td>Zip </td>
      <td>Email </td>
      <td>Contact Number </td>
  </tr>
  </thead>
  <tbody>
        <?php
            $row = mysql_fetch_assoc($result1);
            echo "<td>" . $row["fname"] . "</td>";
            echo "<td>" . $row["lname"]. "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["city"]. "</td>";
            echo "<td>" . $row["state"] . "</td>";
            echo "<td>" . $row["zip"]. "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["number"]. "</td>";
        ?>
  </tbody>
  </table>
  <br>


<br>


Delivery Information: <br>
 <table>
  <thead>
  <tr>
      <td>First Name </td>
      <td>Last Name </td>
      <td>Address </td>
      <td>City </td>
      <td>State</td>
      <td>Zip </td>
      <td>Email </td>
      <td>Contact Number </td>
  </tr>
  </thead>
  <tbody>
        <?php
            $row = mysql_fetch_assoc($result);
            echo "<td>" . $row["fname"] . "</td>";
            echo "<td>" . $row["lname"]. "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["city"]. "</td>";
            echo "<td>" . $row["state"] . "</td>";
            echo "<td>" . $row["zip"]. "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["number"]. "</td>";
  
        ?>
  </tbody>
  </table>
  <br>

  Final Price: <br>
 <table>
  <thead>
  <tr>
      <td>Original Price ($) </td>
      <td>5% ETES fee ($)</td>
      <td>Total ($)</td>
  </tr>
  </thead>
  <tbody>
        <?php
            $row = mysql_fetch_assoc($result2);
            $price = $row["Price"];
            $fee = 0.05;
            $formatnum = number_format($fee, 2);
            $etesfee = $formatnum * $price;
            $total = $price * $formatnum + $price;
            echo "<td>" . $row["Price"] . "</td>";
            echo "<td>" . $etesfee . "</td>";
            echo "<td>" . $total . "</td>";  
        ?>
  </tbody>
  </table>
  <br>
  If Delivery and Final Price information is correct press continue.



  <input type="submit" value="Continue"><br>
</form>



  </body>
  </html>





