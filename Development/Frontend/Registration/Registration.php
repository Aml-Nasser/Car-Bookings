<?php 
    // include our connect script 
    require_once("connect.php"); 
    
    // check to see if there is a user already logged in, if so redirect them 
    session_start(); 
    //if (isset($_SESSION['username']) && isset($_SESSION['userid'])) 
        //header("Location: ./login.php");  // redirect the user to the home page
		if (isset($_POST['registerBtn'])){ 
			// get all of the form data 
			$username = $_POST['username']; 
			$email = $_POST['email']; 
			$passwd = $_POST['password']; 
			$passwd_again = $_POST['password_two']; 
	
			// verify all the required form data was entered
			if ($username != "" && $passwd != "" && $passwd_again != ""){
		// make sure the two passwords match
		if ($passwd === $passwd_again){
			// make sure the password meets the min strength requirements
			if ( strlen($passwd) >= 5 && strpbrk($passwd, "!#$.,:;()") != false ){
				// next code block
			}
			else
				$error_msg = 'Your password is not strong enough. Please use another.';
		}
		else
			$error_msg = 'Your passwords did not match.';
	}
	else
		$error_msg = 'Please fill out all required fields.';
			}

			/*$username = $_POST['username']; 
			$email = $_POST['email']; 
			$passwd = $_POST['password']; 
			$passwd_again = $_POST['password_two']; 

			$conn = new mysqli('localhost', 'root', '', 'cars')
			if($conn->connect_error){
				die('Connection Failed : '.$conn->connect_error);
			}else{
				$stmt = $conn->prepare("insert into registration(username, email, password)
						values (?, ?, ?, ?");
				$stmt-> blind_parm("ssssi", $username, $email, $passwd);
				$stmt->execute();
				echo "Registration has done sucessfully";
				$stmt->close();
				$conn->close();
			}*/

?>
<!--<!DOCTYPE html>-->
<html>

<head>
     <meta charset="utf-8-8">
     <title>Register</title>	 
     <link rel="stylesheet" href="style.css">
</head>

<body>	
     <div class="center">
	    <h2>Ready To Buy Your Dream Car ?</h2>
		<form method="post">

			<div class="txt_field">
				<input type="text" name ="username"   placeholder = "usename" required/>
				<span></span>
		    </div>

		
			<div class="txt_field">
				<input type="email" name = "email"  placeholder = "Write your Mail" required/>
				<span></span>
			</div>
		
		   <div class="txt_field">
			<input type="text" name ="number"   placeholder = "Phone Number" required/>
			<span></span>
		   </div>

	
		   <div class="txt_field">
		   <input name="password" type="password" placeholder = "Confirm Password" required/>
		   <span></span>
		   </div>
		   
		   <div class="txt_field">
		   <input name="password_two" type="password" placeholder = "Confirm Password" required/>
		   <span></span>
		   </div>
		   
		   
		   
		   <input type="submit" name = "registerBtn" value="Register">
		   
		   <div class="login_link">
		   Have an account? <a href="P.login.html">login here</a>
		    </div>
		
		
		</form>
	 </div>

</body>
</html>

