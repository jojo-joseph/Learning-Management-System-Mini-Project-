
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
	$username=$_POST['Username'];
	$password=$_POST['Password'];
	$teachername=$_POST['Teachername'];
	$Address=$_POST['Address'];
	$deptname=$_POST['Deptname'];
	$email=$_POST['Email'];
	$phoneno=$_POST['Phoneno'];
	$id=intval($_GET['id']);
$sql=mysql_query("update enrollteacher set username='$username',password='$password',teachername='$teachername',Address='$Address',deptname='$deptname',email='$email',phoneno='$phoneno' where etid='$id'");
$_SESSION['msg']="Teacher Info Updated !!";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Safe Exam Portal | Teacher Updation</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Update Teacher Info.</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<br />

			<form class="form-horizontal row-fluid" name="Category" method="post" >
<?php
$id=intval($_GET['id']);
$query=mysql_query("select * from enrollteacher where etid='$id'");
while($row=mysql_fetch_array($query))
{
?>	
<div class="control-group">
<label class="control-label" for="basicinput">User Name</label>
<div class="controls">
<input type="text" placeholder="Enter Teacher Name"  name="Username" value="<?php echo  htmlentities($row['username']);?>" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Password</label>
<div class="controls">
<input type="text" placeholder="Enter Teacher Name"  name="Password" value="<?php echo  htmlentities($row['Password']);?>" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Teacher Name</label>
<div class="controls">
<input type="text" placeholder="Enter Teacher Name"  name="Teachername" value="<?php echo  htmlentities($row['teachername']);?>" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Address</label>
<div class="controls">
<textarea class="span8" name="Address" value="<?php echo  htmlentities($row['Address']);?>" rows="2"></textarea>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Departement Name</label>
<div class="controls">
<input type="text" placeholder="Enter Departement Name"  name="Deptname" value="<?php echo  htmlentities($row['deptname']);?>" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Email Address</label>
<div class="controls">
<input type="text" placeholder="Enter Email Address"  name="Email" value="<?php echo  htmlentities($row['email']);?>" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Phone Number</label>
<div class="controls">
<input type="text" placeholder="Enter Phone Number"  name="Phoneno" value="<?php echo  htmlentities($row['phoneno']);?>" class="span8 tip" required>
</div>
</div>		

	<?php } ?>	

	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Update</button>
											</div>
										</div>
									</form>
							</div>
						</div>


						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>