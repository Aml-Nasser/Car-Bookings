
<html>

<head>
    <link rel="stylesheet"
          type="text/css"
          href="emailStyle.css" />
</head>


<body>
<h2>Add Admin</h2>

<br><br>
<center>


    <form method="POST">
        <input type="email" name="emailAdmin" id="email_add_admin"    placeholder="Email"/>
        <br><br>
        <input type="submit" name="btnsubmit" id="btn_add_admin" value="Send Email"/>
        <br><br>
        <p id="msg"></p>
    </form>

    <!--<input type="submit" id="btn_add_admin"  value="Submit"  onclick="Validate_email()">-->

</center>

</body>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailerPHPMailer\Exception;


require_once 'vendor/autoload.php';
require_once 'connect.php';


$mail= new PHPMailer();
session_start();

$db =new connect();
$conn=$db->connection();

if(isset($_POST['btnsubmit'])) {
    if ($_POST['emailAdmin'] == '') {
        echo 'plz fill the data';

    } else {

        /* generate random user name with specific format Admin*/
        function getRandomUserName()
        {
            $validCharacters = "abcdefghijklmnopqrstuvwxyz";
            $validCharNumber = strlen($validCharacters);
            $result = "";
            for ($i = 0; $i < 6; $i++) {
                $index = mt_rand(0, $validCharNumber - 1);
                $result .= $validCharacters[$index];
            }
            return $result;
        }

        $username = getRandomUserName();
        $ad = "Admin";
        $admin_format = $username .= $ad;


        function generate_pw()
        {

            // Set random length for password
            $password_length = rand(8, 16);
            $pw = '';
            for ($i = 0; $i < $password_length; $i++) {
                $pw .= chr(rand(32, 126));
            }
            return $pw;
        }

        $password = generate_pw();

        $to = $_POST['emailAdmin'];

        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = 'carssystem77@gmail.com';
        $mail->Password = 'Car@12345';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->From = 'carssystem77@gmail.com';
        $mail->FromName = 'Car Booking';
        $mail->addAddress($to, $to);
        $mail->Subject = 'Car Booking Validate';
        $mail->isHTML();
        $mail->Body ="The Username is ".$admin_format."." ."The  password is " . $password . ".";


        $mail->SMTPOptions = array(

            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'verify_self_signed' => true,


            )

        );

        if ($mail->send()) {
            $sql = "INSERT INTO admin (username, pass, email) VALUES ('$admin_format', '$password',' $to')";
            $query = mysqli_query($conn, $sql);
            ?>
            <p id="msg">
                <?php echo 'Email is sent succssefully' ?>
            </p>
            <?php
        } else {
            ?>
            <p id="msg">
                <?php echo 'Email is not sent' ?>
            </p>
        <?php }






}}


?>
