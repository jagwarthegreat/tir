<div id="mdEditPass" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="col-md-12">
            <form id="edit_pass" method="POST" action="">
              <div class="form-group">
                <label class="control-label">New Password:</label>
                <input type="password" name="npass" required="" class="form-control">
              </div>
              <small id="passStat"></small>
              <div class="form-group">
                <label class="control-label">Pepeat New Password:</label>
                <input type="password" name="npass1" required="" class="form-control" oninput="checkPass()">
              </div>
              <small class="text-muted">Enter old password to validate action.</small>
              <div class="form-group">
                <label class="control-label">Password:</label>
                <input type="password" name="pass" required="" class="form-control">
              </div>
            
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-secondary">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>