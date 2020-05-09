<?php
include("config/config.php");
include("class/mainclass.php");
if(!$conn){
	echo "signup says not connected to server";
}
else{
	echo "signup says connected to server";
	$userobj = new mainclass();
	$userobj -> setconn($conn);
	$userobj -> signup();

}

?>
