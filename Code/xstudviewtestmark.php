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
      <td colspan="3"><h2 style="text-align:center">Test Marks</h2></td>
    </tr>
    <tr>
      <th>Test</th>
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


      $q1="SELECT count(xtestid) from tblXTest where xteststatus=1 AND xtestgid='$grpr2[0]'";
      $q1rslt=$conn->query($q1);
      $q1rowcount=mysqli_fetch_array($q1rslt);

      $sql="SELECT xtestid,xtestname,xtestmax,tblXTestmark.xtestmrk,tblXTestmark.xtestmrkstatus,tblXTestmark.xtestmrkgstudid FROM tblXTest LEFT JOIN tblXTestmark ON tblXTest.xtestid=tblXTestmark.xtestmrktestid where (tblXTestmark.xtestmrkgstudid='$sql1row[0]' AND tblXTestmark.xtestmrkgid='$grpr2[0]') OR xtestgid='$grpr2[0]' AND xteststatus=1";
       $result=$conn->query($sql);

       $i=0;
       $testname=array();
       while($row=mysqli_fetch_array($result))
        { 
            if($row['xtestmrkstatus']==1 AND $row['xtestmrkgstudid']!=$sql1row[0])
            {
              array_push($testname,$row['xtestid']);
              continue;
            }
            echo '<tr class="datarows"><td><b>'.$row['xtestname'].'</b></td>';
            echo '<td>'.$row['xtestmax'].'</td>';
            if($row['xtestmrk']==NULL)
           {
             echo '<td><em style="color:gray">----</em></td></tr>';
           }
           else
            echo '<td>'.$row['xtestmrk'].'</td></tr>';

           $i=$i+1;
            
         }

        if($i < $q1rowcount[0] )
        {
           $myq="SELECT xtestid,xtestname,xtestmax from tblXTest JOIN tblXTestmark ON tblXTest.xtestid=tblXTestmark.xtestmrktestid where xtestgid='$grpr2[0]' AND xteststatus=1 AND xtestid NOT IN (SELECT xtestmrktestid from tblXTestmark where xtestmrkgid='$grpr2[0]' AND xtestmrkgstudid='$sql1row[0]')";
          $myqresult=$conn->query($myq); 

          while($myqrow=mysqli_fetch_array($myqresult))
          {
           foreach($testname as $value)
           {
             if($value==$myqrow[0])
             {
                echo '<tr class="datarows"><td><b>'.$myqrow['xtestname'].'</b></td>';
                echo '<td>'.$myqrow['xtestmax'].'</td>';
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