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

    <title>Safe Exam Portal | Upload Video List </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link href="assets/css/table-responsive.css" rel="stylesheet">

   
  </head>

  <body>

  <section id="container" >
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>

      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Uploaded Video List</h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  
                                  <th>Course Name</th>
                                  <th>Website link</th>
                                  
                                  <th>View Video</th>
                                  <th>Delete </th>
                                 
                              </tr>
                              </thead>
                              <tbody>

 <?php
$uname=$_SESSION['etid'];

$sqli=mysql_query("SELECT * from enrollteacher where etid='$uname'");

while ($rwi=mysql_fetch_array($sqli)) {  
  $tname=$rwi[3];
}
?>
  <?php 
  
  $query=mysql_query("select * from uploadvedio where teachername='$tname'");
while($row=mysql_fetch_array($query))
{
   
  ?>
                             <tr>
                                  <td align="center"><?php echo htmlentities($row[1]);?></td>
                                  <td align="center"><?php echo htmlentities($row[3]);?></td>
                                                        
                                   <td align="center">
                                   <a href="video.php?id=<?php echo  $row[0];?>">
<button type="button" class="btn btn-primary">View</button></a>
                                      
                                   </td>
                         <!-- Modal -->
<form class="form-video" name="forgot" method="post">
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
<div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title">Playing Video</h4>
 </div>
<div class="modal-body">
		                        
<iframe width="560" height="315" src="https://www.youtube.com/embed/4jmsHaJ7xEA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	
  </div>
     <div class="modal-footer">
  
 <button class="btn btn-theme" >Exit</button>
	 </div>
 </div>
</div>
  </div>
		          <!-- modal -->

 <td align="center">
                                   <a href="deletevideo.php?id=<?php echo  $row[0];?>">
<button type="button" class="btn btn-primary">Delete</button></a>
                                   </td>
                                </tr>
                              <?php } ?>
                            
                              </tbody>
                          </table>
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
