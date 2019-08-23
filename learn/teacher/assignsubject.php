<script>
	function whichTeacher() {
		var element = document.getElementById("teacher");
		var selectedValue = element.options[element.selectedIndex].text;
		document.cookie = "curntTeacher=" + selectedValue;
	}
</script>

<?php
session_start();
error_reporting(0);
include('includes/config.php');
function err()
{
  ?><script> alert('The Subject is Already Entered');
location.assign("assignsubject.php")
  </script><?php
}
if(strlen($_SESSION['login'])==0)
  {
header('location:index.php');
}
else{


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Safe Exam Portal | Assign Subject</title>

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
          	<h3><i class="fa fa-angle-right"></i> Assign Subject</h3>

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

                      <div class="form-group">
     <?php
$uname=$_SESSION['etid'];

$sqli=mysql_query("SELECT * from enrollteacher where etid='$uname'");

while ($rwi=mysql_fetch_array($sqli)) {  
  $tname=$rwi[3];
}
?>
<label class="col-sm-2 col-sm-2 control-label">Select Subject</label>
<div class="col-sm-4">
<select id="teacher" name="enrollcoursename" required="required" class="form-control" onchange="whichTeacher()">
<option>Select Subject</option>
<?php 
$sql=mysql_query("select * from assigntsubject where teachername='$tname'");
while ($rw=mysql_fetch_array($sql)) {
  ?>
  <option name="Teachername" value=""><?php echo htmlentities($rw['subjectname']);?>
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
                      <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  
                                  <th>Student Name</th>
                                  <th>Programme Name</th>
                                  
                                  <th>Assign Subject </th>
                              </tr>
                              </thead>
                              <tbody>

 
  <?php 
 
  $query=mysql_query("select * from enrollstudent");
while($row=mysql_fetch_array($query))
{
  ?>
                              <tr>
                                  <td align="center">
                                  <?php echo htmlentities($row[3]);?></td>
                                  <td align="center"><?php echo htmlentities($row[5]);?></td>
                                  
          <td align="center">
          <div style="width: 100px; height: 30px; background-color: #0ea283; border-radius: 8px; "> 
	<a style="color: white;padding-left: 18px; padding-top: 20px" href="./assign.php?id=<?php $cookie_Value='curntTeacher'; echo $_COOKIE[$cookie_Value].':+'.$row['studentname'] ?>">Select</a></div>

                                   </td>
                                </tr>
                              <?php } ?>
                            
                              </tbody>
                          </table>


 
  
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
