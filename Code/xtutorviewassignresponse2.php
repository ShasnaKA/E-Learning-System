<?php
 //since insidegrpheader also contains session_start no need to give it here.
 include 'connection.php';
 include 'xtutorinsidegrpheader.php';

 //$id=$_GET['id'];//testid
 $gname=$_GET['gname'];

?>

<!DOCTYPE html>

<head>
  <link rel="stylesheet" type="text/css" href="displaytable.css">
  <style>
    button{
      border:1px dotted gray;
      margin-left:20px;
      width:80px;
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
      <td colspan="8"><h2 style="text-align:center">Assignment Submissions</h2></td>
    </tr>
    <tr>
      <th>Name</th>
      <th>Title</th>
      <th>Total</th>
      <th>Date</th>
      <th>Time Allowed</th>
      <th>Submission</th>
      <th colspan="2">Score</th>
    </tr>

    <?php
 
    $uid=$_SESSION['userid'];
 
    $grpid="SELECT xgid from tblXGroup where xgname='$gname' AND xtutorhostemail='$uid' AND xgstatus=1";
    $grpresult=$conn->query($grpid);
    $grpr2=mysqli_fetch_array($grpresult);

   $sql="SELECT xassignid,xassignname,xassignmax,xassigndate,xassigntime,tblXSubmassign.xassign_answr,tblXSubmassign.xassign_answr_status,tblXStudent.xstudname,tblXGroupstud.xgstudid,tblXAssignmark.xassignmrk from tblXAssignment JOIN tblXSubmassign ON tblXSubmassign.xsubmassign_gid=tblXAssignment.xassigngid AND tblXSubmassign.xsubm_assignid=tblXAssignment.xassignid JOIN tblXGroupstud ON tblXGroupstud.xgstudid=tblXSubmassign.xsubmassign_gstudid JOIN tblXStudent ON tblXStudent.xstudemail=tblXGroupstud.xgstudemail LEFT JOIN tblXAssignmark ON tblXAssignment.xassigngid=tblXAssignmark.xassignmrkgid AND tblXAssignment.xassignid=tblXAssignmark.xassignmrkassignid AND tblXGroupstud.xgstudid=tblXAssignmark.xassignmrkgstudid  where tblXSubmassign.xsubmassign_gid='$grpr2[0]' AND xassignstatus=1 AND (tblXSubmassign.xassign_answr_status=1 OR tblXSubmassign.xassign_answr_status=-1)AND tblXGroupstud.xgstudstatus=1 ORDER BY CONCAT(CONCAT(xassigndate,' '),xassigntime) DESC ,tblXStudent.xstudname ASC";

      $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result)) /*|| $myqrow=mysqli_fetch_array($myqrslt)*/
        { 
          $date=$row['xassigndate'];
          $day=date('j', strtotime($date));
          $month=date('F', strtotime($date));
          $month3=substr($month,0,3);
          $year=date('Y', strtotime($date));
          $dayname=date('l', strtotime($date));
          $dayname3=substr($dayname,0,3);  

            echo '<tr class="datarows"><td><b>'.$row['xstudname'].'</b></td>';
            echo '<td><b>'.$row['xassignname'].'</b></td>';
            echo '<td>'.$row['xassignmax'].'</td>';
            echo '<td>'.$day.' '.$month3.' '.$year.' ('.$dayname3.')</td>';
            echo '<td>'.date("g:i a" ,strtotime($row['xassigntime'])).'</td>';
            if($row['xassign_answr_status']==1)
             echo '<td><a href="xstudviewassign.php?assignfile='.$row['xassign_answr'].'" style="color:blue;text-decoration:none">'.$row['xassign_answr'].'</a></td>';
           else
             echo '<td><em style="color:red">Deleted!</em></td>';
           if($row['xassignmrk']==NULL)
            $row['xassignmrk']='<em style="color:gray">---</em>';  
           echo '<td>'.$row['xassignmrk'].'</td>';
           echo '<td><button><a href="xtutorcheckassign.php?gname='.$gname.' & gstudid='.$row['xgstudid'].'& assignid='.$row['xassignid'].'&assign_answr='.$row['xassign_answr'].'&gid='.$grpr2[0].'">Check</a></button></td></tr>';
      
            
      
      }
     

    ?>
       
       
  </table>
 </div>
  
  
</body>



</html>