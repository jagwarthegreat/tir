<?php 
	function getPostedBy($id){
		$data = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE user_id = '$id'"));
		return $data['alias'];
	}

	function getCateg($cid){
		$categ = mysql_fetch_array(mysql_query("SELECT * FROM incident_category WHERE category_id = '$cid'"));
		return $categ['name'];
	}
?>
<div class="row" style="margin-top: 10px;">
	<div class="col-sm-12">
		<h5>REVIEW POSTS</h5>
	</div>

	<div class="col-sm-12" style="margin-top: 20px;">
		<div class="card">
		  <div class="card-body">
		    <h4 class="card-title" style="text-align: center;">PENDING POSTS</h4>
		    <table class="table table-hover" style="width:100%;font-size: 12px;">
		    	<tbody>
		    		<tr style="background: #ccc;">
		    			<td width="5px;"><b>#</b></td>
		    			<td>Post By</td>
		    			<td>Category</td>
		    			<td>Date Posted</td>
		    			<td>Action</td>
		    		</tr>
		    		<?php
		    		$rank = 1;
		    		$post = mysql_query("SELECT * FROM post WHERE status != 1");
		    			while($row = mysql_fetch_array($post)){
		    		?>
		    		<tr>
		    			<td width="5px;"><b><?php echo $rank++;?></b></td>
		    			<td><?php echo  getPostedBy($row['posted_by']); ?></td>
		    			<td><?php echo getCateg($row['category_id']); ?></td>
		    			<td><?php echo getPostDate($row['date_created']);?></td>
		    			<td>
		    				<div class="btn-group">
			    				<button class="btn btn-sm btn-secondary" onclick="review('<?php echo $row['slug'];?>','<?php echo $row['caption'];?>','<?php echo  getPostedBy($row['posted_by']); ?>')"><i class="fa fa-search"></i> </button>
			    				<button class="btn btn-sm btn-success" onclick="approved(<?php echo $row['post_id'];?>,<?php echo $row['posted_by'];?>,'A')"><i class="fa fa-check"></i> Approve</button>
			    				<?php if($row['edited_status'] == 0){ ?>
			    				<button class="btn btn-sm btn-danger" onclick="mature(<?php echo $row['post_id'];?>,'M')"><i class="fa fa-eye-slash"></i> Violent Content</button>
			    				<?php } ?>
		    				</div>
		    			</td>
		    		</tr>
		    		<?php } ?>
		    	</tbody>
		    </table>
		  </div>
		</div>
	</div>

</div>
<?php require "modals/reviewPost.php"; ?>
<script type="text/javascript">
	
	function review(src,cap,post){
		$("#viewImgModal").modal();
		$("#post_img").attr("src", src);
		$("#caption").val(cap);
		$("#postedby").html(post);
	}

	function approved(id,p_id,type){
		var url = "app/library/ajax/update_post.php";
		$.ajax({
			url: url,
			data:{id: id,type: type,a_id: <?php echo USER_ID;?>,p_id: p_id},
			type: "POST",
			success: function(data){
				if(data == 1){
					alertMe("Success!","Status updated.","success");
					setTimeout( function(){
						window.location.reload();
					},1000);
				}else{
					alertMe("Error!","Something was wrong.","danger");
					//alert(data);
				}
			}
		});
	}

	function mature(id,type){
		var url = "app/library/ajax/update_post.php";
		$.ajax({
			url: url,
			data:{id: id,type: type},
			type: "POST",
			success: function(data){
				if(data == 1){
					alertMe("Success!","Status updated.","success");
					setTimeout( function(){
						window.location.reload();
					},1000);
				}else{
					alertMe("Error!","Something was wrong.","danger");
				}
			}
		});
	}
</script>