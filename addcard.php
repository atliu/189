<!DOCTYPE html>
<html lang="en">


<?php

$user=$_POST["usr"];
$name=$_POST["name"];
$card=$_POST["card"];
$expd=$_POST["date"];
$secur=$_POST["code"];



$database= "etes";
$password="";
$username="root";

if($user&&$name&&$card&&$expd&&$secur){

 $connect = mysql_connect("localhost", $username, $password);
 @mysql_select_db($database, $connect) or ("Database not found");

 mysql_query("INSERT INTO `drivers`(`user`, `name`, `cardnum`, `expiration`, `security`) VALUES ('$user', '$name', '$card', '$expd', '$secur')");

 mysql_close($connect);

 header("Location: googleapi.php");
} else{
 echo "Must fill out all requirements";

}

?> 

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ETES-post</title>

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
                        <a href="index.php">Logout</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



<div align = "center">
<form action = "googleapi.php" method="post">
<div class="form-group row">
  <label for="example-text-input" class="col-xs-2 col-form-label">Username</label>
  <div class="col-xs-10">
    <input class="form-control" type="text" name="usr" placeholder="Write username here...">
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-xs-2 col-form-label">Name</label>
  <div class="col-xs-10">
    <input class="form-control" type="text" name="name" placeholder="Write name on card here...">
  </div>
</div>
<div class="form-group row">
  <label for="example-search-input" class="col-xs-2 col-form-label">Credit Card Number</label>
  <div class="col-xs-10">
    <input class="form-control" type="int" name="card" placeholder="Write card number here...">
  </div>
</div>
<div class="form-group row">
  <label for="example-datetime-local-input" class="col-xs-2 col-form-label">Expiration Date</label>
  <div class="col-xs-10">
    <input class="form-control" type="text" name="date" placeholder="Write expiration date here...">
  </div>
</div>
<div class="form-group row">
  <label for="example-email-input" class="col-xs-2 col-form-label">Security Code</label>
  <div class="col-xs-10">
    <input class="form-control" type="text" name="code" placeholder="Write security code here...">
  </div><br>
  <div align="center"><br><br>
    <input type="submit" value="Buy">         
</div>
</div>


<br><br>

  <input type="text" name="seller" placeholder="sellerid">
  <br><br>
  <input type="submit" value="Buy Now!"><br>



</form>
</body>
</html>