<?php

if(!isset($_POST['staffEdit_btn'])){
    header("location: staff.php");
    exit();
}

include "includes/db.php";
include "includes/header.php";
include "includes/sidebar.php";

$sql = mysqli_query($con, "SELECT * FROM staff as s NATURAL JOIN category as c WHERE s.staff_id = '".$_POST['staff_id']."'");
$row = mysqli_fetch_array($sql);

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Staff Data</h1>
    </div>
    <form action="api/editStaff.php" method="POST">
        <input type="hidden" name="staff_id" value="<?php echo $_POST['staff_id']; ?>" required> 
        <div class="mb-4">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name" placeholder="Enter Name" required />
        </div>   
        <div class="mb-4">
            <label class="form-label">Staff Type</label>
            <select class="form-select" name="type" required>
                <option value="<?php echo $row['cat_id']; ?>" selected hidden><?php echo $row['cat_name']; ?></option>
                <?php
                    $sql1 = mysqli_query($con, "SELECT * FROM category");
                    if(mysqli_num_rows($sql)){
                        while($row1 = mysqli_fetch_assoc($sql1)){
                        echo '
                            <option value="'.$row1['cat_id'].'">'.$row1['cat_name'].'</option>
                        ';
                        }
                    }                
                ?>
            </select>
        </div>    
        <div class="mb-4">
            <label class="form-label">Gender</label>
            <select class="form-select" name="gender" required>
            <option value="<?php echo $row['gender']; ?>" selected hidden><?php echo $row['gender']; ?></option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Others">Others</option>
            </select>
        </div>         
        <div class="mb-4">
            <label class="form-label">Address</label>
            <textarea class="form-control" name="address" rows="2" required><?php echo $row['address']; ?></textarea>
        </div>   
        <div class="mb-4">
            <label class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $row['email']; ?>" required />
        </div>       
        <div class="mb-4">
            <label class="form-label">Mobile No.</label>
            <input type="text" class="form-control" name="mobile" min="10" max="10" placeholder="Enter Mobile No." value="<?php echo $row['mobile']; ?>" required />
        </div>
        <div class="mb-4">
            <label class="form-label">Date of Joining</label>
            <input type="date" class="form-control" name="doj" value="<?php echo $row['doj']; ?>" required />
        </div>
        <div class="mb-4">
            <label class="form-label">Date of Birth</label>
            <input type="date" class="form-control" name="dob" value="<?php echo $row['dob']; ?>" required />
        </div>     
        <div class="mb-4">
            <label class="form-label">Aadhar No.</label>
            <input type="text" class="form-control" name="aadhar" value="<?php echo $row['aadhar']; ?>" min="12" max="12" placeholder="Enter Name" required />
        </div>      
        <div class="mb-4">
            <label class="form-label">PAN</label>
            <input type="text" class="form-control" name="pan" value="<?php echo $row['pan']; ?>" min="10" max="10" placeholder="Enter PAN" required />
        </div>   
        <a class="btn btn-danger btn-sm" href="staff.php">Cancel</a>
        <button type="submit" name="editStaff" class="btn btn-success btn-sm">Submit</button>
    </form>
    
</main>
<?php
include ("includes/footer.php");
?>
