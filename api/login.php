<?php
session_start();
include ("../includes/db.php");

if(isset($_POST['loginBtn'])){
    $sql = mysqli_query($con, "SELECT name, uid FROM staff WHERE uid = '".$_POST['uid']."' AND password = '".md5($_POST['password'])."'");
    $row = mysqli_fetch_array($sql);
    if(mysqli_num_rows($sql)){
        $_SESSION['user'] = $row['name'];
        $_SESSION['uid'] = $row['uid'];
        header("location: ../index.php");
    } else {
        $_SESSION['status'] = "Invalid uid or password!";
        header("location: ../login.php");
    }
}

?>