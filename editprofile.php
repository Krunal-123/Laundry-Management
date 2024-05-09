<?php
require 'config.php';

    //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["submit"])){
  $id=$_POST['id'];
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $address=$_POST["address"];

  $sql ="UPDATE `users` SET name='$name',email='$email', phone='$phone', address='$address' where id=$id";
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
    $mail->Subject = 'Your Profile Is Edited';
    $mail->Body    = '<h2>Your Profile Is Edited 👇</h2>
    <h3>
    Name: '.$name.'<br><br>
    Phone: '.$phone.'<br><br>
    Address: '.$address.'</h3>
    <h3>For More Help Contact By <a href="tel:+916355310515">Krunal Parmar</a> 😊🙏.</h3>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
// ####################################
  if($result){
    header("location:dashboard.php");
  }
  else{
    echo "<script> alert('Error: Unable to submit laundry request.'); </script>";
  }
}