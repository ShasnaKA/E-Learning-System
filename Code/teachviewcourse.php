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
      <td colspan="2"><h2 style="text-align:center">Courses Allotted</h2></td>
    </tr>
    <tr>
      <th>Department</th>
      <th>Course</th>

    </tr>

    <?php
 
       $uid=$_SESSION['userid'];
 
       $instqry="SELECT teachinstemail FROM tblTeacher where teachemail='$uid'";
       $instrslt=$conn->query($instqry);
       $r=mysqli_fetch_array($instrslt);

       $sql="SELECT tblSubject.subjsem,tblCourse.cname,tblDepartment.depname FROM tblSubject INNER JOIN tblCourse ON tblSubject.subjcid=tblCourse.cid INNER JOIN tblDepartment ON tblCourse.depid=tblDepartment.depid where tblSubject.subjteachemail='$uid' AND subjinstemail='$r[0]' AND tblCourse.coursestatus=1 AND subjstatus=1 GROUP BY cname";

       $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td>'.$row['depname'].'</td>';
            echo '<td><b>'.$row['cname'].'</b></td>';
           
         }

    ?>
       
       
  </table>
 </div>
  
  
</body>



</html>