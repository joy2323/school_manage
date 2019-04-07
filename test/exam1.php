<?php
//CONNECT TO THE HOST AND THE DATABASE
$con = mysqli_connect("localhost","root","","oes") or die("Connection problem.");
session_start();
include_once 'oesdb.php';
$final=false;
if(!isset($_SESSION['stdname'])) {
    $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
}

$title = "Student Portal";
//$student_image = "dimg.jpg";

/*if(!isset($_SESSION['student_id'])){
	header("location: login?red=exam");
	exit();
}*/

$student_id =$_SESSION['stdid'];
$student_name = $_SESSION['stdname'];
$test_id = $_SESSION['testid'];
$tqn = $_SESSION['tqn'];
$duration = $_SESSION['duration'];
$starttime = $_SESSION['starttime'];
$endtime = $_SESSION['endtime'];



?>

<?php 
	//EXAM SCRIPT
	$sql = "SELECT * FROM question WHERE testid='$test_id'";
	$query = mysqli_query($con,$sql);
	
	$totalRows = mysqli_num_rows($query);
	$numPP = 1;
	$last = ceil($totalRows/$numPP);
	
	//COURSE TITLE
	$sqlc = "SELECT * FROM test WHERE testid='$test_id'";
	$queryc = mysqli_query($con,$sqlc);
	$row = mysqli_fetch_assoc($queryc);
	$testname = $row['testname'];

		
?>

