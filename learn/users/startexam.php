<?php 
session_start();
error_reporting(0);
include('includes/config.php');
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

    <title>Safe Exam Portal | Exam </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link href="assets/css/table-responsive.css" rel="stylesheet">

    <script
  src="http://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  </head>

  <body>

  <section id="container" >
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>

      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Your Exam  </h3>
		  		
<div class="col-lg-12">
                        <div class="content-panel">
                           <h4> 
                          <?php 

$query=mysql_query("select count(*) from exam");

$row=mysql_fetch_array($query);
?>  
<ul class="nav nav-tabs" >

</ul>

<?php 

$query=mysql_query("select * from exam");
$i=1;
while($row=mysql_fetch_array($query)){
?>  
<?php
$id=$_GET[id];
//echo $id;

$query=mysql_query("SELECT * FROM question WHERE examid='$id'");
$cn=1;
while($row=mysql_fetch_array($query)){
$qu=$row['question'];
$ans_a=$row['optiona'];
$ans_b=$row['optionb'];
$ans_c=$row['optionc'];
$ans_d=$row['optiond'];
echo '<p><center>';echo $cn;
echo $qu;


echo "<p><center><input type='radio' name='answer1' value='a'/></center>";
echo $ans_a;
echo"</p>";
echo "<p><center><input type='radio' name='answer1' value='b'/></center>";
echo $ans_b;
echo"</p>";
echo "<p><center><input type='radio' name='answer1' value='c'/></center>";
echo $ans_c;
echo"</p>";
echo "<p><center><input type='radio' name='answer1' value='d'/></center>";
echo $ans_d;
echo "</center></p>";

?>

<br><?php
$cn++;
}


?>

</h4>
            <?php
}


            ?>
  
</div>


                        </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
		  	

		</section>
      </section><!-- /MAIN CONTENT -->
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
    

  </body>
</html>
<?php } ?>
