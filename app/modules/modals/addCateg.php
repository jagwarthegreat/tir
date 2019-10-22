<div id="addCategModal" class="modal fade">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addCategForm" action="" method="POST">
          <fieldset>
            <div class="form-group">
              <label>Category Name</label>
              <input type="text" class="form-control" id="categName" name="categName" placeholder="Category Name">
            </div>
            <div class="form-group">
              <label for="exampleTextarea">Description</label>
              <textarea class="form-control" id="categDesc" name="categDesc" rows="3" placeholder="Category Description...."></textarea>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="addCateg()">Confirm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>