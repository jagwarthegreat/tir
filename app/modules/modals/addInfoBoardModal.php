 <!-- Modal -->
	<div id="addInfoBoardModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title"> Add Info Board</h3>
				</div>
				
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><strong>Info Code:</strong><span style="color:red;">*</span></span>
						<input type="text"  required class="form-control" id="acode">
					</div><br>
					
					<div class="input-group">
						<span class="input-group-addon"><strong>Title:</strong><span style="color:red;">*</span></span>
						<input type="text"  required class="form-control" id="chart">
					</div><br>

					<div class="input-group">
						<span class="input-group-addon"><strong>Details:</strong></span>
							<select class="form-control" id="enabled">
								<option value="">Please Choose:</option>
								<option value="Yes">Yes</option>
								<option value="No">No</option>
							</select>
					</div><br>
					
					<div class="input-group">
						<span class="input-group-addon"><strong>Posted by:</strong><span style="color:red;">*</span></span>
						<input type="text"  required class="form-control" id="chart" disabled="true">
					</div><br>
					
					<div class="input-group">
						<span class="input-group-addon"><strong>Date:</strong></span>
						<input type="text"  required class="form-control" id="chart" disabled="true">
					</div><br>
					
				</div>
				<div class="modal-footer input-group-btn">
					<span class="btn-group" role="group">
						<button type="button" id="btn_save" onclick="addMainAccount()" class="btn btn-sm btn-default"><span class="fa fa-check-circle"></span> Save Record</button>
						<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><span class="fa fa-times-circle"></span> Close</button>
					</span>
				</div>
			</div>
		</div>
	</div>