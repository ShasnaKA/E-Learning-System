<?php
 //since insidegrpheader also contains session_start no need to give it here.
 include 'connection.php';
 include 'insidegrpheader.php';

 $assignid=$_GET['assignid'];
 $gname=$_GET['gname'];

?>

<!DOCTYPE html>

<head>
  <link rel="stylesheet" type="text/css" href="displaytable.css">
   <style>
    button{
      border:1px dotted gray;
      margin-left:40px;
      width:150px;
    }
    button a{
      color:black;
      text-decoration:none;

    }
    button a:hover{
      color:black;
      text-decoration: none;
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
      <td colspan="5"><h2 style="text-align:center">Submissions Missing</h2></td>
    </tr>
    <tr>
      <th>Name</th>
      <th>Assignment</th>
      <th>Submission</th>
      <th colspan="2">Score</th>
    </tr>

    <?php
 
       $uid=$_SESSION['userid'];
 
       $instqry="SELECT teachinstemail FROM tblTeacher where teachemail='$uid'";
       $instrslt=$conn->query($instqry);
       $instr1=mysqli_fetch_array($instrslt);

      $grpid="SELECT gid from tblGroup where gname='$gname' AND ginstemail='$instr1[0]' AND g_host_email='$uid' AND gstatus=1";
      $grpresult=$conn->query($grpid);
      $grpr2=mysqli_fetch_array($grpresult);

      $sql="SELECT tblStudent.studname,assignname,tblGroupstud.gstudid,tblAssignmark.assignmrk from tblAssignment JOIN tblGroupstud ON tblGroupstud.sgid=tblAssignment.assigngid JOIN tblStudent ON tblGroupstud.gstudemail=tblStudent.studemail LEFT OUTER JOIN tblSubmassign ON tblSubmassign.submassign_gid=tblGroupstud.sgid AND tblSubmassign.subm_assignid=tblAssignment.assignid OR tblSubmassign.submassign_gstudid=tblGroupstud.gstudid LEFT JOIN tblAssignmark ON tblAssignment.assigngid=tblAssignmark.assignmrkgid AND tblAssignment.assignid=tblAssignmark.assignmrkassignid AND tblGroupstud.gstudid=tblAssignmark.assignmrkgstudid  where assigngid='$grpr2[0]' AND assignid='$assignid' AND tblGroupstud.sgid='$grpr2[0]' AND tblGroupstud.gstudid NOT IN (SELECT submassign_gstudid from tblSubmassign where submassign_gid='$grpr2[0]' AND subm_assignid='$assignid' ) group by gstudemail";

      $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result)) 
        {
            echo '<tr class="datarows"><td><b>'.$row['studname'].'</b></td>';
            echo '<td>'.$row['assignname'].'</td>';
            echo '<td><em style="color:  #525453 ">Missing!</em></td>';
            if($row['assignmrk']==NULL)
              echo '<td style="color:gray">-----</td>';
            else
            echo '<td>'.$row['assignmrk'].'</td>';
            echo '<td><button><a href="teachcheckassignmissing.php?gname='.$gname.' & gstudid='.$row['gstudid'].'& assignid='.$assignid.'&gid='.$grpr2[0].'& marks=0">Mark 0 Points</a></button></td></tr>';
        }
     

    ?>
       
       
  </table>
 </div>
  
  
</body>



</html>