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
	$coursename=$_POST['cname'];
	$subjectid=$_POST['Year'];
	$coname=$_POST['coname'];
	$deptname=$_POST['Deptname'];
	$discription=$_POST['discription'];
	$id=intval($_GET['id']);
$sql=mysql_query("update managesubject set subjectname='$coursename',subjectid='$subjectid',coursename='$coname',deptname='$deptname',discription='$discription' where sid='$id'");
$_SESSION['msg']="Teacher Info Updated !!";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Safe Exam Portal | Manage Subject</title>
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
								<h3>Update Subject Info.</h3>
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
$query=mysql_query("select * from managesubject where sid='$id'");
while($row=mysql_fetch_array($query))
{
?>	
<div class="control-group">
<label class="control-label" for="basicinput">Subject Name</label>
<div class="controls">
<input type="text" placeholder="Enter Teacher Name"  name="cname" value="<?php echo  htmlentities($row['subjectname']);?>" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Subject ID</label>
<div class="controls">
<input type="text" placeholder="Enter Teacher Name"  name="Year" value="<?php echo  htmlentities($row['subjectid']);?>" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Select Program</label>
<div class="controls">
<select name="coname" class="form-control" onChange="getCat(this.value);" required="">
<option>Select Programme</option>
<?php 
$sqla=mysql_query("select * from addprogramms");
while ($rw=mysql_fetch_array($sqla)) {
  ?>
  <option><?php echo $rw[1];?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Departement Name</label>
<div class="controls">
<input type="text" placeholder="Enter Email Address"  name="Deptname" value="<?php echo  htmlentities($row['deptname']);?>" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Subject Discription</label>
<div class="controls">
<input type="text" placeholder="Enter Phone Number"  name="discription" value="<?php echo  htmlentities($row['discription']);?>" class="span8 tip" required>
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