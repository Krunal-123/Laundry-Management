<?php
require 'config.php';

if(isset($_POST["submit"])){
  $email = $_POST["email"];

  // check if username exists
  $result = mysqli_query($conn, "SELECT * FROM staff WHERE email = '$email'");
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
      $result=mysqli_query($conn, "UPDATE staff SET password = '$new_password' WHERE email = '$email'");
      if ($result) {
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
        background-image: url('https://img.freepik.com/free-vector/blue-tropical-leaves-copy-space-background_23-2148546191.jpg?t=st=1715151190~exp=1715154790~hmac=80c42325f48cce1a5d66b338c85a047f7a1bda2200428062f019a4799a5da31c&w=1380');
        background-repeat: no-repeat;
        background-size: cover;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        font-style: normal;
        font-size:1rem;
      }
   
      form{
        width: 40%;
        border: 3px solid #f1f1f1;
			 background-color: #ffffff;
			 margin: 8% auto;
			 padding: 50px;
       text-align: center;
       border-radius: 10px;
      }
   
      h2 {
        text-align: center;
        margin-top: 0;
      }
   
      input[type=email], input[type=password]{
        width: 70%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 2px;
        text-align:center;
      }
      a[href="dashboard2.php"] {
        text-decoration:none;
        float: left;
        font-size: larger;
      }     
      a[href="view_staff.php"] {
        text-decoration:none;
        float: right;
        font-size: larger;
      }
      @media only screen and (max-width:1530px){
  form{
      margin:2% auto;
}
}
    </style>
  </head>
  <body>
  <form method="post">
    <img src="https://th.bing.com/th/id/OIP.PyVTS7paIbN-6HNmeuz3SwAAAA?rs=1&pid=ImgDetMain" alt="">
    <h1>Reset Staff Password</h1>
      <label for="email">Email Id:</label><br>
      <input type="email" name="email" value="<?php echo $_POST['email'];?>" required><br>
      <br>
      <label for="new_password">New Password:</label><br>
      <input type="password" name="new_password" required><br>
      
      <label for="new_password">Confirm Password:</label><br>
      <input type="password" name="confirm_password" required>
      <br>
      <input type="submit" class="btn btn-primary m-2" name="submit" value="Reset Password">
      <br>
      <a href="dashboard2.php" class="my-3">Go Back</a>
      <a href="view_staff.php" class="my-3">View Staff</a>
    </form>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