<!doctype html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<link href="styles/fontawesome/css/font-awesome.min.css" rel="stylesheet" media="screen"/>
		<link rel="stylesheet" type="text/css" href="oes.css"/>
		<style>
			#overlay {
				position: fixed;
				top: 0px;
				left: 0px;
				bottom: 0px;
				right: 0px;
				background: rgba(155,155,155, .1);
				z-index: 1000;
				display: none;
				transition: all .5s ease-in-out;
			}
			#note {
				background: #cfc;
				padding: 10px 0px;
				text-align: center;
				border: 1px solid #ccc;
				border-radius: 10px;
				box-shadow: 0px 0px 150px #000;
				width: 200px;
				margin: 200px auto;

			}
			#mnu {
				width: 200px;
				float: left;
				z-index: 10;
				box-shadow: 0px 0px 4px #666;
			}
			#mnu > a > div {
				padding: 12px 30px;
				border-top: 1px solid #ccc;
				background: #fafafa;
				transition: background 0.3s linear 0s;
			}
			#mnu > a > div:hover {
				background: #ccc;
			}
			a {
				text-decoration: none;
				color: #666;
			}
			a:hover {color: #000;}
		</style>
		
		<script>
		function _(x){ return document.getElementById(x);}
	 
		var sec = 1;
		var min = "<?php echo $duration; ?>";					 
		var timeOut;
		
		function tick(){
			/*if(min == 0 && sec == 0){
				stopTimer();
			}*/
			if (min == 0 && sec == 0) {window.location="http://www.albayanschools.com.ng/portal/test/testack.php";}
						
			sec = sec < 10 ? "0"+sec : sec;
			//min = min < 10 ? "0"+min : sec;
			_("timer").innerHTML = "0"+min+":"+sec;
			if(sec == 0){
				sec = 60;
				min--;
			}
			
			if(min < 2){
				_("timer").style.color="red";
			}
 			timeOut = setTimeout(function(){tick()},1000);
			sec--;
		}
		function stopTimer(){
			clearTimeout(timeOut);
		}
		
		window.addEventListener("load", function(){
			tick();
		});
		
		//make exam
		var totalRows = "<?php echo $totalRows; ?>";
		var last = "<?php echo $last; ?>";
		var numPP = "<?php echo $numPP; ?>";
		var testname = "<?php echo $testname; ?>";
		function renderExam(qn){
		
			
			var controls = _("controls");
			var controls1 = _("controls1");
			var qStatus = _("qStatus");
			//var testname = _("testname");
			var eHeader = _("examHeader");
			var eBody = _("exam-body");
			examHeader.innerHTML = testname;
			qStatus.innerHTML = "Question "+ qn +" of "+totalRows;
			eBody.innerHTML = '<div style="line-height: center; width: 100%; text-align: center; padding-top: 130px;"><i class="fa fa-spinner fa-spin fa-1x"></i> &nbsp;loading question...</div>';
			
			//ajax to call the question
			
			var ajx = new XMLHttpRequest();
			ajx.open("POST","eparser.php", true);
			ajx.setRequestHeader("content-type", "application/x-www-form-urlencoded");
			ajx.onreadystatechange = function(){
				if(ajx.readyState == 4 && ajx.status == 200){
					eBody.innerHTML = ajx.responseText;
				}
			};
			ajx.send('qn='+qn+'&last='+last);
			
			var subBtn
			subBtn='&emsp;<button type="submit" id="subBtn" title="Finish and out" onclick= window.location="http://www.albayanschools.com.ng/portal/test/testack.php";  >Final Submit</button>&emsp;';
			controls1.innerHTML=subBtn;
			
			
			var controlBtns = "";
			if(qn < 2){
				
				controlBtns = '&emsp;<button title="Go to next question" id="nextBtn" onclick="renderExam('+(++qn)+')">Submit/Next</button>&emsp;';
			}else 
			if(qn == totalRows){
				controlBtns = '<button title="Go to previous question" id="prevBtn" onclick="renderExam('+(qn-1)+')">Previous</button>&emsp;';
			}else {
			controlBtns = '<button title="Go to previous question" id="prevBtn" onclick="renderExam('+(qn-1)+')">Previous</button>&emsp;<button title="Go to next question" id="nextBtn" onclick="renderExam('+(++qn)+')">Submit/Next</button>&emsp;';
			}
			
			controls.innerHTML = controlBtns;
			
			
		}
		   //save exam in the system
		var stdid = "<?php echo $student_id; ?>";
		function submitExam(q){
			var qv = q.value;
			var qid = _('qid').value;
			
			var ajax = new XMLHttpRequest();
			ajax.open("POST","eparser.php",true);
			ajax.setRequestHeader("content-type","application/x-www-form-urlencoded");
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4 && ajax.status == 200){
					if(ajax.responseText == "success"){
						_("overlay").style.display = "block";
						setTimeout(function(){ _("overlay").style.display = "none"; }, 1000);
					}
				}
			};
			ajax.send("qv="+qv+"&qid="+qid+"&stdid="+stdid);	
		}

		</script>
		
	</head>
	<body>
	<div id="overlay"><div id="note">saved successfully!</div></div>
	<div id="container">
	<div class="header">
                <img style="margin:10px 2px 2px 10px;float:left;" height="60" width="200" src="images/logo.gif" alt="OES"/><h3 class="headtext"> &nbsp; Rhimoni Academy School e-test</h3><h4 style="color:#ffff00;text-align:center;margin:0 0 5px 5px;"><i>...Advancing knowledge through ICT</i></h4>
            </div>
		
		<!--<div id="mnu">
			<a href="index"><div><i class="fa fa-home"></i> Student Home</div></a>
			<a href="apply"><div><i class="fa fa-edit"></i> My Time Table</div></a>
			<a href="regcourses"><div><i class="fa fa-user"></i> Register Courses</div></a>
			<a href="login"><div><i class="fa fa-lock"></i> Take Exam</div></a>
			<a href="signout"><div><i class="fa fa-lock"></i> Logout</div></a>
		</div>-->
		<!--<div class="menubar" style="text-align:center;">
              <h2 style="font-family:helvetica,sans-serif;font-weight:bolder;font-size:120%;color:#f50000;padding-top:0.3em;letter-spacing:1px;">OES:Test Conducter</h2>
          </div>-->
		
		<div style="float:right; width: 120px; border:1px solid grey; margin: 30px;">
		
		<!--<img src="s/<?php echo $student_image; ?>" width="100%">-->
		</div>
			
			<div id="mutd" style="width: 200px; height: 200px; float: right; margin-top: 50px;position: relative;margin-right:-180px;" >
				<style>
				.mutd{
					width: 20px;
					height: 20px;
					border: 1px solid #999;
					float:left;
					margin:2px;
					padding: 5px;
					text-align: center;
					background: #efefef;
					cursor: pointer;
				}
				.mutd:hover{
					background: #ffaaaa;
				}
			</style>
			<script>
			
			
				for(var x=1; x<= totalRows; x++ ){
				var mutd = document.createElement('div');
				mutd.className = "mutd";
				mutd.innerHTML= x;
				mutd.addEventListener("click", function(){ renderExam(this.innerHTML) });
				document.getElementById('mutd').appendChild(mutd);
				}
			</script>
			</div>
		<div style="width:700px; border: 2px solid #ccc; margin: 30px auto;">
			<div id="exam-header">
				
				<h2 id="examHeader" style="color: #f0fff0;">
				PRACTICE EXAM
				</h2>
				<span id="qStatus" style="color: #f0fff0;">Question 3 of 10</span>&emsp;&emsp;&emsp; <span id="timer" style="font-family: segoe ui; color: #f0fff0; font-size: 18px;">Remaining Time: 00:05:33</span>
				<hr>
			</div>
			<div id="exam-body" style="padding: 20px; font-size: 14px; color: #f0fff0; min-height: 300px;">
				<h2 style="color:blue;">What is the meaning of HTML...?</h2>
				<form>
					A. <input type="radio" name="opt()" value=""> Hypertext Markup Language<br>
					B. <input type="radio" name="opt()" value=""> Hyperlink Markup Link<br>
					C. <input type="radio" name="opt()" value=""> High text Marking Language<br>
					D. <input type="radio" name="opt()" value=""> Hypertext Markup Link<br>
				</form>
				
			</div>
					
			<div id="controls" style="text-align:right; background: #eee; padding: 30px; border-top: 1px solid #666;">
				
				<button title="Go to previous question" id="prevBtn">&lt;</button>&emsp;
				<button title="Go to next question" id="nextBtn">&gt;</button>&emsp;
			</div>
			<div id="controls1">
				<button type="submit" id="subBtn" name="subbt" title="Finish and out">Final Submit</button>&emsp;
			</div>
		</div>
		<script>
			renderExam(1);
		</script>
	</body>
	     <div id="footer">
          <!-- <p style="font-size:70%;color:#00a080;"> Developed By-<b>Bread on Waters Technologies</b><br/> </p><p>for Al-BAYAN School</p> -->
      </div>
      </div>
</html>