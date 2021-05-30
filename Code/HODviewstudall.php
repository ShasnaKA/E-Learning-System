<?php
//since HODheader already has a session_start no need to give it here for  $SESSION['userid']
include 'connection.php';
include 'HODheader.php';


?>

<!DOCTYPE html>
<head>
  <link rel="stylesheet" type="text/css" href="displaytable.css">
</head>
<body class="tablebody">

 <div>
  <table align="center">
    <tr class="main_title">
      <td colspan="6"><h2 style="text-align:center">Student Details</h2></td>
    </tr>
    <tr>
      <th>Name</th>
      <th>Course</th>
      <th>Semester</th>
      <th>Register Number</th>
      <th>E-mail</th>
      <th>Contact Number</th>
      
    </tr>

       <?php

       $uid=$_SESSION['userid'];
       
       $depid_ofHOD="SELECT HODdepid from tblHOD where HODemail='$uid'";
       $rslt1=$conn->query($depid_ofHOD);
       $r1=mysqli_fetch_array($rslt1);

       $instemail_ofHOD="select HODinstemail from tblHOD where HODemail='$uid'";
       $rslt2=$conn->query($instemail_ofHOD);
       $r2=mysqli_fetch_array($rslt2);

       $sql="SELECT studinstemail,studcid,studsem,studemail,studname,studreg,studcontact,tblCourse.cname,tblCourse.depid FROM tblStudent INNER JOIN tblCourse ON tblCourse.cid=tblStudent.studcid where studinstemail='$r2[0]' AND tblCourse.depid='$r1[0]' AND studemail in (select uname from tblLogin where status=1)  ORDER BY cname,studsem,studname";

       $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['studname'].'</b></td>';
            echo '<td>'.$row['cname'].'</td>';
            echo '<td>'.$row['studsem'].'</td>';
            echo '<td>'.$row['studreg'].'</td>';
            echo '<td>'.$row['studemail'].'</td>';
            echo '<td>'.$row['studcontact'].'</td>';

      
         }

        ?>
       
    </table>
 </div>
  
</body>

</html>