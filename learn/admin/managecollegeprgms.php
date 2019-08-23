
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
	$year=$_POST['Year'];
	$batch=$_POST['Batch'];
	$deptname=$_POST['Deptname'];
	$discription=$_POST['discription'];
$sql=mysql_query("insert into addprogramms(coursename,year,batch,deptname,discription) values('$coursename','$year','$batch','$deptname','$discription')");
$_SESSION['msg']="State added Successfully !!";

}

if(isset($_GET['del']))
		  {
		          mysql_query("delete from addprogramms where pid = '".$_GET['mpid']."'");
                  $_SESSION['delmsg']="State deleted !!";
		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Safe Exam Portal | Add Programms</title>
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
								<h3>Add College Courses/Programms</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

<form class="form-horizontal row-fluid" name="Category" method="post" >
									
<div class="control-group">
<label class="control-label" for="basicinput">Course Name</label>
<div class="controls">
<input type="text" placeholder="Enter Course Name"  name="cname" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Year</label>
<div class="controls">
<input type="text" placeholder="Enter Course Year"  name="Year" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Batch</label>
<div class="controls">
<input type="text" placeholder="Enter Course Batch"  name="Batch" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Departement Name</label>
<div class="controls">
<input type="text" placeholder="Enter Departement Name"  name="Deptname" class="span8 tip" required>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Discription</label>
<div class="controls">
<textarea class="span8" name="discription" rows="2"></textarea>
</div>
</div>



	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Create</button>
											</div>
										</div>
									</form>
							</div>
						</div>


	<div class="module">
							<div class="module-head">
								<h3>Manage College Courses/Programms</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>Sl.No</th>
											<th>Course Name</th>
											<th>Year</th>
                                            <th>Batch</th>                                    
											<th>Departement Name</th>
											<th>Discription</th>
											<th>Update</th>
                                            <th>Delete</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysql_query("select * from addprogramms");
$cnt=1;
while($row=mysql_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['coursename']);?></td>
											<td><?php echo htmlentities($row['year']);?></td>
											<td> <?php echo htmlentities($row['batch']);?></td>
											<td><?php echo htmlentities($row['deptname']);?></td>
											<td><?php echo htmlentities($row['discription']);?></td>
										    <td>
												<div style="width: 100px; height: 30px; background-color: #0ea283; border-radius: 8px; "><a style="color: white;padding-left: 18px; padding-top: 20px" href="./edit-programs.php?id=<?php echo $row['pid']; ?>">Update</a></div>
											</td>
											<td>
		<div style="width: 100px; height: 30px; background-color: #0ea283; border-radius: 8px; "><a style="color: white;padding-left: 18px; padding-top: 20px" href="./managecollegeprgms.php?mpid=<?php echo $row['pid']; ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">Delete</a></div>
											</td>
											</tr>
										<?php $cnt=$cnt+1; } ?>
										
								</table>
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