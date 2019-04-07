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


//$date = date("Y-m-d");
if(isset($_POST['cls'])){

	//create local variable for the form data
	//$day = $_POST['day'];
	$clss = $_POST['cls'];
	//$month = $_POST['m'];
	//$year = $_POST['year'];



	if( $clss == 'select' ){

						$msg= '<h3 style="float:center; color:red;">Invalid Selections. Make sure you select Class</h3>';

				}else{

										//RESULT TABLE

									$sqls = "SELECT * FROM student WHERE class_id='$clss' ";
									$querys = mysqli_query($con, $sqls);
									$counts = mysqli_num_rows($querys);


									if($counts > 0){

														$dl = '
																('.$counts.') students Names are displayed.<br><hr><br><center>
																	<form method="post" action="#">
																	<table width="80%" border="3" cellspacing="1" cellpadding="2" class="table table-hover table-responsive">
																	<tr bgcolor="#192100">
																		<tr>
											                            <th><div>SN</div></th>
											                            <th><div> Student Name</div></th>
											                            <th><div> Admission No</div></th>
																		<th><div> House </div></th>
											                            <th><div> Home Town </div></th>
											                            <th><div> L.G.C </div></th>
											                            <th><div> State </div></th>
											                            <th><div> D.C.C </div></th>

											                        	</tr>
																	</tr></center>


																';


																					while($rows = mysqli_fetch_array($querys)){


																						$tname = $rows['name'];
																						$roll = $rows['roll'];
																						$sectid = $rows['section_id'];
																						$studid = $rows['student_id'];
																						$classd = $rows['class_id'];
																						$house = $rows['house'];
																						$home = $rows['home_town'];
																						$lgc = $rows['lgc'];
																						$state = $rows['state'];
																						$dcc = $rows['dcc'];


																				$dl .= '
																					<tr>
																						<td>'.$sn++.'</td>
																						<td>'.$tname.'</td>
																						<td>'.$roll.'</td>
																						<td><input type="text" name="house[]" placeholder="House" value='.$house.'></td>
																						<input type="hidden" name="student_id[]" value='.$studid.' >
																						<td><input type="text" name="home[]" placeholder="Home Town" value='.$home.'></td>
																						<td><input type="text" name="lgc[]" placeholder="L.G.C" value='.$lgc.'></td>
																						<td><input type="text" name="state[]" placeholder="State" value='.$state.'></td>
																						<td><input type="text" name="dcc[]" placeholder="D.C.C" value='.$dcc.'></td>


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

	//  House
    $capture_field_val1 ="";
    foreach($_POST["house"] as $key => $text_field1){
        $capture_field_val1 .= $text_field1 .", ";
    }

	//   Home Town
    $capture_field_valss ="";
    foreach($_POST["home"] as $key => $text_fields){
        $capture_field_valss .= $text_fields .", ";
    }

		//   LGC
    $capture_field_valsc ="";
    foreach($_POST["lgc"] as $key => $text_fieldc){
        $capture_field_valsc .= $text_fieldc .", ";
    }

	//   State
    $capture_field_valst ="";
    foreach($_POST["state"] as $key => $text_fieldt){
        $capture_field_valst .= $text_fieldt .", ";
    }

	//   DCC
    $capture_field_valsss ="";
    foreach($_POST["dcc"] as $key => $text_fieldss){
        $capture_field_valsss .= $text_fieldss .", ";
    }
}


$queryin ="";

if(isset($_POST['student_id'])){
	foreach ($_POST['student_id'] as $key => $value) {
		print_r($value);
		echo "<br>";
	}

	foreach ($_POST['student_id'] as $arr1_key => $text_field) {
		$arr2_key = key($_POST['home']);
		$text_fields = current($_POST['home']);

		$arr3_key = key($_POST['house']);
		$text_field1 = current($_POST['house']);

		$arr3_key = key($_POST['lgc']);
		$text_fieldc = current($_POST['lgc']);

		$arr3_key = key($_POST['state']);
		$text_fieldt = current($_POST['state']);

		$arr3_key = key($_POST['dcc']);
		$text_fieldss = current($_POST['dcc']);

		$sqlin = "UPDATE student SET  home_town='$text_fields', lgc='$text_fieldc', house='$text_field1', state ='$text_fieldt', dcc='$text_fieldss' WHERE student_id='$text_field' ";
		$queryin = mysqli_query($con, $sqlin);
	}

	if($queryin){
	    print '<h2 style="color:green;">Success!</h2>';
	}

	/**while (list($arr1_key, $text_field) = each($_POST["student_id"])) {
	  list($arr2_key, $text_fields) = each($_POST["home"]);
	  list($arr3_key, $text_field1) = each($_POST["house"]);
	  list($arr3_key, $text_fieldc) = each($_POST["lgc"]);
	  list($arr3_key, $text_fieldt) = each($_POST["state"]);
	  list($arr3_key, $text_fieldss) = each($_POST["dcc"]);

	$sqlin = "UPDATE student SET  home_town='$text_fields', lgc='$text_fieldc', house='$text_field1', state ='$text_fieldt', dcc='$text_fieldss' WHERE student_id='$text_field' ";
	$queryin = mysqli_query($con, $sqlin);

}**/


}

?>





                <br>
                		<center><h2>

				<h2><br></center>

               <div  style="float:left; border: 3px ; height:50px;">
                <form method="post" action="#" class="form-inline">


				<select name="cls" class="form-control" required>
					<option value="select">-Select Class-</option>
					<option value='<?php echo $clid ;?>'><?php echo $listc;?></option>
				</select>&emsp;


				<input type="submit" value="Fetch Class" style="color:#000000;" class="btn btn-default"/>
                </form>
                </div>

                <br/>
                <?php echo $msg ; ?>
               	  <center> <?php echo $dl ; ?> </center>
