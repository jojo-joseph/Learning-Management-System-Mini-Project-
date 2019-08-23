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
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Safe Exam Portal| Assign Teachers Programms</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
		<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
</head>
<body>
<?php include('include/header.php');?>


<div class="module">

<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>		
	
			<div class="span9">
					<div class="content">

	<div class="module">
		<div class="module-head">
	<h3>Select Course To Teachers</h3>
	</div>
	


	<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Select Teacher</label>
<div class="col-sm-4">
<select id="teacher" name="enrollcoursename" required="required" class="form-control" onchange="whichTeacher()">
<option value="">Select Teacher</option>
<?php $query=mysql_query("select * from enrollteacher ");
$cnt=1;
while($row=mysql_fetch_array($query))
{
?>
<option name="Teachername" value=""><?php echo htmlentities($row['teachername']);?>
</option>
<?php $cnt=$cnt+1; } ?>
</select>
 </div>	
 </div>
	<div class="control-group">
	</form>
	</div>
	</div>
	</div>

<div class="module">
<div class="module-head">
<div class="module-body table">
	
<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
									<tr>
									<th>Sl.No.</th>
									<th>Programme Name</th>
									<th>year </th>
									<th>Batch</th>
									<th>Departement Name </th>
								    <th>Discription</th> 
								    <th>Approvel</th>
									</tr>
									</thead>
									<tbody>

<?php $query=mysql_query("select * from addprogramms ");
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
	<div style="width: 100px; height: 30px; background-color: #0ea283; border-radius: 8px; ">
	<a style="color: white;padding-left: 18px; padding-top: 20px" href="./selectprg.php?id=<?php $cookie_Value='curntTeacher'; echo $_COOKIE[$cookie_Value].':+'.$row['pid'] ?>">Select</a></div>
</td>


<?php $cnt=$cnt+1; } ?>
</table>
						
</div>

</div><!--/.span9-->
			</div>
			
		</div><!--/.container-->
	</div><!--/.wrapper-->
	</div>
	</div>
	</div>
	
	</div>
	</div>
	</div>
	

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