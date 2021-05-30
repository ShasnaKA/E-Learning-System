<?php
// already has a session_start no need to give it here for  $SESSION['userid']
include 'connection.php';
include 'studinsidegrpheader.php';
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
      <td colspan="3"><h2 style="text-align:center">Assignment Marks</h2></td>
    </tr>
    <tr>
      <th>Assignment</th>
      <th>Maximum Marks</th>
      <th>Marks Scored</th>   
    </tr>

       <?php
          
       
       $uid=$_SESSION['userid'];
       

      $inst="SELECT studinstemail from tblStudent where studemail='$uid'";
      $instresult=$conn->query($inst);
      $instr1=mysqli_fetch_array($instresult);

      $grpid="SELECT gid from tblGroup where gname='$gname' AND ginstemail='$instr1[0]'";
      $grpresult=$conn->query($grpid);
      $grpr2=mysqli_fetch_array($grpresult);

      $sql1="SELECT gstudid from tblGroupstud where sgid='$grpr2[0]' AND gstudemail='$uid' AND gstudstatus=1";
      $sql1result=$conn->query($sql1);
      $sql1row=mysqli_fetch_array($sql1result);//to use gstudid in nxt query $sql

      $q1="SELECT count(assignid) from tblAssignment where assignstatus=1 AND assigngid='$grpr2[0]'";
      $q1rslt=$conn->query($q1);
      $q1rowcount=mysqli_fetch_array($q1rslt);

      $sql="SELECT assignid,assignname,assignmax,tblAssignmark.assignmrk,tblAssignmark.assignmrkstatus,tblAssignmark.assignmrkgstudid FROM tblAssignment LEFT JOIN tblAssignmark ON tblAssignment.assignid=tblAssignmark.assignmrkassignid where (tblAssignmark.assignmrkgstudid='$sql1row[0]' AND tblAssignmark.assignmrkgid='$grpr2[0]') OR assigngid='$grpr2[0]' AND assignstatus=1";
       $result=$conn->query($sql);

      $j=0;
      $todoname=array();
     
       while($row=mysqli_fetch_array($result))
        { 
            if($row['assignmrkstatus']==1 AND $row['assignmrkgstudid']!=$sql1row[0])
            {
              array_push($todoname,$row['assignid']);
              continue;
            }
            echo '<tr class="datarows"><td><b>'.$row['assignname'].'</b></td>';
            echo '<td>'.$row['assignmax'].'</td>';
            if($row['assignmrk']==NULL)
           {
             echo '<td><em style="color:gray">----</em></td></tr>';
           }
           else
            echo '<td>'.$row['assignmrk'].'</td></tr>';
          $j=$j+1;
            
         }

        if($j < $q1rowcount[0] )
        {
          $myq="SELECT assignid,assignname,assignmax from tblAssignment JOIN tblAssignmark ON tblAssignment.assignid=tblAssignmark.assignmrkassignid where assigngid='$grpr2[0]' AND assignstatus=1 AND assignid NOT IN (SELECT assignmrkassignid from tblAssignmark where assignmrkgid='$grpr2[0]' AND assignmrkgstudid='$sql1row[0]')";
          $myqresult=$conn->query($myq); 

          while($myqrow=mysqli_fetch_array($myqresult))
          {
           foreach($todoname as $value)
           {
             if($value==$myqrow[0])
             {
                echo '<tr class="datarows"><td><b>'.$myqrow['assignname'].'</b></td>';
                echo '<td>'.$myqrow['assignmax'].'</td>';
                echo '<td><em style="color:gray">----</em></td></tr>';
             }
           }
          }
        }

      ?>
       
    </table>
 </div>
  
</body>

</html>