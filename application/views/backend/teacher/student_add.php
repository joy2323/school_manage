<style type="text/css">
<!--
.style2 {color: #990000}
.style3 {font-size: 18px}
-->
</style>
<style type="text/css">
<!--
.style2 {color: #99000f}
.style3 {font-size: 18px}
-->
</style>

<?php
//CONNECT TO THE HOST AND THE DATABASE
$con = mysqli_connect("localhost","u0563804_rhimoni","G;]y-~5Zv^SK","u0563804_portal");
$sn = 1;
$dl = "";
$msg ="";

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
			$msg = "No such class in the system.";
		}


$date = date("Y-m-d");
if(isset($_POST['cls'])){
		
	//create local variable for the form data
	//$day = $_POST['day'];
	$clss = $_POST['cls'];
	$term = $_POST['term'];
	$session = $_POST['session'];
	//$month = $_POST['m'];
	//$year = $_POST['year'];
	
	

	if( $clss == 'select' || $term == 'select'  || $session == 'select'){

						$msg= '<h3 style="float:center; color:red;">Invalid Selections. Make sure you select Class</h3>';

				}else{

										//RESULT TABLE

									$sqls = "SELECT * FROM student WHERE class_id='$clss' ";
									$querys = mysqli_query($con, $sqls);
									$counts = mysqli_num_rows($querys);


									if($counts > 0){
										
														$dl = '
																('.$counts.') students Names are displayed.<br><hr><br><center>	
																	<form method="post" action="index.php?teacher/book">											
																	<table width="50%" border="3" cellspacing="1" cellpadding="2">
																	<tr bgcolor="#1921e2">
																		<tr>
											                            <th><div>SN</div></th>
											                            <th><div> Student Name</div></th>
											                            <th><div> Admission No</div></th>
																		<th><div> sec </div></th>
											                            <th><div> Present </div></th>	
											                            <th><div> Absent </div></th>				                            
											                            				                            
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
																								<td>'.$sn++.'</td>			
																								<td>'.$tname.'</td>
																								<td>'.$roll.'</td>	
																								<td>'.$sectid.'</td>
																							';
																							
																						/*$dl .= '
																							
																								<td><input type="radio" name="attend['.$studid.']" value="1" /></td>
																								<input type="hidden" name="student_id[]" value='.$studid.' />
																								<input type="hidden" name="class[]" value='.$classd.' />
																								<input type="hidden" name="term[]" value='.$term.' />
																								<input type="hidden" name="session[]" value='.$session.' />
																								<td><input type="radio" name="attend['.$studid.']" value="2" /></td>
																								<input type="hidden" name="date[]" value='.$date.'/>
																							</tr>																																																							
																						
																						';*/	
																						//start
																						
																																										
																																	
																								$sqlst = "SELECT * FROM attendance WHERE student_id='$studid' && term='$term' && session='$session' && date='$date' && class_id='$classd' ";																																										
																							
																								$queryst = mysqli_query($con, $sqlst);
																								$countst = mysqli_num_rows($queryst);																								
																								$countt=0;
																									//$counts=$countst;
																											
																								while($rowst = mysqli_fetch_array($queryst)){																					
																														
																									//$atd = $rowst['attendance_id'];
																									$sta = $rowst['status'];
																									$stid = $rowst['student_id'];																									
																									$te = $rowst['term'];
																									$cd = $rowst['class_id'];
																									$ss = $rowst['session'];
																									$dd = $rowst['date'];
																								
																									
																									if($studid==$stid){
																										//$atd1=$atd;
																										$sta1=$sta;
																										$stid1=$stid;
																										$te1=$te;
																										$cd1=$cd;
																										$ss1=$ss;
																										$dd1=$dd;																																																	
																										$countt=1;																									
																										$ch="";
																										$chc="";
																										 
																										if($sta1=1){
																											$ch='checked';
																											$chc="";
																										}else{
																											$chc='checked';
																											$ch="";
																										}
																										
																									}
																								}

																							
																							if ($countt==1)

																							{
																								
																								$dl .= '
																							
																								<td><input type="radio" name="attend['.$studid.']" value="1" '.$ch.''.$chc.' /></td>
																								<input type="hidden" name="student_id[]" value='.$stid1.' />
																								<input type="hidden" name="class[]" value='.$cd1.' />
																								<input type="hidden" name="term[]" value='.$te1.' />
																								<input type="hidden" name="session[]" value='.$ss1.' />
																								<td><input type="radio" name="attend['.$studid.']" value="2" '.$chc.''.$ch.'/></td>
																								<input type="hidden" name="date[]" value='.$dd1.'/>
																							</tr>																																																							
																						
																						';		
																								
																								
																							}																																									
																							elseif($countt==0)
																							{
																								$dl .= '
																							
																								<td><input type="radio" name="attend['.$studid.']" value="1" /></td>
																								<input type="hidden" name="student_id[]" value='.$studid.' />
																								<input type="hidden" name="class[]" value='.$cd.' />
																								<input type="hidden" name="term[]" value='.$te.' />
																								<input type="hidden" name="session[]" value='.$ss.' />
																								<td><input type="radio" name="attend['.$studid.']" value="2" /></td>
																								<input type="hidden" name="date[]" value='.$dd.'/>
																							</tr>																																																								
																						
																						';
																								$sqlini = "INSERT INTO attendance (attendance_id,status,student_id,class_id,term,session,date) VALUES ('','0','$studid','$classd','$term','$session','$date')";
																								$queryini = mysqli_query($con, $sqlini);																							
																							}
																							
																						//stop
																												
																						//$sqlini = "INSERT INTO attendance (attendance_id,status,student_id,class_id,term,session,date) VALUES ('','0','$studid','$classd','$term','$session','$date')";
																						//$queryini = mysqli_query($con, $sqlini);
																					}																			
																						
																			//$dl .= $dl1;
																			$dl .= '</table>';
																			$dl .=	'<br><input type="submit" value="Update" style="float:right; color:#0456ee; margin-right:230px;">';
																			$dl .= '</form>';													
																			
																			
								} else{
										$msg= '<h3 style="float:center; color:red;">No Student in this class...Please Select Class</h3>';
									}	
				}
		}
					

