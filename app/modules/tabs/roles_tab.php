<?php
$geRoleID = $_REQUEST["rID"];

$getRole_list = mysql_fetch_array(mysql_query("SELECT * FROM roles WHERE role_id = '$geRoleID'"));
?>
<div class="row">
	<div class="col-sm-3" style="">
		<ul class="list-group">
			<li class="list-group-item d-flex justify-content-between align-items-center">
				<span style="font-size: 14px; font-weight: bold;">USER ROLES</span>
				<span class="badge badge-default badge-pill" onclick="addRoles()"><i class="fa fa-plus btn btn-secondary"></i></span>
			</li>

			<?php
				$getRoles = mysql_query("SELECT * FROM roles ORDER BY role_id DESC");
				while ($rowRoles = mysql_fetch_array($getRoles)) {
					if($rowRoles[role_id] != 1){
			?>
				<!-- loop roles -->
				<li class="list-group-item d-flex justify-content-between align-items-center" onclick="editRole(<?php echo $rowRoles[role_id]; ?>)">
					<span style="font-size: 16px; font-weight: thin;"><?php echo $rowRoles[level]; ?></span>
				</li>
				<!-- end loop -->
			<?php } } ?>

		</ul>
	</div>
	<div class="col-sm-8" style="padding:15px;">
		<div class="list-group">
			<span class="list-group-item list-group-item flex-column align-items-start" style="background: #2E3136 !important">
				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1" style="color: #ccc;">ROLE NAME</h5>
				</div>
				<div class="form-group mb-1">
					<input type="text" class="form-control" placeholder="@role" id="role_name" value="<?=$getRole_list[level]?>">
				</div>
				<small style="color: #ccc;">&nbsp;You can change the role name here. </small>
			</span>

			<span class="list-group-item list-group-item flex-column align-items-start">

				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">MANAGE MASTER DATA</h5>
				</div>
				<div class="custom-control custom-checkbox mb-1">
					<input type="checkbox" class="custom-control-input" <?php if($getRole_list[show_master_data] == 1){echo "checked";} ?> id="manage_master_data">
					<label class="custom-control-label" for="manage_master_data">Member with this role can manage master data page.</label>
				</div>
			</span>

			<span class="list-group-item list-group-item flex-column align-items-start">

				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">VIEW DASHBOARD</h5>
				</div>
				<div class="custom-control custom-checkbox mb-1">
					<input type="checkbox" class="custom-control-input" <?php if($getRole_list[show_dashboard] == 1){echo "checked";} ?> id="view_dashboard" >
					<label class="custom-control-label" for="view_dashboard">Member with this role can view dashboard page.</label>
				</div>
			</span>

			<span class="list-group-item list-group-item flex-column align-items-start">

				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">APPROVE POST</h5>
				</div>
				<div class="custom-control custom-checkbox mb-1">
					<input type="checkbox" class="custom-control-input" <?php if($getRole_list[can_approve_post] == 1){echo "checked";} ?> id="approve_post" >
					<label class="custom-control-label" for="approve_post">Member with this role can approve post.</label>
				</div>
			</span>

			<span class="list-group-item list-group-item flex-column align-items-start">

				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">MANAGE ROLE</h5>
				</div>
				<div class="custom-control custom-checkbox mb-1">
					<input type="checkbox" class="custom-control-input" <?php if($getRole_list[can_add_role] == 1){echo "checked";} ?> id="manage_role" >
					<label class="custom-control-label" for="manage_role">Member with this role can manage role.</label>
				</div>
			</span>

			<span class="list-group-item list-group-item flex-column align-items-start">

				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">MANAGE USERS</h5>
				</div>
				<div class="custom-control custom-checkbox mb-1">
					<input type="checkbox" class="custom-control-input" <?php if($getRole_list[can_view_users] == 1){echo "checked";} ?> id="manage_users" >
					<label class="custom-control-label" for="manage_users">Member with this role can manage users.</label>
				</div>
			</span>

			<span class="list-group-item list-group-item flex-column align-items-start">

				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">MANAGE CATEGORY</h5>
				</div>
				<div class="custom-control custom-checkbox mb-1">
					<input type="checkbox" class="custom-control-input" <?php if($getRole_list[can_add_category] == 1){echo "checked";} ?> id="manage_cat" >
					<label class="custom-control-label" for="manage_cat">Member with this role can manage incident category.</label>
				</div>
			</span>

			<span class="list-group-item list-group-item flex-column align-items-start">

				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">VIEW MAP</h5>
				</div>
				<div class="custom-control custom-checkbox mb-1">
					<input type="checkbox" class="custom-control-input" <?php if($getRole_list[can_view_map] == 1){echo "checked";} ?> id="view_map" >
					<label class="custom-control-label" for="view_map">Member with this role can view map pages.</label>
				</div>
			</span>

			<span class="list-group-item list-group-item flex-column align-items-start">

				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">POST DIRECT</h5>
				</div>
				<div class="custom-control custom-checkbox mb-1">
					<input type="checkbox" class="custom-control-input" <?php if($getRole_list[can_post_direct] == 1){echo "checked";} ?> id="post_direct" >
					<label class="custom-control-label" for="post_direct">Member with this role can post without admin approval.</label>
				</div>
			</span>

			<span class="list-group-item list-group-item flex-column align-items-start">

				<div class="d-flex w-100 justify-content-between">
					<?php if($_GET['rID'] != 1 && $_GET['rID'] != 2 && $_GET['rID'] != 3 ){ ?>
					<button type="button" class="btn btn-danger pull-right" onclick="deleteRole(<?=$getRole_list[role_id]?>)">Delete this role</button>
				<?php }else{ }?>
					<button type="button" onclick="saveChanges(<?=$getRole_list[role_id]?>)" class="btn btn-secondary pull-right">Save Changes</button>	
				</div>
			</span>

		</div>

	</div>
