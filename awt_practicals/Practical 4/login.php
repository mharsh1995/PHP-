<?php
include("config/config.php");
include("class/mainclass.php");
if(!$conn){
	echo " login says not connected to server ";
}
else{
	echo " login says connected to server ";
	$userobj1 = new mainclass();
	$userobj1 -> setconn($conn);
	$userobj1 -> login();
}

?>
