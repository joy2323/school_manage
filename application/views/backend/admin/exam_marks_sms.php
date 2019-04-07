<style type="text/css">
<!--
.style2 {color: #99000f}
.style3 {font-size: 18px}
-->
</style>

<?php
//CONNECT TO THE HOST AND THE DATABASE
$con = mysqli_connect("localhost","u0563804_rhimoni","G;]y-~5Zv^SK","u0563804_portal");
$sn = 0;
$dl = "";
$msg = "";
$studid = "";
$stid = "";
$ans = "";
$class_avg1="";
$result_count=0;



$sqlc = "SELECT * FROM class ";
$queryc = mysqli_query($con, $sqlc);
$countc = mysqli_num_rows($queryc);
		if($countc > 0){
			$listc = '<option value=""></option>';

			while($rowc = mysqli_fetch_assoc($queryc)){
				$clname = $rowc['name'];
				$clid = $rowc['class_id'];
				$listc .= '<option value="'.$clid.'">'.$clname.'</option>';
			}
		}else{
			$msg = "No such user in the system.";
		}

if(isset($_POST['cls'])){
	//create local variable for the form data
	//$subj = $_POST['sub'];
	$clss = $_POST['cls'];
	$tem = $_POST['term'];
	$ses = $_POST['session'];

	if($tem == 'select'  || $ses == 'select'){

						$msg= '<h3 style="float:center; color:red;">Invalid Selections. Make sure you select all fields</h3>';

				}else{

	echo 'Term -'. $tem.' | Session- '.$ses;



										//RESULT TABLE

									$sqls = "SELECT * FROM student WHERE class_id='$clss' ";
									$querys = mysqli_query($con, $sqls);
									$counts = mysqli_num_rows($querys);

									if($counts > 0){


														$dl = '
																('.$counts.') students Names are displayed.<br><hr><br><center>
																	<table width="50%" border="3" cellspacing="1" cellpadding="2">
																	<tr bgcolor="#1921e2">
																		<tr>
											                            <th><div>SN</div></th>
											                            <th><div> Student Name</div></th>
											                            <th><div> Adm No</div></th>
											                            <th><div> Section</div></th>
																		<th><div> No of Times Present </div></th>

											                        	</tr>
																	</tr></center>


																';


																					while($rows = mysqli_fetch_array($querys)){


																						$tname = $rows['name'];
																						$roll = $rows['roll'];
																						$sectid = $rows['section_id'];
																						$studid = $rows['student_id'];
																						$classd = $rows['class_id'];


																				$dl .= '
																					<tr>
																						<td>'.++$sn.'</td>
																						<td>'.$tname.'</td>
																						<td>'.$roll.'</td>
																						<td>'.$sectid.'</td>


																				';

																								$sqlst = "SELECT * FROM attendance WHERE student_id='$studid' && term='$tem' && session='$ses' && status='1'";

																								$queryst = mysqli_query($con, $sqlst);
																								$countst = mysqli_num_rows($queryst);

																								$countt=0;


																								$dl .= '
																											<td> '.$countst.' </td>

																										</tr>

																									';




																				}
																			$dl .= '</table>';



								} else{
										$msg= '<h3 style="float:center; color:red;">No Student in this class...Please Select Class</h3>';
									}

				}
}



?>



				<h3>Select the relevant information</h3>
                <br>

               <div  style="float:left; border: 3px ; height:50px;">
                <form method="post" action="#">


				<select name="cls">
					<option value="select">-Select Students Class-</option>
					<option value="<?php echo $clid ?>"><?php echo $listc;?></option>
				</select>&emsp;

				<select name="term">
					<option value="select">-Select Term-</option>
					<option value="1">1st</option>
					<option value="2">2nd</option>
					<option value="3">3rd</option>
				</select>&emsp;

				<select name="session">
					<option value="select">-Select Session-</option>
					<option value="2016/2017">2016/2017</option>
					<option value="2017/2018">2017/2018</option>
					<option value="2018/2019">2018/2019</option>
					<option value="2019/2020">2019/2020</option>
				</select>&emsp;
				<button style="float:right; color:#0456ee; margin-right:30px;"> View</button>
				<!--<input type="submit" value="View" style="color:#000000;">-->
                </form>
                </div>

                <br><br><br>
               	<?php echo $msg; ?>
				<center> <?php echo $dl ; ?> </center>
