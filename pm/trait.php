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



/*$sql = "SELECT * FROM subject ";
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
		}*/


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
	$sect= $_POST['section'];

	if($clss == '' || $tem == 'select'  || $ses == 'select' || $sect == 'select'){

						$msg= '<h3 style="float:center; color:red;">Invalid Selections. Make sure you select all fields</h3>';

				}else{
	
	echo ' |Class- '.$clss.' |Term- '. $tem.' |Session- '.$ses.' |Section- '.$sect;
	


										//RESULT TABLE

									//$sqls = "SELECT * FROM student WHERE class_id='$clss' &&  section_id='$sect'";
									$sqls="SELECT * FROM broader_sheet WHERE  class_id='$clss' && term_id='$tem' && session='$ses' && section_id='$sect'";
		
									$querys = mysqli_query($con, $sqls);
									$counts = mysqli_num_rows($querys);

									if($counts > 0){								

										
														$dl = '
																('.$counts.') students Names are displayed.<br><hr><br><center>	
																	<form method="post" action="#">											
																	<table width="50%" border="1" cellspacing="1" cellpadding="0">
																	<tr bgcolor="#1921e2">
																		<tr>
																		

											                            <th><div>SN</div></th>
											                            <th><div> Student Name</div></th>
											                            <th><div> Adm No</div></th>
											                            <th><div> punctuality</div></th>
											                            <th><div>Class Attendance</div></th>
											                            <th><div> Attentiveness</div></th>
											                            <th><div> Carrying Out Assignment</div></th>
											                            <th><div> Participation in School Activities</div></th>
											                            <th><div> Neatness</div></th>
											                            <th><div> Honesty</div></th>
											                            <th><div> Self-Control</div></th>
											                            <th><div> Relationship with others</div></th>
											                            <th><div> Leadership</div></th>															
											                            <th><div> Games/Sports </div></th>						                            
											                            <th><div> Handling of Tools </div></th>						                            
											                            <th><div> Drawing </div></th>						                            
											                        	</tr>
																	</tr></center>
																	

																';
																		
																						
														while($rows = mysqli_fetch_array($querys)){
																							
																				
																					//	$tname = $rows['name'];
																						//$roll = $rows['roll'];
																						$sectid = $rows['section_id'];
																						$studid = $rows['student_id'];
																						$classd = $rows['class_id'];
																						$sqlsname = "SELECT * FROM student WHERE student_id='$studid'";
																						$querysname= mysqli_query($con, $sqlsname);
																						while($rowname=mysqli_fetch_array($querysname))
																						{
																						$tname=$rowname['name'];
																						$roll=$rowname['roll'];
						
																							}
																				
																				$dl .= '
																					<tr>
																						<td>'.++$sn.'</td>			
																						<td>'.$tname.'</td>
																						<td>'.$roll.'</td>
																																																								
																				
																				';																						
																								
																								$sqlst = "SELECT * FROM affective_trait  WHERE student_id='$studid' && term_id='$tem' && session='$ses' ";																																										
																							
																								$queryst = mysqli_query($con, $sqlst);
																								$countst = mysqli_num_rows($queryst);																								
																								$countt=0;
																									//$counts=$countst;

																								while($rowst = mysqli_fetch_array($queryst)){			
															
																																	
																									$ca1 = $rowst['Punctuality'];
																									$ca2 = $rowst['Class_Attendance'];
																									$stid = $rowst['student_id'];
																									$st = $rowst['Attentiveness'];
																									$t1 = $rowst['Carrying_Out_Assignment'];
																									$t2 = $rowst['Participation_in_School_Activities'];
																									$exam = $rowst['Neatness'];
																									$total = $rowst['Honesty'];
																									$class_avg = $rowst['Self_Control'];
																									$grade = $rowst['Relationship_with_others'];
																									$position = $rowst['Responsibility_Leadership'];
																									$cd = $rowst['Games_Sports'];
																									$cd1 = $rowst['Handling_of_Tools_Lab_and_Workshop'];
																									$cd2 = $rowst['Drawing'];
																								
																									
																									if($studid==$stid){
																										$ca11=$ca1;
																										$ca21=$ca2;
																										$t11=$t1;
																										$st1=$st;
																										$t21=$t2;
																										$exam1=$exam;
																										$total1=$total;
																										$class_avg1=$class_avg;
																										$grade1=$grade;
																										$position1=$position;
																										$cda=$cd;
																										$cd1a=$cd1;
																										$cd2a=$cd2;
																										$countt=1;
																										
																																																				
																										
																										} 
																								}

																							
																							if ($countt==1)

																							{
																								$dl .= '
																											 <input type="hidden" name="student_id[]" value='.$studid.'> 																					
																											<td> <input type="text" name="ca1[]" placeholder="Punctuality" value='.$ca11.'>  </td>
																											<td> <input type="text" name="ca2[]" placeholder="Class Attendance" value='.$ca21.'> </td>
																											<td> <input type="text" name="ca21[]" placeholder="Attentiveness" value='.$st1.'> </td>
																											<td> <input type="text" name="t1[]" placeholder="Assignment" value='.$t11.' ></td>
																											<td> <input type="text" name="t2[]" placeholder="School Activities" value='.$t21.'> </td>
																											<td> <input type="text" name="exm[]" placeholder="Neatness" value='.$exam1.' </td>
																											<td> <input type="text" name="exm1[]" placeholder="Honesty" value='.$total1.' </td>
																											<td> <input type="text" name="exm2[]" placeholder="Self-Control" value='.$class_avg1.' </td>
																											<td> <input type="text" name="exm3[]" placeholder="Relationship with others" value='.$grade1.' </td>
																											<td> <input type="text" name="exm4[]" placeholder="Leadership" value='.$position1.' </td>
																											<td> <input type="text" name="exm5[]" placeholder="Games/Sports" value='.$cda.' </td>
																											<td> <input type="text" name="exm6[]" placeholder="Handling of Tools" value='.$cd1a.' </td>
																											<td> <input type="text" name="exm7[]" placeholder="Drawing" value='.$cd2a.' </td>
																											 <input type="hidden" name="term[]" value='.$tem.'>  
																											<input type="hidden" name="class_id[]" value='.$classd.'> 
																											<input type="hidden" name="session[]" value='.$ses.'>
																										
																										</tr>

																									';		

																							}elseif($countt==0)
																							        {
																								   $dl .= '		
																												 <input type="hidden" name="student_id[]" value='.$studid.'>  
																												<td> <input type="text" name="ca1[]" placeholder="Punctuality" value="0"></td>
																												<td> <input type="text" name="ca2[]" placeholder="Class Attendance" value="0"> </td>
																											<td> <input type="text" name="ca21[]" placeholder="Attentiveness" value="0"> </td>
																												<td> <input type="text" name="t1[]" placeholder="Assignment" value="0"> </td>
																												<td> <input type="text" name="t2[]" placeholder="School Activities" value="0"> </td>
																												<td> <input type="text" name="exm[]" placeholder="Neatness" value="0"> </td>
																											<td> <input type="text" name="exm1[]" placeholder="Honesty" value="0" </td>
																											<td> <input type="text" name="exm2[]" placeholder="Self-Control" value="0" </td>
																											<td> <input type="text" name="exm3[]" placeholder="Relationship with others" value="0" </td>
																											<td> <input type="text" name="exm4[]" placeholder="Leadership" value="0" </td>
																											<td> <input type="text" name="exm5[]" placeholder="Games/Sports" value="0" </td>
																											<td> <input type="text" name="exm6[]" placeholder="Handling of Tools" value="0" </td>
																											<td> <input type="text" name="exm7[]" placeholder="Drawing" value="0" </td>
																											 <input type="hidden" name="term[]" value='.$tem.'>  
																											 <input type="hidden" name="class_id[]" value='.$classd.'> 
																											<input type="hidden" name="session[]" value='.$ses.'>  
																											
																											</tr>
																											
																										';
																								
																								$sqlino= "INSERT INTO affective_trait (id,student_id,term_id,session,Punctuality,Class_Attendance,Attentiveness,Carrying_Out_Assignment,Participation_in_School_Activities,Neatness,Honesty,Self_Control,Relationship_with_others,Responsibility_Leadership,Games_Sports,Handling_of_Tools_Lab_and_Workshop,Drawing) VALUES ('','$studid','$tem','$ses','0','0', '0','0','0','0','0','0','0','0','0','0','0')";
																								$queryino = mysqli_query($con, $sqlino);
															

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
		//   EXAM1
	$capture_field_vals01 ="";
    foreach($_POST["exm1"] as $key => $text_field01){
        $capture_field_vals01 .= $text_field01 .", ";
    }
		//   EXAM2
	$capture_field_vals02 ="";
    foreach($_POST["exm2"] as $key => $text_field02){
        $capture_field_vals02 .= $text_field02 .", ";
    }
		//   EXAM3
	$capture_field_vals03 ="";
    foreach($_POST["exm3"] as $key => $text_field03){
        $capture_field_vals03 .= $text_field03 .", ";
    }
		//   EXAM4
	$capture_field_vals04 ="";
    foreach($_POST["exm4"] as $key => $text_field04){
        $capture_field_vals04 .= $text_field04 .", ";
    }
		//   EXAM5
	$capture_field_vals05 ="";
    foreach($_POST["exm5"] as $key => $text_field05){
        $capture_field_vals05 .= $text_field05 .", ";
    }
		//   EXAM6
	$capture_field_vals06 ="";
    foreach($_POST["exm6"] as $key => $text_field06){
        $capture_field_vals06 .= $text_field06 .", ";
    }
		//   EXAM7
	$capture_field_vals07 ="";
    foreach($_POST["exm7"] as $key => $text_field07){
        $capture_field_vals07 .= $text_field07 .", ";
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
	//   ca21
 $capture_field_vals1a ="";
foreach($_POST["ca21"] as $key => $text_field1a){
	
        $capture_field_vals1a .= $text_field1a .", ";
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
$term_avg=12;
$term_position=0;
$text_fieldcnt=0;
$text_fields=0;
while (list($arr1_key, $text_field0) = each($_POST["exm"])) {
  //list($arr1_key, $text_field0) = each($_POST["exm"]);
  list($arr2_key, $text_fields) = each($_POST["student_id"]);
  list($arr3_key, $text_field) = each($_POST["ca1"]);
  list($arr4_key, $text_field1) = each($_POST["ca2"]);
  list($arr4_key, $text_field1a) = each($_POST["ca21"]);
  list($arr5_key, $text_field2) = each($_POST["t1"]);
  list($arr6_key, $text_field3) = each($_POST["t2"]);
  list($arr8_key, $text_field5) = each($_POST["term"]);
 // list($arr9_key, $text_field6) = each($_POST["class_id"]);
  list($arr0_key, $text_field7) = each($_POST["session"]);   
  list($arr1_key, $text_field01) = each($_POST["exm1"]);
  list($arr1_key, $text_field02) = each($_POST["exm2"]);
  list($arr1_key, $text_field03) = each($_POST["exm3"]);
  list($arr1_key, $text_field04) = each($_POST["exm4"]);
  list($arr1_key, $text_field05) = each($_POST["exm5"]);
  list($arr1_key, $text_field06) = each($_POST["exm6"]);
  list($arr1_key, $text_field07) = each($_POST["exm7"]);
	
//update traits
																									
$sqlin = "UPDATE affective_trait SET Punctuality='$text_field', Class_Attendance='$text_field1', Attentiveness='$text_field1a', Carrying_Out_Assignment='$text_field2', Participation_in_School_Activities='$text_field3', Neatness='$text_field0', Honesty='$text_field01', Self_Control='$text_field02', Relationship_with_others='$text_field03', Responsibility_Leadership='$text_field04', Games_Sports='$text_field05', Handling_of_Tools_Lab_and_Workshop='$text_field06', Drawing='$text_field07' WHERE student_id='$text_fields' && term_id='$text_field5' && session='$text_field7'";
$queryin = mysqli_query($con, $sqlin);


if($queryin){
    
	//print '<br><br><h2 style="color: green;">Updated Successfully !</h2><br>';
	$msg='<br><h2 style="color: green;">Updated Successfully !</h2><br>';
}
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
    <title>Affective Trait</title>
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
            <span class="sorry-text">Affective Trait</span>

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
                            <a href="marks.php"><div class="info-image">
                                <img src="test.png" height="100" width="90" alt="student"/>
                            </div>
                            <span class="heading-text">
                                Compute results.
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
                	
              <!--  <select name="sub">
					<option value="select">-Select Subject-</option>
					<option value="<?php echo $subid ?> "><?php echo $list;?></option>					
				</select>&emsp;-->
					
					
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
				<select name="section">
					<option value="select">-Select Section-</option>
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
					<option value="14">SS1 HUMANITY</option>
					<option value="15">SS2 SCIENCE</option>
					<option value="16">SS2 HUMANITY</option>
					<option value="17">SS3 SCIENCE</option>
					<option value="18">SS3 HUMANITY</option>
								
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