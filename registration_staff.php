<?php
require 'config.php';

if(empty($_SESSION["id2"])){
  header('location:index.php');
}

if(isset($_POST["login"])){
  $email = $_POST["email"];
  $password = $_POST["password"];
  $query = "SELECT * FROM staff WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    $_SESSION["id"] = $row["id"];
    $_SESSION["name"] = $row["name"];
    header("Location:index2.php");
  }
  else{
    echo
    "<script> alert('Invalid Email or Password'); </script>";
  }
}
if(isset($_POST["register"])){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $gender = $_POST["gender"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM staff WHERE email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Email Has Already Been Used!!!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO staff (name, email, gender,phone, password) VALUES('$name','$email','$gender','$phone','$password')";
      mysqli_query($conn, $query);
              // show success message
              echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Succesfully!</strong> your Account is Register.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'; 
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Loundry Staff-Account-Create</title>
    <style>
      body {
        background-image: url("https://i.pinimg.com/originals/6f/6c/15/6f6c1538b050072b002dbc06bedaaf90.jpg");
        background-size: cover;
        background-color: #F9F9F9;
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        font-style: normal;
        font-size:1rem;
      }

      form {
        border: 3px solid #f1f1f1;
        background-color: #ffffff;
        max-width: 500px;
        margin: 100px auto;
        padding: 20px;
        border-radius: 10px;
      }

      h2 {
        text-align: center;
        margin-top: 0;
      }

      input[type=text], input[type=email], input[type=password] ,input[type=number]{
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
      }
      .check{
        width: 100%;
        /* padding: 12px 20px; */
        margin: 15px 0;
        display: inline-block;
      }
      button {
        background-image: url("https://i.pinimg.com/originals/6f/6c/15/6f6c1538b050072b002dbc06bedaaf90.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
        background-color: #09d8d8;
        color: white;
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
      <h2>Add Staff</h2>
      <div class="container">
        <!-- <label for="name"><b>Name:</b></label> -->
        <input type="text" placeholder="Name" name="name" required><br>

        <!-- <label for="email"><b>Email:</b></label> -->
        <input type="email" placeholder="Email" name="email" required><br>
        <select class="form-select" aria-label="Default select example" name="gender" required>
          <option value="">-Gender-</option>
          <option value="Male">Male</option>
          <option value="female">female</option>
        </select>
        <input type="number" name="phone" required placeholder="phone No">
        <!-- <label for="password"><b>Password:</b></label> -->
        <input type="password" placeholder="Password" name="password" required><br>

        <!-- <label for="confirmpassword"><b>Confirm Password:</b></label> -->
        <input type="password" placeholder="Confirm Password" name="confirmpassword" required><br>

        <div class="check">
          <input type="checkbox" name="check" id="check" required>&nbsp;<label for="check">I agreed all statements in <a href="terms&servicesFORstaff.html">Terms of Service</a></label>
        </div>
        
        <button class="" type="submit" name="register">Register</button>
        <div class="link">
          <p>Have already an account?<a href="dashboard2.php"> Login back</a></p>
        </div>
      </div>
    </form>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
