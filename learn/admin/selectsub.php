
<?php
	
    include("./include/config.php");
    $data = explode(":", $_GET['id']);
    $sub_name = "";
     $qu=mysql_query("select * from managesubject where sid=". $data[1]);
     while($row=mysql_fetch_array($qu)) {
        $sub_name = $row['subjectname'];
        $course_name=$row['coursename'];
     }
     echo $sub_name;

     $qu=mysql_query("insert into assigntsubject(subjectname,coursename,teachername) values('$sub_name','$course_name','$data[0]')"); 
    
    // $data = explode(":", $_GET['id']);
    // echo $data[0];
    // echo "<br>";
    // echo $data[1];	
    header('location:./assignsubject.php');
?>