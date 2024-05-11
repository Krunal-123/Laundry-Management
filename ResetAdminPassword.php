<?php
require 'config.php';
if(isset($_SESSION["id2"])){
	$id = $_SESSION["id2"];
	$result = mysqli_query($conn, "SELECT * FROM admin WHERE id = $id");
	$row = mysqli_fetch_assoc($result);
  } 

if(isset($_POST["submit"])){
  $email = $_POST["email"];
  // check if username exists
  $result = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email'");
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
      $result=mysqli_query($conn, "UPDATE admin SET password = '$new_password' WHERE email = '$email'");
      if ($result){
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

if (isset($_POST['p'])) {
  if ($_POST['pass']=='462863') {
    $admin='admin';
    $_SESSION["admin"] = $admin;
    header('location:view_admins.php');
  }
  else{
    echo"<script>alert('Super Admin Password Is Wrong')</script>";
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
    <title>Loundry Reset-Admin-Password</title>
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
      /* .for is for modal form */
      .for{
        img{
          width: 100px;
          height: 100px;
        }
      }
      img{
        width: 200px;
        height: 200px;
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
      a[href="#"] {
        text-decoration:none;
        float: right;
        font-size: larger;
      }
    </style>
  </head>
  <body>
  <form method="post">
    <img src="https://th.bing.com/th/id/OIP.9bLa6OsvYEWKly7Zu9bUowHaHa?rs=1&pid=ImgDetMain" alt="">
    <h1>Reset Admin Password</h1>
      <label for="email">Email Id:</label><br>
      <input type="email" name="email" value="<?php echo $row["email"];?>" readonly required><br>
      <br>
      <label for="new_password">New Password:</label><br>
      <input type="password" name="new_password" required><br>
      
      <label for="new_password">Confirm Password:</label><br>
      <input type="password" name="confirm_password" required>
      <br>
      <input type="submit" class="btn btn-primary m-2" name="submit" value="Reset Password">
      <br>
      <a href="dashboard2.php" class="my-3">Go Back</a>
      <a href="#" class="my-3 js">Other Admins</a>
    </form>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">SUPER ADMIN!!<br>(SECTION ONLY)</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- form -->
                      <form class="for" action="ResetAdminPassword.php" method="post" autocomplete="off">
                      <img src="https://th.bing.com/th/id/OIP.9bLa6OsvYEWKly7Zu9bUowHaHa?rs=1&pid=ImgDetMain" alt="">
                      <h2>SUPER ADMIN</h2>
                      <input class="text-left w-100" type="password" name="pass" placeholder="Password">
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="p" class="btn btn-primary">ENTER</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
  $(document).ready(function () {
  $('.js').on('click', function () {
    var $row = $(this).closest('tr');
    
    // fin data
    var id = $row.data('id');
    var name = $row.find('.name').text();
    var email = $row.find('.email').text();
    var gender = $row.find('.gender').text();
    var password = $row.find('.password').text();
    var phone = $row.find('.phone').text();
    var address = $row.find('.address').text();

    // insert data in modal
    $('#id').val(id);
    $('#name').val(name);
    $('#email').val(email);
    $('#gender').val(gender);
    $('#password').val(password);
    $('#phone').val(phone);
    $('#address').val(address);

    $('#exampleModal').modal('show');
  });

});
</script>
  </html>
