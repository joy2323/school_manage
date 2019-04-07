

<?php
$url = $_SERVER['REQUEST_URI'];
$term1="";
$term11="";
$remark="";
$sessionValue="";
$hide="";
$aaa="";
$bbb="";

	if(isset($_POST['choose_term']))
	{

		$term1=$_POST['choose_term'];
		if($term1==1)
		{

			$show="First Term";
		}
		else if($term1==2)
		{

			$show="Second Term";
		}
		else if($term1==3)
		{

			$show="Third Term";
		}


	}
	if (isset($_POST['choose_session']))
	{
		$sessionValue=$_POST['choose_session'];

	}
		//if (strpos($url, '#')) {
		//$url = substr($url, 0, strpos($url, '#'));
	$tmp = explode('/', $url);
	$end = end($tmp);
	//echo $end;
		//}
		$con = mysqli_connect("localhost","u0563804_rhimoni","G;]y-~5Zv^SK","u0563804_portal");

	//get student pix
	$s_img = "uploads/student_image/$end.jpg";

if(file_exists($s_img)){
	$student_image = "$end.jpg";
}else {
	$student_image = "dimg.jpg";
}

	$sql1 = "SELECT * FROM student WHERE student_id='$end'";
	$query1 = mysqli_query($con, $sql1);
	while($rowst1 = mysqli_fetch_array($query1))
	{
		$name=$rowst1['name'];
		$sex=$rowst1['sex'];
		$address=$rowst1['address'];
		$parent=$rowst1['father_name'];
		$admNo=$rowst1['roll'];
		$house=$rowst1['house'];
		$home_town=$rowst1['home_town'];
		$lgc=$rowst1['lgc'];
		$state=$rowst1['state'];
		$dcc=$rowst1['dcc'];
		$form=$rowst1['class_id'];
		$section_id=$rowst1['section_id'];


	}
	$sql_noc = "SELECT * FROM student WHERE class_id='$form' && section_id='$section_id' ";
	$queryt_noc = mysqli_query($con, $sql_noc);
	$row_noc=mysqli_num_rows($queryt_noc);
	$sam="";

if( $form>3){
	$header= "headers.PNG";
}else{
	$header= "header.PNG";
}

