<?php
	$tip_ID = $_REQUEST['id'];
	$cat = $_REQUEST['cat'];
	$getTips = mysql_fetch_array(mysql_query("SELECT * FROM info_tips WHERE tip_id = '$tip_ID'"));
	$getTips_detail = mysql_fetch_array(mysql_query("SELECT * FROM info_tips_detail WHERE tip_header_id = '$getTips[tip_id]'"));
?>
<style type="text/css">
	pre{
		font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
	}
</style>
<div class="row" style="margin-top: 15px;">
	<div class="col-sm-12" style="margin-bottom: 10px;margin-top: 10px;">
		<!-- <h5 style="float: left;">Helpful information about <?=$getDetails["name"]." (".$counter.")"?></h5> -->
		<div class="btn-group pull-left" role="group" aria-label="Basic example">
			<input type="hidden" id="catID" value="<?=$cat?>">
			<button type="button" onclick="goBack()" class="btn btn-default btn-sm"><i class="fa fa-arrow-left" style="font-size: 14px;"></i> Go back</button>
		</div>
	</div>
	<div class="col-md-12" style="margin-bottom: 10px;">
		<div class="card">
		  <div class="card-body">
		    <h4 class="card-title"><?=$getTips['subject']?></h4>
		    <img style="object-fit: contain;width: 100%; height: 100%;" src="<?php echo $getTips_detail['slug'];?>">
		    <div style="display: block;text-align: justify;">
		   		<pre class="card-text" style="font-size: 16px;word-break: break-all;white-space: pre-wrap;"><?=$getTips_detail['description']?></pre>
			</div>
		    <!-- <a href="index.php?view=tips-content" class="card-link btn btn-secondary btn-sm pull-right">Read more...</a> -->
		  </div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function goBack() {
		var cat_id = $("#catID").val();
		window.location = 'index.php?view=tips-details&id='+cat_id;
	}
</script>
