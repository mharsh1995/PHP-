<?php
include ('config/config.php');

date_default_timezone_set('Etc/UTC');
class Mainclass{
	
	private $connection;	

	public function setconn($conn){
		
		$this->connection = $conn;
	//	echo "<br>set conn called";
	}

public function signup(){
	if(isset($_POST['signup_button'])){
			
            $emailid = $_POST['emailid'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];
            //echo $emailid;
        		$query_verify_email = "SELECT * FROM users WHERE '$emailid' = emailid ";

        		$result_verify_email = mysqli_query($this->connection, $query_verify_email);
              
       			 if (!$result_verify_email) { 
           		//	 echo ' Database Error Occured ';
       			 }
            echo "warn :".mysqli_num_rows($result_verify_email) ." ok";
        		if (mysqli_num_rows($result_verify_email) == 0) { 
           				 $query_insert_user = "INSERT INTO users VALUES ('$username','$emailid','$password','$gender')";

           				 $result_insert_user = mysqli_query($this->connection, $query_insert_user);
           				 if (!$result_insert_user) {

                			echo 'Query Failed ';
            			 }

           				 if (mysqli_affected_rows($this->connection) == 1) { 
                            echo "Registered!";
                             // header("Location:form.html/register");

                    }else { 

			                echo 'You could not be registered due to a system error. We apologize for any inconvenience';

                   }     			 	
        		} else { 
           				 echo 'That email address has already been registered';
        		}

    		
    }	//form submitted if completed	 
	else{
			echo "Form not submitted";
	}
	  mysqli_close($this->connection); //Close the Connection
	
}//end sign up

//truncate function starts
public function truncate(){
	echo "truncate called";
	if(isset($_POST['submit'])){
		echo "form submitted";
		$queryresult = $this->query("truncate table pollzeeks.users;");
		if(!$queryresult){
			echo "truncate error";
		}else{
			echo "truncate successfully";
		}
	}else{
		echo "Form:truncate not submitted ";
	}
}
//truncate function over


//login function stars
public function login(){
	if(isset($_POST['login_button'])){
		echo "submitted login";
  
            $emailid = $_POST['emailid'];
            $password = $_POST['password'];
            
            $query_verify_email = "SELECT emailid FROM users WHERE emailid ='$emailid'"; // note '$' otherwise error so must include ''  for var
            $result_verify_email = mysqli_query($this->connection, $query_verify_email);
            
            if (mysqli_num_rows($result_verify_email) == 0) { //means emailid not found
                echo '<div class="errormsgbox">1.Emaildid or password is invalid.</div>';
                 
            }else{
              $row = mysqli_fetch_row($result_verify_email);
              print_r($row);
             
              $query_verify_password = "SELECT username from users WHERE emailid='$emailid' && password='$password'"; // note '$' otherwise error must include ''  for var
               $result_verify_password = mysqli_query($this->connection,$query_verify_password);
               $num = mysqli_num_rows($result_verify_password);
               if($num == 0){
                echo "2.Emaildid or password is invalid";
               }else{
                $row = mysqli_fetch_row($result_verify_password);
                print_r($row); 
                session_start();
                $_SESSION['start'] = time();
                 $_SESSION['expire'] = $_SESSION['start'] + (1 * 60);
                $_SESSION['username'] = $row[0];
                header("Location:welcome.php");
               }
               
            }
    

	}else{
		echo "login form not submitted";
	}
}
//login function over

	
}//end main class
	
?>