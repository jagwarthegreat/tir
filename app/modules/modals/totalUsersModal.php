<?php include "../../library/config.php";
	  include "../../library/functions.php";
?>
<div id="totalUsersModal" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-user"></i> Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="col-md-12">
          
           <table class="table table-hover" style="width:100%;font-size: 12px;">
		    	<tbody>
		    		<tr style="background: #ccc;">
		    			<td width="5px;"><b>#</b></td>
		    			<td><center><b>Alias</b></center></td>
		    			<td><center><b>Total Posts by User</b></center></td>
		    		</tr>
            	<?php 
	            	$users = mysql_query("SELECT * FROM user");
	            	$count = 1;
	            	while($data = mysql_fetch_array($users)){
            	?>
            	<tr>
            		<td><?php echo $count++; ?></td>
            		<td><center><?php echo $data['alias']; ?></center></td>
            		<td><center><b><?php echo getTotalPostsByUser($data['user_id']);?></b> Post/s</center></td>
            	</tr>

        		<?php } ?>
        		</tbody>
            </table>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>