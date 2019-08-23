<?php
session_start();

include('includes/config.php');
$id=$_GET['id'];
if(strlen($_SESSION['login'])==0)
  {
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$status=1;
$studymeterial=$_FILES["compfile"]["name"];

move_uploaded_file($_FILES["compfile"]["tmp_name"],"file/".$_FILES["compfile"]["name"]);
$query=mysql_query("update addassignment set doccuname='$studymeterial',status='$status' where aid='$id'");


echo '<script> alert("Your Assignemnt has been successfully uploaded ")</script>';
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

    <title>Safe Exam Portal | Upload Assignement</title>

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
          	<h3><i class="fa fa-angle-right"></i> Upload Assignment</h3>

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">



  
                      <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data" >

 <?php


$sqli=mysql_query("SELECT * from addassignment where aid='$id'");

while ($rwi=mysql_fetch_array($sqli)) {  
  $prgname=$rwi[1];
  $subname=$rwi[2];
  $teachername=$rwi[3];
  $asname=$rwi[4];
}
?>


 <div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Programme Name</label>
<div class="col-sm-4">
<input type="text" name="progname" required="required" value="<?php echo "$prgname"; ?>" class="form-control" >
 </div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Subject Name</label>
<div class="col-sm-4">
<input type="text" name="subname" required="required" value="<?php echo "$subname"; ?>" class="form-control" > 
</div>
</div>

 <div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Teacher Name</label>
<div class="col-sm-4">
<input type="text" name="teachername" required="required" value="<?php echo "$teachername"; ?>" class="form-control" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Assignemnt  Name</label>
<div class="col-sm-4">
<input type="text" name="asname" required="required" value="<?php echo " $asname"; ?>" class="form-control" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Upload Assignment Doccument </label>
<div class="col-sm-6">
<input type="file" name="compfile" class="form-control" value="">
</div>
</div>

 <div class="form-group">
   <div class="col-sm-5" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary">Upload</button>
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
