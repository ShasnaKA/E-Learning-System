<?php
//since HODheader already has a session_start no need to give it here for  $SESSION['userid']
include 'connection.php';
include 'HODheader.php';
$cid=$_GET['cid'];
$sem=$_GET['sem'];

?>

<!DOCTYPE html>
<head>
  <link rel="stylesheet" type="text/css" href="displaytable.css">
</head>
<body class="tablebody">

 <div>
  <table align="center">
    <tr class="main_title">
      <td colspan="6"><h2 style="text-align:center">Assigned Teachers Semesterwise</h2></td>
    </tr>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Department</th>
      <th>Course</th>
      <th>Semester</th>
      <th>Assigned Subject</th>
      
    </tr>

       <?php
          
       
       $uid=$_SESSION['userid'];
       
       $depid_ofHOD="SELECT HODdepid from tblHOD where HODemail='$uid'";
       $rslt1=$conn->query($depid_ofHOD);
       $r1=mysqli_fetch_array($rslt1);

       $instemail_ofHOD="select HODinstemail from tblHOD where HODemail='$uid'";
       $rslt2=$conn->query($instemail_ofHOD);
       $r2=mysqli_fetch_array($rslt2);

       $sql="SELECT subjinstemail,subjcid,subjsem,subjname,subjteachemail,tblTeacher.teachname,tblCourse.cname,tblDepartment.depname FROM tblSubject INNER JOIN tblTeacher  ON tblSubject.subjteachemail=tblTeacher.teachemail INNER JOIN tblCourse ON tblCourse.cid=tblSubject.subjcid INNER JOIN tblDepartment ON tblDepartment.depid=tblTeacher.teachdepid  where subjinstemail='$r2[0]' AND subjcid='$cid' AND subjsem='$sem' AND subjstatus=1 AND teachemail in (select uname from tblLogin where status=1)";

       $result=$conn->query($sql);

       
       while($row=mysqli_fetch_array($result))
        { 
           
            echo '<tr class="datarows"><td><b>'.$row['teachname'].'</b></td>';
            echo '<td>'.$row['subjteachemail'].'</td>';
            echo '<td>'.$row['depname'].'</td>';
            echo '<td><b>'.$row['cname'].'</b></td>';
            echo '<td><b>'.$row['subjsem'].'</b></td>';
            echo '<td>'.$row['subjname'].'</td>';
        }

      
    
         

      ?>
       
    </table>
 </div>
  
</body>

</html>