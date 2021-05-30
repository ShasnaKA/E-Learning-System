<?php
//enrolled grp list status=1
 //since xstudheader also contains session_start no need to give it here.
 include 'connection.php';
 include 'xstudheader.php';
?>

<!DOCTYPE html>

<head>
  <link rel="stylesheet" type="text/css" href="displaytable.css">
  <style>
    button{
      width:100px;
      border:1px solid pink;
    }

    button:hover{
      background-color: gray;
    }
  </style>
</head>

<body class="tablebody">

  <div>
  <table align="center">
    <tr class="main_title">
      <td colspan="5"><h2 style="text-align:center">Enrolled Groups</h2></td>
    </tr>
    <tr>
      <th>Group</th>
      <th>Description</th>
      <th>Teacher</th>
      <th>Status</th>
      <th>Action</th>
    </tr>

    <?php
 
       $uid=$_SESSION['userid'];

       $sql="SELECT xgid,xgname,xgdesc,xtutorname from tblXGroup JOIN tblXGroupstud ON tblXGroup.xgid=tblXGroupstud.xsgid JOIN tblXTutor ON tblXTutor.xtutoremail=tblXGroup.xtutorhostemail where xgstudemail='$uid' AND xgstudstatus=1";

       $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['xgname'].'</b></td>';
            echo '<td><b>'.$row['xgdesc'].'</b></td>';
            echo '<td>'.$row['xtutorname'].'</td>';
            echo '<td><em style="color:green"><b>Enrolled</b></em></td>';
            echo '<td><button><a href="enrollcancel.php?grpid='.$row['xgid'].'" style="text-decoration:none;color:black;">Cancel</a></button></td>';
            
         }

    ?>
       
       
  </table>
 </div>
  
  
</body>



</html>