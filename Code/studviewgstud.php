<?php
//since teacherheader already has a session_start no need to give it here for  $SESSION['userid']
include 'connection.php';
include 'studinsidegrpheader.php';
//$cid=$_GET['cid'];
//$sem=$_GET['sem'];
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
      <td colspan="3"><h2 style="text-align:center">Group Students</h2></td>
    </tr>
    <tr>
      <th>Name</th>
      <th>Course</th>
      <th>Semester</th>   
    </tr>

       <?php
          
       
       $uid=$_SESSION['userid'];
       

      $inst="SELECT studinstemail from tblStudent where studemail='$uid'";
      $instresult=$conn->query($inst);
      $instr1=mysqli_fetch_array($instresult);

      $grpid="SELECT gid from tblGroup where gname='$gname' AND ginstemail='$instr1[0]'";
      $grpresult=$conn->query($grpid);
      $grpr2=mysqli_fetch_array($grpresult);


      //To display login person as the 1st person in the student list
      $personq="SELECT studname,studemail,studsem,tblCourse.cname from tblStudent INNER JOIN tblCourse ON tblStudent.studcid=tblCourse.cid INNER JOIN tblGroupstud ON tblGroupstud.gstudemail=tblStudent.studemail where tblGroupstud.sgid='$grpr2[0]' AND gstudstatus=1 AND gstudemail='$uid'";
      $personresult=$conn->query($personq);
      $personrow=mysqli_fetch_array($personresult);

      echo '<tr class="datarows"><td><b>'.$personrow['studname'].' <em style="color:black">(You)</em>';
      echo '<td>'.$personrow['cname'].'</td>';
      echo '<td>'.$personrow['studsem'].'</td></tr>';


      $sql="SELECT studname,studemail,studsem,tblCourse.cname from tblStudent INNER JOIN tblCourse ON tblStudent.studcid=tblCourse.cid INNER JOIN tblGroupstud ON tblGroupstud.gstudemail=tblStudent.studemail where tblGroupstud.sgid='$grpr2[0]' AND gstudstatus=1 AND gstudemail!='$uid'";
     
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