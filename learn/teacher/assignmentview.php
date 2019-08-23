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

    <title>Safe Exam Portal | Added Assignment List </title>

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
          	<h3><i class="fa fa-angle-right"></i>Uploaded Assignment List</h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  
                                  <th>Programme Name</th>
                                  <th>Subject Name</th>
                                  <th>Teacher Name</th>
                                  <th>Assignment Name</th>
                                  <th>Final Submission Date</th>
                                  <th>Added Date</th>
                                  <th>Delete </th>
                                 
                              </tr>
                              </thead>
                              <tbody>

 
  <?php 
  
  $query=mysql_query("select * from addassignment ");
while($row=mysql_fetch_array($query))
{
   
  ?>
                              <tr>
                                  <td align="center"><?php echo htmlentities($row[1]);?></td>
                                  <td align="center"><?php echo htmlentities($row[2]);?></td>
                                  <td align="center"><?php echo htmlentities($row[3]);?></td>   
                                  <td align="center"><?php echo htmlentities($row[4]);?></td> 
                                  <td align="center"><?php echo htmlentities($row[5]);?></td> 
                                  <td align="center"><?php echo htmlentities($row[6]);?></td>              
                                  
 <td align="center">
                                   <a href="deleteass.php?id=<?php echo  $row[0];?>">
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
