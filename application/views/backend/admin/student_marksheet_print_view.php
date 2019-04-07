<p><img src="uploads/images/admin/header.PNG" width="900" height="100" /></p><br><br>
<form action="#" method="post">
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

<?php
$url = $_SERVER['REQUEST_URI'];
$term1="";
$term11="";
$remark="";
$sessionValue="";
$last_term="";


	if(isset($_POST['choose_term']))
	{

		$term1=$_POST['choose_term'];
		if($term1==1)
		{

			$show="First Term";
			$last_term=1;
		}
		else if($term1==2)
		{

			$show="Second Term";
			$last_term=1;
		}
		else if($term1==3)
		{

			$show="Third Term";
			$last_term=2;
		}


	}
	if (isset($_POST['choose_session']))
	{
		$sessionValue=$_POST['choose_session'];

	}

	$tmp = explode('/', $url);
	$end = end($tmp);
	//$l= count($tmp);
	//$classid1=$tmp[$l-2];
	$con = mysqli_connect("localhost","u0563804_rhimoni","G;]y-~5Zv^SK","u0563804_portal");

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

	$sql_posn="SELECT term_position FROM broader_sheet WHERE term_id='$term1' && session='$sessionValue' && student_id='$end'";
	//$sql_posn="SELECT term_position FROM broader_sheet WHERE student_id=1";
	$query_posn=mysqli_query($con,$sql_posn);
	$fposn=mysqli_fetch_array($query_posn);
	$positiont=$fposn[0];

	$sql_posn="SELECT term_position FROM broader_sheet WHERE term_id='$last_term' && session='$sessionValue' && student_id='$end'";
	//$sql_posn="SELECT term_position FROM broader_sheet WHERE student_id=1";
	$query_posn=mysqli_query($con,$sql_posn);
	$fposn=mysqli_fetch_array($query_posn);
	$last_term_position=$fposn[0];


	?>


		<img src="uploads/student_image/<?php echo $student_image; ?>" width="100px" height="100px" style="float:right; margin-top:80px; margin-right:100px;">
<br><h4>Adission No:&emsp;<?php echo $admNo; ?> &emsp;&emsp;Sex:&emsp;<?php echo $sex; ?><br> <br>Names Of Parent/Guardian:&emsp;<?php echo $parent; ?></h4>
 <h4>Address Of Parent/Guardian:&emsp;<?php echo $address; ?>&emsp;</h4><br>
