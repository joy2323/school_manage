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
				$sql = "INSERT INTO student VALUES('','$fn','$bd','$gd','','$hs','$ad','$ph','$em','','$pn','$ht','$cl','$sc','','$rn','$lg','','$pw','','')";
				$query = mysqli_query($con,$sql);
				
				/*grab the just inserted id
				$nsid = mysqli_insert_id($con);
				$imgname = "$nsid.jpg";
				move_uploaded_file($_FILES['spic_'.$i]['tmp_name'],"student_image/$imgname");*/
				
				$i ++;
			}else{
				$moreRows = false;
				
			}
		}
		$i--;
		die("Operation successful!.<br>".$i." records added.<br><br><a href='index.php'>Continue...</a> ");
		
	}
?>

<script>
			var i = 1;
			function _(x){return document.getElementById(x);}
			function addRow(){
				i++;
				var newRow = document.createElement('div');
				newRow.innerHTML ='<br>'+i+'.&nbsp;&nbsp;&nbsp;<input type="text" name="fn_'+i+'" placeholder="Student name..."><input type="text" name="bd_'+i+'" placeholder="MM/DD/YYYY..."><input type="text" name="gd_'+i+'" placeholder="Gender..."><input type="text" name="hs_'+i+'" placeholder="House..."><input type="text" name="ad_'+i+'" placeholder="Address..."><input type="text" name="ph_'+i+'" placeholder="Phone No..."><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="em_'+i+'" placeholder="E-mail"><input type="text" name="pw_'+i+'" placeholder="State..."><input type="text" name="pn_'+i+'" placeholder="Parent Name..."><input type="text" name="ht_'+i+'" placeholder="Home Town"><input type="text" name="cl_'+i+'" placeholder="Form No e.g. 5"><input type="text" name="sc_'+i+'" placeholder="Section"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="rn_'+i+'" placeholder="Reg Number"><input type="text" name="lg_'+i+'" placeholder="L.G.C">  &emsp;<input type="button" onclick="removeRow(this)" value="-" title="Remove this row"><hr>';
				_('fdata').appendChild(newRow);
				_('numrows').innerHTML = i;
			}
			function removeRow(x){
				_('fdata').removeChild(x.parentNode);
				i--;
				_('numrows').innerHTML = i;
			}
			
			/*function toggleBox(x,y){
				var x = document.getElementById(x);
				var arw = document.getElementById(y);
				if(x.style.height == 130+"px"){
					x.style.height = 0+"px";
					x.innerHTML = '';
				}else{
					
					x.style.height = 130+"px";
					//x.innerHTML = '<select name="course"><?php echo $list; ?></select>';
				}
			}*/
			
			function toggle(e){
				var e = document.getElementById(e);
				
				if(e.style.width == 210+"px"){
					e.style.width =120+"px";
					
				}else{
					
					e.style.width = 210+"px";
					
				}
			}
			
		</script>
		
		
		
		
		<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register New Students</title>
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
            padding: 10px;
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
		<span><a href="../"> <h3 style="color:green;">Back to Function Panel</h3></a></span> &emsp;&emsp;
            <span class="sorry-text">Register New Students</span>

        </div>
        <section class="additional-info">
            <div class="container">
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
                                <img src="test.png" height="100" width="90" alt="student"/>
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
      		
		<div id="cont" style="margin: 20px; padding: 20px;">
			<h2>Add Bulk Students</h2>
			<form action="bulk.php" method="post" >
				&emsp;<input type="button" id="add_row()" onclick="addRow()" value="[+] Add New Row">
				 &emsp;<input type="submit" value="Submit">&emsp;&emsp; Rows: ( <span id="numrows">1</span> ) 
				<br><br><div id="fdata" style="width:95%; height: 70vh; overflow:auto;">
				1. &nbsp;&nbsp;<input type="text" name="fn_1" placeholder="Student name..."><input type="text" name="bd_1" placeholder="MM/DD/YYYY..."><input type="text" name="gd_1" placeholder="Gender...">
				<input type="text" name="hs_1" placeholder="House..."><input type="text" name="ad_1" placeholder="Address...">&nbsp;&nbsp;<input type="text" name="ph_1" placeholder="Phone No..."><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="em_1" placeholder="E-mail"><input type="text" name="pw_1" placeholder="State..."><input type="text" name="pn_1" placeholder="Parent Name...">
				<input type="text" name="ht_1" placeholder="Home Town"><input type="text" name="cl_1" placeholder="Form No e.g. 5">&nbsp;&nbsp;<input type="text" name="sc_1" placeholder="Section"><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="rn_1" placeholder="Reg Number"><input type="text" name="lg_1" placeholder="L.G.C"> <!--<input  type="file" name="spic_1">-->
				<br><hr></div>
				
			</form>
		</div>
	</body>
	 <footer>
            <div class="container">
                    <hr/>
                    <img src="bt.jpg" height="50" alt="Designed by, Bread on Waters Technologies" />
                    <div class="copyright">Copyright © "2016" Browt Technologies.</div>
               
            </div>
        </footer>
</html>