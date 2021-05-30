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
      <td colspan="7"><h2 style="text-align:center">New Teachers To Be Accepted</h2></td>
    </tr>
    <tr>
      <th>Name</th>
      <th>E-mail</th>
      <th>Department</th>
      <th>Qualification</th>
      <th>Contact Number</th>
      <th colspan=2>Action</th>
      
    </tr>

    <?php
       
       $uid=$_SESSION['userid'];
       include 'connection.php';
       $sql="SELECT teachinstemail,teachdepid,teachemail,teachname,teachqualf,teachcontact,tblDepartment.depname FROM tblTeacher JOIN tblDepartment ON tblDepartment.depid=tblTeacher.teachdepid where teachinstemail='$uid' AND teachemail in(select uname from tblLogin where status='0')ORDER BY depname,teachname";

       $result=$conn->query($sql);
       $place='viewteachrqst.php';
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['teachname'].'</b></td>';
            echo '<td>'.$row['teachemail'].'</td>';
            echo '<td><b>'.$row['depname'].'</b></td>';
            echo '<td>'.$row['teachqualf'].'</td>';
            echo '<td>'.$row['teachcontact'].'</td>';
            
echo '<td><b><a href="instapproveteach.php?id='.$row['teachemail'].'& status=1 & place='.$place.'" class="green">Approve</a></b></td>';
echo '<td><b><a href="instapproveteach.php?id='.$row['teachemail'].'& status=-1 & place='.$place.'" class="red">Reject</a></b></td></tr>';
        
         }

    ?>

       
       
    </table>
 </div>
  
</body>

</html>