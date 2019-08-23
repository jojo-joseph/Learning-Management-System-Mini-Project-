<?php
include("includes/config.php");
echo $id=$_GET['id'];
$a=mysql_query("delete from addassignment where aid='$id'")or die(mysql_error());
if($a)
echo"delete";
header('location:assignmentlist.php');
?>
