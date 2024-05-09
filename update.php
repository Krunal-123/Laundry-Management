<?php
require 'config.php';

    //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (!isset($_SESSION['id'])) {
  header('location:index.php');
}

if(isset($_POST["submit"])){
  $id=$_POST['id'];
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $pickup_date = $_POST["pickup_date"];
  $pickup_time = $_POST["pickup_time"];
  $top_wear = $_POST["top_wear"];
  $bottom_wear = $_POST["bottom_wear"];
  $woolen_clothes = $_POST["woolen_clothes"];
  $price = calculate_price($top_wear, $bottom_wear, $woolen_clothes);
  $status = "Pending";
  $adress=$_POST["adress"];

  $sql ="UPDATE `laundry_requests`SET email='$email',phone='$phone',pickup_date='$pickup_date', pickup_time='$pickup_time', top_wear='$top_wear', 
  bottom_wear='$bottom_wear', woolen_clothes='$woolen_clothes',price='$price',status='$status',adress='$adress' where user_id=$id";
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
    $mail->Subject = 'Your Data Is Successfuly Updated';
    $mail->Body    = '<h2>Data is updated, pls Check Again Here!👇</h2><br>
    <h3>Your Order Id: '.$id.'</h3>
    <h3>Status: '.$status.'</h3>
    <form>
    <label for="name">Name:</label>
    <input style="width:30%; display:inline-block ;" type="text" id="name" value="'.$name.'" disabled>&nbsp;

    <label for="Phone">Phone no:</label> 
    <input style="width: 30%; display:inline-block;" type="tel" value="'.$phone.'"disabled><br><br>

    <label for="name">Email:</label>
    <input style="width: 80%" type="email" name="email" id="email"value="'.$email.'" disabled><br><br>

    <label for="pickup_date">Pickup Date&</label><label for="pickup_time">Time:</label>
    <input style="width: 29%; display:inline-block;" type="date" value="'.$pickup_date.'"disabled> 
    <input style="width: 29%; display:inline-block;" type="time"value="'.$pickup_time.'"disabled><br><br>
    
    <label for="top_wear">Wash Top wear(number of clothes):</label><br>
    <input style="width: 30%" type="number" value="'.$top_wear.'"disabled><br><br>
    
    <label for="bottom_wear">Wash Bottom wear(number of clothes):</label><br>
    <input style="width: 30%" type="number" value="'.$bottom_wear.'"disabled> <br><br>
    
    <label for="woolen_clothes">woolen Clothes(number of clothes):</label><br>
    <input style="width: 30%" type="number" value="'.$woolen_clothes.'"disabled><br><br> 

    <label for="Address">Address:</label><br>
    <textarea name="Address" id="Address" cols="40" rows="6" disabled>'.$adress.'</textarea>
  </form>
      <h3>For More Help Contact By <a href="tel:+916355310515">Krunal Parmar</a> 😊🙏.</h3>
      ';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
// ####################################
  if($result){
    header("location:view_request.php");
  }
  else{
    echo "<script> alert('Error: Unable to submit laundry request.'); </script>";
  }
}
function calculate_price($top_wear, $bottom_wear, $woolen_clothes){
  // Calculation logic goes here
    $top_wear_price = 10; // $10.5 per pound
    $bottom_wear_price = 20; // $20.0 per pound
    $woolean_wear_price = 30; // $30.5 per item
    $total_price = ($top_wear * $top_wear_price) + ($bottom_wear * $bottom_wear_price) + ($woolen_clothes * $woolean_wear_price);
    // Round the price to 2 decimal places
    $total_price = round($total_price, 1);
    return $total_price;
}
?>

