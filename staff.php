<?php
include "includes/db.php";
include "includes/header.php";
include "includes/sidebar.php";
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Staff</h1>
        <button type="button" class="btn btn-sm btn-dark d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#staffAddModal"><span data-feather="user-plus"></span>&nbsp;<span>Add Staff</span></button>
    </div>
    <?php
        if(isset($_SESSION['success'])){
            echo '<div class="alert alert-success" role="alert">'.$_SESSION['success'].'</div>';
            unset($_SESSION['success']);
        } else if(isset($_SESSION['failure'])){
            echo '<div class="alert alert-danger" role="alert">'.$_SESSION['failure'].'</div>';
            unset($_SESSION['failure']);
        }
    ?>
    <div class="table-responsive">
        <table class="table display" id="dataTable">
            <thead>
                <th>UID</th>
                <th>Name*</th>
                <th>Type</th>
                <th>Email</th>
                <th>Add*</th>
                <th>Mobile</th>
                <th>DOB*</th>
                <th>DOJ</th>
                <th>PAN</th>
                <th>Aadhar</th>
                <th>Operations</th>
            </thead>
            <tbody>
                <?php
                    $sql = mysqli_query($con, "SELECT * FROM staff NATURAL JOIN category");
                    if(mysqli_num_rows($sql)){
                        while($row = mysqli_fetch_assoc($sql)){
                            echo '<tr>
                                    <td>'.$row['uid'].'</td>
                                    <td data-bs-toggle="tooltip" data-bs-placement="top" title="'.$row['gender'].'">'.$row['name'].'</td>
                                    <td>'.$row['cat_name'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td data-bs-toggle="tooltip" data-bs-placement="top" title="'.$row['address'].'">View</td>
                                    <td>'.$row['mobile'].'</td>
                                    <td data-bs-toggle="tooltip" data-bs-placement="top" title="'.$row['dob'].'">View</td>
                                    <td>'.$row['doj'].'</td>
                                    <td>'.$row['pan'].'</td>
                                    <td>'.$row['aadhar'].'</td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <form action="staffEdit.php" method="POST">
                                                <input type="hidden" value="'.$row['staff_id'].'" name="staff_id">
                                                <button type="submit" class="btn btn-success btn-sm" style="font-size: 12px;" name="staffEdit_btn">Edit</button>
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm deleteStaff" style="font-size: 12px;" data-id="'.$row['staff_id'].'">Del</button>
                                        <div>
                                    </td>
                                </tr>  
                            ';
                        }
                    } else {
                        echo '<tr><td colspan="10">No data found!</td></tr>';
                    }                
                ?>
            </tbody>
        </table>
    </div>
</main>
<?php
include ("includes/footer.php");
?>
