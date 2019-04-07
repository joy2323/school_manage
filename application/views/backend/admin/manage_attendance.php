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

/*
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

}
$queryin ="";
$cls_tot=0;
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
  $cls_tot+=$tot_result;
echo $text_fields."<br> ";

		//echo $text_field1."<br> ";
		//echo $capture_field_vals;
		//$sq = "UPDATE students_tbl SET email='$mt' WHERE id='$sid'" ;
$sqlin = "UPDATE term_jss SET exam='$text_field0', ca1='$text_field', ca2='$text_field1', test1='$text_field2', test2='$text_field3',total='$tot_result' WHERE id='$text_fields' && subject_id='$text_field4' && term='$text_field5' && session='$text_field7'";
$queryin = mysqli_query($con, $sqlin);
		//reset($_POST["exm"]);
}

if($queryin){
    print 'Updated Successfully<br>  !';
}
echo $cls_tot."<br> ";

*/
//echo $countr;

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
