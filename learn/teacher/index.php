<?php
session_start();
error_reporting(0);
include("includes/config.php");
if(isset($_POST['submit']))
{
//echo $_POST['uemail'];
$ret=mysql_query("SELECT * FROM enrollteacher WHERE username='".$_POST['uemail']."' AND  Password='".$_POST['password']."'");
// $var_value=
// $_SESSION['varname'] = $var_value;
while($num=mysql_fetch_array($ret)) {

	if($num>0)
	{
		$name=$num['teachername'];
	//$extra="teacherhome.php?$name";
	$_SESSION['login']=$_POST['uemail'];
	$_SESSION['etid']=$num['etid'];
	
	$id=$num['etid'];
	$host=$_SERVER['HTTP_HOST'];
	$uip=$_SERVER['REMOTE_ADDR'];
	$status=1;
	$log=mysql_query("insert into teacherlog(username,status) values('".$_SESSION['login']."','$status')");
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');

	header("location:http://localhost/learn/teacher/teacherhome.php?$id");

//	header("location:http://$host$uri/teacherhome.php?$name");
	exit();
	}
	else
	{
	$_SESSION['login']=$_POST['username'];	
	$uip=$_SERVER['REMOTE_ADDR'];
	$status=0;
	mysql_query("insert into teacherlog(username,status) values('".$_SESSION['login']."','$status')");
	$errormsg="Invalid username or password";
	//$extra="login.php";
	
	}
	
	}
}



// if(isset($_POST['change']))
// {
//    $uemail=$_POST['uemail'];
//     $contactno=$_POST['contactno'];
//     $password=md5($_POST['password']);
// $query=mysql_query("SELECT * FROM university WHERE uemail='$uemail' and contactno='$contactno'");
// $num=mysql_fetch_array($query);
// if($num>0)
// {
// mysql_query("update university set password='$password' WHERE uemail='$uemail' and contactno='$contactno' ");
// $msg="Password Changed Successfully";

// }
// else
// {
// $errormsg="Invalid email id or Contact no";
// }
//}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Safe Exam Portal | Teacher Login</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
<script type="text/javascript">
function valid()
{
 if(document.forgot.password.value!= document.forgot.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.forgot.confirmpassword.focus();
return false;
}
return true;
}
</script>
  </head>

  <body>

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" name="login" method="post">
		        <h2 class="form-login-heading">sign in now</h2>
		        <p style="padding-left:4%; padding-top:2%;  color:red">
		        	<?php if($errormsg){
echo htmlentities($errormsg);
		        		}?></p>

		        		<p style="padding-left:4%; padding-top:2%;  color:green">
		        	<?php if($msg){
echo htmlentities($msg);
		        		}?></p>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name="uemail" placeholder="Teacher UserName"  required autofocus>
		            <br>
		            <input type="password" class="form-control" name="password" required placeholder="Password">
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
		
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" name="submit" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            <hr>
		           </form>
		            
		
		        </div>
		
		          <!-- Modal -->
		           <form class="form-login" name="forgot" method="post">
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your details below to reset your password.</p>
<input type="email" name="uemail" placeholder="Email" autocomplete="off" class="form-control" required><br >
<input type="text" name="contactno" placeholder="contact No" autocomplete="off" class="form-control" required><br>
 <input type="password" class="form-control" placeholder="New Password" id="password" name="password"  required ><br />
<input type="password" class="form-control unicase-form-control text-input" placeholder="Confirm Password" id="confirmpassword" name="confirmpassword" required >

		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="submit" name="change" onclick="return valid();">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		          </form>
		
		      	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
