<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!isset($_SESSION['uid'])){
  header("location:teacherhome.php");
}
$uname=$_SESSION['etid'];
$tot=$_SESSION['totno'];

$sqli=mysql_query("SELECT * from enrollteacher where etid='$uname'");

while ($rwi=mysql_fetch_array($sqli)) {  
  $uname=$rwi[3];
}
//echo $uname;

$sqla=mysql_query("SELECT * FROM exam ORDER BY eid DESC LIMIT 1;");

while ($rw=mysql_fetch_array($sqla)) {  
  $title=$rw[1];
  }
//echo $title;

if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
$title=$title;
$teachername=$uname;
$uid=$_SESSION['uid'];
for($i=1;$i<=$tot;$i++){
$question=$_POST[$i.'question'];
$optiona=$_POST[$i.'answera'];
$optionb=$_POST[$i.'answerb'];
$optionc=$_POST[$i.'answerc'];
$optiond=$_POST[$i.'answerd'];
$trueanswer=$_POST[$i.'crtanswer']; 

$query=mysql_query("insert into question(examid,teachername,question,optiona,optionb,optionc,optiond,trueanswer) values('$uid','$teachername', '$question','$optiona','$optionb','$optionc','$optiond','$trueanswer')") or die(err());
}
unset($_SESSION['uid']);

echo '<script> alert("Subject has successfully assigned to Student")</script>';
header("location:teacherhome.php");
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

    <title>Safe Exam Portal | Exam Question </title>

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
          	<h3><i class="fa fa-angle-right"></i> Exam Details</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
 
              <div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />

 <div class="col-md-3"></div><div class="col-md-6">   
 

 <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data" >


<fieldset>
<div style="height: 360px;overflow-y: scroll;overflow-x: hidden; margin-bottom: 12px;  ">
<?php
for($i=1;$i<=$tot;$i++){
  ?>
<b>Question number   <?php echo $i; ?> :</b><br /> <!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" ></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="<?php echo $i; ?>question" class="form-control" placeholder="Write question number <?php echo $i; ?>  here..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <div class="col-md-3">
  <input id="'.$i.'1" name="<?php echo $i; ?>answera" placeholder="Enter option a" class="form-control input-md" type="text">
    
  </div>
  <div class="col-md-3">
  <input id="'.$i.'2" name="<?php echo $i; ?>answerb" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
  <div class="col-md-3">
  <input id="'.$i.'3" name="<?php echo $i; ?>answerc" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
  <div class="col-md-3">
  <input id="'.$i.'4" name="<?php echo $i; ?>answerd" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
</div>

<b>Correct answer</b>:<br />
<select id="crtanswer" name="<?php echo $i; ?>crtanswer" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question <?php echo $i; ?></option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br /> 

  
  <div class="form-group">
 
</div>

  <?php
}

?>
</div>
  <div class="col-sm-10" style=" ">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>

</div>
 
</fieldset>
</form>

   

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
