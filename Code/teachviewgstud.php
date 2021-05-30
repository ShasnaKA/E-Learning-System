<?php
//since teacherheader already has a session_start no need to give it here for  $SESSION['userid']
include 'connection.php';
include 'insidegrpheader.php';
$gname=$_GET['gname'];
?>

<!DOCTYPE html>
<head>
  <link rel="stylesheet" type="text/css" href="displaytable.css">
</head>
<body class="tablebody">

 <div>
  <table align="center">
    <tr class="main_title">
      <td colspan="6"><h2 style="text-align:center">Group Students</h2></td>
    </tr>
    <tr>
      <th>Name</th>
      <th>Course</th>
      <th>Semester</th>   
    </tr>

       <?php
          
       
       $uid=$_SESSION['userid'];
       

      $inst="SELECT teachinstemail from tblTeacher where teachemail='$uid'";
      $instresult=$conn->query($inst);
      $instr1=mysqli_fetch_array($instresult);

      $grpid="SELECT gid from tblGroup where gname='$gname' AND ginstemail='$instr1[0]' AND g_host_email='$uid'";
      $grpresult=$conn->query($grpid);
      $grpr2=mysqli_fetch_array($grpresult);



      $sql="SELECT studname,studsem,tblCourse.cname from tblStudent INNER JOIN tblCourse ON tblStudent.studcid=tblCourse.cid INNER JOIN tblGroupstud ON tblGroupstud.gstudemail=tblStudent.studemail where tblGroupstud.sgid='$grpr2[0]' AND gstudstatus=1 ORDER BY studname";
     
       $result=$conn->query($sql);
      // echo '<script>alert("'.$sql.'")</script>';
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['studname'].'</b></td>';
            echo '<td>'.$row['cname'].'</td>';
            echo '<td>'.$row['studsem'].'</td></tr>';
            
         }


      ?>
       
    </table>
 </div>
  
</body>

</html>