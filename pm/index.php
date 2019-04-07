<?php
include('config.php')
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>Communication Area</title>
		
	
    </head>
	
	
    <body>
	
    	<div class="header">
        	<a href="<?php echo $url_home; ?>"><img src="<?php echo $design; ?>/images/logo.png" alt="Members Area" height="200px" width="220px" style="border-radius:80px;"/></a>
	    </div>
		
		
        <div class="content">
<?php
//We display a welcome message, if the user is logged, we display it username
?>
<?php if(isset($_SESSION['username'])){echo ' <h2>'.htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8').'</h2>';} ?>
<h1><b>Welcome</b></h1><br/><br />
<a href="users.php" bgcolor="blue">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Click here to see list of users</a>.<br /><br /><br /><br/>
<?php
//If the user is logged, we display links to edit his infos, to see his pms and to log out
if(isset($_SESSION['username']))
{
//We count the number of new messages the user has
$nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
//The number of new messages is in the variable $nb_new_pm
$nb_new_pm = $nb_new_pm['nb_new_pm'];
//We display the links
?>
<a href="list_pm.php">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; My messages(<?php echo $nb_new_pm; ?> unread)</a><br />
<br /><br /><br /><a href="edit_infos.php"> Edit personal informations</a><br />
<br /><a href="connexion.php">Logout</a>
<?php
}
else
{
//Otherwise, we display a link to log in and to Sign up
?>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<i>Existing User:<i>&emsp;<a href="connexion.php">Log in</a><br /><br /><br />
<i>New User ?<i>&emsp; <a href="sign_up.php">Sign up</a><br />

<?php
}
?>

<script>
						
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
		
	
		
		</div>
		<br /><br /><br /><br /><br />
		<!-- <div class="foot"><a href="http://localhost/app">ECWA STAFF -Smart School &emsp;&emsp;<i>Designed by BROWT Technologies<i></a></div> -->
	</body>
</html>