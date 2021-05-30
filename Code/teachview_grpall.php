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
      <td colspan="6"><h2 style="text-align:center">Group Details</h2></td>
    </tr>
    <tr>
      <th>Group Name</th>
      <th>Subject</th>
      <th>Course</th>
      <th>Semester</th>
      <th>Action</th>
    </tr>

    <?php
 
       $uid=$_SESSION['userid'];
       $sql="SELECT tblGroup.gname,tblGroup.gstatus,tblSubject.subjid,tblSubject.subjname,tblSubject.subjsem,tblCourse.cname FROM tblGroup INNER JOIN tblSubject ON tblSubject.subjid=tblGroup.gsubjid INNER JOIN tblCourse ON tblCourse.cid=tblSubject.subjcid where tblGroup.g_host_email='$uid' AND gstatus=1 ";

       $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['gname'].'</b></td>';
            echo '<td>'.$row['subjname'].'</td>';
            echo '<td>'.$row['cname'].'</td>';
            echo '<td>'.$row['subjsem'].'</td>'; 

            echo '<td><a href="teachedit_grp.php?whichgrp='.$row['gname'].' & whichsubj='.$row['subjid'].'" class="red"><em><b><i>Edit Group</i></b></em></a></td></tr>';     
         }

    ?>
       
       
  </table>
 </div>
  
  
</body>



</html>