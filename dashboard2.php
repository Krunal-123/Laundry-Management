
<?php
require 'config.php';
if(empty($_SESSION['id2'])){
  header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="icon" href="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" alt="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Loundry Admin-Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      
  body {
    background: url("https://i.ytimg.com/vi/3zXgztLRwek/maxresdefault.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    box-sizing: border-box;
    /* font */
    font-family: "Poppins", sans-serif;
    font-weight: 600;
    font-style: normal;
    font-size:1rem;
  }
  nav{
        h2{
          margin-left:170px;
          font-size:3rem ;
          text-align: center;
          font-weight: 700;
        }
        img{
          height: 30px;
          width: 30px;
        }
       }
  .c{
    margin: 13% auto;
    display: flex;
    justify-content: space-between;
  }
  
      /* Style for the card-like structure */
      .card {
        display: inline-block;
        width: 300px;
        height:300px;
        margin: 10px;
        padding: 5px;
        border: 5px solid black;
        border-radius: 10px;
        text-align:center;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: all 0.5s ease;

        a{
          width:100%;
          height: 100%;
          display: flex;
        justify-content: center;
        align-items: center;
          img{
          width: 90%;
          height: 90%;
          }
        }
      }
      .card:hover {
        border-radius: 30px;
        transform: rotateX(10deg) translateY(-30px);
        box-shadow: -6px 8px 10px 10px rgba(0, 0, 0, 0.8);
      }
      /* Colors for the different cards */
      .card-1 {
        background-color: #e2ff07;
      }
      .card-2 {
        background-color: rgb(5, 211, 222);
      }
      .card-3 {
        background-color: #0093c6;

      }
      .card-4 {
        background-color: #fff;
      }
      .card-5 {
        background-color: #fd4011;
      }
      footer{
        width: 100%;
        height: 7vh;
        padding: 10px;
        background-color: black;
        color: #fff;
        text-align: center;
        position: absolute;
        bottom: 0px;
      }
      @media only screen and (max-width: 1530px) {
.c{
	margin:8% auto;
}
}
      @media screen and (max-width: 1024px) {
        .c{
          justify-content: space-around;
          flex-wrap:wrap ;
        }
      }
    </style>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid d-flex  justify-content-between">
        <a class="navbar-brand" href="#"><img class="sm" src="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" alt="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg">&nbsp;Loundry</a> 
        <h2>Admin Dashboard</h2>
          <div class="d-flex">
            <div class="collapse navbar-collapse mx-5" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Members
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="registration_staff.php">Add Staff</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="view_staff.php">View Staff</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="view_users.php">View Users</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="users_blockList.php">Users_blockList</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
      </div>
    </nav>

    <div class="container-fluid c">
          <!-- Laundry Request Card -->
          <div class="card card-1">
            <a href="view_request2.php">
            <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/request-form-1458002-1234006.png" alt="">
          </a>
        </div>

     <!-- feedback -->
     <div class="card card-2">
        <a href="feedback2.php">
          <img src="https://cdn-icons-png.flaticon.com/512/2839/2839244.png" alt="">
        </a>
      </div>
      <div class="card card-3">
          <a href="view_staff.php">
          <img src="https://th.bing.com/th/id/R.069a298683edfc64d5a59c5de76df08e?rik=pyEdbSfhrygDXA&riu=http%3a%2f%2fwww.bayanairag.com%2fuploads%2fuserfiles%2fimages%2f9.png&ehk=dvRXlokvmmSTiCvmqizDwT6Z9PY8sFh7iEJkfh6N%2fu8%3d&risl=&pid=ImgRaw&r=0" alt="">
        </a>
        </div>
      <!-- Change Password Card -->
      <div class="card card-4">
          <a href="ResetAdminPassword.php">
          <img src="https://user-images.githubusercontent.com/35910158/35493994-36e2c50e-04d9-11e8-8b38-890caea01850.png" alt="">
        </a>
        </div>


     <!-- Logout Card -->
     <div class="card card-5">
        <a href="logout2.php">
          <img src="https://static.vecteezy.com/system/resources/previews/000/575/349/non_2x/vector-logout-sign-icon.jpg" alt="">
        </a>
      </div>
    </div>

    <!-- Footer -->
    <footer class="fixed-bottom">
      <p>&copy;created by Krunal Team. All rights reserved.</p>
    </footer>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>