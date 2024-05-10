<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("location:flip.php");
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
    <title>Loundry Index</title>
    <style>
      body {
        background-image: url('https://img.freepik.com/free-vector/ginkgo-leaf-frame-design-colorful-background_53876-120237.jpg?t=st=1715149984~exp=1715153584~hmac=fcf88cf2f020221134ee6c028f043573ddbca849e885a9e2264f66af4e1baf5a&w=1380');
        background-size: cover;
        text-align: center;
        color: black;
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        font-style: normal;
        font-size:1rem;
      }
      h1 {
        margin-top: 100px;
        font-size: 50px;
      }
      p {
        width: 95%;
        margin: auto auto;
        font-size: 24px;
      }
      .button {
        display: inline-block;
        padding: 12px 24px;
        background-color: purple;
        color: white;
        text-align: center;
        font-size: 18px;
        border-radius: 25px;
        margin-top: 50px;
        text-decoration: none;
      }
      .button:hover {
        background-color: indigo;
      }
    </style>
  </head>
  <body>
    <h1>🎊Welcome to our website🎊<br>🎉<?php if ($row['gender']=='Male'){echo 'Mr.';}else{echo 'Ms.';}?><?php echo strtoupper($row["name"]); ?>.🎉</h1>
    <p>  Our system is designed to make your loundry management easier and more efficient. With our user-friendly interface, you can easily manage all your loundry requests, view notifications, and update your account information.
      We understand that loundry day can be a hassle, but our system is here to help you streamline the process and make it a breeze. Whether you need a quick wash and fold, or a more extensive dry cleaning service, we've got you covered.
      Thank you for choosing our Laundry Management System. We're excited to make your loundry experience as stress-free as possible!</p>
    <a href="dashboard.php" class="button">Dashboard</a>
  </body>
</html>
