<style type="text/css">
  .btn-inputfile {
  width: 150px;
  height: 40px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
}
.btn-inputfile + label {
    display: inline-block;
    margin-bottom: 0;
    font-weight: 400;
    text-align: center;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    border: 1px solid transparent;
    white-space: nowrap;
    padding: .25rem .5rem;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;
    white-space: nowrap;
    font-size: .875rem;
    line-height: 1.5;
    border-radius: .2rem;
}
.btn-inputfile:focus + label,
.btn-inputfile + label:hover {
    color: #fff;
    background-color: #53595f;
    border-color: #53595f;
}
.btn-inputfile + label {
  cursor: pointer;
}
.btn-inputfile:focus + label {
  outline: 1px dotted #000;
  outline: -webkit-focus-ring-color auto 5px;
}
</style>
<div id="addModal" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addRecord" method="POST" action="" enctype="multipart/form-data">
      <div class="modal-body">
          <div class="col-md-12">
            <input type="hidden" name="e_cat_id" value="<?=$getTipsid?>">
            <label class="control-label"><b>Title</b></label>
            <input class="form-control" name="title" type="text" placeholder="" autocomplete="off" required>
            <br>
            <label class="control-label"><b>Description</b></label>
            <input class="form-control" name="description" type="text" placeholder="" autocomplete="off" required>
            <br>
            <label class="control-label"><b>Content</b></label>
            <textarea class="form-control mb-3" name="content" rows="5" required></textarea>
            <br>
            <div class="image-upload">
              <input type="file" name="file" id="file" class="btn-inputfile share" />
              <label for="file"><i class="fa fa-file-image-o"></i> Add photo</label>
            </div>
            <br>
            <div class="mb-2 col-md-12">
              <img id="img_wrap" class="previewImage01" src="https://vinofino.co.nz/wp-content/uploads/2017/10/img_not_available.jpg" style="width: 100%; height: 300px;object-fit: contain;">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="btn-edit" class="btn btn-default">Save Record</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">

$(document).ready( function(){
  $("#addRecord").on('submit', function(e){
    e.preventDefault();
    var formData = new FormData(this);
    var url = "app/library/ajax/add_info_tips.php";
    $("#btn-edit").prop("disabled", true);
    $("#btn-edit").html("<span class='fa fa-spin fa-spinner'></span> Loading ...");
    $.ajax({
      url: url,
      data: formData,
      type: "POST",
      cache: false,
      contentType: false,
      processData: false,
      success: function(data){
        //alert(data);
        if(data == 1){
          $("#addModal").modal();
          alertMe("Success!","Profile info updated.","success");
          setTimeout( function(){
            window.location.reload();
          },1500);
        }else{
          alertMe("Error!","Something was wrong.","danger");
        }


        $("#btn-edit").prop("disabled", true);
        $("#btn-edit").html("Save Record");
      }
    });

  });
});


  $(".btn-inputfile").change(function () {
      var input = document.getElementById('file');
      previewFile_add(input);
  });

  function previewFile_add(input) {
    var file = input.files[0];
    var reader  = new FileReader();
    reader.addEventListener("load", function () {
      $('.previewImage01').attr('src', reader.result);
    }, false);
    if (file) {
      reader.readAsDataURL(file);
    }
  }

</script>