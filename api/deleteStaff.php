<?php
session_start();
include ("../includes/db.php");

if(isset($_POST['delete_id'])){
    $sql = mysqli_query($con, "DELETE FROM staff WHERE staff_id = '".$_POST['delete_id']."'");
    if(mysqli_affected_rows($con)){
        echo "Staff Deleted Successfully";
    } else {
        echo "Something went wrong!";
    }
}

?>