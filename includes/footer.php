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
            <form action="functions.php" method="POST">
              <button type="submit" name="logoutBtn" class="btn btn-success btn-sm">Yes, log out</button>
            </form>
          </div>
        </div>
      </div>
    </div>    

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
  </body>
</html>