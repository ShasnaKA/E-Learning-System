<?php
 //since insidegrpheader also contains session_start no need to give it here.
 include 'connection.php';
 include 'insidegrpheader.php';

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
 
       $instqry="SELECT teachinstemail FROM tblTeacher where teachemail='$uid'";
       $instrslt=$conn->query($instqry);
       $instr1=mysqli_fetch_array($instrslt);

      $grpid="SELECT gid from tblGroup where gname='$gname' AND ginstemail='$instr1[0]' AND g_host_email='$uid' AND gstatus=1";
      $grpresult=$conn->query($grpid);
      $grpr2=mysqli_fetch_array($grpresult);

   $sql="SELECT assignid,assignname,assignmax,assigndate,assigntime,tblSubmassign.assign_answr,tblSubmassign.assign_answr_status,tblStudent.studname,tblGroupstud.gstudid,tblAssignmark.assignmrk from tblAssignment JOIN tblSubmassign ON tblSubmassign.submassign_gid=tblAssignment.assigngid AND tblSubmassign.subm_assignid=tblAssignment.assignid JOIN tblGroupstud ON tblGroupstud.gstudid=tblSubmassign.submassign_gstudid JOIN tblStudent ON tblStudent.studemail=tblGroupstud.gstudemail LEFT JOIN tblAssignmark ON tblAssignment.assigngid=tblAssignmark.assignmrkgid AND tblAssignment.assignid=tblAssignmark.assignmrkassignid AND tblGroupstud.gstudid=tblAssignmark.assignmrkgstudid  where tblSubmassign.submassign_gid='$grpr2[0]' AND assignstatus=1 AND (tblSubmassign.assign_answr_status=1 OR tblSubmassign.assign_answr_status=-1)AND tblGroupstud.gstudstatus=1 ORDER BY CONCAT(CONCAT(assigndate,' '),assigntime) DESC ,tblStudent.studname ASC";

      $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result)) /*|| $myqrow=mysqli_fetch_array($myqrslt)*/
        { 
          $date=$row['assigndate'];
          $day=date('j', strtotime($date));
          $month=date('F', strtotime($date));
          $month3=substr($month,0,3);
          $year=date('Y', strtotime($date));
          $dayname=date('l', strtotime($date));
          $dayname3=substr($dayname,0,3);  

            echo '<tr class="datarows"><td><b>'.$row['studname'].'</b></td>';
            echo '<td><b>'.$row['assignname'].'</b></td>';
            echo '<td>'.$row['assignmax'].'</td>';
            echo '<td>'.$day.' '.$month3.' '.$year.' ('.$dayname3.')</td>';
            echo '<td>'.date("g:i a" ,strtotime($row['assigntime'])).'</td>';
            if($row['assign_answr_status']==1)
             echo '<td><a href="studviewassign.php?assignfile='.$row['assign_answr'].'" style="color:blue;text-decoration:none">'.$row['assign_answr'].'</a></td>';
           else
             echo '<td><em style="color:red">Deleted!</em></td>';
           if($row['assignmrk']==NULL)
            $row['assignmrk']='<em style="color:gray">---</em>';  
           echo '<td>'.$row['assignmrk'].'</td>';
           echo '<td><button><a href="teachcheckassign.php?gname='.$gname.' & gstudid='.$row['gstudid'].'& assignid='.$row['assignid'].'&assign_answr='.$row['assign_answr'].'&gid='.$grpr2[0].'">Check</a></button></td></tr>';
      
            
      
      }
     

    ?>
       
       
  </table>
 </div>
  
  
</body>



</html>