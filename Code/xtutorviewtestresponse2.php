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
      <td colspan="8"><h2 style="text-align:center">Test Submissions</h2></td>
    </tr>
    <tr>
      <th>Name</th>
      <th>Test</th>
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

   $sql="SELECT xtestid,xtestname,xtestmax,xtestdate,xteststarttime,xtestendtime,tblXSubmtest.xtest_answr,tblXSubmtest.xtest_answr_status,tblXStudent.xstudname,tblXGroupstud.xgstudid,tblXTestmark.xtestmrk from tblXTest JOIN tblXSubmtest ON tblXSubmtest.xsubmtest_gid=tblXTest.xtestgid AND tblXSubmtest.xsubm_testid=tblXTest.xtestid JOIN tblXGroupstud ON tblXGroupstud.xgstudid=tblXSubmtest.xsubmtest_gstudid JOIN tblXStudent ON tblXStudent.xstudemail=tblXGroupstud.xgstudemail LEFT JOIN tblXTestmark ON tblXTest.xtestgid=tblXTestmark.xtestmrkgid AND tblXTest.xtestid=tblXTestmark.xtestmrktestid AND tblXGroupstud.xgstudid=tblXTestmark.xtestmrkgstudid where tblXSubmtest.xsubmtest_gid='$grpr2[0]' AND xteststatus=1 AND (tblXSubmtest.xtest_answr_status=1 OR tblXSubmtest.xtest_answr_status=-1)AND tblXGroupstud.xgstudstatus=1 ORDER BY CONCAT(CONCAT(xtestdate,' '),xtestendtime) DESC ,tblXStudent.xstudname ASC";

      $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result))
        { 
          $date=$row['xtestdate'];
          $day=date('j', strtotime($date));
          $month=date('F', strtotime($date));
          $month3=substr($month,0,3);
          $year=date('Y', strtotime($date));
          $dayname=date('l', strtotime($date));
          $dayname3=substr($dayname,0,3);  

            echo '<tr class="datarows"><td><b>'.$row['xstudname'].'</b></td>';
            echo '<td><b>'.$row['xtestname'].'</b></td>';
            echo '<td>'.$row['xtestmax'].'</td>';
            echo '<td>'.$day.' '.$month3.' '.$year.' ('.$dayname3.')</td>';
            echo '<td>'.date("g:i a" ,strtotime($row['xteststarttime'])).' - '.date("g:i a",strtotime($row['xtestendtime'])). '</td>';
            if($row['xtest_answr_status']==1)
             echo '<td><a href="xstudviewqpaper.php?qpaperfile='.$row['xtest_answr'].'" style="color:blue;text-decoration:none">'.$row['xtest_answr'].'</a></td>';
           else
             echo '<td><em style="color:red">Deleted!</em></td>';
           if($row['xtestmrk']==NULL)
            $row['xtestmrk']='<em style="color:gray">---</em>';  
           echo '<td>'.$row['xtestmrk'].'</td>';
           echo '<td><button><a href="xtutorchecktest.php?gname='.$gname.' & gstudid='.$row['xgstudid'].'& testid='.$row['xtestid'].'&test_answr='.$row['xtest_answr'].'&gid='.$grpr2[0].'">Check</a></button></td></tr>';
            
      
      }
     

    ?>
       
       
  </table>
 </div>
  
  
</body>



</html>