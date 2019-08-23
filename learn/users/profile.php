<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{

$studentname=$_POST['studentname'];
$email=$_POST['email'];
$phoneno=$_POST['phoneno'];
$query=mysql_query("update enrollstudent set studentname='$studentname',email='$email',phoneno='$phoneno' where username='".$_SESSION['login']."'");
if($query)
{
$successmsg="Profile Successfully !!";
}
else
{
$errormsg="Profile not updated !!";
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Safe Exam Portal | Update Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  
  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Updaing Profile info</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	
                  
 <?php 
 $query=mysql_query("select * from enrollstudent where username='".$_SESSION['login']."'");
 while($row=mysql_fetch_array($query)) 
 {
 ?>                     
 <form class="form-horizontal style-form" method="post" name="profile" >

  <h4 class="mb"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo htmlentities($row['studentname']);?>'s Profile</h4>
    
   
<label class="col-sm-2 col-sm-2 control-label">Full Name</label>
<div class="col-sm-4">
<input type="text" name="studentname" required="required" value="<?php echo htmlentities($row['studentname']);?>" class="form-control" >
 </div>
  
 <div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Departement Name </label>
 <div class="col-sm-4">
<input type="text" name="deptname" required="required" value="<?php echo htmlentities($row['deptname']);?>" class="form-control" readonly>
</div>
</div>


<label class="col-sm-2 col-sm-2 control-label">Programme Name</label>
 <div class="col-sm-4">
<input type="text" name="programme" required="required" value="<?php echo htmlentities($row['programname']);?>" class="form-control"  readonly>
</div>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Email Address </label>
<div class="col-sm-4">
<input type="text"  name="email" required="required" value="<?php echo htmlentities($row['email']);?>" class="form-control">
</div>
</div>

<label class="col-sm-2 col-sm-2 control-label">Phone Number</label>
 <div class="col-sm-4">
<input type="text" name="phoneno" required="required" value="<?php echo htmlentities($row['phoneno']);?>" class="form-control">
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Parent Email Address </label>
<div class="col-sm-4">
<input type="text" name="country" required="required" value="<?php echo htmlentities($row['parentemail']);?>" class="form-control" readonly>
</div>
</div>





<?php } ?>

                          <div class="form-group">
                           <div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</div>

                          </form>
                          </div>
                          </div>
                          </div>
                          
          	
          	
		</section>
      </section>
    <?php include("includes/footer.php");?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>