if($term1==1){
	$last_term=$term1;
}else{
	$last_term=$term1-1;
}


	$sql_posn="SELECT term_position FROM broader_sheet WHERE term_id='$term1' && session='$sessionValue' && student_id='$end'";
	//$sql_posn="SELECT term_position FROM broader_sheet WHERE student_id=1";
	$query_posn=mysqli_query($con,$sql_posn);
	$fposn=mysqli_fetch_array($query_posn);
	$positiont=$fposn[0];

	$sql_posnl="SELECT term_position FROM broader_sheet WHERE term_id='$last_term' && session='$sessionValue' && student_id='$end'";
	//$sql_posn="SELECT term_position FROM broader_sheet WHERE student_id=1";
	$query_posnl=mysqli_query($con,$sql_posnl);
	$fposnl=mysqli_fetch_array($query_posnl);
	$last_term_position=$fposnl[0];


	//display result only if studentz score is greater than zero
		$sql_disp="SELECT *FROM broad_sheet WHERE term='$term1' && session='$sessionValue' && student_id='$end'";
	$query_disp=mysqli_query($con,$sql_disp);
	$countf=0;
	while($dispS=mysqli_fetch_array($query_disp))
	{
		$ttal_scr=$dispS['total'];
		if ($ttal_scr !=0)
		{
			$countf++;
		}


	}

	$sql_termAvg="SELECT *FROM broader_sheet WHERE term_id='$term1' && session='$sessionValue' && student_id='$end'";
	//$sql_posn="SELECT term_position FROM broader_sheet WHERE student_id=1";
	$query_termAvg=mysqli_query($con,$sql_termAvg);
	$dispTermAvg=mysqli_fetch_array($query_termAvg);
	$termAvg=$dispTermAvg['term_avg'];
	$termAvgReal=$termAvg/$countf;

	/******************************************/
	//to test a 3term individual average result
	//1st term
		$sql_termAvg1s="SELECT *FROM broader_sheet WHERE term_id='1' && session='$sessionValue' && student_id='$end'";
	$query_termAvg1s=mysqli_query($con,$sql_termAvg1s);
	$dispTermAvg1s=mysqli_fetch_array($query_termAvg1s);
	$termAvg1s=$dispTermAvg1s['term_avg'];
	//display result only if studentz score is greater than zero
	$sql_disp="SELECT *FROM broad_sheet WHERE term='1' && session='$sessionValue' && student_id='$end'";
	$query_disp=mysqli_query($con,$sql_disp);
	$countf1=0;
	while($dispS=mysqli_fetch_array($query_disp))
	{
		$ttal_scr=$dispS['total'];
		if ($ttal_scr !=0)
		{
			$countf1++;
		}


	}
	//display result only if studentz score is greater than zero

	$termAvgReal1=$termAvg1s/$countf1;
	$aaa=$termAvgReal1;
	//2nd
		$sql_termAvg2="SELECT *FROM broader_sheet WHERE term_id='2' && session='$sessionValue' && student_id='$end'";
	$query_termAvg2=mysqli_query($con,$sql_termAvg2);
	$dispTermAvg2=mysqli_fetch_array($query_termAvg2);
	$termAvg2=$dispTermAvg2['term_avg'];
	//display result only if studentz score is greater than zero
	$sql_disp="SELECT *FROM broad_sheet WHERE term='2' && session='$sessionValue' && student_id='$end'";
	$query_disp=mysqli_query($con,$sql_disp);
	$countf2=0;
	while($dispS=mysqli_fetch_array($query_disp))
	{
		$ttal_scr=$dispS['total'];
		if ($ttal_scr !=0)
		{
			$countf2++;
		}


	}
	//display result only if studentz score is greater than zero

	$termAvgReal2=$termAvg2/$countf2;
	$bbb=$termAvgReal2;
	//3rd
		$sql_termAvg3="SELECT *FROM broader_sheet WHERE term_id='3' && session='$sessionValue' && student_id='$end'";
	$query_termAvg3=mysqli_query($con,$sql_termAvg3);
	$dispTermAvg3=mysqli_fetch_array($query_termAvg3);
	$termAvg3=$dispTermAvg3['term_avg'];
		//display result only if studentz score is greater than zero
	$sql_disp="SELECT *FROM broad_sheet WHERE term='3' && session='$sessionValue' && student_id='$end'";
	$query_disp=mysqli_query($con,$sql_disp);
	$countf3=0;
	while($dispS=mysqli_fetch_array($query_disp))
	{
		$ttal_scr=$dispS['total'];
		if ($ttal_scr !=0)
		{
			$countf3++;
		}


	}
	//display result only if studentz score is greater than zero
	$termAvgReal3=$termAvg3/$countf3;
	//total term average for 3terms
	$add=($termAvgReal1+$termAvgReal2+$termAvgReal3)/$term1;
	/*******************************************/

if($term1>0){
	$hide="hidden";
}
					/*just to display section name*/
				$sqlz = "SELECT * FROM section WHERE section_id='$section_id' ";
				$queryz = mysqli_query($con, $sqlz);
				$rowz = mysqli_fetch_array($queryz);
				$section_name=$rowz['nick_name'];

				/*just to display resumption dates*/
				$sqlzd = "SELECT * FROM termdate ";
				$queryzd = mysqli_query($con, $sqlzd);
				$rowzd = mysqli_fetch_array($queryzd);
				$dend=$rowzd['end'];
				$dbegin=$rowzd['begin'];

?>

<!--<p><img src="uploads/images/admin/<?php echo $header; ?>" width="900" height="100" /></p><br>--><br>
<form action="#" method="post" <?php echo $hide; ?>>
	Please select the term:<select name="choose_term">

		<option value="select" >please select a term</option>
		<option value="1" >1st term</option>
		<option value="2">2nd term</option>
		<option value="3">3rd term</option>
	</select>

	  Please select the session:<select name="choose_session">
		<option value="2016/2017">2016/2017</option>
		<option value="2017/2018">2017/2018</option>
		<option value="2018/2019">2018/2019</option>
	</select>
	<input type="submit" value="Submit">
</form>


<img src="uploads/student_image/<?php echo $student_image; ?>" width="90px" height="90px" style="float:right; margin-top:15px; margin-right:100px;"/>
<h5><!--NAME:&emsp;<?php echo $name; ?> &emsp; --> Admission No:&emsp;<?php echo $admNo; ?> &emsp; Section: <?php echo $section_name; ?><!--Address Of Parent/Guardian: <?php echo $address; ?>--></h5>

<div>  <h5>Session:&emsp;<?php echo $sessionValue; ?>&emsp;Term:&emsp;<?php echo $show;?></h5></div>
<div><h5>No In Class: <?php echo $row_noc; ?>&emsp;

