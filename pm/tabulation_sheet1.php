<?php
	$con = mysqli_connect("localhost","u0563804_rhimoni","G;]y-~5Zv^SK","u0563804_portal");
$sn = 0;
$dl = "";
$termavg=0;
$posn=0;
$name="";
$admNo="";
$clss = "";
$tem = "";
$ses = "";
$msg = "";
$stsection="";
$hide="";
$sect="";





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
	
	$hide="hidden";

	//create local variable for the form data	
	$clss = $_POST['cls'];
	$tem = $_POST['term'];
	$ses = $_POST['session'];
	$sect= $_POST['section'];
	
	// retrieves each students total scores in all subjects
	// from the broad sheet table
	
		$sqlSubj="SELECT DISTINCT student_id FROM broader_sheet WHERE  class_id='$clss' && term_id='$tem' && session='$ses' && section_id='$sect'";
		$querySubj=mysqli_query($con,$sqlSubj);
		
		//echo count($querySubj);
		while($rowSubj=mysqli_fetch_array($querySubj))
		{
			$totalScr=0;
			$student_subjid=$rowSubj['student_id'];
			$sqlScr="SELECT * FROM broad_sheet WHERE  student_id='$student_subjid' && class_id='$clss' && term='$tem' && session='$ses' ";
			$queryScr=mysqli_query($con,$sqlScr);
				while($rowScr=mysqli_fetch_array($queryScr))
				{
					$total_subjid=$rowScr['total'];
					$totalScr += $total_subjid;
				}
				
			/*$sqlstt="SELECT * FROM student WHERE  student_id='$student_subjid' && class_id='$clss' ";
			$querystt=mysqli_query($con,$sqlstt);
			while($rowstt=mysqli_fetch_array($querystt)){
			$stsection=$rowstt['section_id'];
			}*/
			
				//updating broader_sheet term averGE
			$sqlUpdateScr = "UPDATE broader_sheet SET term_avg='$totalScr', section_id='$stsection' WHERE student_id='$student_subjid' && class_id='$clss' && term_id='$tem' && session='$ses' ";
			$queryUpdateScr = mysqli_query($con, $sqlUpdateScr);
	
			//$total_subjid=$rowSubj['total'];
		
			
		}
		
		
	//finding position for the tabulation sheet on the broader_sheet table
					//for ($i=1; $i<=25; $i++){
		$queryPosni="SELECT * FROM broader_sheet WHERE  class_id='$clss' && term_id='$tem' && session='$ses' && section_id='$sect' ORDER BY term_avg DESC";
		
		$queryPosnini=mysqli_query($con,$queryPosni);
		$posn=1;
		$position=1;
		$totalScrPrv=0;
		$coun=0;
		while($rowPosni=mysqli_fetch_array($queryPosnini))
		{
			if ($totalScrPrv==$rowPosni['term_avg'])
			{
				$position=$position;
				
			}
			else
			{
				//$posn=$posn+$count;
				$position=$posn+$coun;
			} 
			$coun=$coun+1;
			$totalScrPrv=$rowPosni['term_avg'];
			
			//$position=$posn;
			$termn=$rowPosni['term_id'];
			$sessn=$rowPosni['session'];
			$classidn=$rowPosni['class_id'];
			$std_idn=$rowPosni['student_id'];
			
			
			$sqlposnii = "UPDATE broader_sheet SET term_position='$position' WHERE student_id='$std_idn' && session='$sessn' && term_id='$termn' && class_id='$classidn' ";
			$queryposii= mysqli_query($con, $sqlposnii);
		
		}
	//}
}
if($tem == 'select'  || $ses == 'select' || $sect == 'select')
{

	$msg= '<h3 style="float:center; color:red;">Invalid Selections. Make sure you select all fields</h3>';

}

