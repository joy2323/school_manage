<?php

$con = mysqli_connect("localhost","u0563804_rhimoni","G;]y-~5Zv^SK","u0563804_portal");
/*	if (isset($_POST['un']))
	{
		$un= $_POST['un'];
		$pw= $_POST['pw'];
		
	$sql1 = "INSERT INTO adminlogin (admname,admpassword) VALUES ('$un','$pw',)";
	$query1 = mysqli_query($con, $sql1);
	
if($query1){
	echo "Done";
}else{
	echo "Try Again";
}
	}*/
	
	//INSERT StTodb
/*	$sqls = "SELECT * FROM input1 ";
	$querys = mysqli_query($con, $sqls);
	
	while($rows = mysqli_fetch_array($querys)){
	$tname = $rows['name'];
	$sqlino = "INSERT INTO student VALUES('','$tname','','','','','','','','','','','6','18','','','','','','','')";
				
	
	//$sqlino= "INSERT INTO student SET name="tname" ";
	$queryino = mysqli_query($con, $sqlino);
	}*/
	if($queryino){
	echo "Done";
}else{
	echo "Try Again";
}
?>

<html>
<form action="#" method="post">

<input type="text" name="un" placeholder="username"><br/>
<input type="text" name="pw" placeholder="password">
<input type="submit" name="sub" >
</form>
</html>