<?php
//CONNECT TO THE HOST AND THE DATABASE
$con = mysqli_connect("localhost","u0563804_rhimoni","G;]y-~5Zv^SK","u0563804_portal") or die("Connection problem.");
$sn = 1;
$dl = "";
$msg ="";
if(isset($_POST['end']) && isset($_POST['begin'])){
	$end = $_POST['end'];
	$begin = $_POST['begin'];
$sqlin = "UPDATE termdate SET end='$end', begin='$begin'";
$queryin = mysqli_query($con, $sqlin);
	if($queryin){
		$msg = "<h3 style='color:green;'>Success!</h3>";
	}
}else{
	$msg = "<h3 style='color:red;'>Please complete the dates !</h3>";
}
?>
<form method="post">
Term End Date:&emsp; <input type="date" name="end" value=""><br/><br/>
Next Term Begins: <input type="date" name="begin" value=""><br/><br/>
<input type="submit" value="Save"><br/><br/>
<?php echo $msg;?>
</form>
