<?php
require 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["register"])){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  $duplicate2 = mysqli_query($conn, "SELECT * FROM block WHERE email='$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Email Has Been Already Used!!!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
  }
  elseif (mysqli_num_rows($duplicate2) > 0) {
    echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>This Email Has Been BLOCKED🚫 by ADMIN!!<br>Pls Contact Them</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO users (name, email,gender, password) VALUES('$name','$email','$gender','$password')";

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
    $mail->Subject ='Registration Successfully';
    $mail->Body='
    <h2>HEY! '.$name.'</h2><br>
    <h3>Thank You for Join Us,<br><br>Our Loundry Services</h3><br>
    <h4>we provide our best service to you😊💖</h4>
    <h4>Your Registration mail ID: '.$email.'</h4>
    <h4>Hurry up!!! to experience our service,<br>We are wait for your Order😊💖.</h4>';

    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
      mysqli_query($conn, $query);
              // show success message
              echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Succesfully!</strong> your Account is Register.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'; 
    }
    else{
      echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Check Password Again!</strong><p>Password is Wrong.</p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'; 
    }
  }
}
?>
<!-- html -->
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" alt="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" type="image/x-icon">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Loundry Account-Registration</title>
    <!-- css -->
    <style>
      body {
        background-image: url("https://r4.wallpaperflare.com/wallpaper/225/365/217/anime-digital-digital-art-artwork-laundry-hd-wallpaper-3950783de11a2d0b06b7283f0081865d.jpg");
        background-size: cover;
        background-color: #F9F9F9;
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        font-style: normal;
        font-size:1rem;
      }

      form {
        border: 3px solid #f1f1f1;
        background-color: transparent;
        max-width: 500px;
        margin: 100px auto;
        padding: 20px;
        border-radius: 10px;
      }

      h2 {
        text-align: center;
        margin-top: 0;
      }
      input[type=text], input[type=email], input[type=password], select{
        color:black;
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
      }
      .check{
        width: 100%;
        margin: 15px 0;
        display: inline-block;
      }
      button {
        width: 100%;
        background-image: url("https://wallpaperaccess.com/full/1845278.jpg");
        color: #ffffff;
        padding: 14px 20px;
        margin: 20px auto;
        border: none;
        cursor: pointer;
      }
      button:hover {
        opacity: 0.7;
      }
      .link{
        margin: 10% auto;
        display: flex;
        justify-content: center;
      }
 
    </style>
  </head>
  <body>
    <form method="post" autocomplete="off">
      <h2>Create Account</h2>
      <div class="container">
        <!-- <label for="name"><b>Name:</b></label> -->
        <input type="text" placeholder="Name" name="name" required><br>

        <!-- <label for="email"><b>Email:</b></label> -->
        <input type="email" placeholder="Email" name="email" required><br>
        <select aria-label="Default select example" name="gender" required>
          <option value="">-Gender-</option>
          <option value="Male">Male</option>
          <option value="female">female</option>
        </select>
        <!-- <label for="password"><b>Password:</b></label> -->
        <input type="password" placeholder="Password" name="password" required><br>

        <!-- <label for="confirmpassword"><b>Confirm Password:</b></label> -->
        <input type="password" placeholder="Confirm Password" name="confirmpassword" required><br>

        <div class="check">
          <input type="checkbox" name="check" id="check" required>&nbsp;<label for="check">I agreed all statements in <a href="terms&services.html">Terms of Service</a></label>
        </div>
        
        <button class="" type="submit" name="register">Register</button>
        <div class="link">
          <p>Have already an account?<a href="index.php"> Login back</a></p>
        </div>
      </div>
    </form>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
