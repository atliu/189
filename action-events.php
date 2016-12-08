<?php


$database= "etes";
$password="";
$user="root";

$connect = mysql_connect("localhost", $user, $password);
@mysql_select_db($database, $connect) or ("Database not found");

$sql = "SELECT * FROM tickets" ;


?>