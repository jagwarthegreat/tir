<div id="addUserModal" class="modal fade">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add an Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addUserForm" action="" method="POST">
          <fieldset>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" id="uname" name="uname" placeholder="Username" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" minlength="6" id="pass" name="pass" placeholder="Password" required>
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" class="form-control" minlength="6" id="pass1" name="pass1" placeholder="Confirm Password" required>
            </div>
            <div class="form-group">
              <label>First Name</label>
              <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
            </div>
            <div class="form-group">
              <label>Middle Name</label>
              <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name">
            </div>
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
            </div>
            <div class="form-group">
              <label>Role</label>
              <select class="form-control" id="roles" name="roles" required>
                <option value="0">-- SELECT --</option>
                <?php
              $getRole = mysql_query("SELECT * FROM roles WHERE role_id != 1");
              while ($row = mysql_fetch_array($getRole)) {
            ?>
              <option value="<?=$row[role_id]?>"><?=$row[level]?></option>
              <?php } ?>
              </select>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="addUser()">Confirm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>