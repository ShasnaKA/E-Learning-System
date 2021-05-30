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
      <td colspan="4"><h2 style="text-align:center">Course Details</h2></td>
    </tr>
    <tr>
      <th>Department</th>
      <th>Course</th>
      <th>Action</th>
    </tr>

    <?php
 
       $uid=$_SESSION['userid'];
       $sql="SELECT cid,cname,coursestatus,tblDepartment.depname FROM tblCourse INNER JOIN tblDepartment ON tblDepartment.depid=tblCourse.depid where tblCourse.instemail='$uid' AND tblCourse.coursestatus=1 ORDER BY depname,cname";

       $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td>'.$row['depname'].'</td>';
            echo '<td><b>'.$row['cname'].'</b></td>';
            echo '<td><b><a href="instedit_course.php?whichcourse='.$row['cname'].'" class="red">Edit</a></td></b></tr>';     
         }

    ?>
       
       
  </table>
 </div>
  
	
</body>



</html>