</div>


<script type="text/javascript">

	function addRoles() {
		//alert("role added!");

		$.post("app/library/ajax/add_role.php", {
		},
		function (data, status) {
			location.reload();
		});
	}

	function deleteRole(id) {
		var cnfrm = confirm("Are you sure you want to delete?");
		if(cnfrm == true){
			$.post("app/library/ajax/deleteRole.php", {
				id: id
			},
			function (data, status) {
				location.reload();
			});
		}
	}

	function editRole(id) {
		window.location = 'index.php?view=master-data&t=roles&rID='+id;
	}

	function saveChanges(id) {
		var name = $("#role_name").val();

		if($("#manage_master_data").is(":checked")){
			var manage_master_data = 1;
		}else{
			var manage_master_data = 0;
		}

		if($("#view_dashboard").is(":checked")){
			var view_dashboard = 1;
		}else{
			var view_dashboard = 0;
		}

		if($("#approve_post").is(":checked")){
			var approve_post = 1;
		}else{
			var approve_post = 0;
		}

		if($("#manage_role").is(":checked")){
			var manage_role = 1;
		}else{
			var manage_role = 0;
		}

		if($("#manage_users").is(":checked")){
			var manage_users = 1;
		}else{
			var manage_users = 0;
		}

		if($("#manage_cat").is(":checked")){
			var manage_cat = 1;
		}else{
			var manage_cat = 0;
		}

		if($("#view_map").is(":checked")){
			var view_map = 1;
		}else{
			var view_map = 0;
		}

		if($("#post_direct").is(":checked")){
			var post_direct = 1;
		}else{
			var post_direct = 0;
		}


		$.post("app/library/ajax/edit_role.php", {
			name: name,
			id: id,
			manage_master_data: manage_master_data,
			view_dashboard: view_dashboard,
			approve_post: approve_post,
			manage_role: manage_role,
			manage_users: manage_users,
			manage_cat: manage_cat,
			view_map: view_map,
			post_direct: post_direct
		},
		function (data, status) {
			location.reload();
		});
	}
</script>