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
      <td colspan="6"><h2 style="text-align:center"> Department Head Details</h2></td>
    </tr>
    <tr>
      <th>Name</th>
      <th>E-mail</th>
      <th>Department</th>
      <th>Qualification</th>
      <th>Contact Number</th>
      <th>Action</th>
    </tr>

       <?php
       $uid=$_SESSION['userid'];
       include 'connection.php';
       $sql="SELECT HODinstemail,HODemail,HODname,HODqualf,HODcontact,HODdepid,tblDepartment.depname FROM tblHOD JOIN tblDepartment ON tblDepartment.depid=tblHOD.HODdepid where HODinstemail='$uid' AND HODemail in (select uname from tblLogin where status=1) ORDER BY depname,HODname";

       $result=$conn->query($sql);
       $place='viewHOD.php';

       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['HODname'].'</b></td>';
            echo '<td>'.$row['HODemail'].'</td>';
            echo '<td><b>'.$row['depname'].'</b></td>';
            echo '<td>'.$row['HODqualf'].'</td>';
            echo '<td>'.$row['HODcontact'].'</td>';

            echo '<td><b><a href="instapproveHOD.php?id='.$row['HODemail'].' & status=-1 & place='.$place.'" class="red">Delete</a></b></td></tr>';
        
         }

        ?>
       
    </table>
 </div>
  
</body>

</html>