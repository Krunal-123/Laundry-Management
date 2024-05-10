<!-- php -->
<?php
require 'config.php';
// session_start();
if(!empty($_SESSION["id2"])){
  $id = $_SESSION["id2"];
  $result = mysqli_query($conn, "SELECT * FROM admin WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("location:flip.php");
}
?>
<!-- phph -->
<!-- html -->
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" alt="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" type="image/x-icon">
  <link rel="icon" href="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" alt="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" type="image/x-icon">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Loundry Admin-Index</title>
    <style>
      body {
        background-image: url('https://img.freepik.com/free-photo/orange-flowers-oil-paint-textured-background_53876-125221.jpg?t=st=1715159815~exp=1715163415~hmac=69682d38d81661d7f6abd0d34530b28b98acf0df1e4253167dd152f72a1f94da&w=1380');
        background-size: cover;
        background-repeat: no-repeat;
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
    <h1>Welcome in Admin Section<br><?php if ($row['gender']=='Male'){echo 'Mr.';}else{echo 'Ms.';}?><?php echo strtoupper($row["name"]); ?>🙏</h1>
      <a href="dashboard2.php" class="button">Dashboard</a>
    <!-- <a href="logout.php" class="button">Logout</a> -->
  </body>
</html>
