<?php
require 'config.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (!isset($_SESSION['id2'])) {
  header('location:index.php');
}

if(isset($_POST["submit"])){
  $id=$_POST['id'];
  $check=$_POST['check'];
  $name=$_POST['name'];
  $email=$_POST['email'];
  $sql ="UPDATE `laundry_requests` SET status='$check' where user_id=$id";
  $result=mysqli_query($conn, $sql);

// PHP mailer use here!!
//Load Composer's autoloader
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
    $mail->Subject = 'Loundry Services Status';
    $mail->Body='
    <h2>ORDER STATUS</h2><br><br>
    <h3>Hi '.$name.'</h3><br><br>
    <h4>Your Order is: '.$check.'<br><br>
    Thank you for using our services😊💖.</h4><br>
    <h4>For More Help Contact By <a href="tel:+916355310515">Krunal Parmar</a> 😊🙏.</h4>';

    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
// back
  if($result){
    header("location:view_request2.php");
  }
  else{
    echo "<script> alert('Error: Unable to submit laundry request.'); </script>";
  }
}
?>
