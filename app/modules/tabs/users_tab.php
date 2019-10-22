<div class="row" style="margin-top: 10px;">
	<div class="col-sm-12">
		<h5 style="float: left;">Manage Users</h5>
		<div class="btn-group pull-right" role="group" aria-label="Basic example">
			<button type="button" onclick="activateUser()" class="btn btn-primary btn-sm">Add New</button>
		  <button type="button" onclick="deleteUser()" class="btn btn-danger btn-sm">Delete</button>
		</div>
	</div>

	<div class="col-sm-12" style="margin-top: 20px;">
		<div class="card">
		  <div class="card-body">
		    <table class="table table-hover" id="myTable" style="width:100%;font-size: 12px;">
		    	<tbody>

		    		<tr class="table-secondary">
		    			<td width="5px;"><input type="checkbox" id="cb-user" onclick="checkAll()"></td>
		    			<td width="5px;"><b>Name</b></td>
		    			<td><b>Alias</b></td>
		    			<td><b>Username</b></td>
		    			<td><b>Role</b></td>
		    			<td><b>Status</b></td>
		    		</tr>

		    		<?php
		    			$getUsers = mysql_query("SELECT * FROM user WHERE user_id != 3");
		    			while ($rowUser = mysql_fetch_array($getUsers)) {
		    		?>
			    		<tr>
			    			<td><input type="checkbox" value="<?=$rowUser[user_id]?>" name="users"></td>
			    			<td><?=$rowUser[f_name]." ".$rowUser[m_name]." ".$rowUser[l_name]?></td>
			    			<td><?=$rowUser[alias]?></td>
			    			<td><?=$rowUser[username]?></td>
			    			<td style="text-align: justify;"><span class="badge badge-secondary" style="font-size: 10px;padding: 5px;"><?=getRole($rowUser[role])?></span></td>
			    			<td>
			    				<?php if($rowUser[status] == "A"){ ?>
			    				<button class="btn btn-sm btn-outline-success" onclick="upStat('<?=$rowUser[user_id]?>',0)">Active</button>
			    			<?php }else{ ?>
			    				<button class="btn btn-sm btn-outline-danger" onclick="upStat('<?=$rowUser[user_id]?>',1)">Disabled</button>
			    			<?php } ?>
			    			</td>
			    		</tr>
		    		<?php } ?>

		    	</tbody>
		    </table>
		  </div>
		</div>
	</div>

</div>
<?php include 'app/modules/modals/addUser.php'; ?>
<script type="text/javascript">
	// $(document).ready( function () {
	//     $('#myTable').DataTable();
	// } );

	function checkAll(){
		var cb = $("#cb-user").is(":checked");

		if(cb == true){
			$("input[name=users]").prop("checked", true);
		}else{
			$("input[name=users]").prop("checked", false);
		}
	}

	function activateUser(){
		$("#addUserModal").modal();
	}

	function addUser(){
		var p = $("#pass").val();
		var p1 = $("#pass1").val();

		if(p == p1){

			var dataString = $("#addUserForm").serializeArray();
			var url = "app/library/ajax/admin_add_user.php";

				$.ajax({
					type: "POST",
					data: dataString,
					url: url,
					success: function(data){
						//alert(data);
						if(data == 1){
							alertMe("Success!","User/s Added","success");
							$("#addUserModal").modal("hide");
						}else if(data == 2){
							alertMe("Aw snap!","User already registered","warning");
						}else{
							alertMe("Error!","Something's wrong","danger");
						}
					}
				});

				setTimeout( function(){
						location.reload();
					}, 1000);
		 }else{ 
		 	alertMe("Aw snap!","Password does not match","warning"); 
		 }
	}

	function upStat(uid,type){
		if(type == 0){
			stat = 'C';
		}else{
			stat = 'A';
		}

		$.post("app/library/ajax/update_user_stat.php", {
			id: uid, stat: stat },
			function (data, status) {
				if(data == 1){
					alertMe("Success!","User status Updated","success");
				}else{
					alertMe("Error!","Something's wrong","danger");
				}
				});
				setTimeout( function(){
					location.reload();
				}, 1000);
	}

	function deleteUser() {
		 var cbcheck = $("input[name=users]").is(":checked");

		if(cbcheck == true){
		var x = confirm("Are you sure to delete selected user/s?");

			if(x == true){

				var all = new Array();
			 	
				$("input:checkbox[name=users]:checked").map( function(){
					all = $(this).val();

					$.post("app/library/ajax/delete_user.php", {
					id: all
					},
					function (data, status) {
						if(data == 1){
							alertMe("Success!","User/s Removed","success");
						}else{
							alertMe("Error!","Something's wrong","danger");
						}
					});

				});
				setTimeout( function(){
					location.reload();
				}, 1000);
			}

		}else{

			alertMe("Aw snap!","No Checked Data","warning");

		}
	}


</script>