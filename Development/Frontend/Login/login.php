<?php
    //include "C:\\xampp\\htdocs\\Car-Bookings\\connection.php";
    //print_r($_SESSION);
    session_start();
    require_once 'connect.php';
    $db =new connect();
    $conn=$db->connection();
    


    //check if user came from HTTP Post 
    if(isset($_POST['loginbtn'])){
    
        $uname=$_POST['user'];
        $password=$_POST['pass'];

        $sql="select * from users where Username='".$uname."'AND Password ='".$password."' limit 1 ";

        $query = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($query)==1){
            echo " You Have Successfully Logged in";
            exit();
        }
        else{
            echo " You Have Entered Incorrect Password";
            exit();
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8-8">
        <title>Login</title>	 
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="center">
                <h2>Ready to Buy Your New Car ?</h2>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method = "POST">
                
                
                <div class="txt_field">
                <input type="text" name = "user" placeholder = "Username">
                <span></span>
                </div>
                    
                <div class="txt_field">
                <input type="password" name="pass">
                <span></span>
                </div>
                
                <div class="pass">Forget Password?</div>
                <input type="submit" name = "loginbtn" value="Login">
                
                <div class="signup_link">
                Not a member? <a href="P.signup.html">Signup</a>
                    </div>
                
                
                </form>
            </div>
            <div>
    </div>
</body>