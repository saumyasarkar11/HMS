<?php
session_start();

if(isset($_POST['loginBtn'])){
    if($_POST['username'] == "ssarkar11" && $_POST['password'] == "password"){
        $_SESSION['user'] = $_POST['username'];
        header("location: index.php");
    } else {
        $_SESSION['status'] = "Invalid username or password";
        header("location: login.php");
    }
}

if(isset($_POST['logoutBtn'])){
    session_destroy();
    header("location: login.php");
}

?>