Position:&emsp;<?php echo $positiont; ?>   &emsp;Last Terms Position:&emsp;<?php echo $last_term_position; ?></h5>
<h5>Term ends:&emsp;<?php echo $dend; ?>   &emsp;Next term begins:&emsp;<?php echo $dbegin; ?></h5>
</div>


<div border="3" padding="5">
 <!--  <span onclick="window.print()" style="cursor:pointer; color: blue;">Print this Result</span><hr>--><br/><hr/>

<?php

																if( $form>3){
																		$result='<center>	<table width="95%" border="3" cellspacing="1" cellpadding="2">
																			<tr><center><h4><b>COGNITIVE SKILL (ACADEMIC)</b></h4></center></tr>
																		<tr>
																		<tr>
											                            <th rowspan="3"><div width="30px">SUBJECTS</div></th>
											                            <th colspan="2"><div><center>ASSIGNMENT</center></div></th>
											                            <th colspan="2"><div><center>TESTS</center></div></th>
											                            <th rowspan="2"><div class="rotate"> EXAM <br>Marks</div></th>
											                            <th rowspan="2"><div class="rotate"> Total<br> Score</div></th>
											                            <th rowspan="3"><div class="rotate"><center> CLASS <br>AVERAGE</center></div></th>
											                            <th rowspan="3"><div class="rotate"> POSITION</div></th>
											                            <th rowspan="3"><div class="rotate"> GRADE</div></th>
											                            <th rowspan="3"><div class="rotate"> REMARKS</div></th>
											                            <!--<th rowspan="3" height="50"><div class="rotate"> SIGNATURE</div></th>-->
											                            <th colspan="4"><div><center>YEAR SUMMARY</center></div></th>
											                        	</tr>
																		<tr><td colspan="2" color="black"><center> CLASS <br>ASSIGNMENT </center></td>
																		                                    <td class="rotate" height="60"> TESTS</td>
                                                                        <td class="rotate"> TESTS </td>
                                                                        <td class="rotate" rowspan="2"> 1st Term </td>
                                                                        <td class="rotate" rowspan="2"> 2nd Term </td>
																	    <td class="rotate" rowspan="2"> 3rd Term </td>
                                                                        <td class="rotate" rowspan="2"> Ave Score</td>

																		</tr>
																		<tr><td><center> 5 </center></td>
																			<td><center> 5 </center></td>
																			<td><center>10 </center></td>
																			<td><center> 10 </center></td>
																			<td><center> 70 </center></td>
																	 <td><center> 100 </center></td>
																		</tr>';
																	}
																	else
																	{	$result='<center>	<table width="95%" border="3" cellspacing="1" cellpadding="2">
																			<tr><h4><b>COGNITIVE SKILL (ACADEMIC)</b></h4></tr>
																		<tr>
																		<tr>
											                            <th rowspan="3"><div width="30px"><center>SUBJECTS</center></div></th>
											                            <th colspan="2"><div><center> ASSIGNMENT</center></div></th>
											                            <th colspan="2"><div><center>TESTS</center></div></th>
											                            <th rowspan="2"><div class="rotate"> EXAM <br>Marks</div></th>
											                            <th rowspan="2"><div class="rotate"> &emsp;Total<br> &emsp;Score</div></th>
											                            <th rowspan="3"><div class="rotate"><center>CLASS <br>AVERAGE</center></div></th>
											                            <th rowspan="3"><div class="rotate"> POSITION</div></th>
											                            <th rowspan="3"><div class="rotate"> GRADE</div></th>
											                            <th rowspan="3"><div class="rotate"> REMARKS</div></th>
											                           <!-- <th rowspan="3" height="50"><div class="rotate"> SIGNATURE</div></th>-->
											                            <th colspan="4"><div><center>YEAR SUMMARY</center></div></th>
											                        	</tr>
																		<tr><td colspan="2" color="black"><center>CLASS <br>ASSIGNMENT </center></td>
																		                                    <td class="rotate" height="60"> TESTS</td>
                                                                        <td class="rotate"> TESTS </td>
                                                                        <td class="rotate" rowspan="2"> 1st Term </td>
                                                                        <td class="rotate" rowspan="2"> 2nd Term </td>
																		                                    <td class="rotate" rowspan="2"> 3rd Term </td>
                                                                        <td class="rotate" rowspan="2"> Ave Score</td>

																		</tr>
																		<tr><td><center> 10 </center></td>
																			<td><center> 10 </center></td>
																			<td><center> 20 </center></td>
																			<td><center> 20 </center></td>
																			<td><center> 40 </center></td>
																	 <td><center> 100 </center></td>
																		</tr>';
																	}


																		$sql = "SELECT * FROM term_jss WHERE student_id='$end' && term='$term1' && session='$sessionValue'";
																		$query = mysqli_query($con, $sql);
																	while($rowst = mysqli_fetch_array($query))
																	{
																		$subject_i =$rowst['subject_id'];
																		$sqlt = "SELECT * FROM subject WHERE subject_id='$subject_i' ";
																		$queryt = mysqli_query($con, $sqlt);
																		while ($rowsub = mysqli_fetch_array($queryt))
																		{
																		$subject = $rowsub ['name'];
																		$sqltt = "SELECT * FROM teacher_subj1 WHERE subject_id='$subject_i' ";
																		$querytt = mysqli_query($con, $sqltt);
																		while ($rowsubt = mysqli_fetch_array($querytt))
																		{
																			$teacher_name=$rowsubt['name'];
																		}
																		}

																		$total = $rowst['total'];
																		if ($total!=0)
																		{$ca1 = $rowst['ca1'];
																		$ca2 = $rowst['ca2'];
																		$stid = $rowst['student_id'];
																		$t1 = $rowst['test1'];
																		$t2 = $rowst['test2'];
																		$exam = $rowst['exam'];

																		$class_avg = $rowst['class_avg'];
																		$grade = $rowst['grade'];
																		$position = $rowst['position'];
																		$cd = $rowst['class_id'];

																		 if($grade=="F"){
																				 //$grade="F";
																				 $remark="Fail";
																			 }elseif($grade=="P"){

																				 $remark="Pass";
																			 }elseif($grade=="C"){

																				 $remark="Credit";
																			 }elseif($grade=="A"){

																				 $remark="Excellent";
																			 }elseif($grade=="F9"){

																				 $remark="Fail";
																			 }elseif($grade=="E"){

																				 $remark="Pass";
																			 }elseif($grade=="E8"){

																				 $remark="Pass";
																			 }elseif($grade=="D"){

																				 $remark="Needs to improve";
																			 }elseif($grade=="D7"){

																				 $remark="Needs to improve";
																			 }elseif($grade=="C6"){

																				 $remark="Credit";
																			 }elseif($grade=="C5"){

																				 $remark="Credit";
																			 }elseif($grade=="C4"){

																				 $remark="Credit";
																			 }elseif($grade=="B3"){

																				 $remark="Good";
																			 }elseif($grade=="B2"){

																				 $remark="Very Good";
																			 }elseif($grade=="B"){

																				 $remark="Good";
																			 }elseif($grade=="A"){

																				 $remark="Excellent";
																			 }elseif($grade=="A1"){

																				 $remark="Excellent";
																			 }else{
																				 $grade="-";
																				 $remark="-";
																			 }
																		}
//initializing
$tot =0;
$tot2 =0;
$tot3 =0;
$avg =0;


if($term1==1){
	  $sqls1 = "SELECT * FROM broad_sheet WHERE student_id='$end' && subject_id='$subject_i' && term=1 && session='$sessionValue' ";
	 $queryst1 = mysqli_query($con, $sqls1);
	while ($row1 = mysqli_fetch_array($queryst1)){
	 $tot = $row1['total'];
	$avg = $row1['average'];
	/******total term average for 3terms*********/
	$add=$termAvgReal1;
	$termAvgReal2="";
	$termAvgReal3="";
	/**************************/
	}

 }elseif($term1==2){
	 $sqls1 = "SELECT * FROM broad_sheet WHERE student_id='$end' && subject_id='$subject_i' && term=1 && session='$sessionValue' ";
	 $queryst1 = mysqli_query($con, $sqls1);
	 $row1 = mysqli_fetch_array($queryst1);
	 $tot = $row1 ['total'];

	 $sqls2 = "SELECT * FROM broad_sheet WHERE student_id='$end' && subject_id='$subject_i' && term=2 && session='$sessionValue' ";
	 $queryst2 = mysqli_query($con, $sqls2);
	 $row2 = mysqli_fetch_array($queryst2);
	 $tot2 = $row2 ['total'];
	 $avg = $row2 ['average'];
		/****total term average for 3terms***/
	$add=($termAvgReal1+$termAvgReal2)/2;
	$termAvgReal3="";
	/**************************/
 }elseif($term1==3){
	 $sqls1 = "SELECT * FROM broad_sheet WHERE student_id='$end' && subject_id='$subject_i' && term=1 && session='$sessionValue' ";
	 $queryst1 = mysqli_query($con, $sqls1);
	 $row1 = mysqli_fetch_array($queryst1);
	 $tot = $row1 ['total'];

	 $sqls2 = "SELECT * FROM broad_sheet WHERE student_id='$end' && subject_id='$subject_i' && term=2 && session='$sessionValue' ";
	 $queryst2 = mysqli_query($con, $sqls2);
	 $row2 = mysqli_fetch_array($queryst2);
	 $tot2 = $row2 ['total'];

	 $sqls3 = "SELECT * FROM broad_sheet WHERE student_id='$end' && subject_id='$subject_i' && term=3 && session='$sessionValue' ";
	 $queryst3 = mysqli_query($con, $sqls3);
	 $row3 = mysqli_fetch_array($queryst3);
	 $tot3 = $row3 ['total'];
	 $avg = $row3 ['average'];
		/*******total term average for 3terms****/
	$add=($termAvgReal1+$termAvgReal2+$termAvgReal3)/3;
	/**************************/
 }else{
$tot =0;
$tot2 =0;
$tot3 =0;
$avg =0;
 }

																	if($total>0){

																		$result.='

																		<tr><td>'.$subject.'</td>
																	     <td><center> '.$ca1.'</center> </td>
                                                                        <td><center> '.$ca2.' </center></td>
                                                                        <td><center> '.$t1.' </center></td>
																	   	<td><center> '.$t2.' </center></td>
                                                                        <td><center> '.$exam.' </center></td>
                                                                        <td><center> '.$total.' </center></td>
                                                                        <td><center> '.round($class_avg,1).' </center></td>
																		<td><center> '.$position.' </center></td>
                                                                        <td><center> '.$grade.' </center></td>
																		<td><center> '.$remark.'</center></td>
																		<!--<td> '.$teacher_name.'</td>-->
                                                                        <td><center>'.$tot.' </center></td>
																    	<td><center> '.$tot2.' </center></td>
                                                                        <td><center> '.$tot3.'</center></td>
                                                                        <td><center> '.round($avg,1).'</center></td>
																		</tr>';
																	}
															}


																	$result.=' </table>';

