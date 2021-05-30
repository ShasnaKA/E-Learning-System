<?php
 //since insidegrpheader also contains session_start no need to give it here.
 include 'connection.php';
 include 'xtutorinsidegrpheader.php';

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
 
      $grpid="SELECT xgid from tblXGroup where xgname='$gname' AND xtutorhostemail='$uid' AND xgstatus=1";
      $grpresult=$conn->query($grpid);
      $grpr2=mysqli_fetch_array($grpresult);

      $sql="SELECT tblXStudent.xstudname,xassignname,tblXGroupstud.xgstudid,tblXAssignmark.xassignmrk from tblXAssignment JOIN tblXGroupstud ON tblXGroupstud.xsgid=tblXAssignment.xassigngid JOIN tblXStudent ON tblXGroupstud.xgstudemail=tblXStudent.xstudemail LEFT OUTER JOIN tblXSubmassign ON tblXSubmassign.xsubmassign_gid=tblXGroupstud.xsgid AND tblXSubmassign.xsubm_assignid=tblXAssignment.xassignid OR tblXSubmassign.xsubmassign_gstudid=tblXGroupstud.xgstudid LEFT JOIN tblXAssignmark ON tblXAssignment.xassigngid=tblXAssignmark.xassignmrkgid AND tblXAssignment.xassignid=tblXAssignmark.xassignmrkassignid AND tblXGroupstud.xgstudid=tblXAssignmark.xassignmrkgstudid  where xassigngid='$grpr2[0]' AND xassignid='$assignid' AND tblXGroupstud.xsgid='$grpr2[0]' AND tblXGroupstud.xgstudid NOT IN (SELECT xsubmassign_gstudid from tblXSubmassign where xsubmassign_gid='$grpr2[0]' AND xsubm_assignid='$assignid' ) group by xgstudemail";

      $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result)) 
        {
            echo '<tr class="datarows"><td><b>'.$row['xstudname'].'</b></td>';
            echo '<td>'.$row['xassignname'].'</td>';
            echo '<td><em style="color:  #525453 ">Missing!</em></td>';
            if($row['xassignmrk']==NULL)
              echo '<td style="color:gray">-----</td>';
            else
            echo '<td>'.$row['xassignmrk'].'</td>';
            echo '<td><button><a href="xtutorcheckassignmissing.php?gname='.$gname.' & gstudid='.$row['xgstudid'].'& assignid='.$assignid.'&gid='.$grpr2[0].'& marks=0">Mark 0 Points</a></button></td></tr>';
        }
     

    ?>
       
       
  </table>
 </div>
  
  
</body>



</html>