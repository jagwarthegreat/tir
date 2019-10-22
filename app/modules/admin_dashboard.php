<div class="row" style="margin-top: 10px;">
	<div class="col-sm-12">
		<h5>DASHBOARD</h5>
	</div>

	<div class="col-sm-4">
		<div class="card">
		  <div class="card-body">
		    <h4 class="card-title" style="text-align: center;">PENDING POST</h4>
		    <h6 class="card-subtitle mb-2 text-muted"></h6>
		    <h3 class="card-text" style="text-align: center;"><?=getPendingPost()?></h3>
		    <a href="https://tir.jagwarthegreat.tech/index.php?view=review-posts" class="card-link pull-right">See more</a>
		  </div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="card">
		  <div class="card-body">
		    <h4 class="card-title" style="text-align: center;">TOTAL USERS</h4>
		    <h6 class="card-subtitle mb-2 text-muted"></h6>
		    <h3 class="card-text" style="text-align: center;"><?=getTotalUsers()?></h3>
		    <a href="#" class="card-link pull-right" data-toggle="modal" data-target="#totalUsersModal">See more</a>
		  </div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="card">
		  <div class="card-body">
		    <h4 class="card-title" style="text-align: center;">TOTAL POST</h4>
		    <h6 class="card-subtitle mb-2 text-muted"></h6>
		    <h3 class="card-text" style="text-align: center;"><?=getApprovedPost()?></h3>
		    <a href="#" class="card-link pull-right">&nbsp;</a>
		  </div>
		</div>
	</div>

	<div class="col-sm-12" style="margin-top: 20px;">
		<div class="card">
		  <div class="card-body">
		    <h4 class="card-title" style="text-align: center;">INCIDENT STATISTICS</h4>
		    <h6 class="card-subtitle mb-2 text-muted" style="text-align: center;">highest ~ lowest</h6>
		    <table class="table table-hover" style="width:100%;font-size: 12px;">
		    	<tbody>
		    		<tr style="background: #ccc;">
		    			<td width="5px;"><b>Rank</b></td>
		    			<td><center><b>Count</b></center></td>
		    			<td><b>Incident</b></td>
		    		</tr>
		    		<?php
		    			$rank = 1;
		    			$getCategory = mysql_query("SELECT *,COUNT(p.category_id) as c FROM post as p, incident_category as ic WHERE p.status = 1 AND p.category_id = ic.category_id GROUP BY ic.category_id ORDER BY c DESC");
		    			while ($getRowCat = mysql_fetch_array($getCategory)) {
		    		?>
		    		<tr>
		    			<td><center><?=$rank?></center></td>
		    			<td><center><?="<b>".$getRowCat['c']."</b> Post/s"?></center></td>
		    			<td><?=$getRowCat['name']?></td>
		    		</tr>
		    		<?php $rank++; } ?>
		    	</tbody>
		    </table>
		  </div>
		</div>
	</div>

</div>
<?php require 'modals/totalUsersModal.php'; ?>