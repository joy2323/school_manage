



 <?php

 
      error_reporting(0);
      session_start();
      include_once 'oesdb.php';
/***************************** Step 1 : Case 1 ****************************/
 //redirect to registration page
      if(isset($_REQUEST['register']))
      {
            header('Location: register.php');
      }
      else if($_REQUEST['stdsubmit'])
      {
/***************************** Step 1 : Case 2 ****************************/
 //Perform Authentication
          $result=executeQuery("select *,DECODE(stdpassword,'oespass') as std from student where stdname='".htmlspecialchars($_REQUEST['name'],ENT_QUOTES)."' and stdpassword=ENCODE('".htmlspecialchars($_REQUEST['password'],ENT_QUOTES)."','oespass')");
          if(mysql_num_rows($result)>0)
          {

              $r=mysql_fetch_array($result);
              if(strcmp(htmlspecialchars_decode($r['std'],ENT_QUOTES),(htmlspecialchars($_REQUEST['password'],ENT_QUOTES)))==0)
              {
                  $_SESSION['stdname']=htmlspecialchars_decode($r['stdname'],ENT_QUOTES);
                  $_SESSION['stdid']=$r['stdid'];
                  unset($_GLOBALS['message']);
                  header('Location: stdwelcome.php');
              }else
          {
              $_GLOBALS['message']="Check Your user name and Password.";
          }

          }
          else
          {
              $_GLOBALS['message']="Check Your user name and Password.";
          }
          closedb();
      }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Rhimoni Academy</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="oes.css"/>
  </head>
  <body>
      <?php

        if($_GLOBALS['message'])
        {
         echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
      ?>
      
      <div id="container">
            
                <div class="header">
                <img style="margin:10px 2px 2px 10px;float:left;" height="80" width="200" src="images/logo.gif" alt="OES"/><h3 class="headtext"> &nbsp; Rhimoni Academy School e-test</h3><h4 style="color:#ffff00;text-align:center;margin:0 0 5px 5px;"><i>...Advancing knowledge through ICT</i></h4>
            </div>
     <form id="stdloginform" action="index.php" method="post">
      <div class="menubar">
       
       <ul id="menu">
                    <?php if(isset($_SESSION['stdname'])){
                          header('Location: stdwelcome.php');}else{  
                          /***************************** Step 2 ****************************/
                        ?>

                      <!--  <li><input type="submit" value="Register" name="register" class="subbtn" title="Register"/></li>-->
           <li><div class="aclass"><a href="register.php" title="Click here  to Register">New Registration</a></div></li>
                        <?php } ?>
                    </ul>

      </div>
      <div class="page">
              
              <table cellpadding="30" cellspacing="10">
              <tr>
                  <td>User Name</td>
                  <td><input type="text" tabindex="1" name="name" value="" size="16" /></td>

              </tr>
              <tr>
                  <td>Password</td>
                  <td><input type="password" tabindex="2" name="password" value="" size="16" /></td>
              </tr>

              <tr>
                  <td colspan="2">
                      <input type="submit" tabindex="3" value="Log In" name="stdsubmit" class="subbtn" />
                  </td><td></td>
              </tr>
            </table>


      </div>
       </form>

    <div id="footer">
          <!-- <p style="font-size:70%;color:#00a080;">By-<b>IBUKUNOLUWA ADESUNMIBO ~Supported by Browt Technologies(08024672263)</</b><br/> </p><p>for Al-BAYAN School</p> -->
      </div>
      </div>
  </body>
</html>