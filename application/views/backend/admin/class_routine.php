<?php
$con = mysqli_connect("localhost","u0563804_rhimoni","G;]y-~5Zv^SK","u0563804_portal") or die("Connection problem.");
$dl=""; 
$sqlsub = "SELECT * FROM subject ";
$querysub = mysqli_query($con, $sqlsub);
$count = mysqli_num_rows($querysub);
		if($count > 0){
			$list_sub = '<option value=""></option>';

			while($row = mysqli_fetch_assoc($querysub)){
				$subname = $row['name'];
				$subid = $row['subject_id'];
				$list_sub .= '<option value="'.$subid.'">'.$subname.'</option>';
			}
		}
	$sqlteacher = "SELECT * FROM teacher ";
$queryteacher = mysqli_query($con, $sqlteacher);
$count = mysqli_num_rows($queryteacher);
		if($count > 0){
			$list_teacher = '<option value=""></option>';

			while($row = mysqli_fetch_assoc($queryteacher)){
				$teachername = $row['name'];
				$teacherid = $row['teacher_id'];
				$list_teacher .= '<option value="'.$teachername.'">'.$teachername.'</option>';
			}

		}
		$dl='<form method="post" action="#">
	<select name="days">
					<option value="select">-Select Day-</option>
					<option value="monday">Monday</option>
					<option value="tuesday">Tuesday</option>
					<option value="wednesday">Wednesday</option>
					<option value="thursday">Thursday</option>
					<option value="friday">Friday</option>
	</select> </br>
	<table table width=100px border="2" cellspacing="1" cellpadding="2">
		<tr width=100px><td> </td><td>8:20-9:05</td><td>9:05-9:50</td><td>9:50-10:35</td><td>10:35-11:20</td>
		<td>11:20-11:45</td><td>11:45-12:30</td><td>12:30-1:15</td><td>1:15-2:00</td></tr>
		';
		$class=array("JSS1","JSS2","JSS3","SSS1","SSS2","SSS3");
		for ($i=1;$i<=6;$i++)
		{
		$dl.='<tr><td>'.$class[$i-1].'</td><td> <select name="sub1[]" style="width:170px;"><option value="'. $subid . '">'.$list_sub.'</option></select>
							<select name="teacher1[]"><option value="'. $teachername .'">'. $list_teacher.'</option></select>

				</td><td><select name="sub2[]" style="width:170px;"><option value="'.$subid.'">'.$list_sub.'</option></select>
							<select name="teacher2[]"><option value="'.$teachername.'">'.$list_teacher.'</option></select>

				</td><td><select name="sub3[]" style="width:170px;"><option value="'.$subid.'">'.$list_sub.'</option></select>
							<select name="teacher3[]"><option value="'.$teachername.'">'.$list_teacher.'</option></select>

				</td><td><select name="sub4[]" style="width:170px;"><option value="'.$subid.'">.'.$list_sub.'</option></select>
							<select name="teacher4[]"><option value="'.$teachername.'">'.$list_teacher.'</option></select>

				</td><td>BREAK</td>
				<td><select name="sub5[]" style="width:170px;"><option value="'.$subid.'">'.$list_sub.'</option></select>
							<select name="teacher5[]"><option value="'.$teachername.'">'. $list_teacher.'</option></select>

				</td><td><select name="sub6[]" style="width:170px;"><option value="'.$subid.'">'.$list_sub.'</option></select>
							<select name="teacher6[]"><option value="'.$teachername.'">'.$list_teacher.'</option></select>

				</td><td><select name="sub7[]" style="width:170px;"><option value="'.$subid.'">'.$list_sub.'</option></select>
							<select name="teacher7[]"><option value="'.$teachername.'">'.$list_teacher.'</option></select>

				</td></tr>';
		}
				$dl.='</table><br/></br>

	<input type="submit" value="Save" style="color:green;">
</form>';
echo $dl;


if (isset($_POST['days']))
{
	/*for($i=0;$i<=6;$i++)
	{
		if(t)

	}*/
	$day=$_POST['days'];
	if($day!="select")
	{
		$temp="";
		$count=0;
		while (list($arr1_key, $text_field) = each($_POST["teacher1"]))
		{
			while (list($arr2_key, $text_field1) = each($_POST["teacher1"]))
			{
				if($text_field1==$text_field)
				{
					echo $text_field." already has a duty";
				}


			}
		}
	}
}
?>
