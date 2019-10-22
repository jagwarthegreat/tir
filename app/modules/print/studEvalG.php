 <?php 
include '../../library/config.php';
$accessID = getSessionID();
$name21 = getSessionName($accessID);
$id = $_REQUEST['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

<script>
function printPage() { print(); } //Must be present for Iframe printing
</script>


<style type="text/css">
	
	@media print and (width: 8.5in) and (height: 14in) {
  @page {
	  margin: 1in;
  }
}

body
{
	size: legal portrait;
		
	padding:0px;
	/*margin:0px;*/
	font-family:Arial, Helvetica, sans-serif;
	font-size:8pt;
	-webkit-print-color-adjust:exact;
}

.header
{
	text-align:center;
	margin-top:20px;
}

.header table, .content table
{
	width:100%;
	text-align:left;


}

td{
	font-size:12px;
	font-family:Arial;
}

b{
	font-size:12px;
	font-family:Arial;
}

.kilid{
	-webkit-transform: rotate(7deg); /* Chrome, Safari, Opera */
    transform: rotate(270deg);
}

.content table{
	border-collapse:collapse;
}
.content th{
	border:0px solid #000;
	padding:0px;
}
	.clearfix:after {
	content: ".";
	display: block;
	clear: both;
	visibility: hidden;
	line-height: 0;
	height: 0;
}
 
.clearfix {
	display: inline-block;
}

html[xmlns] .clearfix {
	display: block;
}
 
* html .clearfix {
	height: 1%;
}
	
</style>
	
	
</head>

<body>
	<div>
        <tbody>
        <tr>
			<td style="border:0px solid #000;padding-top:10px;">
			<b><span style="font-size:18px;">RECENTLY EVALUATED GRADES</span></b>
        </td>
        </tr>
        <tr style="background-color:#fff; color:#000;border-bottom:1px solid #000;width:100%;">
        <td colspan="4" style="border:0px solid #000;"></td>
        </tr>
        </tbody>
        </div>
        </table>
        <table cellspacing="2px" style="width:100%;margin-bottom:0px;border:0px solid #000;border-collapse:collapse;">
        <tr style="border-bottom:1px solid #333333;">
        <td style="padding-top:10px;text-align:center;width:10%;"><strong>YR</strong></td>
        <td style="padding-top:10px;text-align:left;width:10%;"><strong>SEM</strong></td>
        <td style="padding-top:10px;text-align:left;width:10%;"><strong>CODE</strong></td>
        <td style="padding-top:10px;text-align:left;"><strong>TITLE</strong></td>
        <td style="padding-top:10px;text-align:left;"><strong>TEACHER</strong></td>
        <td style="padding-top:10px;text-align:center;width:10%;"><strong>GRADE</strong></td>
        <td style="padding-top:10px;text-align:left;width:10%;"><strong>REMARKS</strong></td>
        <td style="padding-top:10px;text-align:center;width:10%;"><strong>UNIT</strong></td>
        </tr>
        <?php
        //$student_id
        $result2 = mysql_query("select GRADE_ID from grades order by GRADE_ID DESC LIMIT 1") or die(mysql_error());
        $row2 = mysql_fetch_assoc($result2);

        $getval1 = mysql_query("select *
        from subject as sub, tblstudent as s, grades as gr, instructor as ins
        where gr.IDNO = s.IDNO
        and gr.SUBJ_ID = sub.SUBJ_ID
        and gr.INST_ID = ins.INST_ID
        and gr.STATUS = 'FINISHED'
        and gr.IDNO = '$id'
        group by gr.LEVEL, gr.SEM ASC") or die(mysql_error());
        while($getRowVal1 = mysql_fetch_assoc($getval1)){
			
			$getLvl = mysql_query("select * from section where sec_id = '$getRowVal1[sec_id]'") or die(mysql_error());
				$rowGetLvl = mysql_fetch_assoc($getLvl);
				
				$getLvl5 = mysql_query("select * from level where YR_ID = '$getRowVal1[LEVEL]'") or die(mysql_error());
				$rowGetLvl5 = mysql_fetch_assoc($getLvl5);
        ?>
        <tr>
        <td colspan="8" style="background-color:#eee;padding-top:3px;text-align:left;border-bottom:1px solid #333333;border-top:1px solid #333333;"><strong><?php echo $rowGetLvl5['LEVEL_DESCRIPTION'] . " :: " .$getRowVal1['SEM'];?></strong></td>
        </tr>
		<?php 
			$getval = mysql_query("select *
				from subject as sub, tblstudent as s, grades as gr, instructor as ins
				where gr.IDNO = s.IDNO
				and gr.SUBJ_ID = sub.SUBJ_ID
				and gr.INST_ID = ins.INST_ID
				and gr.STATUS = 'FINISHED'
				and gr.IDNO = '$getRowVal1[IDNO]'
				and gr.LEVEL = '$getRowVal1[LEVEL]'
				and gr.SEM = '$getRowVal1[SEM]'
				order by gr.LEVEL ASC") or die(mysql_error());
				while($getRowVal = mysql_fetch_assoc($getval)){
					
				$getLvl1 = mysql_query("select * from section where sec_id = '$getRowVal[sec_id]'") or die(mysql_error());
				$rowGetLvl1 = mysql_fetch_assoc($getLvl);
				
				$getLvl51 = mysql_query("select * from level where YR_ID = '$getRowVal[LEVEL]'") or die(mysql_error());
				$rowGetLvl51 = mysql_fetch_assoc($getLvl51);
		?>
        <tr>
			<td style="padding-top:3px;text-align:left;border-bottom:1px solid #ddd;"><?php echo $rowGetLvl51['LEVEL_DESCRIPTION'];?></td>
			<td style="padding-top:3px;text-align:left;border-bottom:1px solid #ddd;"><?php echo $getRowVal['SEM'];?></td>
			<td style="padding-top:3px;text-align:left;border-bottom:1px solid #ddd;"><?php echo $getRowVal['SUBJ_CODE'];?></td>
			<td style="padding-top:3px;text-align:left;border-bottom:1px solid #ddd;"><?php echo $getRowVal['SUBJ_DESCRIPTION'];?></td>
			<td style="padding-top:3px;text-align:left;border-bottom:1px solid #ddd;"><?php echo $getRowVal['INST_FULLNAME'];?></td>
			<td style="padding-top:3px;text-align:center;border-bottom:1px solid #ddd;"><?php echo $getRowVal['FIN_AVE'];?></td>
			<td style="padding-top:3px;text-align:left;border-bottom:1px solid #ddd;<?php if($getRowVal['FIN_AVE'] < 75){ echo "color:red;"; };?>"><?php echo $getRowVal['REMARKS'];?></td>
			<td style="padding-top:3px;text-align:center;border-bottom:1px solid #ddd;"><?php echo $getRowVal['UNIT'];?></td>
        </tr>
        <?php } } ?>
        </table>    
<!-- RECENT EVALUATED GRADES END -->
</body>

</html>