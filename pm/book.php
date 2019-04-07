<?php 
$spic="";
	if(isset($_POST['fn_1'])){
		$moreRows = true;
		$i = 1;
		
		while($moreRows){
			if(isset($_POST['fn_'.$i]) && ($_POST['fn_'.$i] != "")){
				
				$fn = $_POST['fn_'.$i];
				$bd = $_POST['bd_'.$i];
				$gd = $_POST['gd_'.$i];
				$hs = $_POST['hs_'.$i];
				$ad = $_POST['ad_'.$i];
				$ph = $_POST['ph_'.$i];
				$em = $_POST['em_'.$i];
				$pw = $_POST['pw_'.$i];
				$pn = $_POST['pn_'.$i];
				$ht = $_POST['ht_'.$i];
				$cl = $_POST['cl_'.$i];
				$sc = $_POST['sc_'.$i];
				$rn = $_POST['rn_'.$i];
				$lg = $_POST['lg_'.$i];
				//$spic = $_POST['spic_'.$i];
				
				$con = mysqli_connect("localhost","u0563804_rhimoni","G;]y-~5Zv^SK","u0563804_portal");
				$sql = "INSERT INTO student VALUES('','$fn','$bd','$gd','','$hs','$ad','$ph','$em','$pw','$pn','$ht','$cl','$sc','','$rn','$lg','','','','')";
				$query = mysqli_query($con,$sql);
				
				/*grab the just inserted id
				$nsid = mysqli_insert_id($con);
				$imgname = "$nsid.jpg";
				move_uploaded_file($_FILES['spic_'.$i]['tmp_name'],"uploads/student_image/$imgname");*/
				
				$i ++;
			}else{
				$moreRows = false;
				
			}
		}
		$i--;
		die("Operation successful!.<br>".$i." records added.<br><br><a href='../index.php?admin/dashboard'>Continue...</a> ");
		
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home </title>
		<script>
			var i = 1;
			function _(x){return document.getElementById(x);}
			function addRow(){
				i++;
				var newRow = document.createElement('div');
				newRow.innerHTML ='<br>'+i+'.&nbsp;&nbsp;&nbsp;<input type="text" name="fn_'+i+'" placeholder="Student name..."><input type="text" name="bd_'+i+'" placeholder="MM/DD/YYYY..."><input type="text" name="gd_'+i+'" placeholder="Gender..."><input type="text" name="hs_'+i+'" placeholder="House..."><input type="text" name="ad_'+i+'" placeholder="Address..."><input type="text" name="ph_'+i+'" placeholder="Phone No..."><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="em_'+i+'" placeholder="E-mail"><input type="text" name="pw_'+i+'" placeholder="Password..."><input type="text" name="pn_'+i+'" placeholder="Parent Name..."><input type="text" name="ht_'+i+'" placeholder="Home Town"><input type="text" name="cl_'+i+'" placeholder="Form No e.g. 5"><input type="text" name="sc_'+i+'" placeholder="Section"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="rn_'+i+'" placeholder="Reg Number"><input type="text" name="lg_'+i+'" placeholder="L.G.C">  &emsp;<input type="button" onclick="removeRow(this)" value="-" title="Remove this row">';
				_('fdata').appendChild(newRow);
				_('numrows').innerHTML = i;
			}
			function removeRow(x){
				_('fdata').removeChild(x.parentNode);
				i--;
				_('numrows').innerHTML = i;
			}
		</script>
	</head>
	<body bgcolor="#ccc">
		<div style="margin: 20px; padding: 20px;">
			<h2>Add Bulk Student &emsp;&emsp;<a href='index.php'>Back</a></h2>
			<form action="book.php" method="post" >
				&emsp;<input type="button" id="add_row()" onclick="addRow()" value="[+] Add New Row">
				 &emsp;<input type="submit" value="Submit">&emsp;&emsp; Rows: ( <span id="numrows">1</span> ) 
				<br><br><div id="fdata" style="width:95%; height: 70vh; overflow:auto;">
				1. &nbsp;&nbsp;<input type="text" name="fn_1" placeholder="Student name..."><input type="text" name="bd_1" placeholder="MM/DD/YYYY..."><input type="text" name="gd_1" placeholder="Gender...">
				<input type="text" name="hs_1" placeholder="House..."><input type="text" name="ad_1" placeholder="Address...">&nbsp;&nbsp;<input type="text" name="ph_1" placeholder="Phone No..."><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="em_1" placeholder="E-mail"><input type="text" name="pw_1" placeholder="Password..."><input type="text" name="pn_1" placeholder="Parent Name...">
				<input type="text" name="ht_1" placeholder="Home Town"><input type="text" name="cl_1" placeholder="Form No e.g. 5">&nbsp;&nbsp;<input type="text" name="sc_1" placeholder="Section"><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="rn_1" placeholder="Reg Number"><input type="text" name="lg_1" placeholder="L.G.C"> <!--<input  type="file" name="spic_1">-->
				<br></div>
				
			</form>
		</div>
	</body>
</html>