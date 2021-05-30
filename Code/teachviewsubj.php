<?php
 //since instheader also contains session_start no need to give it here.
 include 'connection.php';
 include 'teacherheader.php';
?>

<!DOCTYPE html>

<head>
  <link rel="stylesheet" type="text/css" href="displaytable.css">
</head>

<body class="tablebody">

  <div>
  <table align="center">
    <tr class="main_title">
      <td colspan="5"><h2 style="text-align:center">Allotted Subjects</h2></td>
    </tr>
    <tr>
      <th>Department</th>
      <th>Subject</th>
      <th>Course</th>
      <th>Semester</th>
      <th>Group</th>
    </tr>

    <?php
 
       $uid=$_SESSION['userid'];
 
       $instqry="SELECT teachinstemail FROM tblTeacher where teachemail='$uid'";
       $instrslt=$conn->query($instqry);
       $r=mysqli_fetch_array($instrslt);

       $sql="SELECT tblSubject.subjname,tblSubject.subjsem,tblCourse.cname,tblDepartment.depname,tblGroup.gname,tblGroup.gstatus FROM tblSubject INNER JOIN tblCourse ON tblSubject.subjcid=tblCourse.cid INNER JOIN tblDepartment ON tblCourse.depid=tblDepartment.depid LEFT JOIN tblGroup on tblGroup.gsubjid=tblSubject.subjid where tblSubject.subjteachemail='$uid' AND subjinstemail='$r[0]' AND tblCourse.coursestatus=1 AND subjstatus=1";

       $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td>'.$row['depname'].'</td>';
            echo '<td><b>'.$row['subjname'].'</b></td>';
            echo '<td>'.$row['cname'].'</td>';
            echo '<td>'.$row['subjsem'].'</td>';
            if($row['gstatus']==-1)
            {
              $row['gname']="<em style='color:blue;'>Deleted<b style='color:red'>!</b></em>";
              echo '<td>'.$row['gname'].'</td>';
            }
            else if($row['gname']==NULL)
            {
               $row['gname']="<em style='color:blue;'>- NIL -</em>";
               echo '<td>'.$row['gname'].'</td>';
            }
            else
             echo '<td><b>'.$row['gname'].'</b></td>';
              
         }

    ?>
       
       
  </table>
 </div>
  
  
</body>



</html>