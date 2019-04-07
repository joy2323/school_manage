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
$grade = "";
$remark = "";
$class_avg1="";
$result_count=0;
$subj = "";
$clss = "";
$tem = "";
$ses = "";
$sect="";
$subnamel="";


$sql = "SELECT * FROM subject ";
$query = mysqli_query($con, $sql);
$count = mysqli_num_rows($query);
		if($count > 0){
			$list = '<option value=""></option>';

			while($row = mysqli_fetch_assoc($query)){
				$subname = $row['name'];
				$subid = $row['subject_id'];
				$list .= '<option value="'.$subid.'">'.$subname.'</option>';
			}
		}else{
			$msg = "No such user in the system.";
		}


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


if(isset($_POST['sub'])){
	//create local variable for the form data
	$subj = $_POST['sub'];
	$clss = $_POST['cls'];
	$tem = $_POST['term'];
	$ses = $_POST['session'];
	$sect=$_POST['sectionss'];

	if($subj == 'select' || $tem == 'select'  || $ses == 'select' || $sect == 'select'){

						$msg= '<h3 style="float:center; color:red;">Invalid Selections. Make sure you select all fields</h3>';

				}else{

	echo ' |Class- '.$clss.' |Term- '. $tem.' |Session- '.$ses.'|Section- '.$sect;;



										//RESULT TABLE

									$sqls = "SELECT * FROM student WHERE class_id='$clss' && section_id='$sect' ";
									$querys = mysqli_query($con, $sqls);
									$counts = mysqli_num_rows($querys);

									if($counts > 0){
/*DISPLAYS SUBJECT NAME*/
$sqll = "SELECT * FROM subject WHERE subject_id='$subj'";
$queryl = mysqli_query($con, $sqll);

			while($rowl = mysqli_fetch_assoc($queryl)){
				$subnamel = $rowl['name'];
				$subidl = $rowl['subject_id'];

			}
/*DISPLAYS SUBJECT NAME END*/

														$dl = '
																('.$counts.') students Names are displayed. Subject: '.$subnamel.'<br><hr><br><center>
																	<form method="post" action="#">
																	<table width="70%" border="3" cellspacing="1" cellpadding="2">
																	<tr bgcolor="#1921e2">
																		<tr>
											                            <th><div>SN</div></th>
											                            <th><div> Student Name</div></th>
											                            <th><div> Adm No</div></th>
											                            <th><div> Section</div></th>
																		<th><div></div></th>
											                            <th><div> Class Assignment 1</div></th>
											                            <th><div> Class Assignment 2</div></th>
											                            <th><div> Test 1</div></th>
											                            <th><div> Test 2</div></th>
											                            <th><div> EXAM Marks</div></th>
																		<th><div></div></th>
											                            <th><div> Total Score</div></th>
																		<th><div></div></th>
											                            <th><div> Class Average</div></th>
																		<th><div></div></th>
											                            <th><div> Grade</div></th>
																		<th><div></div></th>
																		<th><div></div></th>
											                            <th><div> position </div></th>
											                        	</tr>
																	</tr></center>


																';


														while($rows = mysqli_fetch_array($querys)){


																						$tname = $rows['name'];
																						$roll = $rows['roll'];
																						$sectid = $rows['section_id'];
																						$studid = $rows['student_id'];
																						$classd = $rows['class_id'];


																			$sqlst1 = "SELECT * FROM section WHERE class_id='$classd' && section_id='$sectid' ";
																			$queryst1 = mysqli_query($con, $sqlst1);
																						while($rowst1 = mysqli_fetch_array($queryst1)){
																							$stnname = $rowst1['nick_name'];
																						}

																				$dl .= '
																					<tr>
																						<td>'.++$sn.'</td>
																						<td>'.$tname.'</td>
																						<td>'.$roll.'</td>
																						<td>'.$stnname.'</td>


																				';


																								$sqlst = "SELECT * FROM term_jss WHERE student_id='$studid' && subject_id='$subj' && term='$tem' && session='$ses' ";

																								$queryst = mysqli_query($con, $sqlst);
																								$countst = mysqli_num_rows($queryst);
																								$countt=0;
																									//$counts=$countst;

																								while($rowst = mysqli_fetch_array($queryst)){

																									$ca1 = $rowst['ca1'];
																									$ca2 = $rowst['ca2'];
																									$stid = $rowst['student_id'];
																									$t1 = $rowst['test1'];
																									$t2 = $rowst['test2'];
																									$exam = $rowst['exam'];
																									$total = $rowst['total'];
																									$class_avg = $rowst['class_avg'];
																									$grade = $rowst['grade'];
																									$position = $rowst['position'];
																									$cd = $rowst['class_id'];
																									$sect2=$rowst['section_id'];

																									if(!$sect2)
																									{
																										$sqlin = "UPDATE term_jss SET section_id='$sectid' WHERE student_id='$studid' && subject_id='$subj' && term='$tem' && session='$ses' ";
																										$queryin = mysqli_query($con, $sqlin);
																										//echo "done";
																									}


																									if($studid==$stid){
																										$ca11=$ca1;
																										$ca21=$ca2;
																										$t11=$t1;
																										$t21=$t2;
																										$exam1=$exam;
																										$total1=$total;
																										$class_avg1=$class_avg;
																										$grade1=$grade;
																										$position1=$position;
																										$countt=1;



																										}
																								}


																							if ($countt==1)

																							{
																								$dl .= '
																											<td> <input type="hidden" name="student_id[]" value='.$studid.'>  </td>
																											<td> <input type="number" name="ca1[]" placeholder="CA 1" value='.$ca11.' min="0" max="10">  </td>
																											<td> <input type="number" name="ca2[]" placeholder="CA 2" value='.$ca21.' min="0" max="10"> </td>
																											<td> <input type="number" name="t1[]" placeholder="TEST 1" value='.$t11.' min="0" max="20"></td>
																											<td> <input type="number" name="t2[]" placeholder="TEST 2" value='.$t21.' min="0" max="20"> </td>
																											<td> <input type="number" name="exm[]" placeholder="EXAM" value='.$exam1.' min="0" max="70"> </td>
																											<td> <input type="hidden" name="subject_id[]" value='.$subj.'>  </td>
																											<td> '.$total1.' </td>
																											<td> <input type="hidden" name="term[]" value='.$tem.'>  </td>
																											<td> '.$class_avg1.' </td>
																											<td> <input type="hidden" name="class_id[]" value='.$classd.'>  </td>
																											<td> '.$grade1.' </td>
																											<td> <input type="hidden" name="session[]" value='.$ses.'>  </td>
																												<td> <input type="hidden" name="section[]" value='.$sectid.'>  </td>
																											<td> '.$position1.' </td>

																										</tr>

																									';

																							}elseif($countt==0)
																							        {
																								   $dl .= '
																												<td> <input type="hidden" name="student_id[]" value='.$studid.'>  </td>
																												<td> <input type="number" name="ca1[]" placeholder="CA 1" value="0" min="0" max="10"></td>
																												<td> <input type="number" name="ca2[]" placeholder="CA 2" value="0" min="0" max="10"> </td>
																												<td> <input type="number" name="t1[]" placeholder="TEXT 1" value="0" min="0" max="20"> </td>
																												<td> <input type="number" name="t2[]" placeholder="TEXT 2" value="0" min="0" max="20"> </td>
																												<td> <input type="number" name="exm[]" placeholder="EXAM" value="0" min="0" max="70"> </td>
																												<td> <input type="hidden" name="subject_id[]" value='.$subj.'>  </td>
																												<td> 0 </td>
																												<td> <input type="hidden" name="term[]" value='.$tem.'>  </td>
																												<td>'.$class_avg1.'</td>
																												<td> <input type="hidden" name="class_id[]" value='.$classd.'>  </td>
																												<td> F </td>
																												<td> <input type="hidden" name="session[]" value='.$ses.'>  </td>
																													<td> <input type="hidden" name="section[]" value='.$sectid.'>  </td>
																												<td> 0 </td>

																											</tr>

																										';
																								$sqlino= "INSERT INTO term_jss (id,student_id,subject_id,term,exam,total,ca1,ca2,test1,test2,class_id,session,grade,section_id) VALUES ('','$studid','$subj','$tem','0','0', '0','0','0','0','$classd','$ses','F','$sectid')";
																								$queryino = mysqli_query($con, $sqlino);

																								$sqlinb= "INSERT INTO broad_sheet (id,student_id,subject_id,term,total,average,class_id,session) VALUES ('','$studid','$subj','$tem','0','0','$classd','$ses')";
																								$queryinb = mysqli_query($con, $sqlinb);

																							  }

																							  //check if name already exist in broad table
																							 $sqlstbr = "SELECT * FROM broad_sheet WHERE student_id='$studid' && term='$tem' && session='$ses' && subject_id='$subj' ";

																								$querystbr = mysqli_query($con, $sqlstbr);
																								$countstbr= mysqli_num_rows($querystbr);
																								//$counttbrd=0;
																															//////dadd section id

																							if($countstbr==0)
																							{

																								$sqlinbs= "INSERT INTO broad_sheet (id,student_id,class_id,session,term,subject_id,total,average) VALUES ('','$studid','$classd','$ses','$tem','$subj','0','0')";
																								$queryinbs = mysqli_query($con, $sqlinbs);
																							}


																							// check if name already exist in broader sheet table
																							$sqlstbrd = "SELECT * FROM broader_sheet WHERE student_id='$studid' && term_id='$tem' && session='$ses' ";

																								$querystbrd = mysqli_query($con, $sqlstbrd);
																								$countstbrd = mysqli_num_rows($querystbrd);
																								//$counttbrd=0;


																							if($countstbrd==0)
																							{

																								$sqlinbs= "INSERT INTO broader_sheet (id,student_id,term_id,term_position,term_avg,class_id,session,section_id) VALUES ('','$studid','$tem','0','0','$classd','$ses','$sect')";
																								$queryinbs = mysqli_query($con, $sqlinbs);

																							}
																							else
																							{
																							//	while($rowst1 = mysqli_fetch_array($querystbrd))
																							//	{
																							//		if($rowst1['section_id'])
																							//		{

																										$sqlUpdateSect = "UPDATE broader_sheet SET section_id='$sectid' WHERE student_id='$studid' && session='$ses' && term_id='$tem' && class_id='$classd' ";
																										$queryUpdateSect= mysqli_query($con, $sqlUpdateSect);


																								//	}
																								//}
																							}



																				}
																			$dl .= '</table>';
																			$dl .=	'<br><button class="add_field_button" style="float:right; color:#0456ee; margin-right:30px;">Save Result</button>';
																			$dl .= '</form>';



								} else{
										$msg= '<h3 style="float:center; color:red;">No Student in this class...Please Select Class</h3>';
									}
				}
}


