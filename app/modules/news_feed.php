<?php
  function getaddress($lat,$lng)
  {
    $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$lat.','.$lng.'&sensor=false';
    $json = @file_get_contents($url);
    $data=json_decode($json);
    $status = $data->status;
    if($status=="OK"){
      return $data->results[0]->formatted_address;
    }
    else{
      return false;
    }
  }
?>
<style type="text/css">
/*.input-file [type = file] {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  cursor: pointer;
}
.input-file label {
  cursor: pointer;
}


*/
@media only screen and (max-width: 1135px) {
   .apix{
   		display: none;
   }
}

@media screen and (min-width: 1361px) {
   .apix{
   		right: 114px !important;
   		/*right: 380px;*/
   }
}

@media screen and (min-width: 1630px) {
   .apix{
      right: 228px !important;
      /*right: 380px;*/
   }
}

@media screen and (min-width: 1920px) {
   .apix{
   		right: 380px !important;
   }
}

.text-success{
  padding-left: 25px;
}

pre {
    white-space: pre-wrap;       /* Since CSS 2.1 */
    white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
    white-space: -pre-wrap;      /* Opera 4-6 */
    white-space: -o-pre-wrap;    /* Opera 7 */
    word-wrap: break-word;       /* Internet Explorer 5.5+ */
    font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
}

::-webkit-scrollbar {
  display: none;
}

.image-wrap{
  width:100%;
  margin-bottom:20px;
}
.image-wrap img{
  width:100%;
}
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

.apix {
	position: fixed;
  right: 64px;
	width: 272px;
	top: 60px;
}

.coverMe {
  object-fit: cover;

}

/*.change-filter { 
  filter: blur(5px);
  -webkit-filter: blur(5px);
}*/

.caret-off::before {
    display: none;
}
.caret-off::after {
    display: none;
}

