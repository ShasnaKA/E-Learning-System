<?php
 //since insidegrpheader also contains session_start no need to give it here.
 include 'connection.php';
 include 'insidegrpheader.php';

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
 
       $instqry="SELECT teachinstemail FROM tblTeacher where teachemail='$uid'";
       $instrslt=$conn->query($instqry);
       $instr1=mysqli_fetch_array($instrslt);

      $grpid="SELECT gid from tblGroup where gname='$gname' AND ginstemail='$instr1[0]' AND g_host_email='$uid' AND gstatus=1";
      $grpresult=$conn->query($grpid);
      $grpr2=mysqli_fetch_array($grpresult);


   //$sql="SELECT testname,tblStudent.studname from tblTest JOIN tblGroupstud ON tblGroupstud.sgid=tblTest.testgid JOIN tblSubmtest ON tblSubmtest.submtest_gid=tblGroupstud.sgid OR  tblSubmtest.submtest_gid=tblTest.testgid AND tblSubmtest.subm_testid=tblTest.testid JOIN tblStudent ON tblStudent.studemail=tblGroupstud.gstudemail where tblGroupstud.gstudid NOT IN (SELECT submtest_gstudid from tblSubmtest where tblSubmtest.submtest_gid='$grpr2[0]')";

   //$sql="SELECT tblGroupstud.gstudemail,testname from tblTest JOIN tblGroupstud where tblTest.testgid='$grpr2[0]' AND tblGroupstud.sgid='$grpr2[0]' AND  tblGroupstud.gstudid NOT IN (SELECT tblGroupstud.gstudid from tblTest JOIN tblSubmtest ON tblSubmtest.submtest_gid=tblTest.testgid OR tblSubmtest.subm_testid=tblTest.testid JOIN tblGroupstud ON tblGroupstud.gstudid=tblSubmtest.submtest_gstudid JOIN tblStudent ON tblStudent.studemail=tblGroupstud.gstudemail where tblSubmtest.submtest_gid='$grpr2[0]' AND teststatus=1 AND tblGroupstud.gstudstatus=1 ORDER BY CONCAT(CONCAT(testdate,' '),testendtime) DESC ,tblStudent.studname ASC) ";

   $sql="SELECT tblStudent.studname,testname,tblGroupstud.gstudid,tblTestmark.testmrk from tblTest JOIN tblGroupstud ON tblGroupstud.sgid=tblTest.testgid JOIN tblStudent ON tblGroupstud.gstudemail=tblStudent.studemail LEFT OUTER JOIN tblSubmtest ON tblSubmtest.submtest_gid=tblGroupstud.sgid AND tblSubmtest.subm_testid=tblTest.testid OR tblSubmtest.submtest_gstudid=tblGroupstud.gstudid LEFT JOIN tblTestmark ON tblTest.testgid=tblTestmark.testmrkgid AND tblTest.testid=tblTestmark.testmrktestid AND tblGroupstud.gstudid=tblTestmark.testmrkgstudid  where testgid='$grpr2[0]' AND testid='$testid' AND tblGroupstud.sgid='$grpr2[0]' AND tblGroupstud.gstudid NOT IN (SELECT submtest_gstudid from tblSubmtest where submtest_gid='$grpr2[0]' AND subm_testid='$testid' ) group by gstudemail";

      $result=$conn->query($sql);
      //echo $sql;
       
       while($row=mysqli_fetch_array($result)) 
        {
            echo '<tr class="datarows"><td><b>'.$row['studname'].'</b></td>';
            echo '<td>'.$row['testname'].'</td>';
            echo '<td><em style="color:  #525453 ">Missing!</em></td>';
            if($row['testmrk']==NULL)
              echo '<td style="color:gray">-----</td>';
            else
            echo '<td>'.$row['testmrk'].'</td>';
            echo '<td><button><a href="teachchecktestmissing.php?gname='.$gname.' & gstudid='.$row['gstudid'].'& testid='.$testid.'&gid='.$grpr2[0].'& marks=0">Mark 0 Points</a></button></td></tr>';
        }
     

    ?>
       
       
  </table>
 </div>
  
  
</body>



</html>