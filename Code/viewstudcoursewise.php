<?php

//since instheader already has a session_start no need to give it here for  $SESSION['userid']
include 'instheader.php';
$course=$_GET['course'];
$sem=$_GET['sem'];
$uidforget=$_GET['uidforget'];
?>

<!DOCTYPE html>
<head>
  <link rel="stylesheet" type="text/css" href="displaytable.css">
</head>
<body class="tablebody">

 <div>
  <table align="center">
    <tr class="main_title">
      <td colspan="7"><h2 style="text-align:center">Classwise Student Details</h2></td>
    </tr>
    <tr>
      <th>Name</th>
      <th>Register Number</th>
      <th>E-mail</th>
      <th>Course</th>
      <th>Semester</th>
      <th>Contact Number</th>
    </tr>

       <?php
    
       include 'connection.php';
       $sql="SELECT * FROM tblStudent JOIN tblCourse ON tblStudent.studcid=tblCourse.cid where studinstemail='$uidforget' AND studcid='$course' AND studsem='$sem' AND studemail in (select uname from tblLogin where status=1)ORDER BY cname,studsem,studname";

       $result=$conn->query($sql);

       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['studname'].'</b></td>';
            echo '<td>'.$row['studreg'].'</td>';
            echo '<td>'.$row['studemail'].'</td>';
            echo '<td><b>'.$row['cname'].'</b></td>';
            echo '<td><b>'.$row['studsem'].'</b></td>';
            echo '<td>'.$row['studcontact'].'</td></tr>';

            
         }

        ?>
       
    </table>
 </div>
  
</body>

</html>