<?php

if(isset($_POST['logoutBtn'])){
    session_destroy();
    header("location: ../login.php");
}

?>