/* if($form>3)
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

 }else{*/


	 	 if($termAvgReal>=0 && $termAvgReal<44.5){
		 $gtr="POOR RESULT";
		 $ar="YOU NEED TO WORK HARDER";
	 }elseif($termAvgReal>=44.5 && $termAvgReal<49.5){
		 $gtr="A WEAK PERFOMANCE";
		 $ar="PUT MORE EFFORT TO IMPROVE";
	 }elseif($termAvgReal>=49.5 && $termAvgReal<59.5){
		 $gtr="AN AVERAGE PERFOMANCE";
		 $ar="YOU CAN DO BETTER";
	 }elseif($termAvgReal>=59.5 && $termAvgReal<69.5){
		 $gtr="A GOOD RESULT";
		 $ar="YOU CAN DO BETTER";
	 }elseif($termAvgReal>=69.5 && $termAvgReal<=84.5){
		 $gtr="VERY GOOD PERFORMANCE";
		 $ar="BRILLIANT, KEEP IT UP";
	 }elseif($termAvgReal>=84.5 && $termAvgReal<=100){
		 $gtr="EXCELLENT PERFORMANCE";
		 $ar="BRILLIANT, KEEP IT UP";
	 }else{
		 $gtr="-----";
		 $ar="-----";
		}
 //}


																	/*  if($form>3)
																	{$result.='<h6>Exam Total:&emsp;'.$termAvg.'&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Average:&emsp;'. $termAvgReal.'</h6>
F9=Fail(0-49)&emsp; E8=Pass(50-54)&emsp; D7=Needs to improve(55-59)&emsp; C6=Satisfactory(60-64)&emsp;C5=Satisfactory(65-69)&emsp; C4=Satisfactory(70-74)&emsp; B3=Good(75-79)&emsp;B2=Good(80-84)&emsp;A1=Excellent(85-100)
																	';}
																	else
																	{*/


																/***************This is also included for display****************/
																		/*$result.='<h6>Current Term Exam Total:&emsp;'.$termAvg.'&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;1st term Average:&emsp;'. round($termAvgReal1,1).'&emsp;&emsp;&emsp;2nd term Average:&emsp;'. round($termAvgReal2,1).'&emsp;&emsp;&emsp;3rd term Average:&emsp;'. round($termAvgReal3,1).' &emsp;&emsp;&emsp;Total Average:&emsp;'. round($add,1).'</h6>
 F9=Fail(0-39)&emsp; E8=Pass(40-44)&emsp; D7=Needs to improve(45-49)&emsp; C6=Credit(50-54)&emsp;C5=Credit(55-59)&emsp; C4=Credit(60-64)&emsp; B3=Good(65-69)&emsp;B2=Very Good(70-74)&emsp;A1=Excellent(75-100)';	*/																									/*******************************/
																	///}
