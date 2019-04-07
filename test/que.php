<?php

	$con = mysqli_connect("localhost","root","","oes") or die("Connection problem.");
	if (isset($_POST['un']))
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
	}
	
?>

<html>
<form action="#" method="post">

<input type="text" name="un" placeholder="username"><br/>
<input type="text" name="pw" placeholder="password">
<input type="submit" name="sub" >
</form>
</html>