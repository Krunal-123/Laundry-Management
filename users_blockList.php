<?php
require 'config.php';

if(empty($_SESSION["id2"])){
  header('location:index.php');
}

if (!empty(isset($_POST['sear']))) {
  $search = $_POST['search'];
  if ($search=='') {
    $query = "SELECT * FROM block";
    $result = mysqli_query($conn, $query);
  }
  else{
    $query = "SELECT * FROM block WHERE CONCAT(name,email,phone) LIKE'%$search%'";
    $result = mysqli_query($conn, $query);
  } 
}
else {
$query = "SELECT * FROM block";
$result = mysqli_query($conn, $query);
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
    <title>Loundry USER-BLOCKLIST</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
             body {
        background-image: url("https://img.freepik.com/free-photo/vivid-blurred-colorful-wallpaper-background_58702-3772.jpg?w=1380&t=st=1714930757~exp=1714931357~hmac=04884fd75db732bc81ec6c1ba9d893e5e0358249b6b8307e0b67e91c7a8cd35b");
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
    }
       input[type=text],input[type=password],input[type=tel], input[type=number], input[type=date], input[type=time] {
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
        background-color: #fff;
        padding: 20px;
    }
    tr{
      transition: all 0.2s ease;
    }
       tr:hover{
          transform: rotateX(9deg) translateY(-9px);
          font-weight: 700;
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
        <h2>USERS-BLOCKLIST</h2>
        <form class="d-flex" action="users_blockList.php" method="post">
        <input class="form-control me-2" type="search" placeholder="Name | Ph NO | Mail" aria-label="Search" name="search">
        <button class="btn btn-outline-primary" type="submit" name="sear">Search</button>
      </form>
        <!-- <div>
          <button class="btn btn-outline-primary"><a class="text-dark"style="text-decoration:none;"href="dashboard2.php">Go back</a></button>
        </div> -->
      </div>
    </nav>

    <div class="container over border border-0 my-5" style="width:90vw;">
    <h2 class="text-center text-light my-3">Number Of Users BLOCK: <?php echo mysqli_num_rows($result);?></h2>
    <?php if(mysqli_num_rows($result) > 0): ?>
      <table class="table table-hover" >
        <tr id="head">
          <!-- <th>Id</th> -->
          <th>Name</th>
          <th>Email</th>
          <th>Gender:</th>
          <th>Phone no</th>
          <th>password</th>
          <th>Address</th>
          <th class="text-success">UnBlocked</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
          <tr data-id="<?php echo $row['id'];?>">
            <td class="name"><?php echo $row['name']; ?></td>
            <td class="email"><?php echo $row['email']; ?></td>
            <td class="gender"><?php echo $row['gender']; ?></td>
            <td class="phone"><?php echo $row['phone']; ?></td>
            <td class="password"><?php echo $row['password']; ?></td>
            <td class="address"><?php echo $row['address']; ?></td>
            <td>
              <!-- Delete btn -->
                <button type="button" class="btn-sm btn-success js">
                  UnBlock
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
                     <h5 class="modal-title" id="exampleModalLabel">UNBLOCK HERE!</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- form -->
                      <form class="for" action="unblock_users.php" method="post" autocomplete="off">
                        
                        <input type="hidden" name="id" id="id">
                        <input type="hidden"name="name" id="name">
                        <input type="hidden" name="email" id="email">
                        <input type="hidden" name="gender" id="gender">
                        <input type="hidden" name="phone" id="phone">
                        <input type="hidden" name="password" id="password">
                        <input type="hidden" name="address" id="address">
                        <h3 class="text-success">This "USER" will be soon access Our LOUNDRY Services😊</h3>
                      
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <button type="submit" name="submit" class="btn btn-success">UnBlock</button>
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
        <a class="text-light" style="text-decoration:none;" href="view_users.php">View_USERS</a>
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
  
  $('.btn-success').hover(function () {
    $(this).closest('tr').css('color', '#198754');
  }, function () {
    $(this).closest('tr').css('color', '');
  });

});
</script>
</html>