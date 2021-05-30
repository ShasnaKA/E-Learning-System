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
      <td colspan="4"><h2 style="text-align:center">Subjects Semesterwise</h2></td>
    </tr>
    <tr>
      <th>Subject</th>
      <th>Semester</th>
      <th>Course</th>
      <th>Assigned Teacher</th>
      
    </tr>

       <?php
          
       
       $uid=$_SESSION['userid'];
       
       $depid_ofHOD="SELECT HODdepid from tblHOD where HODemail='$uid'";
       $rslt1=$conn->query($depid_ofHOD);
       $r1=mysqli_fetch_array($rslt1);

       $instemail_ofHOD="SELECT HODinstemail from tblHOD where HODemail='$uid'";
       $rslt2=$conn->query($instemail_ofHOD);
       $r2=mysqli_fetch_array($rslt2);


       $sql="SELECT subjname,subjsem,subjcid,tblCourse.cname,tblTeacher.teachname FROM tblSubject INNER JOIN tblCourse ON tblCourse.cid=tblSubject.subjcid LEFT JOIN tblTeacher ON tblTeacher.teachemail=tblSubject.subjteachemail where subjinstemail='$r2[0]' AND subjcid='$cid' AND subjsem='$sem' AND subjstatus=1 ORDER BY subjname";


       $result=$conn->query($sql);

       
       while($row=mysqli_fetch_array($result))
        { 

            echo '<tr class="datarows"><td><b>'.$row['subjname'].'</b></td>';
            echo '<td>'.$row['subjsem'].'</td>';
            echo '<td>'.$row['cname'].'</td>';

            if($row[4]==NULL){
              $row['teachname']="<em style='color:blue'>NIL</em>";
              echo '<td>'.$row['teachname'].'</td>';
            }
            else
              echo '<td><b>'.$row['teachname'].'</b></td>';


      
         }
        

      ?>
       
    </table>
 </div>
  
</body>

</html>