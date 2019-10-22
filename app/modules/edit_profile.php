<?php
$id = $_GET['uid'];
  $row = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE user_id = '$id'"));
?>
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
<div class="row">
  <div class="col-md-12">
    <h3 class="mt-3">Edit Profile</h3>
    <hr>

    <form id="editProfile" method="POST" action="" enctype="multipart/form-data">
      <div class="row">
        <div class="form-group row col-md-4">
          <label class="control-label col-md-12"><b>Profile Picture</b></label>
          <div class="mb-2 col-md-12">
            <img id="img_wrap" class="previewImage01 image-wrap" src="<?php echo getAvatar(USER_ID);?>" width="265" height="235" style="object-fit: cover;">
          </div>
          <div class="image-upload offset-md-3">
            <input type="file" name="file" id="file" class="btn-inputfile share" />
            <label for="file"><i class="fa fa-file-image-o"></i> Change</label>
          </div>
        </div>

        <div class="form-group row col-md-8">

          <div class="col-md-6">
            <label class="control-label col-md-12"><b>Name</b></label>
            <small class="text-muted">Alias</small>
            <input class="form-control" name="alias" type="text" value="<?=$row['alias']?>" placeholder="Alias">
            <input type="hidden" name="e_user_id" value="<?=$row['user_id']?>">
            <br>
            <small class="text-muted">First Name</small>
            <input class="form-control" name="fname" type="text" value="<?=$row['f_name']?>" placeholder="First Name">
            <br>
            <small class="text-muted">Middle Name</small>
            <input class="form-control" name="mname" type="text" value="<?=$row['m_name']?>" placeholder="Middle Name">
            <br>
            <small class="text-muted">Last Name</small>
            <input class="form-control" name="lname" type="text" value="<?=$row['l_name']?>" placeholder="Last Name">
            <br>
            <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#mdEditPass">Edit Password</button>
          </div>

            <div class="col-md-6 mt-4">
              <label class="control-label"><b>Gender</b></label>
              <select name="gender" id="u-gender" class="form-control">
                <?php if($row['gender'] == 1){ ?>
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                <?php }else if($row['gender'] == 2){ ?>
                  <option value="2">Female</option>
                  <option value="1">Male</option>
                <?php }else{ ?>
                <option value="0">-- SELECT --</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
              <?php } ?>
              </select>
              <br>
              <label class="control-label"><b>Birth Date</b></label>
              <input class="form-control" name="dob" type="date" value="<?=$row['dob']?>">
              <br>
              <label class="control-label"><b>Email Address</b></label>
              <input class="form-control" name="email" type="text" value="<?=$row['email']?>" placeholder="Email Address">
              <br>
              <label class="control-label"><b>Privacy</b></label>
              <select name="privacy" class="form-control">
                <?php if($row['privacy'] == 1){ ?>
                <option value="1">Private</option>
                <option value="0">Public</option>
              <?php }else{ ?>
                <option value="0">Public</option>
                <option value="1">Private</option>
              <?php } ?>
              </select>
            </div>
        </div>
        
      </div>
      <hr>

      <div class="btn-group offset-md-9 col-md-3">

        <button type="button" class="btn btn-sm btn-danger" onclick="window.location='https://tir.jagwarthegreat.tech/index.php?view=profile'">Back to Profile</button>
        <button type="submit" id="btn-edit" class="btn btn-sm btn-secondary">Save changes</button>
      </div>
    </form>

  </div>
</div>
<?php require "modals/editPassword.php"; ?>
<script type="text/javascript">
$(document).ready( function(){
  $("#editProfile").on('submit', function(e){
    e.preventDefault();
    var formData = new FormData(this);
    var url = "app/library/ajax/edit_profile.php";
    $("#btn-edit").prop("disabled", true);
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
          alertMe("Success!","Profile info updated.","success");
          setTimeout( function(){
            window.location.reload();
          },1500);
        }else{
          alertMe("Error!","Something was wrong.","danger");
          // setTimeout( function(){
          //   window.location.reload();
          // },1500);
        }
      }
    });

  });
});

function checkPass(){
  var pass = $("input[name=npass]").val();
  var pass1 = $("input[name=npass1]").val();

  if(pass == pass1){
    $("#passStat").removeClass().addClass("text-success");
    $("#passStat").html("All Good.");
  }else{
    $("#passStat").removeClass().addClass("text-danger");
    $("#passStat").html("Password does not match.");
  }

}

$("#edit_pass").submit( function(e){
  e.preventDefault();
  var data = $(this).serialize();
  var url = "../library/ajax/edit_password.php";
  // alert(data +" "+url);
  $.ajax({
      url: url,
      data: data,
      type: "POST",
      success: function(data){
        //alert(data);
        if(data == 1){
              $("#mdEditPass").modal("hide");
          alertMe("Success!","Password updated.","success");
          setTimeout( function(){
            window.location.reload();
          },1500);
        }else{
          alertMe("Error!","Something was wrong.","danger");
          // setTimeout( function(){
          //   window.location.reload();
          // },1500);
        }
      }
    });
});

  $(".btn-inputfile").change(function () {
    // $("#img_wrap").css('display','block');
      var input = document.getElementById('file');
     // var previewImageID = document.getElementById('previewImage01');
       //alert(input);
      previewFile(input);
  });

  function previewFile(input) {
    var file = input.files[0];
    var reader  = new FileReader();
    reader.addEventListener("load", function () {
      //preview.src = reader.result;
      $('.previewImage01').attr('src', reader.result);

    }, false);
    if (file) {
      reader.readAsDataURL(file);
    }
  }

</script>