$promotion_status="";
$bod=0;
	if ($term1==3)
	{		/***************This is also included for display****************/
	if ($add>=50)
	{
		$promotion_status="PROMOTED";
		$bod=1;
	}

     else if ($add>=45 && $add<50 )
	{
		$promotion_status="PROMOTED";
		$bod=1;
	}
	else
	{
		$promotion_status="REPEATED";
		$bod=1;
	}
	}
																		$result.='<br><table border="1"><tr><td rowspan="2"><center>Current Term Exam Total:&emsp;'.round($termAvg,1).'&emsp;</center></td><td rowspan="2"><center>&emsp;1st term Average:&emsp;'.round($termAvgReal1,1).'&emsp;</center></td><td rowspan="2"><center>&emsp;2nd term Average:&emsp;'. round($termAvgReal2,1).'&emsp;</center></td><td rowspan="2"><center>&emsp;3rd term Average:&emsp;'. round($termAvgReal3,1).'&emsp; </center></td><td><center>&emsp;Total Average:&emsp;'. round($add,1).'&emsp;</center></td></tr>
																					<tr><td><center><b> '.$promotion_status.'<b/></center></td></tr></table>
<!--<br/> <table style="margin-left:640px;" border='.$bod.'> <tr><td><h4> '.$promotion_status.'</h3></td></tr></table>-->';
$result.="<h5>GRADE TEACHER'S REMARKS:&emsp;".$gtr."</h5>
		  <h5>PRINCIPAL'S REMARKS:&emsp;".$ar."</h5>
