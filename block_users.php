<?php
include 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_SESSION['id2'])) {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $reason=$_POST['reason'];
    $query = "INSERT INTO `block` (name, email, gender, phone, password, address) VALUES('$name','$email','$gender','$phone','$password','$address')";
    $result1=mysqli_query($conn, $query);
    if ($result1) {
        $sql="DELETE FROM `users` where id=$id";
        $result=mysqli_query($conn,$sql);
        if ($result) {
        // PHP mailer use here!!
        //Load Composer's autoloader
        if ($reason!='') {
        require 'PHPMailer/Exception.php';
        require 'PHPMailer/PHpMailer.php';
        require 'PHPMailer/SMTP.php';
        
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'loundryservices@gmail.com';                     //SMTP username
            $mail->Password   = $_SESSION['EP'];                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
            //Recipients
            $mail->setFrom('loundryservices@gmail.com', 'Loundry Services');
            $mail->addAddress($email, 'Loundry Services');     //Add a recipient
            
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject ='ADMIN BLOCKED YOU!!.';
            $mail->Body='<h2>'.$M.$name.'</h2><br>'.'<h3>Block-Reason:<br>'.$reason.'</h3>';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            unset($_SESSION["id"]);
            header('location:view_users.php');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    else {
        unset($_SESSION["id"]);
        header('location:view_users.php');
    }
        }
    }
}
?>