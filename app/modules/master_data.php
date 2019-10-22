<?php
$getab = $_REQUEST["t"];

//get currently active tab
switch ($getab) {
  case 'roles':
    $rolesActive = "active";
    $rolesActiveShow = "active show";
    break;
  case 'cat':
    $catActive = "active";
    $catActiveShow = "active show";
    break;
  case 'user':
    $userActive = "active";
    $userActiveShow = "active show";
    break;
  
  default:
    $rolesActive = "active";
    $rolesActiveShow = "active show";
    break;
}

//checkRolePermision
$Uid = $_SESSION['system']['userid'];
$getuserRole = mysql_fetch_array(mysql_query("SELECT role FROM user WHERE user_id = '$Uid'"));
$roleList = mysql_fetch_array(mysql_query("SELECT * FROM roles WHERE role_id = '$getuserRole[0]'"));

if($roleList[show_master_data] != 1){ $show_master_data = "display: none;";}
if($roleList[show_dashboard] != 1){ $show_dashboard = "display: none;";}
if($roleList[can_approve_post] != 1){ $can_approve_post = "display: none;";}
if($roleList[can_add_role] != 1){ $can_add_role = "display: none;";}
if($roleList[can_view_users] != 1){ $can_view_users = "display: none;";}
if($roleList[can_add_category] != 1){ $can_add_category = "display: none;";}
if($roleList[can_view_map] != 1){ $can_view_map = "display: none;";}
if($roleList[can_post_direct] != 1){ $can_post_direct = "display: none;";}

?>
<div class="row">
  <div class="col-sm-12" style="padding: 30px;">
    <!-- right -->
    <nav>
		<div class="nav nav-tabs" id="nav-tab" role="tablist">
			<a class="tabHeader nav-item nav-link <?=$rolesActive?>" style="<?=$can_add_role?>" id="nav-home-tab" data-toggle="tab" href="#nav-home" onclick="window.location = 'index.php?view=master-data&t=roles';" role="tab" aria-controls="nav-home" aria-selected="true">
				Role
			</a>
			<a class="tabHeader nav-item nav-link <?=$catActive?>" style="<?=$can_add_category?>" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" onclick="window.location = 'index.php?view=master-data&t=cat';" role="tab" aria-controls="nav-profile" aria-selected="false">
				Incident Category
			</a>
			<a class="tabHeader nav-item nav-link <?=$userActive?>" style="<?=$can_view_users?>" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" onclick="window.location = 'index.php?view=master-data&t=user';" role="tab" aria-controls="nav-contact" aria-selected="false">
				Users
			</a>
		</div>
    </nav>

    <div class="tab-content" id="nav-tabContent">
		<div class="tab-pane fade <?=$rolesActiveShow?>" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
			<?php include 'tabs/roles_tab.php';?>
		</div>
		<div class="tab-pane fade <?=$catActiveShow?>" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
			<?php include 'tabs/category_tab.php';?>
		</div>
		<div class="tab-pane fade <?=$userActiveShow?>" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
			<?php include 'tabs/users_tab.php';?>
		</div>
    </div>

  </div>
</div>

<script type="text/javascript">
  // function Timeline(){
  //   window.location = 'profile/timeline';
  // }
</script>