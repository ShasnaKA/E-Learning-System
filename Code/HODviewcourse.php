<?php
 //since instheader also contains session_start no need to give it here.
 include 'connection.php';
 include 'HODheader.php';
?>

<!DOCTYPE html>

<head>
	<link rel="stylesheet" type="text/css" href="displaytable.css">
</head>

<body class="tablebody">

  <div>
  <table align="center">
    <tr class="main_title">
      <td colspan="5"><h2 style="text-align:center">Course Details</h2></td>
    </tr>
    <tr>
      <th>Department</th>
      <th>Course</th>
    </tr>

    <?php
 
     $uid=$_SESSION['userid'];//HOD username

      $instemail_ofHOD="SELECT HODinstemail from tblHOD where HODemail='$uid'";
      $rslt1=$conn->query($instemail_ofHOD);
      $r1=mysqli_fetch_array($rslt1);

      $depid_ofHOD="SELECT HODdepid from tblHOD where HODemail='$uid'";
      $rslt2=$conn->query($depid_ofHOD);
      $r2=mysqli_fetch_array($rslt2);

       $sql="SELECT cname,tblDepartment.depname FROM tblCourse INNER JOIN tblDepartment ON tblDepartment.depid=tblCourse.depid where tblCourse.instemail='$r1[0]' AND tblCourse.depid='$r2[0]' AND coursestatus=1";

       $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td>'.$row['depname'].'</td>';
            echo '<td><b>'.$row['cname'].'</b></td>';
           
         }

    ?>
       
       
  </table>
 </div>
  
	
</body>



</html>