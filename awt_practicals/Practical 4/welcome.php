  <?php  
	session_start();
	$now = time(); // Checking the time now when home page starts.

        
	if(empty($_SESSION['username'])){
		header("Location:form.html");
	}else{
		if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired! <a href='form.html'>Login here</a>";
        }else{
			$username = $_SESSION['username'];
			echo "<h1>Welcome ".$username." </h1><br>Your session will expire after 1 minute!!<br>";
		 	echo '<a href="logout.php">Logout</a>';
		}
	}
	
?>

