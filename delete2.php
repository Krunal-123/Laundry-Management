<?php
include 'config.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $sql="DELETE FROM `laundry_requests` where user_id=$id";
    $result=mysqli_query($conn,$sql);
    if ($result) {
        header('location:view_request2.php');
    }
}
?>