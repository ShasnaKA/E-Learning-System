<?php
 //since instheader also contains session_start no need to give it here.
 include 'connection.php';
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
      <td colspan="5"><h2 style="text-align:center">Subject Details</h2></td>
    </tr>
    <tr>
      <th>Course</th>
      <th>Semester</th>
      <th>Subject</th>
      <th>Action</th>
    </tr>

    <?php
 
       $uid=$_SESSION['userid'];
       $sql="SELECT tblSubject.subjid,tblSubject.subjsem,tblSubject.subjname,tblSubject.subjstatus,tblCourse.cname FROM tblSubject INNER JOIN tblCourse ON tblCourse.cid=tblSubject.subjcid where tblSubject.subjinstemail='$uid' AND tblSubject.subjstatus=1 ORDER BY cname,subjsem,subjname ";

       $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['cname'].'</b></td>';
            echo '<td>'.$row['subjsem'].'</td>';
            echo '<td><b>'.$row['subjname'].'</b></td>';

            echo '<td><b><a href="instedit_subj.php?whichsubj='.$row['subjname'].'" class="red">Edit</a></b></td></tr>';     
         }

    ?>
       
       
  </table>
 </div>
  
	
</body>



</html>