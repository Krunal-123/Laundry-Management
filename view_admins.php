<?php
require 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(empty($_SESSION["id2"])){
  header('location:index.php');
}

if (!empty(isset($_POST['sear']))) {
  $search = $_POST['search'];
  if ($search=='') {
    $query = "SELECT * FROM admin";
    $result = mysqli_query($conn, $query);
  }
  elseif ($search=="male"||$search=="female"||$search=="fe"||$search=="ma"||$search=="Male"){
    $query = "SELECT * FROM admin WHERE gender like'%$search%'";
    $result = mysqli_query($conn, $query);
  }
  else{
    $query = "SELECT * FROM admin WHERE CONCAT(name,email) LIKE'%$search%'";
    $result = mysqli_query($conn, $query);
  } 
}
else {
$query = "SELECT * FROM admin";
$result = mysqli_query($conn, $query);
}

if (isset($_POST['remove'])) {
  if ($_POST['id']==$_POST['confirmPASS']) {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $reason=$_POST['reason'];
    $M;
    if ($gender=='Male'){
        $M='Mr.';
    }else{
        $M='Ms.';
    }
    $sql="DELETE FROM `admin` where id=$id";
    $result=mysqli_query($conn,$sql);

    if ($result) {
        if ($reason!='') {
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
            $mail->Subject ='Your are REMOVE from the ADMIN POSITIONS';
            $mail->Body='<h2>'.$M.$name.'</h2><br>'.'<h3>Reason:<br>'.$reason.'</h3>';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            if ($id==$_SESSION['id2']) {
              unset($_SESSION['id2']);
              header('location:index.php');
            }else{
              header('location:view_admins.php');
            }
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        }
        else {
          if ($id==$_SESSION['id2']) {
            unset($_SESSION['id2']);
            header('location:index.php');
          }else{
            header('location:view_admins.php');
          }
        }
    }
}
else{
  echo"<script>alert('Confirm Password Is Wrong')</script>";
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
    <title>Loundry Admin-vw-requests</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
             body {
        background-image: url("https://img.freepik.com/free-vector/abstract-classic-blue-background_23-2148430345.jpg?w=1800&t=st=1715238086~exp=1715238686~hmac=26ae8f1ec2c1d14d096096354e6bdf26a0569217e58c29f4ca53547ff49e426b");
        background-repeat: repeat-y;
        background-size: cover;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        font-style: normal;
        font-size:1rem;
       }
       nav{
        h2{
          margin-left:190px;
          font-size:2.5rem ;
          font-weight:700;
        }
       }
       .for{
      border: 3px solid #f1f1f1;
      background-color: #ffffff;
      max-width: 500px;
      margin: 0 auto;
      /* padding: 20px; */
    }
    input[type=password]{
      width: 70%;
      margin:auto auto;
      padding: 12px 20px;
      margin-bottom: 16px;
      display: block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    textarea{
      height:150px;
      width: 100%;
      padding: 12px 20px;
      margin-bottom: 16px;
      display: block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    #head{
        position: sticky;
        top:0px;
        color:black;
        background-color: #fff;
        padding: 20px;
    }
    tr{
      color:#ffff;
      transition: all 0.2s ease;
    }
    tr:hover{
          transform: rotateX(9deg) translateY(-9px);
          font-weight: 700;
        }
        .btn-danger:hover ~tr{
         /* color:#f84361; */
         background-color: red;
        }
        .flex{
          width:60%;
          margin: 30px auto ;
          display:flex;
          justify-content:space-between;
          position: relative;
          bottom: 0px;
      }
      .btn-sm:hover{
        box-shadow: -3px 3px 0px 2px rgba(0, 0, 0, 0.4);
        transform: rotateX(9deg) translateY(-4px);
      }
      footer{
        width: 100%;
        height: 6vh;
        padding: 10px;
        background-color: black;
        color: #fff;
        text-align: center;
      }
      img{
        width:30px;
        height:30px;
      }      
  </style>
  </head>
  <body>
    <!-- nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid d-flex  justify-content-between">
        <a class="navbar-brand" href="#"><img class="sm" src="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" alt="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg">&nbsp;Loundry</a> 
        <h2>Admin-Details</h2>
        <form class="d-flex" action="view_admins.php" method="post">
        <input class="form-control me-2" type="search" placeholder="Name | Mail | gender" aria-label="Search" name="search">
        <button class="btn btn-outline-primary" type="submit" name="sear">Search</button>
      </form>
      </div>
    </nav>

    <div class="container over border border-0 my-5" style="width:90vw;">
      <h2 class="text-center text-light my-3">Number Of ADMIN: <?php echo mysqli_num_rows($result);?></h2>
      <?php if(mysqli_num_rows($result) > 0): ?>
      <table class="table" >
        <tr id="head">
          <!-- <th>Id</th> -->
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>gender</th>
          <th class="text-center">Password</th>
          <th class="text-center">Reset PASSWORD</th>
          <th>Dismiss</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
          <tr data-id="<?php echo $row['id'];?>">
            <td class="name"><?php echo $row['id']; ?></td>
            <td class="name"><?php echo $row['name']; ?></td>
            <td class="email"><?php echo $email=$row['email']; ?></td>
            <td class="gender"><?php echo $row['gender']; ?></td>
            <td class="text-center"><?php echo $row['password']; ?></td>
            <td class="text-center">
              <!-- Reset btn -->
              <form action="ResetAdminPasswordBySuperAdmin.php" method="post">
                <input type="hidden" name="email" value="<?php echo $email;?>">
                <button type="submit" class="btn-sm btn-success px-4">
                  <i class="fa-solid fa-rotate-right"></i>
                </button>
              </form>
            </td>
            <td>
              <!-- Remove admin btn -->
                <button type="button" class="btn-sm btn-danger js">
                  Remove
                </button>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
    <?php endif; ?>
    <?php if(mysqli_num_rows($result)==NULL){
      echo "<h1 class='text-center text-light'>No Data Found</h1>";
    } ?>
  </div>
                         <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Dismiss!</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- form -->
                      <form class="for" action="view_admins.php" method="post">
                        
                        <input type="hidden"name="name" id="name">
                        <input type="hidden" name="email" id="email">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="gender" id="gender">
                        <label for="reason">Reason:</label>
                        <textarea name="reason" id="reason"></textarea>
                        <input type="password" name="confirmPASS" placeholder="Confirm Password" required>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="remove" class="btn btn-danger">Remove</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
    <div class="flex">
    </div>
    <footer class="fixed-bottom">
    <div class="d-flex justify-content-around m-0">
      <button class="btn-sm btn-primary m-1"><a class="text-light"style="text-decoration:none;"href="dashboard2.php">Go back</a></button>
      <p>&copy;created by Krunal Team. All rights reserved.</p>
      <button class="btn-sm btn-primary m-1">
        <a class="text-light" style="text-decoration:none;" href="registration_NEWadmin.php">Add-Admin</a>
      </button>
    </div>
    </footer>
  </body>
  <!-- jquery for data show in modal -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <!-- ##### -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script>
$(document).ready(function () {
  
  $('.js').on('click', function () {
    var $row = $(this).closest('tr');
    
    // fin data
    var id = $row.data('id');
    var name = $row.find('.name').text();
    var email = $row.find('.email').text();
    var gender = $row.find('.gender').text();

    // insert data in modal
    $('#id').val(id);
    $('#name').val(name);
    $('#email').val(email);
    $('#gender').val(gender);

    $('#exampleModal').modal('show');
  });

  $('.btn-danger').hover(function () {
    $(this).closest('tr').css('color', 'red');
  }, function () {
    $(this).closest('tr').css('color', '');
  });

  $('.btn-success').hover(function () {
    $(this).closest('tr').css('color', '#00ff00');
  }, function () {
    $(this).closest('tr').css('color', '');
  });
  
});
</script>
</html>