else
{
	$sqls = "SELECT DISTINCT student_id FROM broader_sheet WHERE class_id='$clss' && session='$ses' && term_id='$tem' && section_id='$sect'";
	$querys = mysqli_query($con, $sqls);
	$counts = mysqli_num_rows($querys);
	//echo $counts;
	if($counts > 0)	
	{
		if ($clss>3)
		{
			
			$dl = '
			<center>('.$counts.') students.</center><br/>
			<style>td{width: 10px;}</style>
			<center>												
			<table width="100%" border="3" cellspacing="1" cellpadding="2">
			<tr bgcolor="#1921e2">
				<tr>
					<th><div>SN</div></th>
					<th><div> Student Name</div></th>
					<th><div> Adm No</div></th>
					<th colspan="4"><div> AGRICULTURAL SCIENCE</div></th>                                                                        
					<th colspan="4"><div> I.R.K</div></th>
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
					 <th colspan="4"><div> FINANCIAL ACCOUNTING </div></th>
					 <th colspan="4"><div> CATERING TRADE</div></th>
					<th colspan="4"><div> COMMERCE</div></th> 
					  <th colspan="4"><div> HISTORY</div></th> 
					<th colspan="4"><div> FISHERY</div></th> 
					<th colspan="4"><div> QURAN</div></th> 
					<th colspan="4"><div> ARABIC</div></th> 
				</tr>
			</tr></center>';		
			
			
			while($rows=mysqli_fetch_array($querys))
			{
					++$sn;
					$stdidn=$rows['student_id'];
					$scr=array();
					if($tem>=1)
				
				{
					$sqls1 = "SELECT * FROM broad_sheet WHERE student_id='$stdidn' && session='$ses' && term=1";
					$querys1 = mysqli_query($con, $sqls1);
					for($i=0;$i<=103;$i++)
						{	
							$scr[$i]=0;
						}
					while($rows1=mysqli_fetch_array($querys1))
					{
						
						$subj_id=$rows1[5];
						//echo $subj_id;
						
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
							elseif ($subj_id==8)
						{
							$scr[100]=$rows1['total'];
							$scr[103]=$rows1['average'];
							
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
						//echo $subj_id;
						
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
								elseif ($subj_id==8)
						{
							$scr[101]=$rows1['total'];
							$scr[103]=$rows1['average'];
							
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
						//echo $subj_id;
						
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
							elseif ($subj_id==8)
						{
							$scr[102]=$rows1['total'];
							$scr[103]=$rows1['average'];
							
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
					$dl.='<tr><td>'.$sn.'</td><td>'.$name.'</td><td>'.$admNo.'</td>';
					for ($i=0;$i<=103;$i++)
					{
						$dl.='<td>'.$scr[$i].'</td>';
					}
					
					$dl.='</tr>';
							
					
			}				

		}
		else
		{
			$dl = '
			<center>('.$counts.') students.</center>
			
			<style>td{width: 10px;}</style>
			<center>												
			<table width="100%" border="3" cellspacing="1" cellpadding="2">
				<tr bgcolor="#1921e2">
					<tr>
						<th><div>SN</div></th>
						 <th><div> Student Name</div></th>
						 <th><div> Adm No</div></th>
						 <th colspan="4"><div> AGRICULTURAL SCIENCE</div></th>
                         <th colspan="4"><div> BASIC SCIENCE</div></th>
                         <th colspan="4"><div> BASIC TECHNOLOGY</div></th>
                          <th colspan="4"><div> BUSINESS STUDIES</div></th>
                          <th colspan="4"><div> I.R.K</div></th>
                          <th colspan="4"><div> CIVIL EDUCATION</div></th>
                          <th colspan="4"><div> COMPUTER</div></th>
                           <th colspan="4"><div> ARABIC</div></th>
                           <th colspan="4"><div> ENGLISH LANGUAGE</div></th>
							<th colspan="4"><div> ENGLISH LITERATURE </div></th>
                           <th colspan="4"><div> HOME ECONOMICS</div></th>
                          <th colspan="4"><div> MATHEMATICS</div></th>
                          <th colspan="4"><div> HAUSA</div></th>
                          <th colspan="4"><div> PHYSICAL EDUCATION</div></th>
                         <th colspan="4"><div> SOCIAL STUDIES </div></th>
				<th colspan="4"><div> QURAN </div></th>  						                            
					</tr>
				</tr>
			</center>	';	
			
			
		while($rows=mysqli_fetch_array($querys))
			{
					++$sn;
					$stdidn=$rows['student_id'];
					$scr=array();
					if($tem>=1)
				
				{
					$sqls1 = "SELECT * FROM broad_sheet WHERE student_id='$stdidn' && session='$ses' && term=1";
					$querys1 = mysqli_query($con, $sqls1);
					for($i=0;$i<=63;$i++)
						{	
							$scr[$i]=0;
						}
					while($rows1=mysqli_fetch_array($querys1))
					{
						
						$subj_id=$rows1[5];
						//echo $subj_id;
						
						if ($subj_id==1)
						{
							$scr[0]=$rows1['total'];
							$scr[3]=$rows1['average'];
							
							
						}
						elseif ($subj_id==2)
						{
							$scr[4]=$rows1['total'];
							$scr[7]=$rows1['average'];
						}
						elseif ($subj_id==3)
						{
							$scr[8]=$rows1['total'];
							$scr[11]=$rows1['average'];
							
						}
						elseif ($subj_id==4)
						{
							$scr[12]=$rows1['total'];
							$scr[15]=$rows1['average'];
						}
						elseif ($subj_id==5)
						{
							$scr[16]=$rows1['total'];
							$scr[19]=$rows1['average'];
							
						}
						elseif ($subj_id==6)
						{
							$scr[20]=$rows1['total'];
							$scr[23]=$rows1['average'];
							
						}
						elseif ($subj_id==7)
						{
							$scr[24]=$rows1['total'];
							$scr[27]=$rows1['average'];
						}
						elseif ($subj_id==8)
						{
							$scr[28]=$rows1['total'];
							$scr[31]=$rows1['average'];
						}
						elseif ($subj_id==9)
						{
							$scr[32]=$rows1['total'];
							$scr[35]=$rows1['average'];
							
						}
						elseif ($subj_id==10)
						{
							$scr[36]=$rows1['total'];
							$scr[39]=$rows1['average'];
						}
						elseif ($subj_id==11)
						{
							$scr[40]=$rows1['total'];
							$scr[43]=$rows1['average'];
							
						}
						elseif ($subj_id==12)
						{
							$scr[44]=$rows1['total'];
							$scr[47]=$rows1['average'];
						}
						elseif ($subj_id==13)
						{
							$scr[48]=$rows1['total'];
							$scr[51]=$rows1['average'];
						}
						elseif ($subj_id==14)
						{
							$scr[52]=$rows1['total'];
							$scr[55]=$rows1['average'];
							
						}
						elseif ($subj_id==15)
						{
							$scr[56]=$rows1['total'];
							$scr[59]=$rows1['average'];
						}
							elseif ($subj_id==33)
						{
							$scr[60]=$rows1['total'];
							$scr[63]=$rows1['average'];
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
						//echo $subj_id;
						
						if ($subj_id==1)
						{
							$scr[1]=$rows1['total'];
							$scr[3]=$rows1['average'];
							
							
						}
						elseif ($subj_id==2)
						{
							$scr[5]=$rows1['total'];
							$scr[7]=$rows1['average'];
						}
						elseif ($subj_id==3)
						{
							$scr[9]=$rows1['total'];
							$scr[11]=$rows1['average'];
							
						}
						elseif ($subj_id==4)
						{
							$scr[13]=$rows1['total'];
							$scr[15]=$rows1['average'];
						}
						elseif ($subj_id==5)
						{
							$scr[17]=$rows1['total'];
							$scr[19]=$rows1['average'];
							
						}
						elseif ($subj_id==6)
						{
							$scr[21]=$rows1['total'];
							$scr[23]=$rows1['average'];
						}
						elseif ($subj_id==7)
						{
							$scr[25]=$rows1['total'];
							$scr[27]=$rows1['average'];
							
						}
						elseif ($subj_id==8)
						{
							$scr[29]=$rows1['total'];
							$scr[31]=$rows1['average'];
						}
						elseif ($subj_id==9)
						{
							$scr[33]=$rows1['total'];
							$scr[35]=$rows1['average'];
							
						}
						elseif ($subj_id==10)
						{
							$scr[37]=$rows1['total'];
							$scr[39]=$rows1['average'];
						}
						elseif ($subj_id==11)
						{
							$scr[41]=$rows1['total'];
							$scr[43]=$rows1['average'];
							
						}
						elseif ($subj_id==12)
						{
							$scr[45]=$rows1['total'];
							$scr[47]=$rows1['average'];
						}
						elseif ($subj_id==13)
						{
							$scr[49]=$rows1['total'];
							$scr[51]=$rows1['average'];
							
						}
						elseif ($subj_id==14)
						{
							$scr[53]=$rows1['total'];
							$scr[55]=$rows1['average'];
						}
						elseif ($subj_id==15)
						{
							$scr[57]=$rows1['total'];
							$scr[59]=$rows1['average'];
						}
								elseif ($subj_id==33)
						{
							$scr[61]=$rows1['total'];
							$scr[63]=$rows1['average'];
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
						//echo $subj_id;
						
						if ($subj_id==1)
						{
							$scr[2]=$rows1['total'];
							$scr[3]=$rows1['average'];
							
							
						}
						elseif ($subj_id==2)
						{
							$scr[6]=$rows1['total'];
							$scr[7]=$rows1['average'];
						}
						elseif ($subj_id==3)
						{
							$scr[10]=$rows1['total'];
							$scr[11]=$rows1['average'];
							
						}
						elseif ($subj_id==4)
						{
							$scr[14]=$rows1['total'];
							$scr[15]=$rows1['average'];
						}
						elseif ($subj_id==5)
						{
							$scr[18]=$rows1['total'];
							$scr[19]=$rows1['average'];
							
						}
						elseif ($subj_id==6)
						{
							$scr[22]=$rows1['total'];
							$scr[23]=$rows1['average'];
						}
						elseif ($subj_id==7)
						{
							$scr[26]=$rows1['total'];
							$scr[27]=$rows1['average'];
							
						}
						elseif ($subj_id==8)
						{
							$scr[30]=$rows1['total'];
							$scr[31]=$rows1['average'];
						}
						elseif ($subj_id==9)
						{
							$scr[34]=$rows1['total'];
							$scr[35]=$rows1['average'];
							
						}
						elseif ($subj_id==10)
						{
							$scr[38]=$rows1['total'];
							$scr[39]=$rows1['average'];
						}
						elseif ($subj_id==11)
						{
							$scr[42]=$rows1['total'];
							$scr[43]=$rows1['average'];
							
						}
						elseif ($subj_id==12)
						{
							$scr[46]=$rows1['total'];
							$scr[47]=$rows1['average'];
						}
						elseif ($subj_id==13)
						{
							$scr[50]=$rows1['total'];
							$scr[51]=$rows1['average'];
							
						}
						elseif ($subj_id==14)
						{
							$scr[54]=$rows1['total'];
							$scr[55]=$rows1['average'];
						}
						elseif ($subj_id==15)
						{
							$scr[58]=$rows1['total'];
							$scr[59]=$rows1['average'];
						}
							
								elseif ($subj_id==33)
						{
							$scr[62]=$rows1['total'];
							$scr[63]=$rows1['average'];
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
					$dl.='<tr><td>'.$sn.'</td><td>'.$name.'</td><td>'.$admNo.'</td>';
					for ($i=0;$i<=63;$i++)
					{
						$dl.='<td>'.$scr[$i].'</td>';
					}
					
					$dl.='</tr>';
							
					
			}

				$dl.='</table>';										
		}
		
		
	}else{
		$msg= '<h3 style="float:center; color:red;">No Result Yet</h3>';
	}
	
	//echo $dl;
}

?>




<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broadsheet</title>
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            background-color: #ffffff;
            line-height: 1.428571429;
            color: #2F3230;
            padding: 0;
            margin: 0;
        }
		td{
		width: 20px;
		text-align:center;
		}
        section, footer {
            display: block;
            padding: 0;
            margin: 0;
        }
        .container {
            margin-left: auto;
            margin-right: auto;
            padding: 0 5px;
        }
        .sorry-text {
            font-size: 500%;
            color: #CCCCCC;
        }

        .additional-info {
            background-repeat: no-repeat;
            background-color: #293A4A;
            color: #FFFFFF;
        }
        .additional-info a {
            color: #FFFFFF;
        }
        .additional-info-items {
            padding: 20px 0;
            min-height: 350px;
        }
        .contact-info {
            margin-bottom: 20px;
            font-size: 16px;
        }
        .contact-info a {
            text-decoration: underline;
            color: #428BCA;
        }
        .contact-info a:hover,
        .contact-info a:focus,
        .contact-info a:active {
            color: #2A6496;
        }
        .reason-text {
            margin: 20px 0;
            font-size: 16px;
        }
        ul {
            display: inline-block;
            list-style: none outside none;
            margin: 0;
            padding: 0;
        }
        ul li {
            float: left;
            text-align: center;
			margin-left: 70px;
        }
        .additional-info-items ul li {
            width: 100%;
        }
        .heading-text {
            font-weight: bold;
            display: block;
            text-align: left;
			font-size: 26px;
        }
        .description {
            text-align: left;

        }
        .info-image {
            padding: 20px;
        }

        footer {
            text-align: center;
            margin: 60px 0;
        }

        footer a {
            text-decoration: none;
        }

        .copyright {
            font-size: 10px;
            color: #3F4143;
        }

        @media (min-width: 768px) {
            .additional-info {
                background-image: none;
            }
            .additional-info-items {
                padding: 20px;
            }
            .container {
                width: 90%;
            }
            .additional-info-items ul li {
                width: 20%;
                padding: 20px;
            }
            .reason-text {
                font-size: 18px;
            }
            .contact-info {
                font-size: 18px;
            }
        }
        @media (min-width: 992px) {
            .additional-info {
                background-image: url('/img-sys/error-bg-left.png');
            }
            .container {
                width: 70%;
            }
            .sorry-text {
                font-size: 300%;
            }
			h3{
				float: left;
			}
        }
    </style>
    </head>
    <body>
        <div class="container">
           <span ><a href="../"> <h3 style="color:green;">Back to Function Panel</h3></a></span> &emsp;&emsp;<span class="sorry-text">Broadsheet</span>

        </div>
        <section class="additional-info" >
            <div class="container" <?php echo $hide; ?>>
                <div class="additional-info-items">
                    <ul>
                        <li>
                           <a href="bulk.php"> <div class="info-image">
                              <img src="user.jpg" height="100" width="90" alt="student"/>
                            </div>
                            <span class="heading-text">
                                Register New Student.
                            </span>
						   </a>
                            <div class="description">
                               You can register all students using this link, make sure you have a complete bio-data.
                            </div>
                        </li>
                        <li>
                            <a href="marks.php"><div class="info-image">
                                <img src="test.png" height="100" width="110" alt="student"/>
                            </div>
                            <span class="heading-text">
                                Compute results.
                            </span>
							</a>
                            <div class="description">
                                 All you need to do is input various Class Assignments, Tests and Examination result, the application does the computation, grading, positions and lot more.
                            </div>
                        </li>

						<li>
                            <a href="tabulation_sheet.php"><div class="info-image">
                                <img src="edit.png" height="100" width="90" alt="student"/>
                            </div>
                            <span class="heading-text">
                                Broadsheet.
                            </span>
							</a>
                            <div class="description">
                                This will give you a comprehensive termly break-down of class by class academic performance with the total average.
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>




				<h3 <?php echo $hide; ?>>Select the relevant information</h3>
                <br>

               <div  style="float:left; border: 3px ; height:50px;">
                <form method="post" action="#" <?php echo $hide; ?>>
                	
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
									
				</select>&emsp;
				<select name="section">
					<option value="select">-Select Section</option>
					<option value="1">JSS1 A</option>
					<option value="2">JSS1 B</option>
					<option value="3">JSS1 C</option>
					<option value="5">JSS2 A</option>
					<option value="6">JSS2 B</option>
					<option value="7">JSS2 C</option>
					<option value="9">JSS3 A</option>
					<option value="10">JSS3 B</option>
					<option value="11">JSS3 C</option>
					<option value="13">SS1 SCIENCE</option>
					<option value="14">SS1 HUMANITY</option>
					<option value="15">SS2 SCIENCE</option>
					<option value="16">SS2 HUMANITY</option>
					<option value="17">SS3 SCIENCE</option>
					<option value="18">SS3 HUMANITY</option>
									
				</select>&emsp;
								
				<input type="submit" value="Start Result" style="color:#000000;">
                </form>
                </div>

                <br/><br/><br/>
               	<?php echo $msg; ?> 			
                <?php echo $dl; ?>
<span onclick="window.print()" style="cursor:pointer; color: blue;">Print this Result</span>				
</body>
		   
            

       <footer>
            <div class="container">
               <hr/>
                    <img src="bt.jpg" height="50" alt="Designed by, Bread on Waters Technologies" />
                    <div class="copyright">Copyright © "2016" Browt Technologies.</div>
					
               
            </div>
        </footer>
</html>	