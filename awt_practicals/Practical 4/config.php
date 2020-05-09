<?php

$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "mysite";

date_default_timezone_set('UTC');

$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	die("Can't connect to server".mysqli_connect_error());
}else{
	//echo "connected to server";
}

?>