</style>
<div class="row" style="margin-top: 15px;">
	<div class="col-md-9 star">
		<!-- the create post -->
		<div class="col-md-12" style="padding: 5px;margin-bottom: 5px;">
      <form id="post_form" method="POST" action="" enctype="multipart/form-data">
	     	<div class="col-md-12">
	     		<div class="form-group">
					<label for="exampleTextarea"><b>News Feed</b></label>

          <input class="form-control" type="text" name="others" id="others" placeholder="Specify Incident" style="width: 250px;display: none;margin-bottom: 5px;" required value="0">
					<textarea class="form-control" id="exampleTextarea" rows="2" name="post_remarks" placeholder="What happened?"></textarea>
          <input type="hidden" value="<?=USER_ID?>" name="post_user_id">
          <input type="hidden" name="loc" id="location">
			    </div>
	     	</div>
	     	<div class="col-md-12">
	     		<div class="btn-group">

            <div class="image-upload">
              <input type="file" name="file" id="file" class="btn-inputfile share" />
              <label for="file"><i class="fa fa-file-image-o"></i> upload photo</label>
            </div>

	     		</div>

	     		<div style="float: right;">
	     			<!-- <button class="btn btn-secondary btn-sm">Post</button> -->

            <label class="form-label">Share to category: &nbsp;</label>
            <div class="btn-group" role="group">
              <select class="form-control" id="category" onchange="getOthers()" name="post_categ" required>
                <option value="0">-- SELECT --</option>
                <?php
                  $getCategory_ = mysql_query("SELECT * FROM incident_category");
                  while ($getCat_ = mysql_fetch_array($getCategory_)) {
                    
                ?>
                  <option value="<?=$getCat_['category_id']?>"><?=$getCat_['name']?></option>
                <?php } ?>
              </select>
            </div>
	     		</div>

	     	</div>

        <div class="col-md-12 row">
            <div class="image-wrap col-md-12" id="img_wrap" style="display: none;margin-top: 5px;">
              <img id="previewImage01" src="https://placehold.it/300" alt="" />
            </div>
            <button type="submit" id="btn-post" class="btn btn-secondary btn-block btn-sm offset-md-10" style="display: none;margin-top: 5px;"><i class="fa fa-check"></i> Post</button>
        </div>
        </form>
		</div>

		<hr>

		<!-- the post -->
		<!-- <div class="col-md-12">
	      	<div class="card mb-4">
	            <div class="card-footer text-muted" style="border-top: 0px solid rgba(0,0,0,.125);">
	              Posted on January 1, 2017 by
	              <a href="#">User Monggi</a>
	            </div>
				<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
				<div class="card-body">
					<h4 class="card-title">Post Title</h4>
					<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
					<a href="#" class="btn btn-secondary btn-sm">Read More →</a>
	            </div>
			</div>
  		</div> -->

      <div class="qa-message-list" id="wallmessages" style="margin-bottom: 20px; overflow-x: auto;">

        <?php
           $getPosts = mysql_query("SELECT * FROM post WHERE status = 1 ORDER BY post_id DESC");
          while( $data = mysql_fetch_array($getPosts)){
            $getLoc = explode(",", $data['location']);
            $lat = $getLoc[0];
            $long = $getLoc[1];

            $getUserAvatar = mysql_fetch_array(mysql_query("SELECT slug, alias, role FROM user WHERE user_id = '$data[posted_by]'"));
            if($getUserAvatar[0] != ''){
              $avatar = $getUserAvatar[0];
            }else{
              $avatar = "https://ssl.gstatic.com/accounts/ui/avatar_2x.png";
            }

            $getCategory = mysql_fetch_array(mysql_query("SELECT name FROM incident_category WHERE category_id = '$data[category_id]'"));
         ?>

        <div class="message" id="m16" style="background: #fff;margin-bottom: 25px;padding:10px;border: 1px solid #ccc;border-radius: 3px;box-shadow: 0 0 5px rgba(0,0,0,0.1);">
          <div class="message-inner">
            <div class="message-head clearfix">
              <div class="avatar pull-left" style="margin-right: 15px;border: 1px solid #ccc;"><a href="#"><img class="postimg" style="object-fit: cover;width: 40px; height: 40px;" src="<?=$avatar?>"></a></div>
              <?php
                $check = mysql_fetch_array(mysql_query("SELECT * FROM post WHERE post_id = '$data[post_id]' AND status = 1"));
                if($check['posted_by'] == USER_ID){
               ?>
                <a style="color: black;" class="dropdown-toggle caret-off pull-right" href="#" role="button" data-toggle="dropdown">
                  <i class="fa fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#" onclick="EditPost(<?php echo $data['post_id']; ?>)"><i class="fa fa-edit"></i> Edit Post</a>
                  <a class="dropdown-item" href="#" onclick="DeletePost(<?php echo $data['post_id']; ?>)"><i class="fa fa-trash"></i> Delete Post</a>
                </div>
              <?php } ?>
              <div class="user-detail">
                <h5 class="handle" style="margin-bottom: 0px;"><span style="color:#2E3136;font-weight: bold;"><?php echo $getUserAvatar[1];?></span>
                  <span style="font-size: 12px;color: #aaa;"> &bull; <?=getRole($getUserAvatar[2])?></span>
                </h5>
                
                <div class="post-meta" style="margin-bottom: 3px;">
                  <div class="asker-meta">
                    <span class="qa-message-what"></span>
                    <span class="qa-message-when">
                      <span class="qa-message-when-data"><?php echo "<strong style='color: #666;'>".strtoupper($getCategory[0])."</strong> :: ".getPostDate($data['date_created']);?></span>
                    </span>
                    <span class="qa-message-who">
                      <span class="qa-message-who-pad">near </span>
                      <span class="qa-message-who-data">
                          <input type="hidden" id="location" value="<?php echo $data['location']; ?>">
                          <a id="post_location" href="#" onclick="viewLocation(<?=$lat.", ".$long?>)">
                            <?php
                              $address = getaddress($lat, $long);
                              if($address){
                                echo $address;
                              }else{
                                echo $lat.", ".$long;
                              }
                            ?>
                          </a>
                      </span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="qa-message-content" style="margin-top:5px;text-align: justify;">
              <?php
                if($data[category_id] == 12){
              ?>
              <p style="margin-bottom: 0px;">&mdash; <?=strtoupper($data['others'])?></p>
              <?php } ?>
              <pre style="font-size: 14px;"><?php echo  $data['caption'] ?> </pre>
            </div>
            <?php if($data['edited_status'] == 1){ ?>
              <img class="coverMe mb-2" style="width: 100%; height: 430px;" src="asset/images/_uncover.jpg" id='<?="cover".$data[post_id]?>'>
              <img class="coverMe mb-2" style="display: none;width: 100%; height: 430px;" src="<?php echo $data['slug'];?>" id="<?=$data[post_id]?>">
              <input type="hidden" id='<?="c".$data[post_id]?>'>
              <button type="button" id='<?="btn".$data[post_id]?>' class="btn btn-outline-secondary btn-block" onclick="uncover('<?=$data[post_id]?>','<?=$data[slug]?>')"><i class="fa fa-eye"></i> Uncover Image</button> 
            <?php }else{?>
              <img class="coverMe mb-2" style="width: 100%; height: 430px;" src="<?php echo $data['slug'];?>">
            <?php } ?>
          </div>
        </div>

       <?php } ?>
        <!-- <div class="message" id="m16" style="padding:10px;border: 1px solid #ccc;border-radius: 3px;box-shadow: 0 0 5px rgba(0,0,0,0.1);">
          <div class="message-inner">
            <div class="message-head clearfix">
              <div class="avatar pull-left" style="margin-right: 15px;"><a href="./index.php?qa=user&qa_1=Oleg+Kolesnichenko"><img class="postimg" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png"></a></div>
              <div class="user-detail">
                <h5 class="handle" style="margin-bottom: 0px;">Monggi246</h5>
                <div class="post-meta">
                  <div class="asker-meta">
                    <span class="qa-message-what"></span>
                    <span class="qa-message-when">
                      <span class="qa-message-when-data">Jan 21</span>
                    </span>
                    <span class="qa-message-who">
                      <span class="qa-message-who-pad">@ </span>
                      <span class="qa-message-who-data"><a href="./index.php?qa=user&qa_1=Oleg+Kolesnichenko">Taculing, Bacolod City</a></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="qa-message-content" style="text-align: justify;">
              Nunc ante neque, feugiat at dictum ut, dignissim sed sapien. Pellentesque congue eu nisl sit amet cursus. Integer dapibus adipiscing metus ac vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus fermentum iaculis mi, non dapibus nulla eleifend sed. Etiam ac commodo leo. Donec non sem id tellus mattis convallis. Morbi dapibus nulla ac dui lacinia,
            </div>
            <img class="" style="width: 100%;" src="https://vancouver.ca/images/cov/feature/smithe-street-upgrades-landing.jpg">
          </div>
        </div> -->

      </div>

	</div>

	<div class="col-md-3 apix">

		<div class="card my-4">
			<div class="card-body" style="padding: 5px;">
				<div class="avatar pull-left" style="margin-right: 5px;border: 1px solid #ccc;"><a href="index.php?view=profile"><img class="postimg" style="object-fit: cover;width: 40px; height: 40px;" src="<?php echo getAvatar(USER_ID);?>"></a></div>
				<div class="text-muted" style="padding: 3px;font-size: 14px;">
		            <span style="font-size: 10px;display: block;">Signed in as </span>
		            <span style="font-size: 12px;display: block;max-width: 200px; overflow: hidden; text-overflow: ellipsis;white-space: nowrap;">
		              <b><?php echo getSessionName(USER_ID);?></b>
		            </span>
		          </div>
			</div>
		</div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h6 class="card-header">Categories</h6>
            <div class="card-body">
              <div class="row">

                <?php
                  $getCategory = mysql_query("SELECT name, category_id FROM incident_category");
                  while ($getCat = mysql_fetch_array($getCategory)) {
                ?>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="index.php?view=tips-details&id=<?=$getCat[1]?>" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?=$getCat[0]?></a>
                    </li>
                  </ul>
                </div>
              <?php } ?>

              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Online Users</h5>
            <div class="card-body" style="padding: 5px;">
              <ul class="text-success" style="padding-left: 25px;height: 120px;overflow-x: auto;">
                <?php
                  $online = getonlineusers();
                  if($online != ''){
                  foreach ($online as $ol) {
                ?>
                  <li><span class="text-dark"><?=$ol["user"]?></span></li> 
                <?php } } ?>
              </ul>
            </div>
          </div>

        

	</div>
