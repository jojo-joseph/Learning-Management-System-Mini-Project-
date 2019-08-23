<?php
include("includes/config.php");
echo $id=$_GET['id'];
$query=mysql_query("select * from addprogramms where pid='$id'");
while($row=mysql_fetch_array($query))
{
$cname=$row[1];
}
$a=mysql_query("update assignprograms set programname='$cname'");

header('location:assignteacherstoprogramms.php');
?>
