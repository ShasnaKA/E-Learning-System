<?php
//since teacherheader already has a session_start no need to give it here for  $SESSION['userid']
include 'connection.php';
include 'teacherheader.php';
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
      <td colspan="6"><h2 style="text-align:center">Students Semesterwise</h2></td>
    </tr>
    <tr>
      <th>Name</th>
      <th>Course</th>
      <th>Semester</th>
      <th>Register Number</th>
      <th>Email</th>
      <th>Contact Number</th>      
    </tr>

       <?php
          
       
       $uid=$_SESSION['userid'];
       


       $instqry="SELECT teachinstemail from tblTeacher where teachemail='$uid'";
       $instrslt=$conn->query($instqry);
       $r=mysqli_fetch_array($instrslt);


      $sql="SELECT studname,tblCourse.cname,studsem,studreg,studemail,studcontact FROM tblStudent INNER JOIN tblCourse ON tblCourse.cid=tblStudent.studcid INNER JOIN tblSubject ON tblSubject.subjcid=tblStudent.studcid AND tblSubject.subjsem=tblStudent.studsem where studinstemail='$r[0]' AND studcid='$cid' AND studsem='$sem'  AND studemail in(SELECT uname from tblLogin where status=1) GROUP BY studemail";
     
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