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
			<b><span style="font-size:18px;">SYSTEM LOGS</span></b>
        </td>
        </tr>
        <tr style="background-color:#fff; color:#000;border-bottom:1px solid #000;width:100%;">
        <td colspan="4" style="border:0px solid #000;"></td>
        </tr>
        </tbody>
        </div>
        </table>
        <table cellspacing="2px" style="width:100%;margin-bottom:0px;border:0px solid #000;border-collapse:collapse;">
        <tr style="border-bottom:1px solid #333333;background-color:#eee;">
        <td style="padding-top:10px;text-align:center;width:10%;"><strong>#</strong></td>
        <td style="padding-top:10px;text-align:left;"><strong>EVENT DONE</strong></td>
        <td style="padding-top:10px;text-align:left;"><strong>USER</strong></td>
        <td style="padding-top:10px;text-align:left;"><strong>DATE</strong></td>
        </tr>
        <?php
            $n = 1;
            $result2 = mysql_query("select * from logs as l, user as u where l.user_id = u.user_id order by log_id DESC ") or die(mysql_error());
            while($row2 = mysql_fetch_assoc($result2)){
        ?>
        <tr>
			<td style="padding-top:3px;text-align:center;border-bottom:1px solid #ddd;"><?php echo $n++.".";?></td>
			<td style="padding-top:3px;text-align:left;border-bottom:1px solid #ddd;"><?php echo $row2['event_done'];?></td>
			<td style="padding-top:3px;text-align:left;border-bottom:1px solid #ddd;"><?php echo $row2['name'];?></td>
			<td style="padding-top:3px;text-align:left;border-bottom:1px solid #ddd;"><?php echo $row2['date'];?></td>
        </tr>
        <?php } ?>
        </table>    
<!-- RECENT EVALUATED GRADES END -->
</body>

</html>