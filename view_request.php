<?php
require 'config.php';

if(empty($_SESSION["id"])){
  header('location:index.php');
}
$email= $_SESSION['email'];
$query = "SELECT * FROM `laundry_requests` WHERE email='$email';";
$result = mysqli_query($conn, $query);
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
    <title>Loundry requests</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
       body {
        background-image: url("https://wallpaperaccess.com/full/2191755.png");
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
          font-size:2.5rem ;
          font-weight: 700;
        }
       }
       .for{
        width: 100%;
      border: 3px solid #f1f1f1;
      background-color: #ffffff;
      margin: 0 auto;
      padding: 10px;
    }
    input[type=text],input[type=password],input[type=tel], input[type=number], input[type=date], input[type=time],input[type=email]{
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
      #head{
        position: sticky;
        top:0px;
        color:black;
        background-color: #fff;
        padding: 20px;
    }
    tr{
      transition: all 0.2s ease;
    }
    tr:hover{
         color: #ffffff;
          transform: rotateX(9deg) translateY(-9px);
      } 

        /* for modal */
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

      .con-cent{
      display: flex;
      justify-content:space-around;
    }
      .center{
        width: 33.3%;
        text-align:center;
        .flex{
          display:flex;
          justify-content: center;
        }
    #decre,#decre2,#decre3{
        /* padding: 5px 15px; */
        background-color: black;
        color: #fff;
        border: 0px;
        font-size: 1.2rem;
        font-weight: bolder;
        border-radius: 10px 0 0 10px;
    }
    button{
      height: 50px;
      width: 40px;
    }
    button:hover{
      opacity: 0.7;
    }
    #in,#in2,#in3{
      margin: 0px;
      width: 60px;
      height: 50px;
      background-color: white;
      font-weight: bolder;
    }
    #in,#in2,#in3:hover{
      cursor: pointer;
    }
    #incre,#incre2,#incre3{
        /* padding: 5px 15px; */
        background-color: #0d6efd;
        color: #fff;
        border: 0px;
        font-size: 1.2rem;
        font-weight: bolder;
        border-radius: 0 10px 10px 0;
    }
}
  </style>
  </head>
  <body>
    <!-- nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="#"><img class="sm" src="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg" alt="https://icon-library.com/images/laundry-icon-png/laundry-icon-png-2.jpg">&nbsp;Loundry</a>
        </button>
        <h2>Status</h2>
          <div>
            <button class="btn btn-outline-primary"><a class="text-dark"style="text-decoration:none;"href="dashboard.php">Go back</a></button>
          </div>
      </div>
    </nav>
    
    <div class="container my-5">
    <?php if(mysqli_num_rows($result) > 0):?>
      <table class="table">
        <tr id="head">
          <th>Name</th>
          <th>Email</th>
          <th>Phone no</th>
          <th>Pickup Date</th>
          <th>Pickup Time</th>
          <th>Top Wear</th>
          <th>Bottom Wear</th>
          <th>Woolen Clothes</th>
          <th>Price</th>
          <th>Address</th>
          <th>Status</th>
          <th>Operation</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)): ?>
          <tr data-id="<?php echo $row['user_id'];?>">
          <!-- for delete porpuse -->
            <?php $id=$row['user_id'];?>
            <!-- **** -->
            <td class="naam"><?php echo $row['naam']; ?></td>
            <td class="email"><?php echo $row['email']; ?></td>
            <td class="phone"><?php echo $row['phone']; ?></td>
            <td class="pickup_date"><?php echo $row['pickup_date']; ?></td>
            <td class="pickup_time"><?php echo $row['pickup_time']; ?></td>
            <td class="top_wear"><?php echo $row['top_wear']; ?></td>
            <td class="bottom_wear"><?php echo $row['bottom_wear']; ?></td>
            <td class="woolen_clothes"><?php echo $row['woolen_clothes']; ?></td>
            <td class="price"><span>₹</span><?php echo $row['price']; ?></td>
            <td class="adress"><?php echo $row['adress']; ?></td>
            <td class="status"><?php echo $row['status']; ?></td>
            <td>

              <?php if ($row['status']=='Pending'):?>
                <!-- Button trigger modal -->
                <button type="button" class="btn-sm btn-success js m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="fa-regular fa-pen-to-square"></i>
                </button>
              </a>
              <!-- Delete btn -->
              <a href="delete.php?id=<?php echo$id?>">
                <button type="button" class="btn-sm btn-danger">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </a>
              <?php else:?>
                <!-- Button trigger modal -->
                <button type="button" class="btn-sm btn-disable js m-1" data-bs-toggle="modal" data-bs-target="#exampleModal"disabled>
                  <i class="fa-regular fa-pen-to-square" ></i>
                </button>
              </a>
              <!-- Delete btn -->
              <a href="delete.php?id=<?php echo$id?>">
                <button type="button" class="btn-sm btn-disable" disabled>
                  <i class="fa-solid fa-trash"></i>
                </button>
              </a>
              <?php endif;?>
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
                  <h5 class="modal-title" id="exampleModalLabel">Update Here!</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!-- form -->
                  <form class="for" action="update.php" method="post">
                    
        <input type="hidden" name="id" id="id" value="<?php  echo$id?>">
        <input type="hidden" name="name" id="name" value="<?php  echo$id?>">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php  echo$id?>">
        
        <label for="Phone">Phone no:</label> 
        <input type="tel" name="phone" id="phone" required><br>
        
          <label for="pickup_date">Date&</label><label for="pickup_time">Time:</label>
          <input style="width: 35%; display:inline-block;" type="date" name="pickup_date" id="pickup_date" required>
          <input style="width: 35%; display:inline-block;" type="time" name="pickup_time" id="pickup_time" required><br>
          <div class="con-cent my-4">
        <div class="center">
          <label for="top_wear">Wash Top wear:</label>
          <div class="flex">
          <button type="button" id="decre">-</button>
          <input type="text" id="in" name="top_wear" readonly required> 
          <button type="button" id="incre">+</button>
          </div>
        </div>
      
        <div class="center">
          <label for="bottom_wear">Bottom wear:</label>
          <div class="flex">
          <button type="button" id="decre2">-</button>
          <input type="text" id="in2" name="bottom_wear" readonly required> 
          <button type="button" id="incre2">+</button>
          </div>
        </div>    
          
          <div class="center">
          <label for="woolen_clothes">woolen Clothes:</label>
          <div class="flex">
          <button type="button" id="decre3">-</button>
            <input type="text" id="in3" name="woolen_clothes" readonly required> 
            <button type="button" id="incre3">+</button>
          </div>
        </div>
      </div>
          <label for="Address">Address:</label>
          <textarea name="adress" id="adress" cols="53" rows="5 " placeholder="Enter address" autocomplete="off" required></textarea>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  

    <footer class="fixed-bottom">
    <div class="d-flex justify-content-around m-0">
      <button class="btn-sm btn-primary m-1"><a class="text-light"style="text-decoration:none;"href="dashboard.php">Go back</a></button>
      <p>&copy;created by Krunal Team. All rights reserved.</p>
      <button class="btn-sm btn-primary m-1">
        <a class="text-light" style="text-decoration:none;" href="laundry_request.php">Book now</a>
      </button>
    </div>
    </footer>
  </body>
  <!-- jquery show data in modal -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <!-- ############# -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script>
  $(document).ready(function () {
  $('.js').on('click', function () {
    var $row = $(this).closest('tr');
    var id = $row.data('id');
    var name = $row.find('.naam').text();
    var email = $row.find('.email').text();
    var phone = $row.find('.phone').text();
    var pickup_date = $row.find('.pickup_date').text();
    var pickup_time = $row.find('.pickup_time').text();
    var top_wear = $row.find('.top_wear').text();
    var bottom_wear = $row.find('.bottom_wear').text();
    var woolen_clothes = $row.find('.woolen_clothes').text();
    var adress = $row.find('.adress').text();

    $('#id').val(id);
    $('#name').val(name);
    $('#email').val(email);
    $('#phone').val(phone);
    $('#pickup_date').val(pickup_date);
    $('#pickup_time').val(pickup_time);
    $('#in').val(top_wear);
    $('#in2').val(bottom_wear);
    $('#in3').val(woolen_clothes);
    $('#adress').val(adress);
    // $('#total').val(total);

    $('#exampleModal').modal('show');

let d=document.getElementById('decre')
let i=document.getElementById('incre')
let input=document.getElementById('in').value=top_wear
console.log(input);
function decre(){ 
    if (input>0) {
input=document.getElementById("in").value=--input
    }
    
}
function incre(){
    if (input<10) {
        input=document.getElementById("in").value=++input      
    }
}
d.addEventListener('click', decre)
i.addEventListener('click', incre)

// 2
let d2=document.getElementById('decre2')
let i2=document.getElementById('incre2')
let input2=document.getElementById('in2').value
function decre2(){ 
    if (input2>0) {
input2=document.getElementById("in2").value=--input2
    }
    
}
function incre2(){
    if (input2<10) {
        input2=document.getElementById("in2").value=++input2     
    }
}
d2.addEventListener('click', decre2)
i2.addEventListener('click', incre2)

// 3
let d3=document.getElementById('decre3')
let i3=document.getElementById('incre3')
let input3=document.getElementById('in3').value
console.log(input);
function decre3(){ 
    if (input3>0) {
input3=document.getElementById("in3").value=--input3
    }
    
}
function incre3(){
    if (input3<10) {
        input3=document.getElementById("in3").value=++input3      
    }
}
d3.addEventListener('click', decre3)
i3.addEventListener('click', incre3)
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