</center>";

 echo $result;


?>

 <?php
$traits1=array("Punctuality","Class_Attendance","Attentiveness","Carrying_Out_Assignment","Participation_in_School_Activities","Neatness","Honesty","Self_Control","Relationship_with_others","Responsibility_Leadership","Games_Sports","Handling_of_Tools_Lab_and_Workshop","Drawing");
	$fetch=mysql_query("SELECT * FROM affective_trait WHERE student_id='$end' && term_id='$term1' && session='$sessionValue'")or die(mysql_error());
	$dla= '<center><table width="60%" border="0"><tr>';

	while ($rows=mysql_fetch_array($fetch))
	{
		for ($i=0;$i<=12;$i++)
		{
			$height=$rows[$traits1[$i]]*25;

			$dla.='<td >'.$height.'%';
			$dla.='&emsp;<br/><img src="uploads/student_image/bar2.png" height="'.$height.'"width="10px" alt=""/></td>&emsp;&emsp;';


		}

	}

	$dla.= '</tr>
			<tr>
			<th><div id="s"> Punctuality</div></th>
			<th><div id="s"> Class Attendance</div></th>
			<th><div id="s"> Attentiveness</div></th>
			<th><div id="s"> Carrying Out <br/> Assignment</div></th>
			<th><div id="s"> Participation <br/>in School Activities</div></th>
			<th><div id="s"> Neatness</div></th>
			<th><div id="s"> Honesty</div></th>
			<th><div id="s"> Self-Control</div></th>
			<th><div id="s"> Relationship <br> with other</div></th>
			<th><div id="s"> Leadership</div></th>
			<th><div id="s"> Games/Sports</div></th>
			<th><div id="s"> Handling of Tools</div></th>
			<th><div id="s"> Drawing</div></th>
		</tr>';
	$dla.= '</table><center>';

?>

<br/>
 <?php echo $dla ?>
<style>
#s{
		-moz-transform:rotate(90deg);
		-webkit-transform:rotate(90deg);
}
</style>

<br/><br/>
<a href="http://www.albayanschool.com.ng/portal/index.php?admin/transport/<?php echo $end ;?>">Open-day</a>
