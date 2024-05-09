<!-- php -->

<?php
require 'config.php';
// session_start();
if(empty($_SESSION["id3"])){
  header('location:index.php');
}
if (!empty(isset($_POST['sear']))) {
  $search = $_POST['search'];
  if ($search=='') {
    $query = "SELECT * FROM feedback";
    $result = mysqli_query($conn, $query);
  }
  else{
  $query = "SELECT * FROM feedback WHERE CONCAT(name,email) LIKE'%$search%'";
  $result = mysqli_query($conn, $query);
  } 
}
else {
$query = "SELECT * FROM feedback";
$result = mysqli_query($conn, $query);
}
?>

<!-- html -->
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" alt="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Loundry User-feedbacks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    body{
        background:url("https://images.pexels.com/photos/129731/pexels-photo-129731.jpeg");
        background-position: 0%;
        background-repeat: repeat-y;
        overflow-y: scroll;
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        font-style: normal;
        font-size:1rem;
    }
    nav{
      h2{
        margin-left:200px;
          font-size:2.5rem ;
          font-weight: 700;
        }
      img{
		height: 30px;
		width: 30px;
	  }

      }
    .container{
        display: flex;
        flex-direction: row-reverse;
        flex-wrap: wrap-reverse;
    }
    .card{
      margin: 15px;
          transition: all 0.2s ease;
        }
        .card:hover{          
          box-shadow: -8px 8px 0px 2px rgba(0, 0, 0, 0.6);
          transform: rotateX(9deg) translateY(-15px);
          font-weight: 600;
        }
        .for{
      border: 3px solid #f1f1f1;
      background-color: #ffffff;
      max-width: 500px;
      margin: 0 auto;
      padding: 10px;
    }
    input[type=text],input[type=email]{
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
        footer{
        width: 100%;
        height: 6vh;
        padding: 10px;
        background-color: black;
        color: #fff;
        text-align: center;
        .btn-sm:hover{
          box-shadow: -3px 3px 0px 2px rgba(0, 0, 0, 0.4);
        transform: rotateX(9deg) translateY(-4px);
        }
      }
      @media screen and (max-width: 1024px) {
        .container{
          justify-content: space-around;
        }
        .card{
          margin:10px;
        }
      }
</style>
<body>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid d-flex  justify-content-between">
        <a class="navbar-brand" href="#"><img class="sm" src="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" alt="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg">&nbsp;Loundry</a> 
        <h2>User-Feedback</h2>
        <form class="d-flex" action="feedback3.php" method="post">
          <input class="form-control me-2" type="search" placeholder="Search Name | Mail" aria-label="Search" name="search">
          <button class="btn btn-outline-primary" type="submit" name="sear">Search</button>
        </form>
        <!-- <div>
          <button class="btn btn-outline-primary"><a class="text-dark"style="text-decoration:none;"href="dashboard2.php">Go back</a></button>
        </div> -->
    </nav>

    <!-- container -->
    <div class="container my-5">
      <?php if(mysqli_num_rows($result) > 0): ?>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
          <!-- card -->
          <div class="card text-white bg-primary p-1 overflow-auto" style="width:18rem; height: 13rem; ">
            <div class="card-header"><?php echo $row['email']; ?></div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['name'];?></h5>
              <h6>Reply:</h6>
              <p class="card-text"><?php echo $row['comment'];?></p>
            </div>
          </div>
          <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <?php if(mysqli_num_rows($result)==NULL){
          echo "<h1 class='text-center text-light'>No Data Found</h1>";
        } ?>
    <!-- footer -->
    <footer class="fixed-bottom">
    <div class="d-flex justify-content-around m-0">
      <button class="btn-sm btn-primary m-1"><a class="text-light"style="text-decoration:none;"href="dashboard3.php">Go back</a></button>
      <p>&copy;created by Krunal Team. All rights reserved.</p>
      <button class="btn-sm btn-primary m-1">
        <a class="text-light" style="text-decoration:none;" href="view_request3.php">User-Request</a>
      </button>
    </div>
    </footer>
  </body>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>