<div><h4>House:&emsp;<?php echo $house; ?>&emsp;Home Town:&emsp;<?php echo $home_town; ?>&emsp;L.G.C:&emsp;<?php echo $lgc; ?></h4></div><br>
<div><h4>State: <?php echo $state; ?>&emsp;D.C.C:<?php echo $dcc; ?>&emsp;Session:&emsp;<?php echo $sessionValue; ?>&emsp;Term:&emsp;<?php echo $show;?></h4></div><br><br>
<div><h4>No In Class: <?php echo $row_noc; ?>&emsp;Position:&emsp;<?php echo $positiont; ?>   &emsp;Last Terms Position:&emsp;<?php echo $last_term_position; ?></h4></div><br>
<center><div border="3" padding="5">
                                    <span onclick="window.print()" style="cursor:pointer; color: blue;">Print this Result</span><hr><br>

																<?php
																	//$classid1=6;
																	//if( $classid1>3)
																		$result='	<table width="95%" border="3" cellspacing="1" cellpadding="2">
																			<tr><h2>COGNITIVE SKILL (ACADEMIC)</h2></tr>
																		<tr>
																		<tr>
											                            <th rowspan="3"><div width="30px">SUBJECTS</div></th>
											                            <th colspan="2"><div> ASSIGNMENT</div></th>
											                            <th colspan="2"><div> TESTS</div></th>
											                            <th rowspan="2"><div class="rotate"> EXAM <br>Marks</div></th>
											                            <th rowspan="2"><div class="rotate"> Total<br> Score</div></th>
											                            <th rowspan="3"><div class="rotate"> CLASS <br>AVERAGE</div></th>
											                            <th rowspan="3"><div class="rotate"> POSITION</div></th>
											                            <th rowspan="3"><div class="rotate"> GRADE</div></th>
											                            <th rowspan="3"><div class="rotate"> REMARKS</div></th>
											                            <th rowspan="3" height="50"><div class="rotate"> SIGNATURE</div></th>
											                            <th colspan="4"><div> YEAR SUMMARY</div></th>
											                        	</tr>
																		<tr><td colspan="2" color="black"> CLASS <br>ASSIGNMENT </td>
																		                                    <td class="rotate" height="60"> TESTS</td>
                                                                        <td class="rotate"> TESTS </td>
                                                                        <td class="rotate" rowspan="2"> 1st Term </td>
                                                                        <td class="rotate" rowspan="2"> 2nd Term </td>
																		                                    <td class="rotate" rowspan="2"> 3rd Term </td>
                                                                        <td class="rotate" rowspan="2"> Ave Score</td>

																		</tr>
																		<tr><td> 10 </td>
																			<td> 10 </td>
																			<td> 20 </td>
																			<td> 20 </td>
																			<td> 40 </td>
																	 <td> 100 </td>
																		</tr>';
																	/*}
																	else
																	{	$result='	<table width="95%" border="3" cellspacing="1" cellpadding="2">
																			<tr><h2>COGNITIVE SKILL (ACADEMIC)</h2></tr>
																		<tr>
																		<tr>
											                            <th rowspan="3"><div width="30px">SUBJECTS</div></th>
											                            <th colspan="2"><div> ASSIGNMENT</div></th>
											                            <th colspan="2"><div> TESTS</div></th>
											                            <th rowspan="2"><div class="rotate"> EXAM <br>Marks</div></th>
											                            <th rowspan="2"><div class="rotate"> Total<br> Score</div></th>
											                            <th rowspan="3"><div class="rotate"> CLASS <br>AVERAGE</div></th>
											                            <th rowspan="3"><div class="rotate"> POSITION</div></th>
											                            <th rowspan="3"><div class="rotate"> GRADE</div></th>
											                            <th rowspan="3"><div class="rotate"> REMARKS</div></th>
											                            <th rowspan="3" height="50"><div class="rotate"> SIGNATURE</div></th>
											                            <th colspan="4"><div> YEAR SUMMARY</div></th>
											                        	</tr>
																		<tr><td colspan="2" color="black"> CLASS <br>ASSIGNMENT </td>
																		                                    <td class="rotate" height="60"> TESTS</td>
                                                                        <td class="rotate"> TESTS </td>
                                                                        <td class="rotate" rowspan="2"> 1st Term </td>
                                                                        <td class="rotate" rowspan="2"> 2nd Term </td>
																		                                    <td class="rotate" rowspan="2"> 3rd Term </td>
                                                                        <td class="rotate" rowspan="2"> Ave Score</td>

																		</tr>
																		<tr><td> 5 </td>
																			<td> 5 </td>
																			<td> 20 </td>
																			<td> 20 </td>
																			<td> 50 </td>
																	 <td> 100 </td>
																		</tr>';
																	}*/


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

																		 if($grade=="F"){
																				 //$grade="F";
																				 $remark="Fail";
																			 }elseif($grade=="P"){

																				 $remark="Pass";
																			 }elseif($grade=="C"){

																				 $remark="Credit";
																			 }elseif($grade=="A"){

																				 $remark="Excellent";
																			 }else{
																				 $grade="-";
																				 $remark="-";
																			 }
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
 }else{
$tot =0;
$tot2 =0;
$tot3 =0;
$avg =0;
 }




																		$result.='

																		<tr><td>'.$subject.'</td>
																	     <td> '.$ca1.' </td>
                                                                        <td> '.$ca2.' </td>
                                                                        <td> '.$t1.' </td>
																	   	<td> '.$t2.' </td>
                                                                        <td> '.$exam.' </td>
                                                                        <td> '.$total.' </td>
                                                                        <td> '.$class_avg.' </td>
																		<td> '.$position.' </td>
                                                                        <td> '.$grade.' </td>
																		<td> '.$remark.'</td>
																		<td>'.$teacher_name.'</td>
                                                                        <td>'.$tot.' </td>
																    	<td> '.$tot2.' </td>
                                                                        <td> '.$tot3.'</td>
                                                                        <td> '.$avg.'</td>
																		</tr>';

																	}

																	$result.=' </table>';

																	if($classid1>3)
																	{$result.='<h5>Exam Total:.................&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Average:.................</h5><br/><br>
 <h5>F=Fail(0-49)&emsp;&emsp;&emsp;&emsp;&emsp; P=Pass(50-59):.................&emsp;&emsp;C=Credit(6O-79):.................&emsp;&emsp;A=Excellent(80-100)  </h4><br/></h5><br/>
																	';}
																	else
																	{
																		$result.='<h5>Exam Total:.................&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Average:.................</h5><br/><br>
 <h5>F=Fail(0-39)&emsp;&emsp;&emsp;&emsp;&emsp; P=Pass(50-59):.................&emsp;&emsp;C=Credit(6O-79):.................&emsp;&emsp;A=Excellent(80-100)  </h4><br/></h5><br/>
';

																	}


 echo $result;

 ?>


  <table width="40%" border="3" cellspacing="1" cellpadding="2" id="sider" style="float:left;">
      <tr>RATINGS</tr>
      <tr>
		  <th><div>AFFECTIVE TRAITS</div></th>
		  <th><div> A</div></th>
		  <th><div> B</div></th>
		  <th><div> C</div></th>
		  <th><div> D</div></th>
       </tr>
       <tr>
          <td> Punctuality</td>
          <td> </td>
          <td> </td>
          <td> </td>
          <td> </td>
       </tr>
                                                 <tr>
                                                  <td> Class Attendance</td>
                                                  <td> </td>
                                          		<td> </td>
                                                  <td> </td>
                                                  <td> </td>
                                                 </tr>
                                                 <tr>
                                                  <td> Attentiveness</td>
                                                  <td> </td>
                                          		<td> </td>
                                                  <td> </td>
                                                  <td> </td>
                                                 </tr>
                                                 <tr>
                                                  <td> Carrying Out Assignments</td>
                                                  <td> </td>
                                          		<td> </td>
                                                  <td> </td>
                                                  <td> </td>
                                                 </tr>
                                                 <tr>
                                                  <td> Participation in School Activities</td>
                                                  <td> </td>
                                          		<td> </td>
                                                  <td> </td>
                                                  <td> </td>
                                                 </tr>
                                                 <tr>
                                                  <td> Neatness</td>
                                                  <td> </td>
                                          		<td> </td>
                                                  <td> </td>
                                                  <td> </td>
                                                 </tr>
                                                 <tr>
                                                  <td> Honesty</td>
                                                  <td> </td>
                                          		<td> </td>
                                                  <td> </td>
                                                  <td> </td>
                                                 </tr>
                                                 <tr>
                                                  <td> Self-Control</td>
                                                  <td> </td>
                                          		<td> </td>
                                                  <td> </td>
                                                  <td> </td>
                                                 </tr>
                                                 <tr>
                                                  <td> Relationship With Others</td>
                                                  <td> </td>
                                          		<td> </td>
                                                  <td> </td>
                                                  <td> </td>
                                                 </tr>
                                                 <tr>
                                                  <td> Responsibility / Leadership</td>
                                                  <td> </td>
                                          		<td> </td>
                                                  <td> </td>
                                                  <td> </td>
                                                 </tr>
                                           </table>



                                                  <table width="40%" border="3" cellspacing="1" cellpadding="2" id="rit" style="float:right;">
                                                        <!-- <tr>RATINGS</tr>-->
                                                         <tr>
                                                          <th><div>PSYCHOMOTOR REPORT</div></th>
                                                          <th><div> A</div></th>
                                                          <th><div> B</div></th>
                                                          <th><div> C</div></th>
                                                          <th><div> D</div></th>
                                                         </tr>
                                                         <tr>
                                                          <td> Games & Sport</td>
                                                          <td> </td>
                                                  		<td> </td>
                                                          <td> </td>
                                                          <td> </td>
                                                         </tr>
                                                         <tr>
                                                          <td> Handling of Tools, Lab and Workshop</td>
                                                          <td> </td>
                                                  		<td> </td>
                                                          <td> </td>
                                                          <td> </td>
                                                         </tr>
                                                         <tr>
                                                          <td> Drawing</td>
                                                          <td> </td>
                                                  		<td> </td>
                                                          <td> </td>
                                                          <td> </td>
                                                         </tr>
                                                   </table>

                                       <br>
                                      </div>
 <br><br><br><br><br><br><br><br><br><br><br><br>
