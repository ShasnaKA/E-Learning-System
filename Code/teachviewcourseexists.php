<?php
       include 'connection.php';
       session_start();
       $uid=$_SESSION['userid'];
 
       $instqry="SELECT teachinstemail FROM tblTeacher where teachemail='$uid'";
       $instrslt=$conn->query($instqry);
       $r=mysqli_fetch_array($instrslt);

       $sql="SELECT COUNT('subjcid') FROM tblSubject INNER JOIN tblCourse ON tblSubject.subjcid=tblCourse.cid INNER JOIN tblDepartment ON tblCourse.depid=tblDepartment.depid where tblSubject.subjteachemail='$uid' AND subjinstemail='$r[0]' AND tblCourse.coursestatus=1 AND subjstatus=1 GROUP BY cname ";
        

       $result=$conn->query($sql);
       
       $r=mysqli_fetch_array($result);

     if($r[0]>0)
     {
	       echo '<script>location.href="teachviewcourse.php"</script>';
      }
    else
    {
       echo '<script>alert("Sorry , No Courses Alloted for '.$uid.'")</script>';	
       echo '<script>location.href="teacherhome.php"</script>';
     }

   ?>