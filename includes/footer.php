        </div>
    </div>

    <!-- Log out Modal  -->
    <div class="modal fade" id="signOutModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirm Log Out</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure you want to log out?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
            <form action="api/logout.php" method="POST">
              <button type="submit" name="logoutBtn" class="btn btn-success btn-sm">Yes, log out</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Staff Add Modal  -->
    <div class="modal fade" id="staffAddModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="api/addStaff.php" method="POST">
            <div class="modal-body">
              <div class="mb-4">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" required />
              </div>   
              <div class="mb-4">
                <label class="form-label">Staff Type</label>
                <select class="form-select" name="type" required>
                  <option value="" selected hidden>Choose here...</option>
                  <?php
                    $sql = mysqli_query($con, "SELECT * FROM category");
                    if(mysqli_num_rows($sql)){
                      while($row = mysqli_fetch_assoc($sql)){
                        echo '
                          <option value="'.$row['cat_id'].'">'.$row['cat_name'].'</option>
                        ';
                      }
                    }                
                  ?>
                </select>
              </div>    
              <div class="mb-4">
                <label class="form-label">Gender</label>
                <select class="form-select" name="gender" required>
                  <option value="" selected hidden>Choose here...</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Others">Others</option>
                </select>
              </div>         
              <div class="mb-4">
                <label class="form-label">Address</label>
                <textarea class="form-control" name="address" rows="2" required></textarea>
              </div>   
              <div class="mb-4">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email" required />
              </div>       
              <div class="mb-4">
                <label class="form-label">Mobile No.</label>
                <input type="text" class="form-control" name="mobile" min="10" max="10" placeholder="Enter Mobile No." required />
              </div>   
              <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" name="password" placeholder="Enter Password" required />
              </div>  
              <div class="mb-4">
                <label class="form-label">Date of Joining</label>
                <input type="date" class="form-control" name="doj" required />
              </div>
              <div class="mb-4">
                <label class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="dob" required />
              </div>     
              <div class="mb-4">
                <label class="form-label">Aadhar No.</label>
                <input type="text" class="form-control" name="aadhar" min="12" max="12" placeholder="Enter Name" required />
              </div>      
              <div class="mb-4">
                <label class="form-label">PAN</label>
                <input type="text" class="form-control" name="pan" min="10" max="10" placeholder="Enter PAN" required />
              </div>     
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" name="addStaff" class="btn btn-success btn-sm">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>  

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
  </body>
</html>

<script>

  $(document).ready(function() {

    // get current URL path and assign 'active' class
    var pathname = window.location.pathname;
    var name = pathname.replace('/hms/', '');
    $('.nav-item > a[href="'+name+'"]').addClass('active'); 

    // enable tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })   

    //Initialize datatable
    $('#dataTable').DataTable({
        order: [[7, 'desc']],
    });

    //Delete Staff
    $('#deleteStaff').click(function(){
      const id = $(this).attr("data-id");
      if(confirm("Are you sure you want to delete this staff?")){
        $.ajax({
          url: 'api/deleteStaff.php',
          method: 'POST',
          data:{delete_id:id},
          dataType:"text",
          success:function(data){
            alert(data);
            location.reload();
          }
        })
      }      
    })

  });

</script>