if(isset($_POST["student_id"])){
	//   Student_id
    $capture_field_valss ="";
    foreach($_POST["student_id"] as $key => $text_fields){
        $capture_field_valss .= $text_fields .", ";
    }

	//   EXAM
	$capture_field_vals0 ="";
    foreach($_POST["exm"] as $key => $text_field0){
        $capture_field_vals0 .= $text_field0 .", ";
    }
	//    ca1
    $capture_field_vals ="";
    foreach($_POST["ca1"] as $key => $text_field){
        $capture_field_vals .= $text_field .", ";
    }

//   ca2
 $capture_field_vals1 ="";
foreach($_POST["ca2"] as $key => $text_field1){

        $capture_field_vals1 .= $text_field1 .", ";
    }
	//    test1
	    $capture_field_vals2 ="";
    foreach($_POST["t1"] as $key => $text_field2){
        $capture_field_vals2 .= $text_field2 .", ";
    }

//    test2
 $capture_field_vals3 ="";
foreach($_POST["t2"] as $key => $text_field3){

        $capture_field_vals3 .= $text_field3 .", ";
    }

	//    subject
 $capture_field_vals4 ="";
foreach($_POST["subject_id"] as $key => $text_field4){

        $capture_field_vals4 .= $text_field4 .", ";
    }

	//    term
 $capture_field_vals5 ="";
foreach($_POST["term"] as $key => $text_field5){

        $capture_field_vals5 .= $text_field5 .", ";
    }

	//    class
 $capture_field_vals6 ="";
foreach($_POST["class_id"] as $key => $text_field6){

        $capture_field_vals6 .= $text_field6 .", ";
    }


	//  session
 $capture_field_vals7 ="";
foreach($_POST["session"] as $key => $text_field7){

        $capture_field_vals7 .= $text_field7 .", ";
    }
	 $capture_field_vals8 ="";
	foreach($_POST["section"] as $key => $text_field8){

        $capture_field_vals8 .= $text_field8 .", ";
    }


$queryin ="";
$cls_tot=0;
$cls_avg=0;
$term_avg=12;
$term_position=0;
$text_fieldcnt=0;
$text_fields=0;
while (list($arr1_key, $text_field0) = each($_POST["exm"])) {
  //list($arr1_key, $text_field0) = each($_POST["exm"]);
  list($arr2_key, $text_fields) = each($_POST["student_id"]);
  list($arr3_key, $text_field) = each($_POST["ca1"]);
  list($arr4_key, $text_field1) = each($_POST["ca2"]);
  list($arr5_key, $text_field2) = each($_POST["t1"]);
  list($arr6_key, $text_field3) = each($_POST["t2"]);
  list($arr7_key, $text_field4) = each($_POST["subject_id"]);
  list($arr8_key, $text_field5) = each($_POST["term"]);
  list($arr9_key, $text_field6) = each($_POST["class_id"]);
  list($arr0_key, $text_field7) = each($_POST["session"]);
    list($arr11_key, $text_field8) = each($_POST["section"]);

 $tot_result = ($text_field+$text_field1+$text_field2+$text_field3+$text_field0);

 //grade & Remark

 if($text_field6>3)
 {
	 if($tot_result>=0 && $tot_result<39.5){
		 $grade="F9";
		 $remark="Fail";
	 }elseif($tot_result>=39.5 && $tot_result<44.5){
		 $grade="E8";
		 $remark="Pass";
	 }elseif($tot_result>=44.5 && $tot_result<49.5){
		 $grade="D7";
		 $remark="Needs to improve";
	 }elseif($tot_result>=49.5 && $tot_result<54.5){
		 $grade="C6";
		$remark="CREDIT";
	 }elseif($tot_result>=54.5 && $tot_result<59.5){
		 $grade="C5";
		 $remark="CREDIT";
	 }elseif($tot_result>=59.5 && $tot_result<64.5){
		 $grade="C4";
		 $remark="CREDIT";
	 }elseif($tot_result>=64.5 && $tot_result<69.5){
		 $grade="B3";
		 $remark="Good";
	 }elseif($tot_result>=69.5 && $tot_result<74.5){
		 $grade="B2";
		 $remark="VERY Good";
	 }elseif($tot_result>=74.5 && $tot_result<=100){
		 $grade="A1";
		 $remark="Excellent";
	 }else{
		 $grade="-";
		 $remark="-";
		}

 }else{
	 if($tot_result>=0 && $tot_result<39.5){
		 $grade="F9";
		 $remark="Fail";
	 }elseif($tot_result>=39.5 && $tot_result<44.5){
		 $grade="E8";
		 $remark="Pass";
	 }elseif($tot_result>=44.5 && $tot_result<49.5){
		 $grade="D7";
		 $remark="Needs to improve";
	 }elseif($tot_result>=49.5 && $tot_result<54.5){
		 $grade="C6";
		 $remark="Credit";
	 }elseif($tot_result>=54.5 && $tot_result<59.5){
		 $grade="C5";
		 $remark="Credit";
	 }elseif($tot_result>=59.5 && $tot_result<64.5){
		 $grade="C4";
		 $remark="Credit";
	 }elseif($tot_result>=64.5 && $tot_result<69.5){
		 $grade="B3";
		 $remark="Good";
	 }elseif($tot_result>=69.5 && $tot_result<74.5){
		 $grade="B2";
		 $remark="Very Good";
	 }elseif($tot_result>=74.5 && $tot_result<=100){
		 $grade="A1";
		 $remark="Excellent";
	 }else{
		 $grade="-";
		 $remark="-";
		}

 }


 ++$sn;
  $cls_tot+=$tot_result;
  $cls_avg=$cls_tot/$sn;
	$cls_avg=round($cls_avg,1);

//update termly result
$sqlin = "UPDATE term_jss SET class_avg='$cls_avg', exam='$text_field0', ca1='$text_field', ca2='$text_field1', test1='$text_field2', test2='$text_field3',total='$tot_result',grade='$grade' WHERE student_id='$text_fields' && subject_id='$text_field4' && term='$text_field5' && session='$text_field7' && section_id='$text_field8'";
$queryin = mysqli_query($con, $sqlin);
$sqlin = "UPDATE term_jss SET class_avg='$cls_avg' WHERE class_id='$text_field6' && subject_id='$text_field4' && term='$text_field5' && session='$text_field7' && section_id='$text_field8'";
$queryin = mysqli_query($con, $sqlin);

//conditions for termly result on broadsheet
 if($text_field5==1){
	 $broad_avg=$tot_result;
	$term_avg+= $broad_avg;

 }elseif($text_field5==2){

 	 $sqlst2 = "SELECT * FROM broad_sheet WHERE student_id='$text_fields' && class_id='$text_field6' && subject_id='$text_field4' && term=1 && session='$text_field7' ";
	 $queryst2 = mysqli_query($con, $sqlst2);
	 $row2 = mysqli_fetch_array($queryst2);
	 $tot = $row2 ['total'];

	 $broad_avg=($tot_result+$tot)/2;
	  $broad_avg=round( $broad_avg,1)
;	 $term_avg+= $broad_avg;
 }elseif($text_field5==3){
	 $sqlst2 = "SELECT * FROM broad_sheet WHERE student_id='$text_fields' && class_id='$text_field6' && subject_id='$text_field4' && term=1 && session='$text_field7' ";
	 $queryst2 = mysqli_query($con, $sqlst2);
	 $row2 = mysqli_fetch_array($queryst2);
	 $tot = $row2 ['total'];

	 $sqlst3 = "SELECT * FROM broad_sheet WHERE student_id='$text_fields' && class_id='$text_field6' && subject_id='$text_field4' && term=2 && session='$text_field7' ";
	 $queryst3 = mysqli_query($con, $sqlst3);
	 $row3 = mysqli_fetch_array($queryst3);
	 $tot3 = $row3 ['total'];

	 $broad_avg=($tot_result+$tot+$tot3)/3;
	 $broad_avg=round($broad_avg,1);

	 $term_avg+= $broad_avg;


 }

//update broad_sheet
$sqlin = "UPDATE broad_sheet SET total='$tot_result',average='$broad_avg' WHERE student_id='$text_fields' && subject_id='$text_field4' && term='$text_field5' && session='$text_field7' && class_id='$text_field6' ";
$queryin = mysqli_query($con, $sqlin);

//updating broader_sheet
/*
$sqlinbb = "UPDATE broader_sheet SET term_avg='$term_avg' WHERE student_id='$text_fields' && class_id='$text_field6' && term_id='$text_field5' && session='$text_field7' ";
$queryinbb = mysqli_query($con, $sqlinbb);*/



	//finding position
		/*$queryPosn="SELECT * FROM term_jss WHERE class_id='$text_field6' && subject_id='$text_field4' && term='$text_field5' && session='$text_field7' ORDER BY total DESC";
		$queryPosnin=mysqli_query($con,$queryPosn);
		$posn=1;
		$position=1;
		$totalScrPrv=0;
		$count=0;
		while($rowPosn=mysqli_fetch_array($queryPosnin))
		{
			if ($totalScrPrv==$rowPosn['total'])
			{
				$position=$position;

			}
			else
			{
				//$posn=$posn+$count;
				$position=$posn+$count;
			}
			$count=$count+1;
			$totalScrPrv=$rowPosn['total'];
			$std_idn=$rowPosn['student_id'];
			//$position=$posn;
			$termn=$rowPosn['term'];
			$sessn=$rowPosn['session'];
			$subject_idn=$rowPosn['subject_id'];

			$sqlposn = "UPDATE term_jss SET position='$position' WHERE student_id='$std_idn' && session='$sessn' && term='$termn' && subject_id='$subject_idn'";
			$querypos= mysqli_query($con, $sqlposn);*/
			//++$posn;
			//echo $std_idn;
		}


}
//finding position for the tabulation sheet on the broader_sheet table

		/*$queryPosni="SELECT * FROM broader_sheet WHERE  class_id=6 && term_id=2   ORDER BY term_avg DESC";
		$queryPosnini=mysqli_query($con,$queryPosni);
		$posn=2;
		$position=1;
		$totalScrPrv=0;
		$coun=0;
		while($rowPosni=mysqli_fetch_array($queryPosnini))
		{
			if ($totalScrPrv==$rowPosni['term_avg'])
			{
				$position=$position;

			}
			else
			{
				//$posn=$posn+$count;
				$position=$posn+$coun;
			}
			$coun=$coun+1;
			$totalScrPrv=$rowPosni['term_avg'];

			//$position=$posn;
			$termn=$rowPosni['term_id'];
			$sessn=$rowPosni['session'];
			$classidn=$rowPosni['class_id'];
			$std_idn=$rowPosni['student_id'];


			$sqlposnii = "UPDATE broader_sheet SET term_position='$position' WHERE student_id='$std_idn' && session='$sessn' && term_id='$termn' && class_id='$classidn' ";
			$queryposii= mysqli_query($con, $sqlposnii);

		}
		*/
		/******************************************************/
		$sqlposn="";
		if(isset($_POST["student_id"]))
		{
			foreach($_POST["subject_id"] as $key => $text_field4){

			$capture_field_vals4 = $text_field4 ;
			}

			foreach($_POST["session"] as $key => $ses){

			$capture_field_vals5 = $ses ;
			}
			foreach($_POST["section"] as $key => $sect){

			$capture_field_vals6 = $sect ;
			}
			foreach($_POST["term"] as $key => $tem){

			$capture_field_vals7 = $tem ;
			}
			foreach($_POST["class_id"] as $key => $clss){

			$capture_field_vals8 = $clss ;
			}



		$queryPosn="SELECT * FROM term_jss WHERE class_id='$clss' && subject_id='$text_field4' && term='$tem' && session='$ses' && section_id='$sect'  ORDER BY total DESC";
		$queryPosnin=mysqli_query($con,$queryPosn);
		$posn=1;
		$position=1;
		$totalScrPrv=0;
		$count=0;
		echo $clss;
		while($rowPosn=mysqli_fetch_array($queryPosnin))

		{

			if ($totalScrPrv==$rowPosn['total'])
			{
				$position=$position;

			}
			else
			{

				//$posn=$posn+$count;
				$position=$posn+$count;
			}
			$count=$count+1;
			$totalScrPrv=$rowPosn['total'];
			$std_idn=$rowPosn['student_id'];
			//$position=$posn;
			$termn=$rowPosn['term'];
			$sessn=$rowPosn['session'];
			$subject_idn=$rowPosn['subject_id'];

			$sqlposn = "UPDATE term_jss SET position='$position' WHERE student_id='$std_idn' && session='$sessn' && term='$termn' && subject_id='$subject_idn'";
			$querypos= mysqli_query($con, $sqlposn);
		 }

			/***********************************************************/

if($queryin){

	//print '<br><br><h2 style="color: green;">Updated Successfully !</h2><br>';
	$msg='<br><h2 style="color: green;">Updated Successfully !</h2><br>';
}
	}

