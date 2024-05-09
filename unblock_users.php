<?php
include 'config.php';

if (isset($_SESSION['id2'])) {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $query = "INSERT INTO `users` (name, email, gender, phone, password, address) VALUES('$name','$email','$gender','$phone','$password','$address')";
    $result1=mysqli_query($conn, $query);
    if ($result1) {
        $sql="DELETE FROM `block` where id=$id";
        $result=mysqli_query($conn,$sql);
        if ($result) {
            header('location:users_blockList.php');
        }
    }
}
?>