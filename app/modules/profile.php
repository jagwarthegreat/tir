<?php
$getab = $_REQUEST["t"];

//get currently active tab
switch ($getab) {
  case 'timeline':
    $timelineActive = "active";
    $timelineActiveShow = "active show";
    break;
  case 'followers':
    $followersActive = "active";
    $followersActiveShow = "active show";
    break;
  case 'following':
    $followingActive = "active";
    $followingActiveShow = "active show";
    break;
  
  default:
    $timelineActive = "active";
    $timelineActiveShow = "active show";
    break;
}

	$user = USER_ID;
	$approved = mysql_num_rows(mysql_query("SELECT * FROM post WHERE status = 1 AND posted_by = '$user'"));
	$pending = mysql_num_rows(mysql_query("SELECT * FROM post WHERE status = 0 AND posted_by = '$user'"));
	$total = mysql_num_rows(mysql_query("SELECT * FROM post WHERE posted_by = '$user'"));

?>
<div class="row">
  <div class="col-sm-3" style="padding: 30px;">
    <!-- left -->
    <img src="<?php echo getAvatar(USER_ID);?>" alt="" width="100%" height="235" style="object-fit: cover;border: 1px solid #bdbcbc;border-radius: 3px;">
    <div style="margin-top: 5px;">
    	<h6 class="text-center"><?php echo getSessionName(USER_ID);?></h6>
    	<div class="text-center">
    		<hr>
    		<h6>Pending Report: <?=$approved?></h6>
    		<h6>Approved Report: <?=$pending?></h6>
    		<h6>Total Report: <?=$total?></h6>
    		<hr>
    	</div>
    </div>
   <!--  <div><p><?php echo "my bio";?></p></div> -->
    <button type="button" class="btn btn-secondary btn-sm btn-block" onclick="editProfile()">Edit Profile</button>
  </div>

  <div class="col-sm-9" style="padding: 30px;">
    <!-- right -->
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="tabHeader nav-item nav-link <?=$timelineActive?>" id="nav-home-tab" data-toggle="tab" href="#nav-home" onclick="window.location = 'index.php?view=profile&t=timeline';" role="tab" aria-controls="nav-home" aria-selected="true">Activiy</a>
       <!--  <a class="tabHeader nav-item nav-link <?=$followersActive?>" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" onclick="window.location = 'index.php?view=profile&t=followers';" role="tab" aria-controls="nav-profile" aria-selected="false">Followers</a>
        <a class="tabHeader nav-item nav-link <?=$followingActive?>" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" onclick="window.location = 'index.php?view=profile&t=following';" role="tab" aria-controls="nav-contact" aria-selected="false">Following</a> -->
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade <?=$timelineActiveShow?>" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

        <?php include 'tabs/activity_tab.php';?>

      </div>
     <!--  <div class="tab-pane fade <?=$followersActiveShow?>" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        Followers
      </div>
      <div class="tab-pane fade <?=$followingActiveShow?>" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        Following
      </div> -->
    </div>
  </div>
</div>
<script type="text/javascript">
  // function Timeline(){
  //   window.location = 'profile/timeline';
  // }
      function editProfile(){
        window.location = 'https://tir.jagwarthegreat.tech/index.php?view=edit-profile&uid=<?php echo USER_ID;?>';
      }
</script>