?>

<script>
			function toggleBox(x,y){
				var x = document.getElementById(x);
				var arw = document.getElementById(y);
				if(x.style.height == 130+"px"){
					x.style.height = 0+"px";
					x.innerHTML = '';
				}else{

					x.style.height = 130+"px";
					//x.innerHTML = '<select name="course"><?php echo $list; ?></select>';
				}
			}

			function toggle(e){
				var e = document.getElementById(e);

				if(e.style.width == 270+"px"){
					e.style.width =120+"px";

				}else{

					e.style.width = 270+"px";

				}
			}


</script>

<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compute results</title>
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            background-color: #ffffff;
            line-height: 1.428571429;
            color: #2F3230;
            padding: 0;
            margin: 0;
        }
        section, footer {
            display: block;
            padding: 0;
            margin: 0;
        }
        .container {
            margin-left: auto;
            margin-right: auto;
            padding: 0 5px;
        }
        .sorry-text {
            font-size: 500%;
            color: #CCCCCC;
        }

        .additional-info {
            background-repeat: no-repeat;
            background-color: #293A4A;
            color: #FFFFFF;
        }
        .additional-info a {
            color: #FFFFFF;
        }
        .additional-info-items {
            padding: 20px 0;
            min-height: 350px;
        }
        .contact-info {
            margin-bottom: 20px;
            font-size: 16px;
        }
        .contact-info a {
            text-decoration: underline;
            color: #428BCA;
        }
        .contact-info a:hover,
        .contact-info a:focus,
        .contact-info a:active {
            color: #2A6496;
        }
        .reason-text {
            margin: 20px 0;
            font-size: 16px;
        }
        ul {
            display: inline-block;
            list-style: none outside none;
            margin: 0;
            padding: 0;
        }
        ul li {
            float: left;
            text-align: center;
			margin-left: 70px;
        }
        .additional-info-items ul li {
            width: 100%;
        }
        .heading-text {
            font-weight: bold;
            display: block;
            text-align: left;
			font-size: 26px;
        }
        .description {
            text-align: left;

        }
        .info-image {
            padding: 10px;
        }

        footer {
            text-align: center;
            margin: 60px 0;
        }

        footer a {
            text-decoration: none;
        }

        .copyright {
            font-size: 10px;
            color: #3F4143;
        }

        @media (min-width: 768px) {
            .additional-info {
                background-image: none;
            }
            .additional-info-items {
                padding: 20px;
            }
            .container {
                width: 90%;
            }
            .additional-info-items ul li {
                width: 20%;
                padding: 20px;
            }
            .reason-text {
                font-size: 18px;
            }
            .contact-info {
                font-size: 18px;
            }
        }
        @media (min-width: 992px) {
            .additional-info {
                background-image: url('/img-sys/error-bg-left.png');
            }
            .container {
                width: 70%;
            }
            .sorry-text {
                font-size: 300%;
            }
			h3{
				float: left;
			}
        }
    </style>
    </head>
    <body>
        <div class="container">
		<span><a href="../"> <h3 style="color:green;">Back to Function Panel</h3></a></span> &emsp;&emsp;
            <span class="sorry-text">Compute results</span>

        </div>
        <section class="additional-info">
            <div class="container">
                <div class="additional-info-items">

					<ul>
                        <li>
                           <a href="bulk.php"> <div class="info-image">
                              <img src="user.jpg" height="100" width="90" alt="student"/>
                            </div>
                            <span class="heading-text">
                                Register New Student.
                            </span>
						   </a>
                            <div class="description">
                               You can register all students using this link, make sure you have a complete bio-data.
                            </div>
                        </li>
                        <li>
                            <a href="trait.php"><div class="info-image">
                                <img src="test.png" height="100" width="90" alt="student"/>
                            </div>
                            <span class="heading-text">
                                Affective Traits.
                            </span>
							</a>
                            <div class="description">
                                 All you need to do is input various Class Assignments, Tests and Examination result, the application does the computation, grading, positions and lot more.
                            </div>
                        </li>

						<li>
                            <a href="tabulation_sheet.php"><div class="info-image">
                                <img src="edit.png" height="100" width="90" alt="student"/>
                            </div>
                            <span class="heading-text">
                                Broadsheet.
                            </span>
							</a>
                            <div class="description">
                                This will give you a comprehensive termly break-down of class by class academic performance with the total average.
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </section>


		<div id="cont">

				<h3>Select the relevant information</h3>
                <br>

               <div  style="float:left; border: 3px ; height:50px;">
                <form method="post" action="#">

                <select name="sub">
					<option value="select">-Select Subject-</option>
					<option value="<?php echo $subid ?> "><?php echo $list;?></option>
				</select>&emsp;


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

				</select>&emsp;

				<select name="sectionss">
					<option value="select">-Select Section</option>
					<option value="1">JSS1 A</option>
					<option value="2">JSS1 B</option>
					<option value="3">JSS1 C</option>
					<option value="5">JSS2 A</option>
					<option value="6">JSS2 B</option>
					<option value="7">JSS2 C</option>
					<option value="9">JSS3 A</option>
					<option value="10">JSS3 B</option>
					<option value="11">JSS3 C</option>
					<option value="13">SS1 SCIENCE</option>
					<option value="14">SS1 HUMANITIES</option>
					<option value="15">SS2 SCIENCE</option>
					<option value="16">SS2 HUMANITIES</option>
					<option value="17">SS3 SCIENCE</option>
					<option value="18">SS3 HUMANITIES</option>

				</select>&emsp;

				<input type="submit" value="Start Result" style="color:#000000;">
                </form>
                </div>



                <br><br><br>
               	<?php echo $msg; ?>

               <center> <?php echo $dl ?> </center>
            <?php echo $ans; ?>
		</div>

	</body>

	    <footer>
            <div class="container">
                    <br/><hr/>
                    <img src="bt.jpg" height="50" alt="Designed by, Bread on Waters Technologies" />
                    <div class="copyright">Copyright © "2016" Browt Technologies.</div>
            </div>
        </footer>
</html>
