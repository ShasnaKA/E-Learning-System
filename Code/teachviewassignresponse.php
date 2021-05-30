<?php
 //since insidegrpheader also contains session_start no need to give it here.
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
      <td colspan="5"><h2 style="text-align:center">Assignment Submissions</h2></td>
    </tr>
    <tr>
      <th>Student Name</th>
      <th>Assignment</th>
      <th>Submission</th>
    </tr>

    <?php
 
       $uid=$_SESSION['userid'];
 
       $instqry="SELECT teachinstemail FROM tblTeacher where teachemail='$uid'";
       $instrslt=$conn->query($instqry);
       $instr1=mysqli_fetch_array($instrslt);

      $grpid="SELECT gid from tblGroup where gname='$gname' AND ginstemail='$instr1[0]' AND g_host_email='$uid'";
      $grpresult=$conn->query($grpid);
      $grpr2=mysqli_fetch_array($grpresult);

      $sql="SELECT gstudemail,tblSubmassign.assign_answr,tblSubmassign.assign_answr_status from tblGroupstud LEFT JOIN tblSubmassign ON tblGroupstud.gstudid=tblSubmassign.submassign_gstudid  where gstudid IN(SELECT submassign_gstudid from tblSubmassign LEFT JOIN tblAssignment ON tblSubmassign.subm_assignid=tblAssignment.assignid where submassign_gid='$grpr2[0]' AND assign_answr_status=1 AND tblAssignment.assignstatus=1) AND gstudemail IN(SELECT uname from tblLogin where status=1)ORDER BY gstudemail";

       //$sql="SELECT tblGroupstud.gstudemail,tblTest.testname,test_answr,test_answr_status from tblSubmtest LEFT JOIN tblTest ON tblTest.testgid=tblSubmtest.submtest_gid INNER JOIN tblGroupstud ON tblGroupstud.gstudid=tblSubmtest.submtest_gstudid where submtest_gid='$grpr2[0]' AND tblTest.teststatus=1 ORDER BY testname,gstudemail";

       //$sql="SELECT tblSubject.subjname,tblSubject.subjsem,tblCourse.cname,tblDepartment.depname,tblGroup.gname,tblGroup.gstatus FROM tblSubject INNER JOIN tblCourse ON tblSubject.subjcid=tblCourse.cid INNER JOIN tblDepartment ON tblCourse.depid=tblDepartment.depid LEFT JOIN tblGroup on tblGroup.gsubjid=tblSubject.subjid where tblSubject.subjteachemail='$uid' AND subjinstemail='$r[0]' AND tblCourse.coursestatus=1 AND subjstatus=1";

       $result=$conn->query($sql);
       
       
       while(!$row=mysqli_fetch_array($result))
        { 
          //echo '<script>alert("'.$row[1].'")</script>';
            echo '<tr class="datarows"><td>'.$row['gstudemail'].'</td>';
            echo '<td>NIL</td>';
            //echo '<td><b>'.$row['testname'].'</b></td>';
            if($row['assign_answr_status']==-1)
            {
              $row['assign_answr']="<em style='color:blue;'>Deleted<b style='color:red'>!</b></em>";
              echo '<td>'.$row['assign_answr_status'].'</td></tr>';
            }
            else if($row['assign_answr_status']==1)
            {
              // $row['gname']="<em style='color:blue;'>- NIL -</em>";
               echo '<td>'.$row['assign_answr'].'</td></tr>';
            }
        
         }

    ?>
     <tr class="datarows"><td>my@gmail.com</td>
     <td>Assignname</td>
     <td>fdfdf.jpg</td></tr> 
           <tr class="datarows"><td>my@gmail.com</td>
     <td>Assignname</td>
     <td>fdfdf.jpg</td></tr>
  </table>
 </div>
  
  
</body>



</html>