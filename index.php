<!-- user php -->
<?php
require 'config.php';

if(isset($_POST["user"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM block WHERE email = '$usernameemail'");
  $result2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result2);
  if (mysqli_num_rows($result)>0) {
    echo
    "<script> alert('You BLOCKED🚫 By Admin, Pls Contact Them.'); </script>";
  }
  elseif(mysqli_num_rows($result2) > 0){
    if($password == $row['password']){
      $_SESSION["email"] =$usernameemail;
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("location:welcome_users.php");
    }
    else{
      echo
      "<script> alert('User is Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}

// admin & staff

if(isset($_POST["admin"])){
  if ($_POST['check']=='Admin') {
    $usernameemail = $_POST["usernameemail2"];
    $password = $_POST["password2"];
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
      if($password == $row['password']){
        $_SESSION["email2"] =$usernameemail;
        $_SESSION["login2"] = true;
        $_SESSION["id2"] = $row["id"];
        header("location:welcome_admin.php");
      }
      else{
        echo
        "<script> alert('Admin Password is Wrong'); </script>";
      }
    }
    else{
      echo
      "<script> alert('Admin Not Registered'); </script>";
    }
  }
  else {
    $usernameemail = $_POST["usernameemail2"];
    $password = $_POST["password2"];
    $result = mysqli_query($conn, "SELECT * FROM staff WHERE email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
      if($password == $row['password']){
        $_SESSION["email3"] =$usernameemail;
        $_SESSION["login3"] = true;
        $_SESSION["id3"] = $row["id"];
        header("location:welcome_staff.php");
      }
      else{
        echo
        "<script> alert('Staff Password is Wrong'); </script>";
      }
    }
    else{
      echo
      "<script> alert('Staff Not Registered'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="icon" href="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" alt="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Loundry-Management_system</title>
    <style>
    body{
  font-family: "Poppins", sans-serif;
  font-weight: 500;
  font-style: normal;
    }
/* THE MAINCONTAINER HOLDS EVERYTHING */
.maincontainer{
  position: absolute;
  width: 99vw;
  height: 100vh;
  background: none;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

/* THE CARD HOLDS THE FRONT AND BACK FACES */
.thecard{
  position: relative;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  transform-style: preserve-3d;
  transition: all 1.5s ease;
}
/* THE PSUEDO CLASS CONTROLS THE FLIP ON MOUSEOVER AND MOUSEOUT */
.rotate-page {
  transform: rotateY(180deg);
}
.rotate-page2 {
  transform: rotateX(180deg);
}
/* THE FRONT FACE OF THE CARD, WHICH SHOWS BY DEFAULT */
 .thefront{
  position: absolute;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  backface-visibility: hidden;
  overflow: hidden;
  color: #000;
}

/* THE BACK FACE OF THE CARD, WHICH SHOWS ON MOUSEOVER */
.theback{
  position: absolute;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  backface-visibility: hidden;
  overflow: hidden;
  background: #fafafa;
  color: #333;
  transform: rotateY(180deg);
}

/*This block (starts here) is merely styling for the flip card, and is NOT an essential part of the flip code */
.thefront h1, .theback h1{
  padding: 30px;
  font-weight: bold;
  font-size: 24px;
  text-align: center;
}

.thefront p, .theback p{
  padding: 30px;
  font-weight: normal;
  font-size: 12px;
  text-align: center;
}
        body{
            padding: 0;
            margin: 0;
            font-family: sans-serif;
            transition: transform 0.5s;
        }
        form {
      /* border: 3px solid #f1f1f1; */
      background-color: #ffffff;
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
    }
    h2 {
      text-align: center;
      margin-top: 0;
    }
    input[type=email], input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      background-color:#e3e4e6 ;
      border: 1px solid #ccc;
      border-radius: 7px;
      box-sizing: border-box;
    }
    button[type=submit] {
      background-color: black;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      font-size: large;
      font-weight: 700;
      border: none;
      border-radius:5px;
      cursor: pointer;
      width: 50%;
    }  
    /* user */
    .cont{
            display: flex;
            flex-direction: row;
            .signin{
                width: 35vw;
                height: 100vh;
                background-color: #ffffff;
                text-align: center;
                display: flex;
                justify-content: center;
                align-items: center;
                button{
                  padding: 10px 15px;
                  margin: 8px 0;
                  font-size: large;
                  font-weight: 700;
                  background-color: black;
                  color: #fff;
                  border: none;
                  border-radius:5px;
                  cursor: pointer;
                }
            }
            .photo{
              /* background-image: url(imagess/Laundryphoto.jpeg); */
                background-repeat: no-repeat;
                background-position: center;
                width: 65vw;
                height: 100vh;
                background-color: #e3e4e6;
                text-align:center;
                img{
                  width:64%;
                  margin :15%;
                  
                }
            }
        }
        .btn{
            button{
                background-color: black;
                padding: 10px 15px;
                margin: 8px 0;
                font-size: large;
                font-weight: 700;
                border: none;
                border-radius:5px;
                cursor: pointer;
                /* width: 50%; */
                a{
                    text-decoration: none;
                    color: white;
                }
            }
            a{
                    text-decoration: none;
                    /* color: white; */
                }
        }
/* admin css */

/* admin log */
.adminlog{
  background-color: whitesmoke;
  color: black;
    text-align: center;
    input{
      margin: 0px;
    }
    input[type="checkbox"]:checked {
      accent-color: blue;
    }
}
    </style>
  </head>

  <body>
    <div class="maincontainer">
          
        <div class="thecard">
            <!-- user -->
            <div class="thefront">
                <div class="cont">
                    <div class="signin">
                        <form action=""  method="post" autocomplete="off">
                            <h2>Sign In</h2>
                            <label for="usernameemail">Email</label><br><br>
                            <input type="email" name="usernameemail" id="usernameemail"><br>
                            <label for="password">password</label><br>
                            <input type="password" name="password" id="password"><br>
                            <button type="submit" name="user">Login</button><br> <span>or</span><br>
                            <div class="btn">
                                <button ><a href="registration.php" >Register</a></button>
                                <a href="forgot_all.php" style>Forgot password?</a>
                            </div>
                        </form>
                    </div>
                    <div class="photo">
                        <img src="https://th.bing.com/th/id/OIP.PVqWxx_53bGHQMcp4RrLdgAAAA?rs=1&pid=ImgDetMain" alt="img">
                    </div>
                </div>
            </div>


                <!-- admin -->
            <div class="theback">
                <div class="cont">
                    <div class="photo">
                        <img src="https://th.bing.com/th/id/OIP.PVqWxx_53bGHQMcp4RrLdgAAAA?rs=1&pid=ImgDetMain" alt="img">
                    </div>
                    <div class="signin">
                      <!-- form start -->
                      <form action=""  method="post">
                      <h3 class="my-3">
                        <input class="form-check-input" type="radio" name="check" value="Staff" id="flexRadioDefault1" required>
                        <label class="form-check-label" for="flexRadioDefault1">
                          Staff
                        </label>
                        <span>||</span>
                        <input class="form-check-input" type="radio" name="check" value="Admin" id="flexRadioDefault2" required>
                        <label class="form-check-label" for="flexRadioDefault2">
                          Admin
                        </label>
                      </h3>
                            <label for="usernameemail2">Email</label><br><br>
                            <input type="email" name="usernameemail2" id="usernameemail2" required><br>
                            <label for="password">password</label><br>
                            <input type="password" name="password2" id="password2" required><br>
                            <button type="submit" name="admin">Login</button><br>
                            <div class="form-check form-switch d-flex justify-content-center">
        </div>
                        </form>
                    </div>   
                </div>
            </div>
            
        </div>
        <div class="form-check form-switch d-flex justify-content-center">
          <label class="form-check-label" for="flexSwitchCheckDefault">Only Staff&Admin Can login:</label>
          <input class="form-check-input mx-1" type="checkbox" id="flexSwitchCheckDefault" onclick="rotatePage()">
        </div>

    </div>

  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    function rotatePage() {
      var body = document.querySelector('.thecard');
      body.classList.toggle('rotate-page');
}
  </script>
</html>