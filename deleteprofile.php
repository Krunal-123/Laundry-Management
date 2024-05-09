<?php
include 'config.php';

$email=  $_SESSION["email"];
$id=$_SESSION["id"];
if (isset($_POST["yes"])) {
    $sql="DELETE FROM `laundry_requests` WHERE email LIKE'%$email%'";
    $result=mysqli_query($conn,$sql);
}
if (isset($_SESSION['id'])) {
    $sql="DELETE FROM `users` where id=$id";
    $result=mysqli_query($conn,$sql);
    if ($result) {
        unset($_SESSION['id']);
        header('location:index.php');
    }
}
?>