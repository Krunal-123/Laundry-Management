<?php
require 'config.php';

if(!empty($_SESSION["id"])){
	$id = $_SESSION["id"];
	$result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
	$row = mysqli_fetch_assoc($result);
  }
  else{
    header("Location:index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" alt="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" type="image/x-icon">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loundry Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
  body {
    margin: 0;
    padding: 0;
    /* background-image: url("https://www.platinumhousekeeping.com/wp-content/uploads/2018/04/black-and-white-clean-housework-launderette.jpg"); */
    background: url("https://p.turbosquid.com/ts-thumb/SJ/ax8KF1/iyGHhcLZ/example_scene/jpg/1585870436/1920x1080/fit_q87/0071027355af1cb38fd70f6260bf65974e4dd6ad/example_scene.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    box-sizing: border-box;
    /* font style*/
    font-family: "Poppins", sans-serif;
    font-weight: 400;
    font-style: normal;
    font-size: 1rem;
    /* box-sizing: border-box; */
  }
  nav{
        h2{
          color:black;
          font-weight: 700;
          font-size:3rem ;
        }
        img{
          height: 30px;
          width: 30px;
        }
  }
  .c{
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    box-sizing: border-box;
    h3{
      font-weight: 700;
    }
  }

      /* Style for the card-like structure */
      .card {
        display: inline-block;
        width: 270px;
        height: 195px;
        margin: 10px;
        padding: 8px;
        box-shadow: 4px 6px 4px 4px rgba(0,0,0,0.2);
        border: 1px solid black;
        border-radius: 5px;
        transition: all 0.3s ease;
        a{
      .bt{
        width:50%;
        padding: 5px;
        border: 0px;
        border-radius: 10px;
        background-color: #fff;
        text-decoration: none;
        color: black;
        }
      }
      a{
      .bt:hover{
        background-color: black;
          color: #fff;
        transition: all 0.4s ease;
        }
      }
      }
      .card:hover {
        cursor: pointer;
        border-radius: 20px;
        transform: rotateX(10deg) translateY(-10px);
        box-shadow: -6px 8px 4px 2px rgba(0, 0, 0, 0.6);
      }
      /* Colors for the different cards */
      .card-1 {
        background-color: #fb6730;
      }
      .card-2 {
        background-color: #52baff;
      }
      .card-4 {
        background-color: #ffff8c;
      }
      .card-5 {
        background-color: #b76aff;
      }
      .card-5-1 {
        background-color: rgb(27, 249, 160);
      }
      .card-5-2 {
        background-color: rgb(247, 99, 255);
      }
      .card-6 {
        background-color: #ff6161;
      }
      .card-7 {
        background-color: #8753ff;
      }

      .head{
        margin: 0;
        color: #8a5bf7;
        margin-top: -20px;
        margin-bottom: 62px;
        .pricelist{
        text-align: center;
        font-size: 3rem;
        font-weight: 700;
      }
        th{
          color:whitesmoke;
          font-size: larger;
          font-weight: 700;
        }
        td{
          color:whitesmoke ;
        }
        tr{
          margin: 10px;
          transition: all 0.2s ease;
        }
        tr:hover{
          transform: rotateX(9deg) translateY(-9px);
          font-weight: 600;
        }
      }
      footer{
        width: 100%;
        height: 7vh;
        padding: 10px;
        background-color: black;
        color: #fff;
        text-align: center;
      }
      /* Modal form */
      .for{
      border: 3px solid #f1f1f1;
      background-color: #ffffff;
      max-width: 500px;
      margin: 0 auto;
      padding: 10px;
    }
    input[type=text],input[type=email],input[type=tel]{
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
      @media screen and (max-width: 1024px) {
        .c{
          justify-content: space-around;
        }
}
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid d-flex justify-content-between">
        <div class="d-flex">
          <a class="navbar-brand" href="#"><img class="sm" src="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" alt="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg">&nbsp;Loundry</a>
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            My Profile
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item js" href="#">Edit Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item del">Delete Profile</a></li>
          </ul>
        </li>
      </ul>
    </div>
        </div>
        <h2>User-Dashboard</h2>
        <div>
          <button class="btn btn-outline-dark mx-4"><a class="text-primary"style="text-decoration:none;"href="logout.php">Logout</a></button>
          </div>
      </div>
    </nav>
    
<!--Edit profile Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="for" action="editprofile.php" method="post">
        <div class="modal-body">
          <input type="hidden" name="id" value="<?php echo$row["id"]?>">
          <label for="email">Email:<span class="fw-light">(Read Only)</span></label><br>
          <input type="email" name="email" id="email" value="<?php echo$row["email"]?>"readonly><br>
          <label for="name">Name:</label><br>
          <input type="text" name="name" id="name" value="<?php echo$row["name"]?>" required><br>
          <label for="phone">Phone No:</label><br>
          <input type="tel" name="phone" id="phone" value="<?php echo$row["phone"]?>" required><br>
          <lable for="address">Address:</lable><br>
          <textarea name="address" id="address" cols="55" rows="5"required><?php echo$row["address"]?></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--Delete profile Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- form -->
      <form action="deleteprofile.php" method="post">
      <div class="modal-body">
      <h2>Are You Sure You Want To Delete Your Account?</h2>

      </div>
      <div class="modal-footer d-flex justify-content-between">
      <div class="form-check">
          <label class="form-check-label" for="flexCheckDefault">All History will be Deleted<br>(Permanently!)</label>
          <input class="form-check-input" type="checkbox"  name="yes[]" value="yes" id="flexCheckDefault">
        </div>
        <div>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</a></button>
        </div>
      </div>
      </form>
      <!-- form -->
    </div>
  </div>
</div>

<!-- container -->
    <div class="container c my-2 d-flex">
      <!-- Content here -->
      <div class="card card-1">
        <h3>Laundry Request</h3>
        <p>Book a new laundry request</p>
        <a href="laundry_request.php">
        <button class="bt">
            Book now
          </button>
        </a>
      </div>
  
      <!-- Laundry Request Card -->
      <div class="card card-2">
        <h3>view request</h3>
        <p>view your request here</p>
        <a href="view_request.php">
        <button class="bt">
            View now
          </button>
        </a>
      </div>
  
      <!-- Change Password Card -->
      <div class="card card-4">
        <h3>Change Password</h3>
        <p>Update your account password</p>
        <a href="forgot_password.php">
        <button class="bt">
            Change now
          </button>
        </a>
      </div>
  
      <!-- Contact Us Card -->
      <div class="card card-5">
        <h3>Contact Us</h3>
        <p>Get in touch with our support team</p>
        <a href="contact.html">
        <button class="bt">
            Contact now
          </button>
        </a>
      </div>
            <!-- QUESTIONS Card -->
            <div class="card">
        <h3>Questions?</h3>
        <p>Having Questions About Our Services</p>
        <a href="HavingQuestion.html">
        <button class="bt border border-dark border-2">Ask</button>
        </a>
      </div>
      <!-- OUR SERVIES -->
      <div class="card card-5-1">
        <h3>Our Servies</h3>
        <p>Find out about all of the services that Loundry Service has to offer.</p>
        <a href="ourservices.html">
        <button class="bt">Open</button>
        </a>
      </div>
       <!-- feedback -->
       <div class="card card-6">
        <h3>feedback</h3>
        <p>Give your feedback about our service</p>
        <a href="feedback.php">
        <button class="bt">
            feedback
          </button>
        </a>
      </div>
  
       <!-- Logout Card -->
       <div class="card card-7">
        <h3>Logout</h3>
        <p>Logout from your account</p>
        <a href="logout.php">
        <button class="bt">
            Logout now
          </button>
        </a>
      </div>
    </div>
<br>
<br>

    <!-- Price Table -->
    <div class="container-fluid head">
      <h2 class="pricelist">Price List</h2>
      <table class="table table-hover">
      <tr>
        <th>Service</th>
        <th>Price</th>
      </tr>
      <tr>
        <td><b>Top Wear</b></td>
        <td><b>₹10</b></td>
      </tr>
      <tr>
        <td><b>Bottom Wear</b></td>
        <td><b>₹20</b></td>
      </tr>
      <tr>
        <td><b>Woolen Clothes</b></td>
        <td><b>₹30</b></td>
      </tr>
      <tr>
        <td><b>Delivery[above 2km]</b></td>
        <td><b>₹2</b></td>
      </tr>
    </table>
    </div>

    <!-- Footer -->
    <footer class="fixed-bottom">
      <p>&copy;created by Krunal Team. All rights reserved.</p>
    </footer>
  </body>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script>
  $(document).ready(function () {
  $('.js').on('click', function () {
    $('#exampleModal1').modal('show');
  });
});

$(document).ready(function () {
  $('.del').on('click', function () {
    $('#exampleModal2').modal('show');
  });
});
</script>
  </html>