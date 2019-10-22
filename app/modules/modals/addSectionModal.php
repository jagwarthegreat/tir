 <!-- Modal -->
	<div id="addSectionModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title"> Add Section</h3>
				</div>
				
				<div class="modal-body">
					<div class="input-group">
						<span class="input-group-addon"><strong>Section Code:</strong><span style="color:red;">*</span></span>
						<input type="text"  required class="form-control" id="acode">
					</div><br>
					
					<div class="input-group">
						<span class="input-group-addon"><strong>Description:</strong><span style="color:red;">*</span></span>
						<input type="text"  required class="form-control" id="chart">
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