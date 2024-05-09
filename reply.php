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

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email= $_POST['email'];
    $reply=$_POST['reply'];
    $comment=$_POST['comment'];

    if ($reply!='') {
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
    $mail->Subject = 'Your Feedback Reply';
    $mail->Body    = '
      <h2>Hi '.$name.',</h2>
      <lable>Comment:</lable><br>
      <textarea cols="40" rows="6" disabled>'.$comment.'</textarea>
      <h3>Reply: '.$reply.'</h3><br>
      <h3>For More Help Contact By <a href="tel:+916355310515">Krunal Parmar</a> 😊🙏.</h3>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    // echo 'Message has been sent';
    header("location:feedback2.php");

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
header("location:feedback2.php");
// ####################################
}
?>