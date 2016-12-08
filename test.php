<?php
$inputuser = $_POST["usr"];
$inputpass = $_POST["pass"];
$userid = "root";
$password = "";
$database = "etes";

$connect = mysql_connect("localhost", $userid, $password);
@mysql_select_db($database) or ("Database not found");

$query = "SELECT * FROM `users` WHERE `userid` = '$inputuser'";
$querypass = "SELECT * FROM `users` WHERE `password` = '$inputpass'";

$result = mysql_query($query);
$resultpass = mysql_query($querypass);

$row = mysql_fetch_array($result);
$rowpass = mysql_fetch_array($resultpass);

echo $row["userid"];

?>