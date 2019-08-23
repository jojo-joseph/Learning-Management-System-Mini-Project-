<?php
session_start();
error_reporting(0);
include('includes/config.php');
function err()
{
  ?><script> alert('The Course is Already Entered');
location.assign("addnewcourse.php")
  </script><?php
}
if(strlen($_SESSION['login'])==0)
  {
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$programname=$_POST['prgname'];
$subjectname=$_POST['Subjectname'];
$teachername=$_POST['teachername'];
$totmarks=$_POST['totmarks'];
$coursename=$_POST['coursename'];
$fdate=$_POST['fdate'];
$status=0;
$query=mysql_query("insert into addassignment(programname,subjectname,teachername,asname,finaldate,status,totmarks) values('$programname','$subjectname','$teachername','$coursename ','$fdate','$status','$totmarks')") or die(err());
echo '<script> alert("Your Assignment has been successfully added")</script>';
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

    <title>Safe Exam Portal | Add New Assignment</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script>
function getCat(val) {
  //alert('val');

  $.ajax({
  type: "POST",
  url: "getsubcat.php",
  data:'catid='+val,
  success: function(data){
    $("#subcategory").html(data);

  }
  });
  }
  </script>

  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Add New Assignment</h3>

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">


                      <?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>

                      <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data" >


 <?php
$uname=$_SESSION['etid'];

$sqli=mysql_query("SELECT * from enrollteacher where etid='$uname'");

while ($rwi=mysql_fetch_array($sqli)) {  
  $pname=$rwi[3];
}
?>

  <div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Select Programme</label>
<div class="col-sm-4">
<select name="prgname" class="form-control" onChange="getCat(this.value);" required="">
<option>Select Programme</option>
<?php 
$sql=mysql_query("select * from assignprogramms where teachername='$pname'");
while ($rw=mysql_fetch_array($sql)) {
  ?>
  <option><?php echo $rw[2];?></option>
<?php
}
?>
</select>
 </div>	
 </div>


 <div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Select Subject</label>
<div class="col-sm-4">
<select name="Subjectname" class="form-control" onChange="getCat(this.value);" required="">
<option>Select Subject</option>
<?php 
//$pro=$_POST['prgname'];
$sql=mysql_query("select * from assigntsubject where teachername='$pname' ");
while ($rw=mysql_fetch_array($sql)) {
  ?>
  <option><?php echo $rw[1];?></option>
<?php
}
?>
</select>
 </div>	
 </div>

 <div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Teacher Name</label>
<div class="col-sm-4">

  <?php
$uname=$_SESSION['etid'];

$sqli=mysql_query("SELECT * from enrollteacher where etid='$uname'");

while ($rwi=mysql_fetch_array($sqli)) {  
  $uname=$rwi[3];
}
?>
<input type="text" name="teachername" required="required" value="<?php echo "$uname"; ?>" required="" class="form-control">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Total Marks</label>
<div class="col-sm-4">

<input type="text" name="totmarks" required="required" value="" required="" class="form-control"></div><br/>
</div>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Assignment Name</label>
<div class="col-sm-4">

<input type="text" name="coursename" required="required" value="" required="" class="form-control"></div><br/>
</div>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label"> Final date Of Submission</label>
<div class="col-sm-4">

<input type="text" name="fdate" required="required" value="" required="" class="form-control"></div><br/>
</div>
   <div class="form-group">
                           <div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</div>

                          </form>
                         	



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
