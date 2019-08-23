<?php
include("includes/config.php");
echo $id=$_POST['id'];
echo $pid=$_POST['totmarks'];
$query=mysql_query("update addassignment set avmark='$pid'where aid='$id'");
 header('location:assmarks.php');

?>
