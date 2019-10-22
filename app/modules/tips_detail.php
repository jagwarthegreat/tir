<?php
$getTipsid = $_REQUEST["id"];

$getDetails = mysql_fetch_array(mysql_query("SELECT * FROM incident_category WHERE category_id = '$getTipsid'"));
$getCat = mysql_query("SELECT * FROM info_tips WHERE category_id = '$getTipsid'");
$counter = mysql_num_rows($getCat);


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
<style type="text/css">
	p.singleLine {
	    white-space: nowrap; 
	    width: 100%; 
	    overflow: hidden;
	    text-overflow: ellipsis; 
	}

	h4.singleLine {
	    white-space: nowrap; 
	    width: 100%; 
	    overflow: hidden;
	    text-overflow: ellipsis; 
	}
</style>
<div class="row" style="margin-top: 10px;">
	<div class="col-sm-12">
		<h5 style="float: left;">Helpful information about <?=$getDetails["name"]." (".$counter.")"?></h5>
		<div class="btn-group pull-right" role="group" aria-label="Basic example" style="<?=$can_add_category?>">
			<button type="button" onclick="review('<?php echo $getTipsid;?>')" class="btn btn-success btn-sm">Add Article</button>
		</div>
	</div>
	<?php
		if($counter != 0){
		while ($rowCat = mysql_fetch_array($getCat)) {
	?>
		<div class="col-md-4" style="margin-bottom: 10px;">
			<div class="card">
			  <div class="card-body">
			    <h4 class="card-title singleLine"><?=$rowCat["subject"]?></h4>
			    <p class="card-text singleLine"><?=$rowCat["description"]?></p>
			     <button type="button" onclick="deleteEntry('<?php echo $rowCat[tip_id];?>')" class="card-link btn btn-danger btn-sm pull-left" style="border-radius: 0px;margin-right: 0px;<?=$can_add_category?>">Delete</button>
			     <button type="button" onclick="editEntry('<?php echo $rowCat[tip_id];?>')" class="card-link btn btn-warning btn-sm pull-left" style="border-radius: 0px;margin-left: 0px;<?=$can_add_category?>">Edit</button>
			    <a href="index.php?view=tips-content&id=<?=$rowCat[tip_id]?>&cat=<?=$getTipsid?>" class="card-link btn btn-secondary btn-sm pull-right">Read more...</a>
			  </div>
			</div>
		</div>
	<?php } }else{?>
		<div class="col-md-4" style="margin-bottom: 10px;">
			no data found.
		</div>
	<?php } ?>
</div>
<?php require "modals/add_info_tips.php"; ?>
<?php require "modals/edit_info_tips.php"; ?>
<script type="text/javascript">
	function review(src,cap,post){
		$("#addModal").modal();
	}

	function deleteEntry(id) {
		// alert("deleted! jk: "+id);
		//unlink($filename);
		var x = confirm("Are you sure to delete?");
		if(x){
			var url = "app/library/ajax/delete_entry.php";
			$.post(url,{id: id}, function(data){
				if(data == 1){
					alertMe("Success!","Entry was deleted.","success");
					setTimeout( function(){
						window.location.reload();
					},1000);
				}else if(data == 2){
					alertMe("Warning!","Action Invalid.","warning");
				}else{
					alertMe("Error!","Something was wrong.","danger");
				}
			});
		}
	}

	function editEntry(id) {
		var url = "app/library/ajax/get_entry.php";

		$.post(url,{id: id}, function(data){
			var o = JSON.parse(data);
			$("#tip_id").val(o.tip_id);
			$("#update_title").val(o.subj);
			$("#update_description").val(o.desc1);
			$("#update_content").val(o.desc2);
			if(o.slug){
				$("#update_attachment").attr("src",o.slug);
			}
			$("#editModal").modal();
		});
	}
</script>