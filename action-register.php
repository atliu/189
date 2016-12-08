<?php
$userfname= $_POST["fname"];
$userlname= $_POST["lname"];
$useradd= $_POST["address"];
$usercity= $_POST["city"];
$userstate= $_POST["state"];
$userzip= $_POST["zip"];
$useremail= $_POST["email"];
$userid= $_POST["username"];
$userpass= $_POST["password"];
$usernumb= $_POST["number"];

$database= "etes";
$password="";
$user="root";


if($userfname&&$userlname&&$useradd&&$usercity&&$userstate&&$userzip&&$useremail&&$userid&&$userpass&&$usernumb){

	$connect = mysql_connect("localhost", $user, $password);
	@mysql_select_db($database, $connect) or ("Database not found");

	mysql_query("INSERT INTO `users`(`fname`, `lname`, `address`, `city`, `state`, `zip`, `email`, `userid`, `password`, `number`) VALUES ('$userfname', '$userlname', '$useradd', '$usercity', '$userstate', '$userzip', '$useremail', '$userid', '$userpass', '$usernumb')");

	echo "account created";

	mysql_close($connect);

	header("Location: login.html");
} else{
	echo "Must fill out all requirements";
}

?>