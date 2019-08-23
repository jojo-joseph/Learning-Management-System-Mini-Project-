<?php
	
	include("./include/config.php");
	$qu=mysql_query("delete from assignprogramms where apid=".$_GET['pid']); 
    $row=mysql_fetch_array($qu);
	
    header('location:./asprglist.php');
	

?>  