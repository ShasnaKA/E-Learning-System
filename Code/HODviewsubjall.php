<?php
 //since HODheader also contains session_start no need to give it here.
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
      <td colspan="4"><h2 style="text-align:center">Subject Details</h2></td>
    </tr>
    <tr>
      <th>Subject</th>
      <th>Semester</th>
      <th>Course</th>
      <th>Assigned Teacher</th>
    </tr>

    <?php
 
       $uid=$_SESSION['userid'];//HOD username

       $instemail_ofHOD="SELECT HODinstemail from tblHOD where HODemail='$uid'";
       $rslt1=$conn->query($instemail_ofHOD);
       $r1=mysqli_fetch_array($rslt1);

       $depid_ofHOD="SELECT HODdepid from tblHOD where HODemail='$uid'";
       $rslt2=$conn->query($depid_ofHOD);
       $r2=mysqli_fetch_array($rslt2);

       $sql="SELECT subjname,subjsem,tblCourse.cname,tblTeacher.teachname FROM tblSubject INNER JOIN tblCourse ON tblCourse.cid=tblSubject.subjcid LEFT JOIN tblTeacher ON tblTeacher.teachemail=tblSubject.subjteachemail where tblSubject.subjinstemail='$r1[0]' AND tblCourse.depid='$r2[0]' AND subjstatus=1 ORDER BY subjsem";

       $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['subjname'].'</b></td>';
            echo '<td>'.$row['subjsem'].'</td>';
            echo '<td>'.$row['cname'].'</td>';
            if($row[3]==NULL)
            {
               $row['teachname']="<em style='color:blue;'>NIL</em>";
               echo '<td>'.$row['teachname'].'</td>';
            }
            else
            {
               echo '<td><b>'.$row['teachname'].'</b></td>';
            }

         }

    ?>
       
       
  </table>
 </div>
  
	
</body>



</html>