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

	if($subj == 'select' || $tem == 'select'  || $ses == 'select'){

						$msg= '<h3 style="float:center; color:red;">Invalid Selections. Make sure you select all fields</h3>';

				}else{

	echo $subj.' |Class- '.$clss.' |Term- '. $tem.' |Session- '.$ses;



										//RESULT TABLE

									$sqls = "SELECT * FROM student WHERE class_id='$clss' ";
									$querys = mysqli_query($con, $sqls);
									$counts = mysqli_num_rows($querys);

									if($counts > 0){


														$dl = '
																('.$counts.') students Names are displayed.<br><hr><br><center>
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


																				$dl .= '
																					<tr>
																						<td>'.++$sn.'</td>
																						<td>'.$tname.'</td>
																						<td>'.$roll.'</td>
																						<td>'.$sectid.'</td>


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
																											<td> <input type="text" name="ca1[]" placeholder="CA 1" value='.$ca11.'>  </td>
																											<td> <input type="text" name="ca2[]" placeholder="CA 2" value='.$ca21.'> </td>
																											<td> <input type="text" name="t1[]" placeholder="TEST 1" value='.$t11.' ></td>
																											<td> <input type="text" name="t2[]" placeholder="TEST 2" value='.$t21.'> </td>
																											<td> <input type="text" name="exm[]" placeholder="EXAM" value='.$exam1.' </td>
																											<td> <input type="hidden" name="subject_id[]" value='.$subj.'>  </td>
																											<td> '.$total1.' </td>
																											<td> <input type="hidden" name="term[]" value='.$tem.'>  </td>
																											<td> '.$class_avg1.' </td>
																											<td> <input type="hidden" name="class_id[]" value='.$classd.'>  </td>
																											<td> '.$grade1.' </td>
																											<td> <input type="hidden" name="session[]" value='.$ses.'>  </td>
																											<td> '.$position1.' </td>

																										</tr>

																									';

																							}
																							elseif($countt==0)
																							{
																								$dl .= '
																												<td> <input type="hidden" name="student_id[]" value='.$studid.'>  </td>
																												<td> <input type="text" name="ca1[]" placeholder="CA 1" value="0"></td>
																												<td> <input type="text" name="ca2[]" placeholder="CA 2" value="0"> </td>
																												<td> <input type="text" name="t1[]" placeholder="TEXT 1" value="0"> </td>
																												<td> <input type="text" name="t2[]" placeholder="TEXT 2" value="0"> </td>
																												<td> <input type="text" name="exm[]" placeholder="EXAM" value="0"> </td>
																												<td> <input type="hidden" name="subject_id[]" value='.$subj.'>  </td>
																												<td> 0 </td>
																												<td> <input type="hidden" name="term[]" value='.$tem.'>  </td>
																												<td>'.$class_avg1.'</td>
																												<td> <input type="hidden" name="class_id[]" value='.$classd.'>  </td>
																												<td> F </td>
																												<td> <input type="hidden" name="session[]" value='.$ses.'>  </td>
																												<td> 0 </td>

																											</tr>

																										';
																								$sqlino= "INSERT INTO term_jss (id,student_id,subject_id,term,exam,total,ca1,ca2,test1,test2,class_id,session,grade) VALUES ('','$studid','$subj','$tem','0','0', '0','0','0','0','$classd','$ses','F')";
																								$queryino = mysqli_query($con, $sqlino);

																								$sqlinb= "INSERT INTO broad_sheet (id,student_id,subject_id,term,total,average,class_id,session) VALUES ('','$studid','$subj','$tem','0','0','$classd','$ses')";
																								$queryinb = mysqli_query($con, $sqlinb);

																								$sqlinbs= "INSERT INTO broader_sheet (id,student_id,term_id,term_position,term_avg,class_id,session) VALUES ('','$studid','$tem','0','0','$classd','$ses')";
																								$queryinbs = mysqli_query($con, $sqlinbs);
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


$queryin ="";
$cls_tot=0;
$cls_avg=0;
$term_avg=0;
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

 $tot_result = ($text_field+$text_field1+$text_field2+$text_field3+$text_field0);

 //grade & Remark

 if($text_field6>3)
 {
	 if($tot_result>=0 && $tot_result<=49){
		 $grade="F9";
		 $remark="Fail";
	 }elseif($tot_result>=50 && $tot_result<=54){
		 $grade="E8";
		 $remark="Pass";
	 }elseif($tot_result>=55 && $tot_result<=59){
		 $grade="D7";
		 $remark="Needs to improve";
	 }elseif($tot_result>=60 && $tot_result<=64){
		 $grade="C6";
		 $remark="Satisfactory";
	 }elseif($tot_result>=65 && $tot_result<=69){
		 $grade="C5";
		 $remark="Satisfactory";
	 }elseif($tot_result>=70 && $tot_result<=74){
		 $grade="C4";
		 $remark="Satisfactory";
	 }elseif($tot_result>=75 && $tot_result<=79){
		 $grade="B3";
		 $remark="Good";
	 }elseif($tot_result>=80 && $tot_result<=84){
		 $grade="B2";
		 $remark="Good";
	 }elseif($tot_result>=85 && $tot_result<=100){
		 $grade="A1";
		 $remark="Excellent";
	 }else{
		 $grade="-";
		 $remark="-";
		}

 }else{
	 if($tot_result>=0 && $tot_result<=49){
		 $grade="F";
		 $remark="Fail";
	 }elseif($tot_result>=50 && $tot_result<=59){
		 $grade="P";
		 $remark="Pass";
	 }elseif($tot_result>=60 && $tot_result<=79){
		 $grade="C";
		 $remark="Credit";
	 }elseif($tot_result>=80 && $tot_result<=100){
		 $grade="A";
		 $remark="Excellent";
	 }else{
		 $grade="-";
		 $remark="-";
		}
 }


 ++$sn;
  $cls_tot+=$tot_result;
  $cls_avg=$cls_tot/$sn;

//update termly result
$sqlin = "UPDATE term_jss SET class_avg='$cls_avg', exam='$text_field0', ca1='$text_field', ca2='$text_field1', test1='$text_field2', test2='$text_field3',total='$tot_result',grade='$grade' WHERE student_id='$text_fields' && subject_id='$text_field4' && term='$text_field5' && session='$text_field7'";
$queryin = mysqli_query($con, $sqlin);
$sqlin = "UPDATE term_jss SET class_avg='$cls_avg' WHERE class_id='$text_field6' && subject_id='$text_field4' && term='$text_field5' && session='$text_field7'";
$queryin = mysqli_query($con, $sqlin);


//conditions for termly result on broadsheet
 if($text_field5==1){
	 $broad_avg=$tot_result;
	// $term_avg+= $broad_avg;

 }elseif($text_field5==2){
	 $sqlst2 = "SELECT * FROM broad_sheet WHERE student_id='$text_fields' && class_id='$text_field6' && subject_id='$text_field4' && term=1 && session='$text_field7' ";
	 $queryst2 = mysqli_query($con, $sqlst2);
	 $row2 = mysqli_fetch_array($queryst2);
	 $tot = $row2 ['total'];

	 $broad_avg=($tot_result+$tot)/2;
	 //$term_avg+= $broad_avg;
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


 }

//update broad_sheet
$sqlin = "UPDATE broad_sheet SET total='$tot_result',average='$broad_avg' WHERE student_id='$text_fields' && subject_id='$text_field4' && term='$text_field5' && session='$text_field7' && class_id='$text_field6' ";
$queryin = mysqli_query($con, $sqlin);

//updating broader_sheet
$sqlinbb = "UPDATE broader_sheet SET term_avg='$term_avg' WHERE student_id='$text_fields' && class_id='$text_field6' && term='$text_field5' && session='$text_field7'";
$queryinbb = mysqli_query($con, $sqlinbb);




	//finding position
		$queryPosn="SELECT * FROM term_jss WHERE class_id='$text_field6' && subject_id='$text_field4' && term='$text_field5' && session='$text_field7' ORDER BY total DESC";
		$queryPosnin=mysqli_query($con,$queryPosn);
		$posn=1;
		while($rowPosn=mysqli_fetch_array($queryPosnin))
		{
			$std_idn=$rowPosn['student_id'];
			$position=$posn;
			$termn=$rowPosn['term'];
			$sessn=$rowPosn['session'];
			$subject_idn=$rowPosn['subject_id'];

			$sqlposn = "UPDATE term_jss SET position='$position' WHERE student_id='$std_idn' && session='$sessn' && term='$termn' && subject_id='$subject_idn'";
			$querypos= mysqli_query($con, $sqlposn);
			++$posn;
			echo $std_idn;
		}


}



if($queryin){
    print '<br><br>Updated Successfully !<br>';
}


}
?>



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
					<option value="2017/2018">2017/2018</option>
					<option value="2018/2019">2018/2019</option>
					<option value="2019/2020">2019/2020</option>
				</select>&emsp;

				<input type="submit" value="Start Result" style="color:#000000;">
                </form>
                </div>



                <br><br><br>
               	<?php echo $msg; ?>

               <center> <?php echo $dl .''.$studid.' | '.$stid; ?> </center>
            <?php echo $ans; ?>
