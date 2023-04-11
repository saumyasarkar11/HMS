<?php
session_start();
include ("../includes/db.php");

if(isset($_POST['addStaff'])){
    $uid = 'U'.substr($_POST['aadhar'], 8, 4).substr($_POST['dob'], 2, 2);
    $sql = mysqli_query($con, "INSERT INTO staff VALUES (NULL, '$uid', '".$_POST['name']."', '".$_POST['email']."', '".md5($_POST['password'])."', '".$_POST['gender']."', '".$_POST['address']."', '".$_POST['mobile']."', '".$_POST['dob']."', '".$_POST['doj']."', '".$_POST['pan']."', '".$_POST['aadhar']."', '".$_POST['type']."')");
    if(mysqli_affected_rows($con)){
        $_SESSION['success'] = "Staff Added Successfully!";
    } else {
        $_SESSION['failure'] = "Something went wrong!";
    }
    header("location: ../staff.php");
}

?>