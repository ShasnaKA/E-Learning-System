<?php
 //since insidegrpheader also contains session_start no need to give it here.
 include 'connection.php';
 include 'xtutorinsidegrpheader.php';

 $testid=$_GET['testid'];//testid
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
      <th>Test</th>
      <th>Submission</th>
      <th colspan="2">Score </th>
    </tr>

    <?php
 
       $uid=$_SESSION['userid'];

      $grpid="SELECT xgid from tblXGroup where xgname='$gname' AND xtutorhostemail='$uid' AND xgstatus=1";
      $grpresult=$conn->query($grpid);
      $grpr2=mysqli_fetch_array($grpresult);


   $sql="SELECT tblXStudent.xstudname,xtestname,tblXGroupstud.xgstudid,tblXTestmark.xtestmrk from tblXTest JOIN tblXGroupstud ON tblXGroupstud.xsgid=tblXTest.xtestgid JOIN tblXStudent ON tblXGroupstud.xgstudemail=tblXStudent.xstudemail LEFT OUTER JOIN tblXSubmtest ON tblXSubmtest.xsubmtest_gid=tblXGroupstud.xsgid AND tblXSubmtest.xsubm_testid=tblXTest.xtestid OR tblXSubmtest.xsubmtest_gstudid=tblXGroupstud.xgstudid LEFT JOIN tblXTestmark ON tblXTest.xtestgid=tblXTestmark.xtestmrkgid AND tblXTest.xtestid=tblXTestmark.xtestmrktestid AND tblXGroupstud.xgstudid=tblXTestmark.xtestmrkgstudid  where xtestgid='$grpr2[0]' AND xtestid='$testid' AND tblXGroupstud.xsgid='$grpr2[0]' AND tblXGroupstud.xgstudid NOT IN (SELECT xsubmtest_gstudid from tblXSubmtest where xsubmtest_gid='$grpr2[0]' AND xsubm_testid='$testid' ) group by xgstudemail";

      $result=$conn->query($sql);
      
       while($row=mysqli_fetch_array($result)) 
        {
            echo '<tr class="datarows"><td><b>'.$row['xstudname'].'</b></td>';
            echo '<td>'.$row['xtestname'].'</td>';
            echo '<td><em style="color:  #525453 ">Missing!</em></td>';
            if($row['xtestmrk']==NULL)
              echo '<td style="color:gray">-----</td>';
            else
            echo '<td>'.$row['xtestmrk'].'</td>';
            echo '<td><button><a href="xtutorchecktestmissing.php?gname='.$gname.' & gstudid='.$row['xgstudid'].'& testid='.$testid.'&gid='.$grpr2[0].'& marks=0">Mark 0 Points</a></button></td></tr>';
        }
     

    ?>
       
       
  </table>
 </div>
  
  
</body>



</html>