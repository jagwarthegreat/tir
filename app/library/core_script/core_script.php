<script type="text/javascript">
	
	function get_data(column, url, table_id){

		var i = 1;
		var col = "";
		while (i <= column){
			if(i == column){
			  col += '{ "data":"col'+i+'" }';
			}else{
			  col += '{ "data":"col'+i+'" },';
			}

			i++;
		}

		alert(col);
      	$('#column_out').html(col);
		$('#'+table_id).DataTable().destroy();
		$('#'+table_id).DataTable({
		  "processing":true,
		  "ajax":{
		      "url": url,
		      "dataSrc":"data"
		  },
		  "columns":[
		     col
		  ]
		});
	}


function checkAll(ele) {
	var checkboxes = document.getElementsByTagName('input');
	if (ele.checked) {
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i].type == 'checkbox') {
				checkboxes[i].checked = true;
				}
			}
	} else {
		for (var i = 0; i < checkboxes.length; i++) {
			//console.log(i)
			if (checkboxes[i].type == 'checkbox') {
				checkboxes[i].checked = false;
			}
		}
	}
}

</script>