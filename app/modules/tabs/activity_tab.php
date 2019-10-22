<?php
  function getaddress($lat,$lng)
  {
    $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$lat.','.$lng.'&sensor=false';
    $json = @file_get_contents($url);
    $data=json_decode($json);
    $status = $data->status;
    if($status=="OK"){
      return $data->results[0]->formatted_address;
    }
    else{
      return false;
    }
  }
?>
<style type="text/css">
	.coverMe {
	  object-fit: cover;
	}

	pre {
	    white-space: pre-wrap;       /* Since CSS 2.1 */
	    white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
	    white-space: -pre-wrap;      /* Opera 4-6 */
	    white-space: -o-pre-wrap;    /* Opera 7 */
	    word-wrap: break-word;       /* Internet Explorer 5.5+ */
	}

	::-webkit-scrollbar {
	  display: none;
	}
</style>
<div class="qa-message-list" id="wallmessages">
	<?php
		$user = USER_ID;
	 	$getPosts = mysql_query("SELECT * FROM post WHERE status = 1 AND posted_by = '$user' ORDER BY post_id DESC");
	 	$countD = mysql_num_rows($getPosts);
	 	if($countD < 1){
      		echo " No data found.";
      	}else{
          while( $data = mysql_fetch_array($getPosts)){
      	 	$getLoc = explode(",", $data['location']);
            $lat = $getLoc[0];
            $long = $getLoc[1];

            $getCategory = mysql_fetch_array(mysql_query("SELECT name FROM incident_category WHERE category_id = '$data[category_id]'"));
	?>
	<div class="message-item" id="m16">
		<div class="message-inner">
			<div class="message-head clearfix">
				<div class="avatar pull-left"><a href="#"><img class="postimg" style="object-fit: cover;width: 40px; height: 40px;border: 1px solid #bdbcbc;" src="<?php echo getAvatar(USER_ID);?>"></a></div>
				

				<div class="user-detail">
                <h5 class="handle" style="margin-bottom: 0px;">
                  <span style="font-size: 12px;color: #aaa;"><?php echo "<strong style='color: #666;'>".strtoupper($getCategory[0])."</strong> :: ".getPostDate($data['date_created']);?></span> <?php echo ($data['status'] == 0)?"<b class='text-danger' style='font-size: 12px;'>(Pending)</b>":"<b class='text-primary'>(Approved)</b>"  ?>
                </h5>
                
                <div class="post-meta" style="margin-bottom: 3px;">
                  <div class="asker-meta">
                    <span class="qa-message-what"></span>
                    <span class="qa-message-when">
                      <span class="qa-message-when-data">
                      	 <input type="hidden" id="location" value="<?php echo $data['location']; ?>">
                      	 	near
                          <a id="post_location" href="#" onclick="viewLocation(<?=$lat.", ".$long?>)">
                            <?php
                              $address = getaddress($lat, $long);
                              if($address){
                                echo $address;
                              }else{
                                echo $lat.", ".$long;
                              }
                            ?>
                          </a>
                      </span>
                    </span>
                  </div>
                </div>
              </div>

			</div>
			 <div class="qa-message-content" style="margin-top:5px;text-align: justify;">
              <pre style="font-size: 14px;"><?php echo  $data['caption'] ?> </pre>
            </div>
			<img class="coverMe" style="width: 100%;" src="<?php echo $data['slug'];?>">
		</div>
	</div>
	<?php } } ?>

</div>
<?php include '../modals/view_user_location.php'; ?>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>   
<script type="text/javascript">
function viewLocation(lat, lng) {
	$("#viewMYlocationModal").modal();
	getLoc(lat, lng);
}
</script>