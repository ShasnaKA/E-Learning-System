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
      <td colspan="6"><h2 style="text-align:center">Department Teachers</h2></td>
    </tr>
    <tr>
      <th>Name</th>
      <th>Department</th>
      <th>E-mail</th>
      <th>Qualification</th>
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

       $sql="SELECT teachinstemail,teachdepid,teachemail,teachname,teachqualf,teachcontact,tblDepartment.depname FROM tblTeacher JOIN tblDepartment ON tblDepartment.depid=tblTeacher.teachdepid where teachinstemail='$r2[0]' AND teachdepid='$r1[0]' AND teachemail in (select uname from tblLogin where status=1)";

       $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['teachname'].'</b></td>';
            echo '<td>'.$row['teachemail'].'</td>';
            echo '<td>'.$row['depname'].'</td>';
            echo '<td>'.$row['teachqualf'].'</td>';
            echo '<td>'.$row['teachcontact'].'</td>';

      
         }

        ?>
       
    </table>
 </div>
  
</body>

</html>