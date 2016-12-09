<?php
$event = $_POST["event"];
$venue = $_POST["venue"];

$database= "etes";
$password="";
$user="root";

if($event){

	$connect = mysql_connect("localhost", $user, $password);
	@mysql_select_db($database, $connect) or ("Database not found");
 
	mysql_query("INSERT INTO `tickets`(`Event`, `Venue`) VALUES ('$event' , '$venue')");

	echo "ticket created";
	echo $event;

	// mysql_close($connect);

	// header("Location: home.php");
} else{
	echo "Must fill out all requirements";
}

?>