if(isset($_POST['Update'])){
	//   Student_id
    $capture_field_val ="";
    foreach($_POST["student_id"] as $key => $text_field){
        $capture_field_val .= $text_field .", ";
    }
	
	//  date
    $capture_field_val1 ="";
    foreach($_POST["date"] as $key => $text_field1){
        $capture_field_val1 .= $text_field1 .", ";
    }
	
	//   Attendance
    $capture_field_valss ="";
    foreach($_POST["attend"] as $key => $text_fields){
        $capture_field_valss .= $text_fields .", ";
    }
	
		//   class
    $capture_field_valsc ="";
    foreach($_POST["class"] as $key => $text_fieldc){
        $capture_field_valsc .= $text_fieldc .", ";
    }
	
	//   term
    $capture_field_valst ="";
    foreach($_POST["term"] as $key => $text_fieldt){
        $capture_field_valst .= $text_fieldt .", ";
    }
	
	//   session
    $capture_field_valsss ="";
    foreach($_POST["session"] as $key => $text_fieldss){
        $capture_field_valsss .= $text_fieldss .", ";
    }
}


$queryin ="";
while (list($arr1_key, $text_field) = each($_POST["student_id"])) {
  list($arr2_key, $text_fields) = each($_POST["attend"]);
  list($arr3_key, $text_field1) = each($_POST["date"]);
  list($arr3_key, $text_fieldc) = each($_POST["class"]);
  list($arr3_key, $text_fieldt) = each($_POST["term"]);
  list($arr3_key, $text_fieldss) = each($_POST["session"]);
  
$sqlin = "UPDATE attendance SET  status='$text_fields', class_id='$text_fieldc',date='$text_field1' WHERE student_id='$text_field' &&  term='$text_fieldt' && session='$text_fieldss' ";
$queryin = mysqli_query($con, $sqlin);


//$sqlin = "INSERT INTO attendance (attendance_id,status,student_id,class_id,term,session,date) VALUES ('','$text_fields','$text_field','$text_fieldc','$text_fieldt','$text_fieldss','$text_field1')";
//$queryin = mysqli_query($con, $sqlin);
}
if($queryin){
    print '<h2 style="color:green;">Success!</h2>';
}

?>




				
                <br>
                		<center><h2>
                 <?php
                    echo "Today is " .date("l"). "<br>";
					
					echo $date ;
					
					?>
				<h2><br></center>

               <div  style="float:left; border: 3px ; height:50px;">
                <form method="post" action="index.php?teacher/book">
                	
              
				<select name="cls">
					<option value="select">-Select Class-</option>
					<option value='<?php echo $clid ;?>'><?php echo $listc;?></option>
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
				
				<input type="submit" value="Fetch Class" style="color:#000000;"/>
                </form>
                </div>

                <br/>
                <?php echo $msg ; ?>
               	  <center> <?php echo $dl ; ?> </center>   

                             	
                	
           
            

                
<!--<p><img src="uploads/images/admin/attendance_admin.PNG" width="1062" height="741" /></p>-->
