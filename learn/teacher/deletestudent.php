<?php
include("includes/config.php");
echo $id=$_GET['id'];
$a=mysql_query("delete from enrollstudent where esid='$id'")or die(mysql_error());
if($a)
echo"delete";
header('location:enrollstudentlist.php');
?>
