<?php
include("includes/config.php");
echo $id=$_GET['id'];
$a=mysql_query("delete from assignsubject where asid='$id'")or die(mysql_error());
if($a)
echo"delete";
header('location:assignsubjectlist.php');
?>
