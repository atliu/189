

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

$serveruser = $row["userid"];
$serverpass = $rowpass["password"];

if($serveruser && $serverpass){
	if(!$result && !$resultpass){
		die("Username or password is invalid");
	}
	if(($inputpass == $serverpass) && ($inputuser == $serveruser)){
		header('Location: home.php');
	} 
	}else{
		header('Location: failed.php');
	
}
mysql_close();


$cookie_name = "user";
$cookie_value = $_POST["usr"];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

?>


