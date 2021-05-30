<?php
//since instheader already has a session_start no need to give it here for  $SESSION['userid']
include 'instheader.php';
?>

<!DOCTYPE html>
<head>
 <link rel="stylesheet" type="text/css" href="displaytable.css">

</head>

<body class="tablebody">

 <div>
  <table align="center">
    <tr class="main_title">
      <td colspan="8"><h2 style="text-align:center">New Students To Be Accepted</h2></td>
    </tr>
    <tr>
      <th>Name</th>
      <th>Register Number</th>
      <th>E-mail</th>
      <th>Course</th>
      <th>Semester</th>
      <th>Contact Number</th>
      <th colspan=2>Action</th>
      
    </tr>

    <?php
       
       $uid=$_SESSION['userid'];
       include 'connection.php';
       $sql="SELECT studinstemail,studcid,studsem,studemail,studreg,studname,studcontact,tblCourse.cname FROM tblStudent JOIN tblCourse ON tblStudent.studcid=tblCourse.cid where studinstemail='$uid' AND studemail in(select uname from tblLogin where status='0')ORDER BY cname,studsem,studname";

       $result=$conn->query($sql);
       $place='viewstudrqst.php';

       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['studname'].'</b></td>';
            echo '<td>'.$row['studreg'].'</td>';
            echo '<td>'.$row['studemail'].'</td>';
            echo '<td><b>'.$row['cname'].'</b></td>';
            echo '<td>'.$row['studsem'].'</td>';
            echo '<td>'.$row['studcontact'].'</td>';
            
echo '<td><a href="instapprovestud.php?id='.$row['studemail'].'& status=1 & place='.$place.'" class="green">Approve</a></td>';
echo '<td><a href="instapprovestud.php?id='.$row['studemail'].'& status=-1 & place='.$place.'" class="red">Reject</a></td>';
        
         }

    ?>

       
       
    </table>
 </div>
  
</body>

</html>