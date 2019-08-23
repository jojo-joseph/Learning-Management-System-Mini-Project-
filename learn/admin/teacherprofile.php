<?php
include("include/config.php");

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Teacher Profile</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php 

$ret1=mysql_query("select * FROM enrollteacher where etid='".$_GET['id']."'");
while($row=mysql_fetch_array($ret1))
{
?>
    <tr>
      <td colspan="2"><center><b><h2><?php echo $row['teachername'];?>'s profile</h2></b></center></td>
      
    </tr>
    
    
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    
    </tr>
    <tr height="50">
      <td><b>Teacher Name:</b></td>
      <td><?php echo htmlentities($row['username']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Teacher Name:</b></td>
      <td><?php echo htmlentities($row['teachername']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Teacher Address:</b></td>
      <td><?php echo htmlentities($row['Address']); ?></td>
    </tr>


      <tr height="50">
      <td><b>Departement Name:</b></td>
      <td><?php echo htmlentities($row['deptname']); ?></td>
    </tr>
    


        <tr height="50">
      <td><b>Teacher E-mail:</b></td>
      <td><?php echo htmlentities($row['email']); ?></td>
    </tr>



        <tr height="50">
      <td><b>Teacher Phone Numeber:</b></td>
      <td><?php echo htmlentities($row['phoneno']); ?></td>
    </tr>

     
    
    <tr>
  
      <td colspan="2">   <center>
      <input name="Submit2" type="submit" class="txtbox4" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
      </center>
    </tr>
   
    <?php } 

 
    ?>
 
</table>
 </form>
</div>

</body>
</html>

   