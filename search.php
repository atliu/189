<!DOCTYPE html>
<html lang="en">

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "etes";


$connect = mysql_connect($servername, $username, $password);
@mysql_select_db($database) or ("Database not found");

$id = $_POST['event'];
$query = "SELECT * FROM `tickets` WHERE Event = '{$id}'";
$result = mysql_query($query);

mysql_close();

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ETES-homepage</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <style>
    .navbar {
        margin-bottom: 0;
        border-radius: 0;
    }
    </style>

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

    <!-- Navigation -->
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
                    <li>
                        <a href="index.php">Sign out</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>

        <!-- /.container -->
    </nav>
        <header class="jumbotron hero-spacer" align="center">
            <br>
      
        </header>

 <table>
  <thead>
  <tr>
      <td>EVENT </td>
      <td>VENUE </td>
      <td>DATE </td>
      <td>SEAT NUMBER </td>
      <td>PRICE </td>
      <td>QUANTITY </td>
      <td>TICKETID </td>
      <td>SELLERID </td>
  </tr>
  </thead>
  <tbody>
        <?php
            $row = mysql_fetch_assoc($result);
            echo "<td>" . $row["Event"] . "</td>";
            echo "<td>" . $row["Venue"]. "</td>";
            echo "<td>" . $row["date"] . "</td>";
            echo "<td>" . $row["SeatNum"]. "</td>";
            echo "<td>" . $row["Price"] . "</td>";
            echo "<td>" . $row["Quantity"]. "</td>";
            echo "<td>" . $row["TicketID"] . "</td>";
            echo "<td>" . $row["SellerID"]. "</td>";  
        ?>
  </tbody>
  </table>
  <br>

<form action="confirmation.php" align="center" method="post">
  Confirm Username:
  <input type="text" name="usr">
  <br><br>
  <input type="submit" value="Buy Now!"><br>
</form>

           


</body>
</html>