<?php
	$con = mysqli_connect("localhost","u0563804_rhimoni","G;]y-~5Zv^SK","u0563804_portal");
$sn = 0;
$dl = "";
$termavg=0;
$posn=0;
$name="";
$admNo="";
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
if(isset($_POST['cls']))
{
	//create local variable for the form data
	$clss = $_POST['cls'];
	$tem = $_POST['term'];
	$ses = $_POST['session'];
}

if($tem == 'select'  || $ses == 'select')
{

	$msg= '<h3 style="float:center; color:red;">Invalid Selections. Make sure you select all fields</h3>';

}

else
{
	//calculate total subject results for one student in a term
	$sqlso = "SELECT DISTINCT student_id FROM broad_sheet WHERE class_id='$clss' && session='$ses' && term='$tem' ";
	$queryso = mysqli_query($con, $sqlso);
	$countso = mysqli_num_rows($queryso);
	    while($rows=mysqli_fetch_array($querys))
			{
					$totsc=$rows['total'];
					$scr_add+=$totsc;

	        }
	$sql11 = "UPDATE broader_sheet SET term_avg='$scr_add' WHERE student_id='$stso' && class_id='$clss' && term_id='$tem' && session='$ses'";
    $query11 = mysqli_query($con, $sql11);

	$sqls = "SELECT DISTINCT student_id FROM broad_sheet WHERE class_id='$clss' && session='$ses' && term='$tem' ";
	$querys = mysqli_query($con, $sqls);
	$counts = mysqli_num_rows($querys);
	echo $counts;
	if($counts > 0)
	{
		if ($clss>3)
		{

			$dl = '
			('.$counts.') students Names are displayed.<br>
			<span onclick="window.print()" style="cursor:pointer; color: blue;">Print this Result</span><hr><br>
			<style>td{width: 10px;}</style>
			<center>
			<table width="100%" border="3" cellspacing="1" cellpadding="2">
			<tr bgcolor="#1921e2">
				<tr>
					<th><div>SN</div></th>
					<th><div> Student Name</div></th>
					<th><div> Adm No</div></th>
					<th><div> Total Average</div></th>
					<th><div> Position</div></th>
					<th colspan="4"><div> AGRICULTURAL SCIENCE</div></th>
					<th colspan="4"><div> C.R.K</div></th>
					<th colspan="4"><div> COMPUTER</div></th>
					<th colspan="4"><div> ENGLISH LANGUAGE</div></th>
					<th colspan="4"><div> ENGLISH LITERATURE </div></th>
					<th colspan="4"><div> MATHEMATICS</div></th>
					 <th colspan="4"><div> CIVIL EDUCATION</div></th>
					<th colspan="4"><div> BIOLOGY</div></th>
					 <th colspan="4"><div> ECONOMICS</div></th>
					<th colspan="4"><div> GEOGRAPHY</div></th>
					<th colspan="4"><div> CHEMISTRY</div></th>
					 <th colspan="4"><div> FURTHER MATHEMATICS</div></th>
					 <th colspan="4"><div> PHYSICS </div></th>
					 <th colspan="4"><div> ANIMAL HUSBANDRY</div></th>
					 <th colspan="4"><div> GOVERNMENT</div></th>
					 <th colspan="4"><div> FOOD AND NUTRITION</div></th>
					 <th colspan="4"><div> TECHNICAL DRAWING</div></th>
					  <th colspan="4"><div> BRICK LAYING $ CONCRETING</div></th>
					<th colspan="4"><div> MARKETING</div></th>
					 <th colspan="4"><div> PRINCIPLES OF ACCOUNTING </div></th>
					 <th colspan="4"><div> CATERING TRADE</div></th>
					<th colspan="4"><div> COMMERCE</div></th>
					  <th colspan="4"><div> HISTORY</div></th>
					<th colspan="4"><div> VISUAL ARTS</div></th>
					<th colspan="4"><div> FRENCH</div></th>
				</tr>
			</tr></center>';
			while($rows=mysqli_fetch_array($querys))
			{
					++$sn;
					$stdidn=$rows['student_id'];
					$scr=array();
		if($tem>=1){


					$sqls1 = "SELECT * FROM broad_sheet WHERE student_id='$stdidn' && session='$ses' && term=1";
					$querys1 = mysqli_query($con, $sqls1);
					for($i=0;$i<=99;$i++)
						{
							$scr[$i]=0;
						}
					while($rows1=mysqli_fetch_array($querys1))
					{

						$subj_id=$rows1[5];
						echo $subj_id;

						if ($subj_id==1)
						{
							$scr[0]=$rows1['total'];
							$scr[3]=$rows1['average'];


						}
						elseif ($subj_id==5)
						{
							$scr[4]=$rows1['total'];
							$scr[7]=$rows1['average'];
						}
						elseif ($subj_id==7)
						{
							$scr[8]=$rows1['total'];
							$scr[11]=$rows1['average'];

						}
						elseif ($subj_id==9)
						{
							$scr[12]=$rows1['total'];
							$scr[15]=$rows1['average'];
						}
						elseif ($subj_id==10)
						{
							$scr[16]=$rows1['total'];
							$scr[19]=$rows1['average'];

						}
						elseif ($subj_id==12)
						{
							$scr[20]=$rows1['total'];
							$scr[23]=$rows1['average'];
						}
						elseif ($subj_id==6)
						{
							$scr[24]=$rows1['total'];
							$scr[27]=$rows1['average'];

						}
						elseif ($subj_id==16)
						{
							$scr[28]=$rows1['total'];
							$scr[31]=$rows1['average'];
						}
						elseif ($subj_id==17)
						{
							$scr[32]=$rows1['total'];
							$scr[35]=$rows1['average'];

						}
						elseif ($subj_id==18)
						{
							$scr[36]=$rows1['total'];
							$scr[39]=$rows1['average'];
						}
						elseif ($subj_id==19)
						{
							$scr[40]=$rows1['total'];
							$scr[43]=$rows1['average'];

						}
						elseif ($subj_id==20)
						{
							$scr[44]=$rows1['total'];
							$scr[47]=$rows1['average'];
						}
						elseif ($subj_id==21)
						{
							$scr[48]=$rows1['total'];
							$scr[51]=$rows1['average'];

						}
						elseif ($subj_id==22)
						{
							$scr[52]=$rows1['total'];
							$scr[55]=$rows1['average'];
						}
						elseif ($subj_id==23)
						{
							$scr[56]=$rows1['total'];
							$scr[59]=$rows1['average'];
						}
						elseif ($subj_id==24)
						{
							$scr[60]=$rows1['total'];
							$scr[63]=$rows1['average'];

						}
						elseif ($subj_id==25)
						{
							$scr[64]=$rows1['total'];
							$scr[67]=$rows1['average'];
						}
						elseif ($subj_id==26)
						{
							$scr[68]=$rows1['total'];
							$scr[71]=$rows1['average'];
						}
						elseif ($subj_id==27)
						{
							$scr[72]=$rows1['total'];
							$scr[75]=$rows1['average'];

						}
						elseif ($subj_id==28)
						{
							$scr[76]=$rows1['total'];
							$scr[79]=$rows1['average'];
						}
						elseif ($subj_id==29)
						{
							$scr[80]=$rows1['total'];
							$scr[83]=$rows1['average'];
						}
						elseif ($subj_id==30)
						{
							$scr[84]=$rows1['total'];
							$scr[87]=$rows1['average'];

						}
						elseif ($subj_id==31)
						{
							$scr[88]=$rows1['total'];
							$scr[91]=$rows1['average'];
						}
						elseif ($subj_id==32)
						{
							$scr[92]=$rows1['total'];
							$scr[95]=$rows1['average'];
						}
						elseif ($subj_id==33)
						{
							$scr[96]=$rows1['total'];
							$scr[99]=$rows1['average'];

						}



					}

					//retrieve the student's name and adm no

				}

					if($tem>=2)

				{
					$sqls1 = "SELECT * FROM broad_sheet WHERE student_id='$stdidn' && session='$ses' && term=2";
					$querys1 = mysqli_query($con, $sqls1);

					while($rows1=mysqli_fetch_array($querys1))
					{

						$subj_id=$rows1[5];
						echo $subj_id;

						if ($subj_id==1)
						{
							$scr[1]=$rows1['total'];
							$scr[3]=$rows1['average'];


						}
						elseif ($subj_id==5)
						{
							$scr[5]=$rows1['total'];
							$scr[7]=$rows1['average'];
						}
						elseif ($subj_id==7)
						{
							$scr[9]=$rows1['total'];
							$scr[11]=$rows1['average'];

						}
						elseif ($subj_id==9)
						{
							$scr[13]=$rows1['total'];
							$scr[15]=$rows1['average'];
						}
						elseif ($subj_id==10)
						{
							$scr[17]=$rows1['total'];
							$scr[19]=$rows1['average'];

						}
						elseif ($subj_id==12)
						{
							$scr[21]=$rows1['total'];
							$scr[23]=$rows1['average'];
						}
						elseif ($subj_id==6)
						{
							$scr[25]=$rows1['total'];
							$scr[27]=$rows1['average'];

						}
						elseif ($subj_id==16)
						{
							$scr[29]=$rows1['total'];
							$scr[31]=$rows1['average'];
						}
						elseif ($subj_id==17)
						{
							$scr[33]=$rows1['total'];
							$scr[35]=$rows1['average'];

						}
						elseif ($subj_id==18)
						{
							$scr[37]=$rows1['total'];
							$scr[39]=$rows1['average'];
						}
						elseif ($subj_id==19)
						{
							$scr[41]=$rows1['total'];
							$scr[43]=$rows1['average'];

						}
						elseif ($subj_id==20)
						{
							$scr[45]=$rows1['total'];
							$scr[47]=$rows1['average'];
						}
						elseif ($subj_id==21)
						{
							$scr[49]=$rows1['total'];
							$scr[51]=$rows1['average'];

						}
						elseif ($subj_id==22)
						{
							$scr[53]=$rows1['total'];
							$scr[55]=$rows1['average'];
						}
						elseif ($subj_id==23)
						{
							$scr[57]=$rows1['total'];
							$scr[59]=$rows1['average'];
						}
						elseif ($subj_id==24)
						{
							$scr[61]=$rows1['total'];
							$scr[63]=$rows1['average'];

						}
						elseif ($subj_id==25)
						{
							$scr[65]=$rows1['total'];
							$scr[67]=$rows1['average'];
						}
						elseif ($subj_id==26)
						{
							$scr[69]=$rows1['total'];
							$scr[71]=$rows1['average'];
						}
						elseif ($subj_id==27)
						{
							$scr[73]=$rows1['total'];
							$scr[75]=$rows1['average'];

						}
						elseif ($subj_id==28)
						{
							$scr[77]=$rows1['total'];
							$scr[79]=$rows1['average'];
						}
						elseif ($subj_id==29)
						{
							$scr[81]=$rows1['total'];
							$scr[83]=$rows1['average'];
						}
						elseif ($subj_id==30)
						{
							$scr[85]=$rows1['total'];
							$scr[87]=$rows1['average'];

						}
						elseif ($subj_id==31)
						{
							$scr[89]=$rows1['total'];
							$scr[91]=$rows1['average'];
						}
						elseif ($subj_id==32)
						{
							$scr[93]=$rows1['total'];
							$scr[95]=$rows1['average'];
						}
						elseif ($subj_id==33)
						{
							$scr[97]=$rows1['total'];
							$scr[99]=$rows1['average'];

						}



					}

				}

				if($tem>=3)

				{
					$sqls1 = "SELECT * FROM broad_sheet WHERE student_id='$stdidn' && session='$ses' && term=3";
					$querys1 = mysqli_query($con, $sqls1);

					while($rows1=mysqli_fetch_array($querys1))
					{

						$subj_id=$rows1[5];
						echo $subj_id;

						if ($subj_id==1)
						{
							$scr[2]=$rows1['total'];
							$scr[3]=$rows1['average'];


						}
						elseif ($subj_id==5)
						{
							$scr[6]=$rows1['total'];
							$scr[7]=$rows1['average'];
						}
						elseif ($subj_id==7)
						{
							$scr[10]=$rows1['total'];
							$scr[11]=$rows1['average'];

						}
						elseif ($subj_id==9)
						{
							$scr[14]=$rows1['total'];
							$scr[15]=$rows1['average'];
						}
						elseif ($subj_id==10)
						{
							$scr[18]=$rows1['total'];
							$scr[19]=$rows1['average'];

						}
						elseif ($subj_id==12)
						{
							$scr[22]=$rows1['total'];
							$scr[23]=$rows1['average'];
						}
						elseif ($subj_id==6)
						{
							$scr[26]=$rows1['total'];
							$scr[27]=$rows1['average'];

						}
						elseif ($subj_id==16)
						{
							$scr[30]=$rows1['total'];
							$scr[31]=$rows1['average'];
						}
						elseif ($subj_id==17)
						{
							$scr[34]=$rows1['total'];
							$scr[35]=$rows1['average'];

						}
						elseif ($subj_id==18)
						{
							$scr[38]=$rows1['total'];
							$scr[39]=$rows1['average'];
						}
						elseif ($subj_id==19)
						{
							$scr[42]=$rows1['total'];
							$scr[43]=$rows1['average'];

						}
						elseif ($subj_id==20)
						{
							$scr[46]=$rows1['total'];
							$scr[47]=$rows1['average'];
						}
						elseif ($subj_id==21)
						{
							$scr[50]=$rows1['total'];
							$scr[51]=$rows1['average'];

						}
						elseif ($subj_id==22)
						{
							$scr[54]=$rows1['total'];
							$scr[55]=$rows1['average'];
						}
						elseif ($subj_id==23)
						{
							$scr[58]=$rows1['total'];
							$scr[59]=$rows1['average'];
						}
						elseif ($subj_id==24)
						{
							$scr[62]=$rows1['total'];
							$scr[63]=$rows1['average'];

						}
						elseif ($subj_id==25)
						{
							$scr[66]=$rows1['total'];
							$scr[67]=$rows1['average'];
						}
						elseif ($subj_id==26)
						{
							$scr[70]=$rows1['total'];
							$scr[71]=$rows1['average'];
						}
						elseif ($subj_id==27)
						{
							$scr[74]=$rows1['total'];
							$scr[75]=$rows1['average'];

						}
						elseif ($subj_id==28)
						{
							$scr[78]=$rows1['total'];
							$scr[79]=$rows1['average'];
						}
						elseif ($subj_id==29)
						{
							$scr[82]=$rows1['total'];
							$scr[83]=$rows1['average'];
						}
						elseif ($subj_id==30)
						{
							$scr[86]=$rows1['total'];
							$scr[87]=$rows1['average'];

						}
						elseif ($subj_id==31)
						{
							$scr[90]=$rows1['total'];
							$scr[91]=$rows1['average'];
						}
						elseif ($subj_id==32)
						{
							$scr[94]=$rows1['total'];
							$scr[95]=$rows1['average'];
						}
						elseif ($subj_id==33)
						{
							$scr[98]=$rows1['total'];
							$scr[99]=$rows1['average'];

						}



					}

				}


				//retrieve the student's name and adm no
					$sqlsname = "SELECT * FROM student WHERE student_id='$stdidn'";
					$querysname= mysqli_query($con, $sqlsname);
					while($rowname=mysqli_fetch_array($querysname))
					{
						$name=$rowname['name'];
						$admNo=$rowname['roll'];

					}
					$termavgn=0;
					for ($num=1;$num<=$tem;$num++)
					{
						$sqlsposn = "SELECT * FROM broader_sheet WHERE student_id='$stdidn' && session='$ses' && term_id='$num'";
						$querysposn= mysqli_query($con, $sqlsposn);
						while($rowposn=mysqli_fetch_array($querysposn))
						{
							$termavg1=$rowposn['term_avg'];
							$posn=$rowposn['term_position'];
							$termavgn=$termavgn+$termavg1;
						}

					}
					$termavg=$termavgn/$tem;
					$dl.='<tr><td>'.$sn.'</td><td>'.$name.'</td><td>'.$admNo.'</td><td>'.$termavg.'</td><td>'.$posn.'</td>';
					for ($i=0;$i<=99;$i++)
					{
						$dl.='<td>'.$scr[$i].'</td>';
					}

					$dl.='</tr>';


			}

		}
		else
		{
			$dl = '
			('.$counts.') students Names are displayed.<br>
			<span onclick="window.print()" style="cursor:pointer; color: blue;">Print this Result</span><hr><br>
			<style>td{width: 10px;}</style>
			<center>
			<table width="100%" border="3" cellspacing="1" cellpadding="2">
				<tr bgcolor="#1921e2">
					<tr>
						<th><div>SN</div></th>
						 <th><div> Student Name</div></th>
						 <th><div> Adm No</div></th>
						<th><div> Total Average</div></th>
						 <th><div> Position</div></th>
						 <th colspan="4"><div> AGRICULTURAL SCIENCE</div></th>
                         <th colspan="4"><div> BASIC SCIENCE</div></th>
                         <th colspan="4"><div> BASIC TECHNOLOGY</div></th>
                          <th colspan="4"><div> BUSINESS STUDIES</div></th>
                          <th colspan="4"><div> C.R.K</div></th>
                          <th colspan="4"><div> CIVIL EDUCATION</div></th>
                          <th colspan="4"><div> COMPUTER</div></th>
                           <th colspan="4"><div> CREATIVE ARTS</div></th>
                           <th colspan="4"><div> ENGLISH LANGUAGE</div></th>
							<th colspan="4"><div> ENGLISH LITERATURE </div></th>
                           <th colspan="4"><div> HOME ECONOMICS</div></th>
                          <th colspan="4"><div> MATHEMATICS</div></th>
                          <th colspan="4"><div> MUSIC</div></th>
                          <th colspan="4"><div> PHYSICAL EDUCATION</div></th>
                         <th colspan="4"><div> SOCIAL STUDIES </div></th>
					</tr>
				</tr>
			</center>	';



		}


	}


}

?>

<style>td{
	width: 20px;
	text-align:center;
}</style>



				<h3>Select the relevant information</h3>
                <br>

               <div  style="float:left; border: 3px ; height:50px;">
                <form method="post" action="index.php?admin/tabulation_sheet">

                <!--<select name="sub">
					<option value="select">-Select Subject-</option>
					<option value='<?php echo $subid;?>'><?php echo $list;?></option>
				</select>&emsp;-->


				<select name="cls">
					<option value="select">-Class-</option>
					<option value='<?php echo $clid;?>'><?php echo $listc;?></option>
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

				<input type="submit" value="Start Result" style="color:#000000;">
                <form>
                </div>

                <br><br><br>
               	<?php echo $msg; ?>

               <center> <?php echo $dl; ?> </center>
