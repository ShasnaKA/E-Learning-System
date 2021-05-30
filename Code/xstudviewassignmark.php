<?php
// already has a session_start no need to give it here for  $SESSION['userid']
include 'connection.php';
include 'xstudinsidegrpheader.php';
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

      $grpid="SELECT xgid from tblXGroup where xgname='$gname' AND xgstatus=1";
      $grpresult=$conn->query($grpid);
      $grpr2=mysqli_fetch_array($grpresult);

      $sql1="SELECT xgstudid from tblXGroupstud where xsgid='$grpr2[0]' AND xgstudemail='$uid' AND xgstudstatus=1";
      $sql1result=$conn->query($sql1);
      $sql1row=mysqli_fetch_array($sql1result);//to use gstudid in nxt query $sql

      $q1="SELECT count(xassignid) from tblXAssignment where xassignstatus=1 AND xassigngid='$grpr2[0]'";
      $q1rslt=$conn->query($q1);
      $q1rowcount=mysqli_fetch_array($q1rslt);

      $sql="SELECT xassignid,xassignname,xassignmax,tblXAssignmark.xassignmrk,tblXAssignmark.xassignmrkstatus,tblXAssignmark.xassignmrkgstudid FROM tblXAssignment LEFT JOIN tblXAssignmark ON tblXAssignment.xassignid=tblXAssignmark.xassignmrkassignid where (tblXAssignmark.xassignmrkgstudid='$sql1row[0]' AND tblXAssignmark.xassignmrkgid='$grpr2[0]') OR xassigngid='$grpr2[0]' AND xassignstatus=1";
       $result=$conn->query($sql);

      $j=0;
      $todoname=array();
     
       while($row=mysqli_fetch_array($result))
        { 
            if($row['xassignmrkstatus']==1 AND $row['xassignmrkgstudid']!=$sql1row[0])
            {
              array_push($todoname,$row['xassignid']);
              continue;
            }
            echo '<tr class="datarows"><td><b>'.$row['xassignname'].'</b></td>';
            echo '<td>'.$row['xassignmax'].'</td>';
            if($row['xassignmrk']==NULL)
           {
             echo '<td><em style="color:gray">----</em></td></tr>';
           }
           else
            echo '<td>'.$row['xassignmrk'].'</td></tr>';
          $j=$j+1;
            
         }

        if($j < $q1rowcount[0] )
        {
          $myq="SELECT xassignid,xassignname,xassignmax from tblXAssignment JOIN tblXAssignmark ON tblXAssignment.xassignid=tblXAssignmark.xassignmrkassignid where xassigngid='$grpr2[0]' AND xassignstatus=1 AND xassignid NOT IN (SELECT xassignmrkassignid from tblXAssignmark where xassignmrkgid='$grpr2[0]' AND xassignmrkgstudid='$sql1row[0]')";
          $myqresult=$conn->query($myq); 

          while($myqrow=mysqli_fetch_array($myqresult))
          {
           foreach($todoname as $value)
           {
             if($value==$myqrow[0])
             {
                echo '<tr class="datarows"><td><b>'.$myqrow['xassignname'].'</b></td>';
                echo '<td>'.$myqrow['xassignmax'].'</td>';
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