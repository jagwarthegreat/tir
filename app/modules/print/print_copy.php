<?php 
include '../../library/config.php';
$accessID = getSessionID();
$name21 = getSessionName($accessID);

  $lvl = $_REQUEST['lvl'];
  $sn = $_REQUEST['sn'];
  $sem = $_REQUEST['sem'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

<script>
print(); //Must be present for Iframe printing
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
.header table td, .content table td
{
	padding:0px;

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

<body> <!-- <img src="../../images/logo.png" width="100px"> -->
<div class="container" style="background-color:#FFF;padding:10px;">
<div >
					
               <div class="content" style="font-size:8px;">
				   
				   <table cellspacing="0" style="margin-top:0px;border:0px solid #000;border-collapse:collapse;" >
					<div>
						<thead>
							<tr style="background-color:#FFF; color:#000;">
								<th style="padding:10px;text-align:center;" width="100%">
									<div style="display:inline-block;margin-left:-50px;">
										<img src="../../../asset/images/logo.png" width="50px" height="50px">
									</div>
									<div style="display:inline-block;margin-left:10px;">
										<span style="display:block;">REPUBLIC OF THE PHILIPPINES</span>
										<span style="display:block;">BACOLOD CITY COLLEGE</span>
										<span style="display:block;">PRE-ENROLLMENT FORM</span>
									</div>
								</th>
							</tr>
						</thead>
						</div>
				   </table>
				   <table cellspacing="0" style="width:100%;margin-bottom:0px;border:0px solid #000;border-collapse:collapse;">
					<div>
						<tbody>
							<tr>
                                <?php
								$getStud = mysql_query("select * 
                                from tblstudent where IDNO = '$sn'
								") or die(mysql_error());
								$row21 = mysql_fetch_assoc($getStud);
								?>
								<td colspan="2" style="padding-top:0px;border:0px solid #000;">
									<b>Name :</b> <?php echo $row21['FNAME']." ".  $row21['MNAME'] ." ". $row21['LNAME']; ?>
								</td>
								<td style="padding-top:10px;border:0px solid #000;">
									<b>Date :</b> <?php 
									$mos = date("m/d/Y");
									echo $mos; ?>
								</td>
							</tr>
							<tr>
								<td colspan="2" style="border:0px solid #000;">
									<b>Course :</b>  <?php echo "BS INFROMATION SYSTEM"; ?>
								</td>
								<td style="border:0px solid #000;">
									<b>Yr &amp; Section : </b> <?php 
									$getLvl = mysql_query("select * from level where LEVEL = '$lvl'") or die(mysql_error());
									$rowGetLvl = mysql_fetch_assoc($getLvl);
									echo $rowGetLvl['LEVEL_DESCRIPTION']. " - " . $row21['sec_name'];
									?>
								</td>
							</tr>
							<tr>
								<td colspan="4" style="border:0px solid #000;font-size:10px;padding-top:10px;" align="center">
									<b>SUBJECTS TAKEN IN THE PREVIOUS SEMESTER</b>
								</td>
							</tr>
							<tr style="background-color:#fff; color:#000;border-bottom:1px solid #000;width:100%;">
								<td colspan="4" style="border:0px solid #000;"></td>
							</tr>
						</tbody>
						</div>
				   </table>	
                   
                   <table cellspacing="2px" style="width:100%;margin-bottom:0px;border:0px solid #000;border-collapse:collapse;">
                        <tr>
                            <td style="padding-top:0px;text-align:left;width:10%;"><strong>CODE</strong></td>
                            <td style="padding-top:0px;text-align:left;"><strong>TITLE</strong></td>
                            <td style="padding-top:0px;text-align:left;width:20%;"><strong>TEACHER</strong></td>
                            <td style="padding-top:0px;text-align:center;width:10%;"><strong>GRADES</strong></td>
                            <td style="padding-top:0px;text-align:left;width:10%;"><strong>REMARKS</strong></td>
                       </tr>
                       <?php
                            //$student_id
                            $getval = mysql_query("select *
                            from subject as sub, tblstudent as s, grades as gr, instructor as ins
                            where gr.IDNO = s.IDNO
                            and gr.SUBJ_ID = sub.SUBJ_ID
                            and gr.INST_ID = ins.INST_ID
                            and gr.IDNO = '$sn'
                            and gr.STATUS = 'SAVED'
                            order by GRADE_ID DESC") or die(mysql_error());
                            while($getRowVal = mysql_fetch_assoc($getval)){
                       ?>
                       <tr style="<?php if($getRowVal['FIN_AVE'] < 75){ echo $grd = "background-color:#ffcccc;"; }?>">
                            <td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"><?php echo $getRowVal['SUBJ_CODE'];?></td>
                            <td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"><?php echo $getRowVal['SUBJ_DESCRIPTION'];?></td>
                            <td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"><?php echo $getRowVal['INST_FULLNAME'];?></td>
                            <td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;"><?php echo $getRowVal['FIN_AVE'];?></td>
                            <td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"><?php echo $getRowVal['REMARKS'];?></td>
                       </tr>
                       <?php } ?>
                   </table>
                   
                   <table cellspacing="2px" style="width:100%;margin-top:20px;border:0px solid #000;border-collapse:collapse;">
                        <tr>
                            <td colspan="5" style="border:0px solid #000;font-size:10px;" align="center">
                                <b>SUBJECTS TO BE TAKEN THIS SEMESTER</b>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-top:0px;text-align:left;width:10%;"><strong>CODE</strong></td>
                            <td style="padding-top:0px;text-align:left;"><strong>TITLE</strong></td>
                            <td style="padding-top:0px;text-align:center;width:10%;"><strong>UNIT</strong></td>
                            <td style="padding-top:0px;text-align:left;width:10%;"><strong>SCHEDULE</strong></td>
                       </tr>
                       <?php
					   
							switch (true) {
							case ($lvl == '1' && $sem == 'First'):
									#proceed level 1 and Second Sem
									$desc = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '1' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										echo '<tr>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowSub2['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											echo '<tr style="background-color:#ddd;">
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowVal['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}
									}
							break;
							case ($lvl == '1' && $sem == 'Second'):
									#proceed level 2 and First Sem
									$desc = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '2' and sub.SEMESTER = 'First' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										echo '<tr>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowSub2['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											echo '<tr style="background-color:#ddd;">
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowVal['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}
									}
								break;
							case ($lvl == '2' && $sem == 'First'):
									#proceed level 2 and Second Sem
									$desc = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '2' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										echo '<tr>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowSub2['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											echo '<tr style="background-color:#ddd;"> 
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowVal['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}
									}
								break;
							case ($lvl == '2' && $sem == 'Second'):
									#proceed level 3 and First Sem
									$desc = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '3' and sub.SEMESTER = 'First' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										echo '<tr>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowSub2['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											echo '<tr style="background-color:#ddd;">
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowVal['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}
									}
								break;
							case ($lvl == '3' && $sem == 'First'):
									#proceed level 3 and Second Sem
									$desc = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '3' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										echo '<tr>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowSub2['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											echo '<tr style="background-color:#ddd;">
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowVal['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}
									}
								break;
							case ($lvl == '3' && $sem == 'Second'):
									#proceed level 4 and First Sem
									$desc = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '4' and sub.SEMESTER = 'First' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										echo '<tr>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowSub2['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											echo '<tr style="background-color:#ddd;">
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowVal['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}
									}
								break;
							case ($lvl == '4' && $sem == 'First'):
									#proceed level 4 and Second Sem
									$desc = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '4' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										echo '<tr>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowSub2['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											echo '<tr style="background-color:#ddd;">
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowVal['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}
									}
								break;
							default:
								break;
							}
	
                            //$student_id
                           /* $getval = mysql_query("select *
                            from subject as sub, tblstudent as s, grades as gr, instructor as ins
                            where gr.IDNO = s.IDNO
                            and gr.SUBJ_ID = sub.SUBJ_ID
                            and gr.INST_ID = ins.INST_ID
                            and gr.IDNO = '$sn'
                            and gr.STATUS = 'SAVED'
                            order by GRADE_ID DESC") or die(mysql_error());
                            while($getRowVal = mysql_fetch_assoc($getval)){

                                if($getRowVal['FIN_AVE'] < 75){
                                    $grd = "color:red;";
                                }*/
								
						?>
						
					   <tr>
						<td colspan="4" style="padding-top:0px;text-align:left;width:10%;">&nbsp</td>
					   </tr>
					   <tr>
						<td colspan="4" style="padding-top:0px;text-align:left;width:10%;"><strong>EVALUATOR:</strong><div style="border-bottom:1px solid #333333;display:inline-block;width:200px;">&nbsp;</div></td>
					   </tr>
                   </table>
                   
               </div>
					
               <div class="content" style="font-size:8px;margin-top:100px;">
				   
				   <table cellspacing="0" style="margin-top:0px;border:0px solid #000;border-collapse:collapse;" >
					<div>
						<thead>
							<tr style="background-color:#FFF; color:#000;">
								<th style="padding:10px;text-align:center;" width="100%">
									<div style="display:inline-block;margin-left:-50px;">
										<img src="../../../asset/images/logo.png" width="50px" height="50px">
									</div>
									<div style="display:inline-block;margin-left:10px;">
										<span style="display:block;">REPUBLIC OF THE PHILIPPINES</span>
										<span style="display:block;">BACOLOD CITY COLLEGE</span>
										<span style="display:block;">PRE-ENROLLMENT FORM</span>
									</div>
								</th>
							</tr>
						</thead>
						</div>
				   </table>
				   <table cellspacing="0" style="width:100%;margin-bottom:0px;border:0px solid #000;border-collapse:collapse;">
					<div>
						<tbody>
							<tr>
                                <?php
								$getStud = mysql_query("select * 
                                from tblstudent where IDNO = '$sn'
								") or die(mysql_error());
								$row21 = mysql_fetch_assoc($getStud);
								?>
								<td colspan="2" style="padding-top:0px;border:0px solid #000;">
									<b>Name :</b> <?php echo $row21['FNAME']." ".  $row21['MNAME'] ." ". $row21['LNAME']; ?>
								</td>
								<td style="padding-top:10px;border:0px solid #000;">
									<b>Date :</b> <?php 
									$mos = date("m/d/Y");
									echo $mos; ?>
								</td>
							</tr>
							<tr>
								<td colspan="2" style="border:0px solid #000;">
									<b>Course :</b>  <?php echo "BS INFROMATION SYSTEM"; ?>
								</td>
								<td style="border:0px solid #000;">
									<b>Yr &amp; Section : </b> 
									<?php 
									$getLvl = mysql_query("select * from level where LEVEL = '$lvl'") or die(mysql_error());
									$rowGetLvl = mysql_fetch_assoc($getLvl);
									echo $rowGetLvl['LEVEL_DESCRIPTION']. " - " . $row21['sec_name'];
									?>
								</td>
							</tr>
							<tr>
								<td colspan="4" style="border:0px solid #000;font-size:10px;padding-top:10px;" align="center">
									<b>SUBJECTS TAKEN IN THE PREVIOUS SEMESTER</b>
								</td>
							</tr>
							<tr style="background-color:#fff; color:#000;border-bottom:1px solid #000;width:100%;">
								<td colspan="4" style="border:0px solid #000;"></td>
							</tr>
						</tbody>
						</div>
				   </table>	
                   
                   <table cellspacing="2px" style="width:100%;margin-bottom:0px;border:0px solid #000;border-collapse:collapse;">
                        <tr>
                            <td style="padding-top:0px;text-align:left;width:10%;"><strong>CODE</strong></td>
                            <td style="padding-top:0px;text-align:left;"><strong>TITLE</strong></td>
                            <td style="padding-top:0px;text-align:left;width:20%;"><strong>TEACHER</strong></td>
                            <td style="padding-top:0px;text-align:center;width:10%;"><strong>GRADES</strong></td>
                            <td style="padding-top:0px;text-align:left;width:10%;"><strong>REMARKS</strong></td>
                       </tr>
                       <?php
                            //$student_id
                            $getval = mysql_query("select *
                            from subject as sub, tblstudent as s, grades as gr, instructor as ins
                            where gr.IDNO = s.IDNO
                            and gr.SUBJ_ID = sub.SUBJ_ID
                            and gr.INST_ID = ins.INST_ID
                            and gr.IDNO = '$sn'
                            and gr.STATUS = 'SAVED'
                            order by GRADE_ID DESC") or die(mysql_error());
                            while($getRowVal = mysql_fetch_assoc($getval)){
                       ?>
                       <tr style="<?php if($getRowVal['FIN_AVE'] < 75){ echo $grd = "background-color:#ffcccc;"; }?>">
                            <td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"><?php echo $getRowVal['SUBJ_CODE'];?></td>
                            <td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"><?php echo $getRowVal['SUBJ_DESCRIPTION'];?></td>
                            <td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"><?php echo $getRowVal['INST_FULLNAME'];?></td>
                            <td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;"><?php echo $getRowVal['FIN_AVE'];?></td>
                            <td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"><?php echo $getRowVal['REMARKS'];?></td>
                       </tr>
                       <?php } ?>
                   </table>
                   
                   <table cellspacing="2px" style="width:100%;margin-top:20px;border:0px solid #000;border-collapse:collapse;">
                        <tr>
                            <td colspan="5" style="border:0px solid #000;font-size:10px;" align="center">
                                <b>SUBJECTS TO BE TAKEN THIS SEMESTER</b>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-top:0px;text-align:left;width:10%;"><strong>CODE</strong></td>
                            <td style="padding-top:0px;text-align:left;"><strong>TITLE</strong></td>
                            <td style="padding-top:0px;text-align:center;width:10%;"><strong>UNIT</strong></td>
                            <td style="padding-top:0px;text-align:left;width:10%;"><strong>SCHEDULE</strong></td>
                       </tr>
                       <?php
					   
							switch (true) {
							case ($lvl == '1' && $sem == 'First'):
									#proceed level 1 and Second Sem
									$desc = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '1' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										echo '<tr>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowSub2['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											echo '<tr style="background-color:#ddd;">
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowVal['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}
									}
							break;
							case ($lvl == '1' && $sem == 'Second'):
									#proceed level 2 and First Sem
									$desc = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '2' and sub.SEMESTER = 'First' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										echo '<tr>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowSub2['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											echo '<tr style="background-color:#ddd;">
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowVal['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}
									}
								break;
							case ($lvl == '2' && $sem == 'First'):
									#proceed level 2 and Second Sem
									$desc = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '2' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										echo '<tr>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowSub2['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											echo '<tr style="background-color:#ddd;"> 
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowVal['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}
									}
								break;
							case ($lvl == '2' && $sem == 'Second'):
									#proceed level 3 and First Sem
									$desc = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '3' and sub.SEMESTER = 'First' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										echo '<tr>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowSub2['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											echo '<tr style="background-color:#ddd;">
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowVal['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}
									}
								break;
							case ($lvl == '3' && $sem == 'First'):
									#proceed level 3 and Second Sem
									$desc = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '3' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										echo '<tr>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowSub2['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											echo '<tr style="background-color:#ddd;">
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowVal['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}
									}
								break;
							case ($lvl == '3' && $sem == 'Second'):
									#proceed level 4 and First Sem
									$desc = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '4' and sub.SEMESTER = 'First' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										echo '<tr>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowSub2['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											echo '<tr style="background-color:#ddd;">
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowVal['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}
									}
								break;
							case ($lvl == '4' && $sem == 'First'):
									#proceed level 4 and Second Sem
									$desc = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '4' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										echo '<tr>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowSub2['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											echo '<tr style="background-color:#ddd;">
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td style="padding-top:0px;text-align:center;border-bottom:1px solid #ddd;">'.$getRowVal['UNIT'].'</td>
												<td style="padding-top:0px;text-align:left;border-bottom:1px solid #ddd;"></td>
										   </tr>';
										}
									}
								break;
							default:
								break;
							}
	
                            //$student_id
                           /* $getval = mysql_query("select *
                            from subject as sub, tblstudent as s, grades as gr, instructor as ins
                            where gr.IDNO = s.IDNO
                            and gr.SUBJ_ID = sub.SUBJ_ID
                            and gr.INST_ID = ins.INST_ID
                            and gr.IDNO = '$sn'
                            and gr.STATUS = 'SAVED'
                            order by GRADE_ID DESC") or die(mysql_error());
                            while($getRowVal = mysql_fetch_assoc($getval)){

                                if($getRowVal['FIN_AVE'] < 75){
                                    $grd = "color:red;";
                                }*/
								
						?>
						
					   <tr>
						<td colspan="4" style="padding-top:0px;text-align:left;width:10%;">&nbsp</td>
					   </tr>
					   <tr>
						<td colspan="4" style="padding-top:0px;text-align:left;width:10%;"><strong>EVALUATOR:</strong><div style="border-bottom:1px solid #333333;display:inline-block;width:200px;">&nbsp;</div></td>
					   </tr>
                   </table>
                   
               </div>
    
<!--   2nd Form   -->
                <div class="content" style="font-size:8px; margin-top:500px;">
				   
				   <table cellspacing="0" style="margin-top:0px;border:0px solid #000;border-collapse:collapse;" >
					<div>
						<thead>
							<tr style="background-color:#FFF; color:#000;">
								<th style="padding:10px;text-align:center;" width="100%">
									<div style="display:inline-block;margin-left:-50px;">
										<img src="../../../asset/images/logo.png" width="50px" height="50px">
									</div>
									<div style="display:inline-block;margin-left:10px;">
										<span style="display:block;">REPUBLIC OF THE PHILIPPINES</span>
										<span style="display:block;">BACOLOD CITY</span>
										<span style="display:block;">REGISTRATION FORM</span>
									</div>
								</th>
							</tr>
						</thead>
						</div>
				   </table>
                   <table cellspacing="2px" style="width:100%;margin-bottom:0px;border:0px solid #000;border-collapse:collapse;">
                       <tr>
                            <td colspan="15" style="padding-top:3px;text-align:left;border:0px solid #333333;"><strong>BCC FORM 1</strong></td>
                            <td colspan="15" style="padding-top:3px;text-align:center;border:0px solid #333333;"><strong>&nbsp;</strong></td>
                            <td colspan="3"style="padding-top:3px;text-align:center;border:0px solid #333333;"><strong>&nbsp;</strong></td>
                            <td colspan="7" style="padding-top:3px;text-align:right;border:0px solid #333333;"><strong>STUDENT COPY</strong></td>
                       </tr>
                       <tr>
                            <td colspan="15" style="padding-top:10px;text-align:center;border:0px solid #333333;"><strong>Family Name</strong></td>
                            <td colspan="15" style="padding-top:10px;text-align:center;border:0px solid #333333;"><strong>Given Name</strong></td>
                            <td colspan="3"style="padding-top:10px;text-align:center;border:0px solid #333333;"><strong>M.I.</strong></td>
                            <td colspan="7" style="padding-top:10px;text-align:center;border:0px solid #333333;"><strong>Student Number</strong></td>
                       </tr>
                       <tr>
                            <td style="padding-top:0px;text-align:center;border:1px solid #333333;background-color:#000;width:20px;">13</td>
							<?php
								$fname = str_split($row21['LNAME'], 1);
								$countFN = strlen($row21['LNAME']);
								if($countFN < 14){
									$x = 1;
									$totalStr = 14 - $countFN;
									foreach($fname as $key1 => $fn){ //14
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:20px;">'.$fn.'</td>';
									}
									while($x <= $totalStr){
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:20px;">&nbsp;</td>';
										 $x++;
									}
								}
							?>
                            <td style="padding-top:0px;text-align:center;border:1px solid #333333;background-color:#000;width:15px;">16</td>
							<?php
								$lname = str_split($row21['FNAME'], 1);
								$countFN1 = strlen($row21['FNAME']);
								if($countFN1 < 14){
									$x = 1;
									$totalStr1 = 14 - $countFN1;
									foreach($lname as $key3 => $ln){ //14
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:20px;">'.$ln.'</td>';
									}
									while($x <= $totalStr1){
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:20px;">&nbsp;</td>';
										 $x++;
									}
								}
							?>
                            <td style="padding-top:0px;text-align:center;border:1px solid #333333;background-color:#000;width:15px;">29</td>
                            <td style="padding-top:0px;text-align:center;border:1px solid #333333;width:15px;"><?php echo substr($row21['MNAME'], 0,1);?></td>
                            <td style="padding-top:0px;text-align:center;border:1px solid #333333;background-color:#000;width:20px;">29</td>
                            <?php
								$SnO = str_split($row21['IDNO'], 1);
								$countFN4 = strlen($row21['IDNO']);
								if($countFN4 < 7){
									$x = 1;
									$totalStr4 = 7 - $countFN4;
									foreach($SnO as $key4 => $sno){ //14
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:20px;">'.$sno.'</td>';
									}
									while($x == $totalStr4){
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:20px;">&nbsp;</td>';
										 $x++;
									}
								}else{
									$x = 1;
									foreach($SnO as $key4 => $sno){ //14
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:15px;">'.$sno.'</td>';
									}
								}
							?>
                       </tr>
                       <tr>
                            <td colspan="4" style="padding-top:0px;text-align:left;border:1px solid #333333;"><strong>SEM:</strong> <?php echo $sem . " SEM";?></td>
                            <td colspan="5" style="padding-top:0px;text-align:left;border:1px solid #333333;"><strong>AY:</strong></td>
                            <td colspan="25"style="padding-top:0px;text-align:left;border:1px solid #333333;"><strong>COURSE:</strong> BS INFROMATION SYSTEM</td>
                            <td colspan="3" style="padding-top:0px;text-align:left;border:1px solid #333333;"><strong>YR:</strong> 
							<?php 
							$getLvl = mysql_query("select * from level where LEVEL = '$lvl'") or die(mysql_error());
							$rowGetLvl = mysql_fetch_assoc($getLvl);
							$yr = explode(" ", $rowGetLvl['LEVEL_DESCRIPTION']);
							echo $yr[0];
							?></td>
                            <td colspan="3" style="padding-top:0px;text-align:left;border:1px solid #333333;"><strong>SEC:</strong></td>
                       </tr>
                       <tr>
                            <td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;"><strong>SUBJECT</strong></td>
                            <td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;"><strong>SUBJECT DESCRIPTIVE TITLE</strong></td>
                            <td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"><strong>SCHEDULE</strong></td>
                            <td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"><strong>SECTION</strong></td>
                            <td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"><strong>UNITS</strong></td>
                       </tr>
					   <?php
					   
							switch (true) {
							case ($lvl == '1' && $sem == 'First'):
									#proceed level 1 and Second Sem
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '1' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
							break;
							case ($lvl == '1' && $sem == 'Second'):
									#proceed level 2 and First Sem;
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '2' and sub.SEMESTER = 'First' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
								break;
							case ($lvl == '2' && $sem == 'First'):
									#proceed level 2 and Second Sem
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '2' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){ 
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
								break;
							case ($lvl == '2' && $sem == 'Second'):
									#proceed level 3 and First Sem
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '3' and sub.SEMESTER = 'First' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){ 
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
								break;
							case ($lvl == '3' && $sem == 'First'):
									#proceed level 3 and Second Sem
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '3' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){ 
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
								break;
							case ($lvl == '3' && $sem == 'Second'):
									#proceed level 4 and First Sem
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '4' and sub.SEMESTER = 'First' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){ 
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
								break;
							case ($lvl == '4' && $sem == 'First'):
									#proceed level 4 and Second Sem
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '4' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){ 
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:3px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:3px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
								break;
							default:
								break;
							}
						?>
                       <tr>
                            <td colspan="37" style="padding-right:3px;text-align:right;border:0px solid #333333;">Total : </td>
                            <td colspan="3" style="padding-top:3px;text-align:center;border:1px solid #333333;"><?php echo $unitz;?></td>
                       </tr>
                   </table>
                    <table cellspacing="2px" style="width:100%;margin-bottom:1px;border:0px solid #000;border-collapse:collapse;">
                        <tr>
                            <td colspan="13" style="width:50px;padding-top:10px;text-align:center;border-top:0px solid #333333;"><span style="border-top:1px solid #333333;padding-right:30px;padding-left:30px;">REGISTRAR SIGNATURE</span></td>
                            <td colspan="13" style="padding-top:10px;text-align:left;border:0px solid #333333;"><span style="border-top:1px solid #333333;padding-right:30px;padding-left:30px;">DATE</span></td>
                            <td colspan="13" style="padding-right:3px;text-align:right;border:0px solid #333333;">&nbsp;</td>
                        </tr>
                    </table>
                   
               </div>
	<!-- rf1 -->	
                <div class="content" style="font-size:8px; margin-top:60px;">
				   
				   <table cellspacing="0" style="margin-top:0px;border:0px solid #000;border-collapse:collapse;" >
					<div>
						<thead>
							<tr style="background-color:#FFF; color:#000;">
								<th style="padding:10px;text-align:center;" width="100%">
									<div style="display:inline-block;margin-left:-50px;">
										<img src="../../../asset/images/logo.png" width="50px" height="50px">
									</div>
									<div style="display:inline-block;margin-left:10px;">
										<span style="display:block;">REPUBLIC OF THE PHILIPPINES</span>
										<span style="display:block;">BACOLOD CITY</span>
										<span style="display:block;">REGISTRATION FORM</span>
									</div>
								</th>
							</tr>
						</thead>
						</div>
				   </table>
                   <table cellspacing="2px" style="width:100%;margin-bottom:0px;border:0px solid #000;border-collapse:collapse;">
                       <tr>
                            <td colspan="15" style="padding-top:3px;text-align:left;border:0px solid #333333;"><strong>BCC FORM 1</strong></td>
                            <td colspan="15" style="padding-top:3px;text-align:center;border:0px solid #333333;"><strong>&nbsp;</strong></td>
                            <td colspan="3"style="padding-top:3px;text-align:center;border:0px solid #333333;"><strong>&nbsp;</strong></td>
                            <td colspan="7" style="padding-top:3px;text-align:right;border:0px solid #333333;"><strong>STUDENT COPY</strong></td>
                       </tr>
                       <tr>
                            <td colspan="15" style="padding-top:10px;text-align:center;border:0px solid #333333;"><strong>Family Name</strong></td>
                            <td colspan="15" style="padding-top:10px;text-align:center;border:0px solid #333333;"><strong>Given Name</strong></td>
                            <td colspan="3"style="padding-top:10px;text-align:center;border:0px solid #333333;"><strong>M.I.</strong></td>
                            <td colspan="7" style="padding-top:10px;text-align:center;border:0px solid #333333;"><strong>Student Number</strong></td>
                       </tr>
                       <tr>
                            <td style="padding-top:0px;text-align:center;border:1px solid #333333;background-color:#000;width:20px;">13</td>
							<?php
								$fname = str_split($row21['LNAME'], 1);
								$countFN = strlen($row21['LNAME']);
								if($countFN < 14){
									$x = 1;
									$totalStr = 14 - $countFN;
									foreach($fname as $key1 => $fn){ //14
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:20px;">'.$fn.'</td>';
									}
									while($x <= $totalStr){
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:20px;">&nbsp;</td>';
										 $x++;
									}
								}
							?>
                            <td style="padding-top:0px;text-align:center;border:1px solid #333333;background-color:#000;width:15px;">16</td>
							<?php
								$lname = str_split($row21['FNAME'], 1);
								$countFN1 = strlen($row21['FNAME']);
								if($countFN1 < 14){
									$x = 1;
									$totalStr1 = 14 - $countFN1;
									foreach($lname as $key3 => $ln){ //14
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:20px;">'.$ln.'</td>';
									}
									while($x <= $totalStr1){
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:20px;">&nbsp;</td>';
										 $x++;
									}
								}
							?>
                            <td style="padding-top:0px;text-align:center;border:1px solid #333333;background-color:#000;width:15px;">29</td>
                            <td style="padding-top:0px;text-align:center;border:1px solid #333333;width:15px;"><?php echo substr($row21['MNAME'], 0,1);?></td>
                            <td style="padding-top:0px;text-align:center;border:1px solid #333333;background-color:#000;width:20px;">29</td>
                            <?php
								$SnO = str_split($row21['IDNO'], 1);
								$countFN4 = strlen($row21['IDNO']);
								if($countFN4 < 7){
									$x = 1;
									$totalStr4 = 7 - $countFN4;
									foreach($SnO as $key4 => $sno){ //14
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:20px;">'.$sno.'</td>';
									}
									while($x == $totalStr4){
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:20px;">&nbsp;</td>';
										 $x++;
									}
								}else{
									$x = 1;
									foreach($SnO as $key4 => $sno){ //14
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:15px;">'.$sno.'</td>';
									}
								}
							?>
                       </tr>
                       <tr>
                            <td colspan="4" style="padding-top:0px;text-align:left;border:1px solid #333333;"><strong>SEM:</strong> <?php echo $sem . " SEM";?></td>
                            <td colspan="5" style="padding-top:0px;text-align:left;border:1px solid #333333;"><strong>AY:</strong></td>
                            <td colspan="25"style="padding-top:0px;text-align:left;border:1px solid #333333;"><strong>COURSE:</strong> BS INFROMATION SYSTEM</td>
                            <td colspan="3" style="padding-top:0px;text-align:left;border:1px solid #333333;"><strong>YR:</strong> 
							<?php 
							$getLvl = mysql_query("select * from level where LEVEL = '$lvl'") or die(mysql_error());
							$rowGetLvl = mysql_fetch_assoc($getLvl);
							$yr = explode(" ", $rowGetLvl['LEVEL_DESCRIPTION']);
							echo $yr[0];
							?></td>
                            <td colspan="3" style="padding-top:0px;text-align:left;border:1px solid #333333;"><strong>SEC:</strong></td>
                       </tr>
                       <tr>
                            <td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;"><strong>SUBJECT</strong></td>
                            <td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;"><strong>SUBJECT DESCRIPTIVE TITLE</strong></td>
                            <td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"><strong>SCHEDULE</strong></td>
                            <td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"><strong>SECTION</strong></td>
                            <td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"><strong>UNITS</strong></td>
                       </tr>
					   <?php
					   
							switch (true) {
							case ($lvl == '1' && $sem == 'First'):
									#proceed level 1 and Second Sem
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '1' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
							break;
							case ($lvl == '1' && $sem == 'Second'):
									#proceed level 2 and First Sem;
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '2' and sub.SEMESTER = 'First' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
								break;
							case ($lvl == '2' && $sem == 'First'):
									#proceed level 2 and Second Sem
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '2' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){ 
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
								break;
							case ($lvl == '2' && $sem == 'Second'):
									#proceed level 3 and First Sem
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '3' and sub.SEMESTER = 'First' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){ 
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
								break;
							case ($lvl == '3' && $sem == 'First'):
									#proceed level 3 and Second Sem
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '3' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){ 
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
								break;
							case ($lvl == '3' && $sem == 'Second'):
									#proceed level 4 and First Sem
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '4' and sub.SEMESTER = 'First' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){ 
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
								break;
							case ($lvl == '4' && $sem == 'First'):
									#proceed level 4 and Second Sem
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '4' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){ 
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:3px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:3px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
								break;
							default:
								break;
							}
						?>
                       <tr>
                            <td colspan="37" style="padding-right:3px;text-align:right;border:0px solid #333333;">Total : </td>
                            <td colspan="3" style="padding-top:3px;text-align:center;border:1px solid #333333;"><?php echo $unitz;?></td>
                       </tr>
                   </table>
                    <table cellspacing="2px" style="width:100%;margin-bottom:1px;border:0px solid #000;border-collapse:collapse;">
                        <tr>
                            <td colspan="13" style="width:50px;padding-top:10px;text-align:center;border-top:0px solid #333333;"><span style="border-top:1px solid #333333;padding-right:30px;padding-left:30px;">REGISTRAR SIGNATURE</span></td>
                            <td colspan="13" style="padding-top:10px;text-align:left;border:0px solid #333333;"><span style="border-top:1px solid #333333;padding-right:30px;padding-left:30px;">DATE</span></td>
                            <td colspan="13" style="padding-right:3px;text-align:right;border:0px solid #333333;">&nbsp;</td>
                        </tr>
                    </table>
                   
               </div>
	<!-- rf2 -->	
                <div class="content" style="font-size:8px; margin-top:60px;">
				   
				   <table cellspacing="0" style="margin-top:0px;border:0px solid #000;border-collapse:collapse;" >
					<div>
						<thead>
							<tr style="background-color:#FFF; color:#000;">
								<th style="padding:10px;text-align:center;" width="100%">
									<div style="display:inline-block;margin-left:-50px;">
										<img src="../../../asset/images/logo.png" width="50px" height="50px">
									</div>
									<div style="display:inline-block;margin-left:10px;">
										<span style="display:block;">REPUBLIC OF THE PHILIPPINES</span>
										<span style="display:block;">BACOLOD CITY</span>
										<span style="display:block;">REGISTRATION FORM</span>
									</div>
								</th>
							</tr>
						</thead>
						</div>
				   </table>
                   <table cellspacing="2px" style="width:100%;margin-bottom:0px;border:0px solid #000;border-collapse:collapse;">
                       <tr>
                            <td colspan="15" style="padding-top:3px;text-align:left;border:0px solid #333333;"><strong>BCC FORM 1</strong></td>
                            <td colspan="15" style="padding-top:3px;text-align:center;border:0px solid #333333;"><strong>&nbsp;</strong></td>
                            <td colspan="3"style="padding-top:3px;text-align:center;border:0px solid #333333;"><strong>&nbsp;</strong></td>
                            <td colspan="7" style="padding-top:3px;text-align:right;border:0px solid #333333;"><strong>STUDENT COPY</strong></td>
                       </tr>
                       <tr>
                            <td colspan="15" style="padding-top:10px;text-align:center;border:0px solid #333333;"><strong>Family Name</strong></td>
                            <td colspan="15" style="padding-top:10px;text-align:center;border:0px solid #333333;"><strong>Given Name</strong></td>
                            <td colspan="3"style="padding-top:10px;text-align:center;border:0px solid #333333;"><strong>M.I.</strong></td>
                            <td colspan="7" style="padding-top:10px;text-align:center;border:0px solid #333333;"><strong>Student Number</strong></td>
                       </tr>
                       <tr>
                            <td style="padding-top:0px;text-align:center;border:1px solid #333333;background-color:#000;width:20px;">13</td>
							<?php
								$fname = str_split($row21['LNAME'], 1);
								$countFN = strlen($row21['LNAME']);
								if($countFN < 14){
									$x = 1;
									$totalStr = 14 - $countFN;
									foreach($fname as $key1 => $fn){ //14
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:20px;">'.$fn.'</td>';
									}
									while($x <= $totalStr){
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:20px;">&nbsp;</td>';
										 $x++;
									}
								}
							?>
                            <td style="padding-top:0px;text-align:center;border:1px solid #333333;background-color:#000;width:15px;">16</td>
							<?php
								$lname = str_split($row21['FNAME'], 1);
								$countFN1 = strlen($row21['FNAME']);
								if($countFN1 < 14){
									$x = 1;
									$totalStr1 = 14 - $countFN1;
									foreach($lname as $key3 => $ln){ //14
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:20px;">'.$ln.'</td>';
									}
									while($x <= $totalStr1){
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:20px;">&nbsp;</td>';
										 $x++;
									}
								}
							?>
                            <td style="padding-top:0px;text-align:center;border:1px solid #333333;background-color:#000;width:15px;">29</td>
                            <td style="padding-top:0px;text-align:center;border:1px solid #333333;width:15px;"><?php echo substr($row21['MNAME'], 0,1);?></td>
                            <td style="padding-top:0px;text-align:center;border:1px solid #333333;background-color:#000;width:20px;">29</td>
                            <?php
								$SnO = str_split($row21['IDNO'], 1);
								$countFN4 = strlen($row21['IDNO']);
								if($countFN4 < 7){
									$x = 1;
									$totalStr4 = 7 - $countFN4;
									foreach($SnO as $key4 => $sno){ //14
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:20px;">'.$sno.'</td>';
									}
									while($x == $totalStr4){
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:20px;">&nbsp;</td>';
										 $x++;
									}
								}else{
									$x = 1;
									foreach($SnO as $key4 => $sno){ //14
										echo '<td style="padding-top:0px;text-align:center;border:1px solid #333333;width:15px;">'.$sno.'</td>';
									}
								}
							?>
                       </tr>
                       <tr>
                            <td colspan="4" style="padding-top:0px;text-align:left;border:1px solid #333333;"><strong>SEM:</strong> <?php echo $sem . " SEM";?></td>
                            <td colspan="5" style="padding-top:0px;text-align:left;border:1px solid #333333;"><strong>AY:</strong></td>
                            <td colspan="25"style="padding-top:0px;text-align:left;border:1px solid #333333;"><strong>COURSE:</strong> BS INFROMATION SYSTEM</td>
                            <td colspan="3" style="padding-top:0px;text-align:left;border:1px solid #333333;"><strong>YR:</strong> 
							<?php 
							$getLvl = mysql_query("select * from level where LEVEL = '$lvl'") or die(mysql_error());
							$rowGetLvl = mysql_fetch_assoc($getLvl);
							$yr = explode(" ", $rowGetLvl['LEVEL_DESCRIPTION']);
							echo $yr[0];
							?></td>
                            <td colspan="3" style="padding-top:0px;text-align:left;border:1px solid #333333;"><strong>SEC:</strong></td>
                       </tr>
                       <tr>
                            <td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;"><strong>SUBJECT</strong></td>
                            <td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;"><strong>SUBJECT DESCRIPTIVE TITLE</strong></td>
                            <td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"><strong>SCHEDULE</strong></td>
                            <td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"><strong>SECTION</strong></td>
                            <td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"><strong>UNITS</strong></td>
                       </tr>
					   <?php
					   
							switch (true) {
							case ($lvl == '1' && $sem == 'First'):
									#proceed level 1 and Second Sem
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '1' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
							break;
							case ($lvl == '1' && $sem == 'Second'):
									#proceed level 2 and First Sem;
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '2' and sub.SEMESTER = 'First' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){ 
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
								break;
							case ($lvl == '2' && $sem == 'First'):
									#proceed level 2 and Second Sem
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '2' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){ 
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
								break;
							case ($lvl == '2' && $sem == 'Second'):
									#proceed level 3 and First Sem
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '3' and sub.SEMESTER = 'First' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){ 
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
								break;
							case ($lvl == '3' && $sem == 'First'):
									#proceed level 3 and Second Sem
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '3' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){ 
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
								break;
							case ($lvl == '3' && $sem == 'Second'):
									#proceed level 4 and First Sem
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '4' and sub.SEMESTER = 'First' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){ 
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
								break;
							case ($lvl == '4' && $sem == 'First'):
									#proceed level 4 and Second Sem
									$desc = array();
									$unitz1 = array();
									$unitz2 = array();
									$getsSubs = mysql_query("select *
									from subject as sub where sub.LEVEL = '4' and sub.SEMESTER = 'Second' 
									order by SUBJ_DESCRIPTION ASC") or die(mysql_error());
									while($getRowSub2 = mysql_fetch_assoc($getsSubs)){
									$queryGet = "select *
									from subject as sub, tblstudent as s, grades as gr, instructor as ins
									where gr.IDNO = s.IDNO
									and gr.SUBJ_ID = sub.SUBJ_ID
									and gr.INST_ID = ins.INST_ID
									and gr.IDNO = '$sn'";
                                    if(!empty($getRowSub2[PRE_REQUISITE])){
                                       $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[PRE_REQUISITE]'";
                                    }else if($getRowSub2[PRE_REQUISITE] = ''){
                                        $queryGet .= " and gr.SUBJ_ID = '$getRowSub2[SUBJ_ID]'";
                                    }
                                    $queryGet .= " order by GRADE_ID DESC";
									$getval = mysql_query($queryGet) or die(mysql_error());
									$getRowVal = mysql_fetch_assoc($getval);

										if($getRowVal['REMARKS'] == 'PASSED'){ 
										$unitz1[] = $getRowSub2['UNIT'];
										echo '<tr>
												<td colspan="4" style="padding-top:3px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:3px;text-align:center;border:1px solid #333333;">'.$getRowSub2['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowSub2['UNIT'].'</td>
										   </tr>';
										}else if($getRowVal['REMARKS'] == 'FAILED'){
											$unitz2[] = $getRowVal['UNIT'];
											echo '<tr style="background-color:#ddd;">
												<td colspan="4" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_CODE'].'</td>
												<td colspan="25" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['SUBJ_DESCRIPTION'].'</td>
												<td colspan="5"style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;"></td>
												<td colspan="3" style="padding-top:0px;text-align:center;border:1px solid #333333;">'.$getRowVal['UNIT'].'</td>
										   </tr>';
										}
										$v1 = array_sum($unitz1);
										$v2 = array_sum($unitz2);
										$unitz = $v1 + $v2;
									}
								break;
							default:
								break;
							}
						?>
                       <tr>
                            <td colspan="37" style="padding-right:3px;text-align:right;border:0px solid #333333;">Total : </td>
                            <td colspan="3" style="padding-top:3px;text-align:center;border:1px solid #333333;"><?php echo $unitz;?></td>
                       </tr>
                   </table>
                    <table cellspacing="2px" style="width:100%;margin-bottom:1px;border:0px solid #000;border-collapse:collapse;">
                        <tr>
                            <td colspan="13" style="width:50px;padding-top:10px;text-align:center;border-top:0px solid #333333;"><span style="border-top:1px solid #333333;padding-right:30px;padding-left:30px;">REGISTRAR SIGNATURE</span></td>
                            <td colspan="13" style="padding-top:10px;text-align:left;border:0px solid #333333;"><span style="border-top:1px solid #333333;padding-right:30px;padding-left:30px;">DATE</span></td>
                            <td colspan="13" style="padding-right:3px;text-align:right;border:0px solid #333333;">&nbsp;</td>
                        </tr>
                    </table>
                   
               </div> 
                
  <!-- #3rd Form -->
                 <div class="content" style="font-size:8px; margin-top:500px;">
					<table cellspacing="2px" style="width:100%;margin-top:10px;border:0px solid #000;border-collapse:collapse;">
                       <tr>
                            <td colspan="15" style="padding-top:3px;text-align:center;border:0px solid #333333;font-size:11px;"><strong>STUDENT RECORD OF ACCOUNTS</strong></td>
                       </tr>
                       <tr>
                            <td style="padding-top:10px;text-align:left;border:0px solid #333333;"><strong>SEM :</strong><div style="border-bottom:1px solid #333333;display:inline-block;width:100px;">&nbsp;</div></td>
                       </tr>
                       <tr>
                            <td style="padding-top:10px;text-align:left;border:0px solid #333333;"><strong>AY :</strong><div style="border-bottom:1px solid #333333;display:inline-block;width:100px;">&nbsp;</div></td>
                       </tr>
                       <tr>
                            <td style="padding-top:10px;text-align:left;border:0px solid #333333;"><strong>TOTAL FEES :</strong><div style="border-bottom:1px solid #333333;display:inline-block;width:100px;">&nbsp;</div></td>
                       </tr>
                       <tr>
                            <td style="padding-top:10px;text-align:left;border:0px solid #333333;"><strong>PAYMENTS</strong></td>
                       </tr>
                       <tr>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;width:20px;"><strong>DATE</strong></td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;"><strong>PARTICULARS</strong></td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;"><strong>O.R. No.</strong></td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;"><strong>AMOUNT PAID</strong></td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;"><strong>BALANCE</strong></td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;"><strong>POSTED BY</strong></td>
                       </tr>
                       <tr>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;width:20px;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                       </tr>
                       <tr>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;width:20px;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                       </tr>
                       <tr>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;width:20px;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                       </tr>
                       <tr>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;width:20px;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                            <td style="padding:5px;text-align:center;border:1px solid #333333;">&nbsp;</td>
                       </tr>
					  </table>
				 </div>
				
                    
    
            </div>
		</div>		
		
</body>

</html>