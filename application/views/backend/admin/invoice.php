
<?php
//CONNECT TO THE HOST AND THE DATABASE
//$con = mysqli_connect("localhost","root","emmy","school_5") or die("Connection problem.");
$sn = 1;
$dl = "";
$msg ="";

/*$sqlc = "SELECT * FROM class ";
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
*/

$date = date("Y-m-d");
if(isset($_POST['clss'])){
		
	//create local variable for the form data
	//$day = $_POST['day'];
	$clss = $_POST['cls'];
	//$month = $_POST['m'];
	//$year = $_POST['year'];
	
	

	if( $clss == 'select'){

						$msg= '<h3 style="float:center; color:red;">Invalid Selections. Make sure you select Class</h3>';

				}else{

	echo $clss.' | '.$date;
	


										//RESULT TABLE

									$sqls = "SELECT * FROM student WHERE class_id='$clss' ";
									$querys = mysqli_query($con, $sqls);
									$counts = mysqli_num_rows($querys);


								

										/*<form method="post" action="index.php?admin/marks">*/
									if($counts > 0){
										
														$dl = '
																('.$counts.') students Names are displayed.<br><hr><br><center>	
																	<form method="post" action="#">											
																	<table width="50%" border="3" cellspacing="1" cellpadding="2">
																	<tr bgcolor="#1921e2">
																		<tr>
											                            <th><div>SN</div></th>
											                            <th><div> Student Name</div></th>
											                            <th><div> Admission No</div></th>
																		<th><div> sec </div></th>
											                            <th><div> Present </div></th>	
											                            <th><div> stid </div></th>	
											                            <th><div> Absent </div></th>				                            
											                            <th><div> Date </div></th>				                            
											                            				                            
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
																						<td><input type="radio" name="attend[]" value="1" /></td>
																						<td><input type="text" name="student_id[]" value='.$studid.' /></td>
																						<td><input type="radio" name="attend[]" value="2" /></td>
																						<td><input type="text" name="date[]" value='.$date.'/></td>
      																																																																												
																				
																				';														

																					}																			
																						
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
}


$queryin ="";
while(each($_POST["student_id"])) {
  list($arr1_key, $text_field) = each($_POST["student_id"]);
  list($arr2_key, $text_fields) = each($_POST["attend"]);
  list($arr3_key, $text_field1) = each($_POST["date"]);
  
echo $text_field1."<br> ";

$sqlin = "INSERT INTO attendance (attendance_id,status,student_id,date) VALUES ('','$text_fields','$text_field','$text_field1')";
$queryin = mysqli_query($con, $sqlin);
}
if($queryin){
    print 'Success!';
}
	                       	
                	
          
	
?>