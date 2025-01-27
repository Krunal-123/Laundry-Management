<?php
require 'config.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["submit"])){
  $email = $_POST["email"];

  // check if username exists
  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
  if(mysqli_num_rows($result) == 0){
    echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>WARNNING!</strong> Email not found!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  } 
  else{
    // get the new password from user
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    // update user's password in database
    if ($new_password==$confirm_password) {
      # code...
      $result=mysqli_query($conn, "UPDATE users SET password = '$new_password' WHERE email = '$email'");
      if ($result) {
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
    $mail->Subject = 'RESET PASSWORD';
    $mail->Body    = '<h2>Someone Has Been Change Your Loundry Account Password</h2>
    <h3>Mail ID: '.$email.'<br><br>
    Your New Password: '.$new_password.'</h3>
    <h3>For More Help Contact By <a href="tel:+916355310515">Krunal Parmar</a> 😊🙏.</h3>';

    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
        // show success message
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Succesfully!</strong> your password is Reset.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; 
      }
    }
    else{
      echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Check Password Again!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'; 
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" alt="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" type="image/x-icon">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Loundry Reset-Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
      body {
        /* background-image: url('https://static.vecteezy.com/system/resources/previews/001/984/880/original/abstract-colorful-geometric-overlapping-background-and-texture-free-vector.jpg'); */
        background-color: gray;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        font-style: normal;
        font-size:1rem;
      }
   
      form{
        width: 50%;
        border: 3px solid #f1f1f1;
			 background-color: #ffffff;
			 margin: 8% auto;
			 padding: 10px;
       text-align: center;
       border-radius: 10px;
      }
   
      h2 {
        text-align: center;
        margin-top: 0;
      }
   
      input[type=email], input[type=password] {
        width: 70%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 2px;
        text-align:center;
      }

      a[href="index.php"] {
        text-decoration:none;
        float: right;
        font-size: larger;
      }
      @media only screen and (max-width:1530px){
  form{
      margin:3% auto;
}
}
    </style>
  </head>
  <body>
  <form method="post">
    <img src="https://th.bing.com/th/id/OIP.PyVTS7paIbN-6HNmeuz3SwAAAA?rs=1&pid=ImgDetMain" alt="">
    <h1>Reset Password</h1>
      <label for="email">Email Id:</label><br>
      <input type="email" name="email" required><br>
      <br>
      <label for="new_password">New Password:</label><br>
      <input type="password" name="new_password" required><br>
      
      <label for="new_password">Confirm Password:</label><br>
      <input type="password" name="confirm_password" required>
      <br>
      <input type="submit" class="btn btn-primary m-2" name="submit" value="Reset Password">
      <br>
      <a href="index.php" class="my-3">Back to Login</a>
    </form>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
