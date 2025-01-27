<?php
require 'config.php';
    //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(!empty($_SESSION["id"])){
	$id = $_SESSION["id"];
	$result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
	$row = mysqli_fetch_assoc($result);
  }
else{
  header("location:index.php");
}

if(isset($_POST["submit"])){
  $user_id = $_SESSION["id"];
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
  $address=$_POST["Address"];

  $sql = "INSERT INTO `laundry_requests` (naam, email, phone, pickup_date, pickup_time, top_wear, bottom_wear, woolen_clothes, price, status, adress)
  VALUES ('$name','$email','$phone', '$pickup_date', '$pickup_time','$top_wear', '$bottom_wear', '$woolen_clothes', '$price', '$status','$address')";



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
    $mail->Subject = 'Thank you '.$name.' to booked our Loundry Services.';
    $mail->Body='<h2>Hi '.$name.'</h2><br><br>
    <h4>We can Update our Services with your mail:'.$email.'<br><br>
    We will Contact you soon regarding our Service on: '.$phone.'<br><br>
    <label for="pickup_date">Pickup Date&</label><label for="pickup_time">Time:</label>
    <input style="width: 29%; display:inline-block;" type="date" value="'.$pickup_date.'"disabled> 
    <input style="width: 29%; display:inline-block;" type="time"value="'.$pickup_time.'"disabled><br><br>
    </h4>
    <table border="1" cellpadding="10">
    <tr>
    <th>Top wear item</th>
    <th>Bottom wear item</th>
    <th>Woolen Clothes item</th>
    </tr>
    <tr>
    <td>'.$top_wear.'</td>
    <td>'.$bottom_wear.'</td>
    <td>'.$woolen_clothes.'</td>
    </tr>
    </table><br>
    <h3>Your Total Amount is: (₹'.$price.')</h3>
    <p>We can received order from this Address:<br>'.$address.'<br><br>
    WE WILL REACH SOON!!!<br><br>
    HAPPY SERVICES😊💖<p><br>
    <h3>For More Help Contact By <a href="tel:+916355310515">Krunal Parmar</a> 😊🙏.</h3>
    ';

    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

  if(mysqli_query($conn, $sql)){
    // echo "<script> alert('Laundry request submitted successfully.'); </script>";
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
    $total_price = round($total_price, 2);
    return $total_price;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" alt="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" type="image/x-icon">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Loundry Request</title>
    <style>
    body {
      background-image: url('https://images.pexels.com/photos/325876/pexels-photo-325876.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');
      background-size: cover;
      background-color: #F9F9F9;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
      font-weight: 500;
      font-style: normal;
      font-size:1rem;
    }
    nav{
        h2{
          font-size:3rem ;
          font-weight: 700;
        }
       }
    .for {
      width: 35%;
      border: 3px solid #f1f1f1;
      background-color: whitesmoke;
      margin: 30px auto;
      padding: 10px;
      border: 5px solid #f1f1f1;
      border-radius: 5px;
      
      input[type=text],input[type=password],input[type=tel], input[type=number], input[type=date], input[type=time],input[type=email]{
        width: 100%;
        padding: 12px 20px;
        margin-bottom: 16px;
        display: block;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
      }
      textarea{
        width: 100%;
        padding: 12px 20px;
        margin-bottom: 16px;
        display: block;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
      }
    }
    img{
      height: 30px;
      width: 30px;
    }
    .con-cent{
      display: flex;
      justify-content:space-around;
    }
      .center{
          text-align:center;
        .flex{
          display:flex;
          justify-content: center;
        }
      width: 33.3%;
    #decre,#decre2,#decre3{
        background-color: black;
        color: #fff;
        border: 0px;
        font-size: 1.2rem;
        font-weight: bolder;
        border-radius: 10px 0 0 10px;
    }
    button{
      margin: 0;
      height: 50px;
      width: 27px;
      margin-top: 30px;
    }
    button:hover{
      opacity: 0.7;
    }
    #in,#in2,#in3{
      margin-top: 30px;
      width: 40%;
      height: 50px;
      background-color: white;
      font-weight: bolder;
      border:0;
    }
    input[type=text]{
      border:none;
    }
    #in,#in2,#in3:hover{
      cursor: pointer;
    }
    #incre,#incre2,#incre3{
        background-color: #0d6efd;
        color: #fff;
        border: 0px;
        font-size: 1.2rem;
        font-weight: bolder;
        border-radius: 0 10px 10px 0;
    }
}
@media Only screen and (max-width: 1530px) {
nav{
  h2{
    font-size:2rem;
  }
}
}
@media screen and (min-width:1024px) and (max-width: 1440px) {
        .for{
          width: 40%;
        }
}
@media screen and (min-width:890px) and (max-width: 1024px) {
        .for{
          width:50%;
        }
}
@media screen and (min-width:768px) and (max-width: 890px) {
        .for{
          width:80%;
        }
}

  </style>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="#"><img class="sm" src="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" alt="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg">&nbsp;Loundry</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <h2>Loundry Request</h2>
        <div>
          <button class="btn btn-outline-primary"><a class="text-dark"style="text-decoration:none;"href="view_request.php">View-Request</a></button>
        </div>
      </div>
    </nav>

    <form id="form"class="for " action="" method="post" autocomplete="off">
      <label for="name">Name:</label>
      <input style="width:35%; display:inline-block ;" type="text" name="name" id="name"required autocomplete="off" placeholder="Name" value="<?php echo$row["name"]?>">

      <label for="Phone">Phone no:</label> 
      <input style="width: 35%; display:inline-block;" type="tel" name="phone" id="phone" required autocomplete="off" placeholder="+91"value="<?php echo$row["phone"]?>">
      <div class="flex my-5">
        <label for="name">Email:</label>
        <input style="width: 90%; display:inline-block;"  type="email" name="email" id="email"required autocomplete="off" placeholder="Email" value="<?php echo$row["email"]?>">
      </div>

      <div class="flex my-5">
              <label for="pickup_date">Pickup Date&</label><label for="pickup_time">Time:</label>
      <input style="width: 35%; display:inline-block;" type="date" name="pickup_date" id="pickup_date" required> 
      <input style="width: 35%; display:inline-block;" type="time" name="pickup_time" id="pickup_time" required><br> 
      </div>
      <!-- incre or drece operation -->
      <div class="con-cent my-4">
        <div class="center">
          <label for="top_wear">Wash Top wear:</label>
          <div class="flex">
          <button type="button" id="decre">-</button>
          <input class="a" type="number" id="in" name="top_wear" min="1" readonly required> 
          <button type="button" id="incre">+</button>
          </div>
        </div>
      
        <div class="center">
          <label for="bottom_wear">Wash Bottom wear:</label>
          <div class="flex">
          <button type="button" id="decre2">-</button>
          <input class="b" type="number" id="in2" name="bottom_wear" min="1" readonly required> 
          <button type="button" id="incre2">+</button>
          </div>
        </div>    
          
          <div class="center">
          <label for="woolen_clothes">woolen Clothes:</label>
          <div class="flex">
          <button type="button" id="decre3">-</button>
            <input class="c" type="number" id="in3" name="woolen_clothes" min="1" readonly required> 
            <button type="button" id="incre3">+</button>
          </div>
        </div>
      </div>
      <!-- <input type="text" id="total"> -->
      <label for="Address">Address:</label>
      <textarea name="Address" id="Address" cols="65" rows="5 " placeholder="Enter address" autocomplete="off"><?php echo$row["address"]?></textarea>
      
      <div class="d-flex justify-content-between">
        <a class="m-2" href="dashboard.php" style="text-decoration: none; margin-right: 20px;">Go back</a>
        <button class="btn-lg btn-primary" id="btn" type="submit" name="submit">Submit</button>
      </div>
    </form>
  </body>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
  $(document).ready(function () {
  $('.btn-lg').on('click', function (e) {
    var input1 = parseInt($('#in').val());
    var input2 = parseInt($('#in2').val());
    var input3 = parseInt($('#in3').val());

    if (input1 === 0 && input2 === 0 && input3 === 0) {
      e.preventDefault();
      alert('Please enter more than ZERO (0) Value.');
    }
  });
});
  let d=document.getElementById('decre')
let i=document.getElementById('incre')
let input=document.getElementById('in').value=0
console.log(input);
function decre(){ 
    if (input>0) {
input=document.getElementById("in").value=--input
    }
    
}
function incre(){
    if (input<10) {
        input=document.getElementById("in").value=++input      
    }
}
d.addEventListener('click', decre)
i.addEventListener('click', incre)

// 2
let d2=document.getElementById('decre2')
let i2=document.getElementById('incre2')
let input2=document.getElementById('in2').value=0
function decre2(){ 
    if (input2>0) {
input2=document.getElementById("in2").value=--input2
    }
    
}
function incre2(){
    if (input2<10) {
        input2=document.getElementById("in2").value=++input2     
    }
}
d2.addEventListener('click', decre2)
i2.addEventListener('click', incre2)

// 3
let d3=document.getElementById('decre3')
let i3=document.getElementById('incre3')
let input3=document.getElementById('in3').value=0
console.log(input);
function decre3(){ 
    if (input3>0) {
input3=document.getElementById("in3").value=--input3
    }
}
function incre3(){
    if (input3<10) {
        input3=document.getElementById("in3").value=++input3      
    }
}
d3.addEventListener('click', decre3)
i3.addEventListener('click', incre3)
</script>
</html>

