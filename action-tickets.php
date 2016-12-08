<?php

$event=$_POST["event"];
$venue=$_POST["venue"];
$time=$_POST["time"];
$seat=$_POST["seat"];
$price=$_POST["price"];
$quantity=$_POST["quantity"];
$ticketid=$_POST["ticketid"];
$userid=$_POST["userid"];

$database= "etes";
$password="";
$user="root";

if($event&&$venue&&$time&&$seat&&$price&&$quantity&&$ticketid&&$userid){

	$connect = mysql_connect("localhost", $user, $password);
	@mysql_select_db($database, $connect) or ("Database not found");

	mysql_query("INSERT INTO `tickets`(`Event`, `Venue`, `Date`, `SeatNum`, `Price`, `Quantity`, `TicketID`, `SellerID`) VALUES ('$event', '$venue', '$time', '$seat', '$price', '$quantity', '$ticketid', '$userid')");

	echo "account created";

	mysql_close($connect);

	header("Location: home.php");
} else{
	echo "Must fill out all requirements";
}


?>