</div>
<?php include 'app/modules/modals/view_user_location.php'; ?>
<?php include 'app/modules/modals/edit_user_post.php'; ?>
<!-- <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script> -->
<script type="text/javascript">

  function getOthers() {
    var category = $("#category").val();
    if(category == 12){
      $("#others").val("");
      $("#others").css("display","block");
    }else{
      $("#others").val("0");
      $("#others").css("display","none");
    }
  }
  

  $(document).ready(function() {
    setInterval(function(){
      getLocation();
      $("#btn-post").prop("disabled");
    }, 1500);

    $("#post_form").on("submit", function(e){
      e.preventDefault();
      getLocation();
      var data = new FormData(this);
      var url = "app/library/ajax/add_post.php";
      $.ajax({
        url: url,
      data: data,
      type: "POST",
      cache: false,
      contentType: false,
      processData: false,
      success: function(data){
        if(data == 1){
          alertMe("Success!","Status has been posted.","success");
          setTimeout( function(){
            window.location.reload();
          },1000);
        }else{
          alertMe("Error!","Something is wrong","danger");
        }
      }

      });

    });

  });
  //END DOCU READY
  
  function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}
function showPosition(position) {
    var pos = position.coords.latitude +","+ position.coords.longitude;
    $("#location").val(pos);
}


  $(".btn-inputfile").change(function () {
    $("#img_wrap").css('display','block');
     $("#btn-post").css('display','block');
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
      $('#previewImage01').attr('src', reader.result);

    }, false);
    if (file) {
      reader.readAsDataURL(file);
    }
  }

  function viewLocation(lat, lng) {
    $("#viewMYlocationModal").modal();
    getLoc(lat, lng);
  }


    function getLoc(lat, lng) 
    {
      $("#maps").html('<iframe style="height: 400px;width: 100%;" src="https://www.google.com/maps?q='+lat+','+lng+'&zoom=10&maptype=satellite&layer=traffic&output=embed" allowfullscreen></iframe>');
    }

    function uncover(id, real_image){
      var isClick = $("#c"+id).val();
      if(isClick > 0){
        $("#c"+id).val('0');
        $("#"+id).css('display', 'none');
        $("#cover"+id).css('display', 'block');
        $("#btn"+id).html("<i class='fa fa-eye'></i> Uncover Image");
      }else{
        $("#c"+id).val('1');
        $("#"+id).css('display', 'block');
        $("#cover"+id).css('display', 'none');
        $("#btn"+id).html("<i class='fa fa-eye-slash'></i> Cover Image");
      }
    }

    function EditPost(id){
      $("#editPostModal").modal();
      $("#post_id").val(id);
      var url = "app/library/ajax/post_data.php";
      $.post(url,{id: id, type: 'E'}, function(data){
        var o = JSON.parse(data);
        $("#edit_cap").val(o.caption);
      });
    }

    $("#editPost").submit( function(e){
      e.preventDefault();
      var url = "app/library/ajax/post_data.php";
      var data = $(this).serialize();
      $.post(url,data, function(data){
        if(data == 1){
          $("#editPostModal").modal("hide");
          alertMe("Success!","Post was updated.","success");
          setTimeout( function(){
            window.location.reload();
          },500);
        }else{
          $("#editPostModal").modal("hide");
          alertMe("Error!","Something was wrong.","danger");
        }
      });
    });

    function DeletePost(id){
      var x = confirm("Are you sure to delete this post?");
      if(x){
        var url = "app/library/ajax/delete_post.php";
        $.post(url,{id: id}, function(data){
          if(data == 1){
            alertMe("Success!","Your post was deleted.","success");
            setTimeout( function(){
              window.location.reload();
            },500);
          }else{
            alertMe("Error!","Something was wrong.","danger");
          }
        });
      }
    }
</script>