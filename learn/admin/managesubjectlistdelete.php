<?php
	
	include("./include/config.php");
	$qu=mysql_query("delete from assigntsubject where atsid=".$_GET['pid']); 
    $row=mysql_fetch_array($qu);
	
    header('location:./assignsubjectlist.php');
	

?>  