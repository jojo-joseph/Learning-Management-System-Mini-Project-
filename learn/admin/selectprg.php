<?php
	
    include("./include/config.php");
    $data = explode(":", $_GET['id']);
    $course_nam = "";
     $qu=mysql_query("select coursename from addprogramms where pid=". $data[1]);
     while($row=mysql_fetch_array($qu)) {
        $course_nam = $row['coursename'];
     }
     echo $course_nam;

     $qu=mysql_query("insert into assignprogramms(teachername,programname) values('$data[0]','$course_nam')"); 
    
    // $data = explode(":", $_GET['id']);
    //  echo $data[0];
    //  echo "<br>";
    //  echo $data[1];	
    header('location:./assignteacherstoprogramms.php');
?>