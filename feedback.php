<?php
require 'config.php';

if(!empty($_SESSION["id"])){
	$id = $_SESSION["id"];
	$result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
	$row = mysqli_fetch_assoc($result);
  }
  else{
	header('location:index.php');
  }
  
if (isset($_POST['submit'])) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$feedback=$_POST['feedback'];
	$sql="INSERT INTO`feedback`(name,email,comment) values('$name','$email','$feedback')";
	$result=mysqli_query($conn,$sql);
	if ($result) {
		echo
		"<script>alert('Your Feedback is successfuly Submited.<br>Thank for the Feedback😊'); </script>";
		header('location:dashboard.php');
	}
	else{
		echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Feedback Is Not Sumbmited!</strong>TRY AGAIN.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>';
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
		<title>Loundry feedback</title>
	<style>
         body {
    background-image: url("https://img.freepik.com/free-vector/gradient-abstract-background-with-different-shapes_23-2149112894.jpg?w=1800&t=st=1715191910~exp=1715192510~hmac=7bf39fa2a8257032486cdb3741251c9f130dec339a7c2c4f9f658758176c8c24");
    background-repeat: no-repeat;
    background-size: cover;
	/* font */
	font-family: "Poppins", sans-serif;
  font-weight: 500;
  font-style: normal;
         }
		 nav{
			h2{
				font-size:2.5rem ;
				font-weight:700;;
			}
		}
		 .form {
			 margin: 5% auto;
			border:5px solid black;
			 border-radius:10px;
			 background-color: transparent;
			 max-width: 500px;
			 padding: 20px;
			 width: 50%;
			 font-size:1rem;
			 h2{
				 text-align: center;
				}
				 a{
					 margin-top:20px;
					 text-decoration:none;
					 float: right;
					 font-size: larger;
					 color: black;
					}
				}
    input[type=text],input[type=email]{
      width: 100%;
      padding: 12px 20px;
      margin-bottom: 16px;
	  border-style: inherit;
	  border-radius: 10px;
      box-sizing: border-box;
    }
	input[type=submit]{
		display: block;
		width: 40%;
		margin: auto auto;
		padding: 12px 20px;
		margin-bottom: 16px;
		border: 0px;
		border-radius: 10px;
		box-sizing: border-box;
		background-color: rgb(255, 62, 158);
	}
	input:focus{
		border: 3px solid  rgb(255, 62, 158);
		outline:  rgb(255, 62, 158);
	}
	input[type=submit]:hover{
		opacity: 0.7;
	}
	textarea{
		width: 100%;
      padding: 12px 20px;
      margin-bottom: 16px;
	  border-radius: 10px;
      box-sizing: border-box;
	}
	textarea:focus{
		border: 3px solid #ff33cc;
		outline: #ff33cc;
	}
	footer{
        width: 100%;
        height: 7vh;
		display: flex;
		justify-content: center;
		align-items: center;
        padding: 10px;
        background-color: black;
        color: #fff;
        text-align: center;
      }
	  img{
		height: 30px;
		width: 30px;
	  }
@media only screen and (max-width: 1530px) {
.form {
	margin:1% auto;
}
}
	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="#"><img class="sm" src="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" alt="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg">&nbsp;Loundry</a>
        </button>
          <h2>Feedback form</h2>
          <div>
            <button class="btn btn-outline-info"><a class="text-dark"style="text-decoration:none;"href="dashboard.php">Go back</a></button>
          </div>
      </div>
    </nav>

	<form class="form" action="" method="post" autocomplete="off">
		<h2>feedback</h2>
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" required autocomplete="off" value="<?php echo$row["name"]?>" readonly required>

		<label for="email">Email:</label>
		<input type="email" name="email" id="email" required value="<?php echo$row["email"]?>" readonly required>

		<label for="feedback">feedback:</label>
		<textarea name="feedback" id="feedback" cols="65" rows="5 " placeholder="Your feedback" autocomplete="off" required ></textarea>
		<input type="submit" name="submit" value="Submit">
		<a href="dashboard.php">Go back</a>
	</form>
	  <footer class="fixed-bottom">
		<p>&copy;created by Krunal Team. All rights reserved.</p>
	  </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
