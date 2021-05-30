<?php
 //since instheader also contains session_start no need to give it here.
 include 'connection.php';
 include 'xtutorheader.php';
?>

<!DOCTYPE html>

<head>
  <link rel="stylesheet" type="text/css" href="displaytable.css">
</head>

<body class="tablebody">

  <div>
  <table align="center">
    <tr class="main_title">
      <td colspan="3"><h2 style="text-align:center">Rejected Students</h2></td>
    </tr>
    <tr>
      <th>Student</th>
      <th colspan="2">Group</th>
     
    </tr>

    <?php
 
       $uid=$_SESSION['userid'];
       $sql="SELECT xsgid,xgstudid,tblXGroup.xgname,tblXStudent.xstudname FROM tblXGroupstud JOIN tblXStudent ON tblXGroupstud.xgstudemail=tblXStudent.xstudemail JOIN tblXGroup ON tblXGroup.xgid=tblXGroupstud.xsgid where tblXGroup.xtutorhostemail='$uid' AND tblXGroup.xgstatus=1 AND xgstudstatus=-1";

       $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result))
        { 
 
          echo '<tr class="datarows"><td><b>'.$row['xstudname'].'</b></td>';
          echo '<td>'.$row['xgname'].'</td>'; 
          echo '<td><a href="xtutorapprovexstud.php?grpid='.$row['xsgid'].'& status=1 & stud='.$row['xgstudid'].'" style="color:blue;" class="red"><em><i>Reapprove</i></em></a></td></tr>';     
         }

    ?>
       
       
  </table>
 </div>
  
  
</body>



</html>