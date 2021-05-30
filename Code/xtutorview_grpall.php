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
      <td colspan="6"><h2 style="text-align:center">Group Details</h2></td>
    </tr>
    <tr>
      <th>Group Name</th>
      <th>Description</th>
      <th>Action</th>
    </tr>

    <?php
 
       $uid=$_SESSION['userid'];
       $sql="SELECT xgname,xgdesc,xgstatus FROM tblXGroup where xtutorhostemail='$uid' AND xgstatus=1 ";

       $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['xgname'].'</b></td>';
            echo '<td>'.$row['xgdesc'].'</td>'; 

            echo '<td><a href="xtutoredit_grp.php?whichgrp='.$row['xgname'].'" class="red"><em><b><i>Edit Group</i></b></em></a></td></tr>';     
         }

    ?>
       
       
  </table>
 </div>
  
  
</body>



</html>