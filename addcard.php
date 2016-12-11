
<?php

$user=$_POST["usr"];
$name=$_POST["name"];
$card=$_POST["card"];
$expd=$_POST["date"];
$secur=$_POST["code"];

$cookie_name = "sell";
$cookie_name1 = "ticketid";

$database= "etes";
$password="";
$username="root";

if($user&&$name&&$card&&$expd&&$secur){

 $connect = mysql_connect("localhost", $username, $password);
 @mysql_select_db($database, $connect) or ("Database not found");

$query1 = "SELECT * FROM `users` WHERE userid='{$_COOKIE[$cookie_name]}'";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_assoc($result1);

 $query2 = "SELECT * FROM `tickets` WHERE TicketID='{$_COOKIE[$cookie_name1]}'";
$result2 = mysql_query($query2);
$row2 = mysql_fetch_assoc($result2);

 mysql_query("INSERT INTO `drivers`(`user`, `name`, `cardnum`, `expiration`, `security`) VALUES ('$user', '$name', '$card', '$expd', '$secur')");

 mysql_query("INSERT INTO `Orders`(`OrderID`, `ticketID`, `sellerid`, `buyerid`) VALUES ('$user', '$_COOKIE[$cookie_name1]', '$_COOKIE[$cookie_name]', '$user')");

 mysql_close($connect);

 header("Location: action-card.php");
} else{
 echo "Must fill out all requirements";

}

?> 
