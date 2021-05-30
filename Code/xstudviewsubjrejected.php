<?php
//tutor rejected grp list status=-1
 //since xstudheader also contains session_start no need to give it here.
 include 'connection.php';
 include 'xstudheader.php';
?>

<!DOCTYPE html>

<head>
  <link rel="stylesheet" type="text/css" href="displaytable.css">
</head>

<body class="tablebody">

  <div>
  <table align="center">
    <tr class="main_title">
      <td colspan="4"><h2 style="text-align:center">Entry Rejected Groups</h2></td>
    </tr>
    <tr>
      <th>Group</th>
      <th>Description</th>
      <th>Teacher</th>
      <th>Status</th>
    </tr>

    <?php
 
       $uid=$_SESSION['userid'];

       $sql="SELECT xgname,xgdesc,xtutorname from tblXGroup JOIN tblXGroupstud ON tblXGroup.xgid=tblXGroupstud.xsgid JOIN tblXTutor ON tblXTutor.xtutoremail=tblXGroup.xtutorhostemail where xgstudemail='$uid' AND xgstudstatus=-1";

       $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['xgname'].'</b></td>';
            echo '<td><b>'.$row['xgdesc'].'</b></td>';
            echo '<td>'.$row['xtutorname'].'</td>';
            echo '<td><em style="color:red">Rejected</em></td>';
         }

    ?>
       
       
  </table>
 </div>
  
  
</body>



</html>