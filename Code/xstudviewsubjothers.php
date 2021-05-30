<?php
 //since instheader also contains session_start no need to give it here.
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
      <td colspan="4"><h2 style="text-align:center">Existing Groups Other than Enrolled</h2></td>
    </tr>
    <tr>
      <th>Group</th>
      <th>Description</th>
      <th>Teacher</th>
      <th>Action</th>
    </tr>

    <?php
 
       $uid=$_SESSION['userid'];

       $sql="SELECT xgid,xgname,xgdesc,tblXTutor.xtutorname from tblXGroup JOIN tblXTutor ON tblXTutor.xtutoremail=tblXGroup.xtutorhostemail where xgstatus=1 AND xgid NOT IN (SELECT xsgid from tblXGroupstud where xgstudemail='$uid') AND xtutoremail IN (SELECT uname from tblLogin where status=1)";

       $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['xgname'].'</b></td>';
            echo '<td><b>'.$row['xgdesc'].'</b></td>';
            echo '<td><b>'.$row['xtutorname'].'</b></td>';
            echo '<td><button><a href="joinothers.php?grpid='.$row['xgid'].'" style="color:black;text-decoration:none;">Join Now</a></button></td></tr>';
              
         }


    ?>
       
       
  </table>
 </div>
  
  
</body>



</html>