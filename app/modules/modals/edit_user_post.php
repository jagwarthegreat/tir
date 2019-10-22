
<div id="editPostModal" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editPost" method="POST" action=""t>
      <div class="modal-body">
          <div class="col-md-12">
            <input type="hidden" id="post_id" name="id">
            <input type="hidden" name="type" value="F">
            <label class="control-label"><b>Caption</b></label>
            <textarea class="form-control" id="edit_cap" name="caption" type="text" placeholder="" required></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="btn-edit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">

</script>