<?php
session_start();
//CONNECT TO THE HOST AND THE DATABASE
$con = mysqli_connect("localhost","u0563804_rhimoni","G;]y-~5Zv^SK","u0563804_portal");
$msg = "";
$end ="";
$t ="teacher";
$url = $_SERVER['REQUEST_URI']; 
	$tmp = explode('/', $url);
	$end = end($tmp);

//SERIAL AND PIN PROCESSING MECHANISM
if(isset($_POST['sr'])){
	//create local variable for the form data
	$sr = $_POST['sr'];
	$pn = $_POST['pn'];
	$en = $_POST['end'];



	$sql1 = "SELECT * FROM student WHERE student_id='$en'";
	$query1 = mysqli_query($con, $sql1);
	while($rowst1 = mysqli_fetch_array($query1))
	{
		$emal=$rowst1['email'];
				
		
	}
	//form validation
	if(!$sr || !$pn){
		$msg = "You must fill all form data. <a href='#'>Try again</a>";
	}else{


		//check to make sure that the serial and pin exist in the system.
		$sql = "SELECT * FROM pins WHERE serial='$sr' AND pin='$pn' AND is_used<30";
		$query = mysqli_query($con, $sql);
		$count = mysqli_num_rows($query);
		if($count == 0){
			$msg = "That card was either used UP or the serial or pin is incorrect. <a href='#'>Try again</a>";
		}else{
			$row = mysqli_fetch_array($query);
			$pid = $row['id'];
			$used = $row['is_used'];
			$use=$used+1;
			$emal =$row['by_who'];

	if ($used==0) {
		$sql = "UPDATE pins SET is_used='$use', by_who='$t', date_used=now() WHERE id='$pid'";
			$quer = mysqli_query($con, $sql);
			
			if($quer){
				//redirect the user to the signup page
				header("location: ../../index.php?teacher/student_marksheet/$en ");
					exit();
				}else{
				
			$msg = "That card was either used or the serial or pin is incorrect. <a href='#'>Try again</a>";
			}
			
	}elseif ($used>0 && $emal=="$t" ) {
		
			$sql = "UPDATE pins SET is_used='$use', by_who='$t', date_used=now() WHERE id='$pid'";
			$quer = mysqli_query($con, $sql);
			
			if($quer){
				//redirect the user to the signup page
				header("location: ../../index.php?teacher/student_marksheet/$en ");
					exit();
				
			}else{
				
			$msg = "That card was either used or the serial or pin is incorrect. <a href='#'>Try again</a>";
			}
			
		}else{
			$msg = "<h3 style='color:red;'>That card is already being used by another user, please report any form of card theft to the School admin. </h3><a href='../result.php/$en'>Try again</a><br/>";
			//header("location:../result.php/$en ");
		}




			
		}

	}
    
}
?>
<!doctype html>
<html>
	<head>
		<title>result</title>
	</head>
	<body bgcolor=#212429>
	<div style="background-color:#606368; height:300px;">
	<br><br><br><br><center><img src="../../uploads/logo.png"  style="max-height:60px; padding-left: 20px ;" />
	<h1 style="color:#ebeef4;">Welcome to Result Manager</h1></center>
		</div>
		<center><div style="color:#ebeef4;">
			<br ><h3>Please supply the serial no. and the pin</h3>
			<?php echo $msg; ?>

			<form method="post" action="#">
				&emsp;&emsp;&emsp;SN:&emsp;<input type="text" name="sr" placeholder="Serial No..."><br><br>
				Password:&emsp;<input type="password" name="pn" placeholder="Pin..."><br><br>
				<input type="hidden" name="end" value= '<?php echo $end ; ?>'> <br>
				<input type="submit" value="Submit"><br><br>
			</form>
		</div></center>
	</body>
</html>