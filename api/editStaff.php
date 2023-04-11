<?php
session_start();
include ("../includes/db.php");

if(isset($_POST['editStaff'])){
    $uid = 'U'.substr($_POST['aadhar'], 8, 4).substr($_POST['dob'], 2, 2);
    $sql = mysqli_query($con, "UPDATE staff SET uid = '$uid', name = '".$_POST['name']."', email = '".$_POST['email']."', gender = '".$_POST['gender']."', address = '".$_POST['address']."', mobile = '".$_POST['mobile']."', dob = '".$_POST['dob']."', doj = '".$_POST['doj']."', pan = '".$_POST['pan']."', aadhar = '".$_POST['aadhar']."', cat_id = '".$_POST['type']."' WHERE staff_id = '".$_POST['staff_id']."'");
    if($sql){
        $_SESSION['success'] = "Staff Data Updated Successfully!";
    } else {
        $_SESSION['failure'] = "Something went wrong!";
    }
    header("location: ../staff.php");
}

?>