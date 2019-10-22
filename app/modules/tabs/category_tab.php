<?php 
	
	function getUser($uid){
		$data = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE user_id = '$uid'"));

		return $data['f_name'];

	}

?>
<div class="row" style="margin-top: 10px;">
	<div class="col-sm-12">
		<h5 style="float: left;">Manage Categories</h5>
		<div class="btn-group pull-right" role="group" aria-label="Basic example">
		  <button type="button" onclick="addNewCategory()" class="btn btn-primary btn-sm">Add New</button>
		  <button type="button" onclick="deleteCategory()" class="btn btn-danger btn-sm">Delete</button>
		</div>
	</div>

	<div class="col-sm-12" style="margin-top: 20px;">
		<div class="card">
		  <div class="card-body">
		    <table class="table table-hover" id="myTable" style="width:100%;font-size: 12px;">
		    	<tbody>

		    		<tr style="background: #ccc;">
		    			<td width="10px"><input type="checkbox" id="cb-cat" onclick="checkAll()"></td>
		    			<td width="25px"><b>Category name</b></td>
		    			<td><b>Description</b></td>
		    			<td width="150px"><b>Added By</b></td>
		    			<td width="100px"><b>Date Added</b></td>
		    		</tr>

		    		<?php
		    			$getCat = mysql_query("SELECT * FROM incident_category");
		    			while ($rowCat = mysql_fetch_array($getCat)) {
		    		?>
			    		<tr>
			    			<td>
			    				<?php
			    					if($rowCat[category_id] != 12){
			    				?>
			    					<input type="checkbox" value="<?=$rowCat["category_id"]?>" name="categ">
			    				<?php } ?>
			    			</td>
			    			<td><?=$rowCat["name"]?></td>
			    			<td><textarea class="form-control" rows="1" disabled><?=$rowCat["description"]?></textarea></td>
			    			<td><?php echo getUser($rowCat["added_by"]);?></td>
			    			<td><?=$rowCat["date_added"]?></td>
			    		</tr>
		    		<?php } ?>

		    	</tbody>
		    </table>
		  </div>
		</div>
	</div>

</div>
<?php include 'app/modules/modals/addCateg.php'; ?>
<script type="text/javascript">
	// $(document).ready( function () {
	//     $('#myTable').DataTable();
	// } );

	function checkAll(){
		var cb = $("#cb-cat").is(":checked");

		if(cb == true){
			$("input[name=categ]").prop("checked", true);
		}else{
			$("input[name=categ]").prop("checked", false);
		}
	}

	function addNewCategory() {
		$("#addCategModal").modal();
	}

	function addCateg(){
		var data = $("#addCategForm").serialize();
		var url = "app/library/ajax/add_categ.php";

		$.ajax({
			type: "POST",
			url: url,
			data: data,
			success: function(data){
				if(data == 1){
					alertMe("Success!","Category Added","success");
				}else{
					alertMe("Error!","Something's wrong","danger");
				}
			}
		});
		
		$("input").val("");
		$("textarea").val("");
		$("#addCategModal").modal("hide");
		setTimeout( function(){
			location.reload();
		}, 1000);
	}	

	function deleteCategory() {
		 var cbcheck = $("input[name=categ]").is(":checked");

		if(cbcheck == true){

		var x = confirm("Are you sure to delete selected Category?");

		if(x == true){
			var all = new Array();
		$("input:checkbox[name=categ]:checked").map( function(){
			all = $(this).val();
			$.post("app/library/ajax/delete_category.php", {
					id: all },
				function (data, status) {
					if(data == 1){
						alertMe("Success!","Category Removed","success");
					}else{
						alertMe("Error!","Something's wrong","danger");
					}
			});
		});
		}else{
			$("input:checkbox[name=categ]:checked").prop("checked", false);
		}
			setTimeout( function(){
				location.reload();
			}, 1000);
		}else{

			alertMe("Aw snap!","No Checked Data","warning");

		}
	}

</script>