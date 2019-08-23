
<?php
	
	include("./include/config.php");
	$qu=mysql_query("delete from enrollstudent where esid=".$_GET['pid']); 
    $row=mysql_fetch_array($qu);
	
    header('location:./manage-students.php');
	

?>