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
 
       $instqry="SELECT teachinstemail FROM tblTeacher where teachemail='$uid'";
       $instrslt=$conn->query($instqry);
       $instr1=mysqli_fetch_array($instrslt);

      $grpid="SELECT gid from tblGroup where gname='$gname' AND ginstemail='$instr1[0]' AND g_host_email='$uid' AND gstatus=1";
      $grpresult=$conn->query($grpid);
      $grpr2=mysqli_fetch_array($grpresult);

   $sql="SELECT testid,testname,testmax,testdate,teststarttime,testendtime,tblSubmtest.test_answr,tblSubmtest.test_answr_status,tblStudent.studname,tblGroupstud.gstudid,tblTestmark.testmrk from tblTest JOIN tblSubmtest ON tblSubmtest.submtest_gid=tblTest.testgid AND tblSubmtest.subm_testid=tblTest.testid JOIN tblGroupstud ON tblGroupstud.gstudid=tblSubmtest.submtest_gstudid JOIN tblStudent ON tblStudent.studemail=tblGroupstud.gstudemail LEFT JOIN tblTestmark ON tblTest.testgid=tblTestmark.testmrkgid AND tblTest.testid=tblTestmark.testmrktestid AND tblGroupstud.gstudid=tblTestmark.testmrkgstudid where tblSubmtest.submtest_gid='$grpr2[0]' AND teststatus=1 AND (tblSubmtest.test_answr_status=1 OR tblSubmtest.test_answr_status=-1)AND tblGroupstud.gstudstatus=1 ORDER BY CONCAT(CONCAT(testdate,' '),testendtime) DESC ,tblStudent.studname ASC";


      $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result))
        { 
          $date=$row['testdate'];
          $day=date('j', strtotime($date));
          $month=date('F', strtotime($date));
          $month3=substr($month,0,3);
          $year=date('Y', strtotime($date));
          $dayname=date('l', strtotime($date));
          $dayname3=substr($dayname,0,3);  

            echo '<tr class="datarows"><td><b>'.$row['studname'].'</b></td>';
            echo '<td><b>'.$row['testname'].'</b></td>';
            echo '<td>'.$row['testmax'].'</td>';
            echo '<td>'.$day.' '.$month3.' '.$year.' ('.$dayname3.')</td>';
            echo '<td>'.date("g:i a" ,strtotime($row['teststarttime'])).' - '.date("g:i a",strtotime($row['testendtime'])). '</td>';
            if($row['test_answr_status']==1)
             echo '<td><a href="studviewqpaper.php?qpaperfile='.$row['test_answr'].'" style="color:blue;text-decoration:none">'.$row['test_answr'].'</a></td>';
           else
             echo '<td><em style="color:red">Deleted!</em></td>';
           if($row['testmrk']==NULL)
            $row['testmrk']='<em style="color:gray">---</em>';  
           echo '<td>'.$row['testmrk'].'</td>';
           echo '<td><button><a href="teachchecktest.php?gname='.$gname.' & gstudid='.$row['gstudid'].'& testid='.$row['testid'].'&test_answr='.$row['test_answr'].'&gid='.$grpr2[0].'">Check</a></button></td></tr>';
            
      
      }
     

    ?>
       
       
  </table>
 </div>
  
  
</body>



</html>