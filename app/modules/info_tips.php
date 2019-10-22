<div class="row" style="margin-top: 10px;">
	<div class="col-sm-12">
		<h5 style="float: left;">Help and Tips</h5>
	</div>
	<?php
		$getCat = mysql_query("SELECT * FROM incident_category");
		while ($rowCat = mysql_fetch_array($getCat)) {
	?>
		<div class="col-md-4" style="margin-bottom: 10px;">
			<div class="card">
			  <div class="card-body">
			    <h4 class="card-title"><?=$rowCat["name"]?></h4>
			    <!-- <p class="card-text"><?=$rowCat["description"]?></p> -->
			    <a href="index.php?view=tips-details&id=<?=$rowCat[category_id]?>" class="card-link btn btn-secondary btn-sm pull-right">View data</a>
			  </div>
			</div>
		</div>
	<?php } ?>
</div>