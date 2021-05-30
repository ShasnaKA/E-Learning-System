<?php
//since xtutorinsidegrpheader already has a session_start no need to give it here for  $SESSION['userid']
include 'connection.php';
include 'xtutorinsidegrpheader.php';
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
      <td colspan="6"><h2 style="text-align:center">Group Students</h2></td>
    </tr>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Age</th>
      <th>Contact Number</th>   
    </tr>

       <?php
          
       
       $uid=$_SESSION['userid'];

      $grpid="SELECT xgid from tblXGroup where xgname='$gname' AND xtutorhostemail='$uid'";
      $grpresult=$conn->query($grpid);
      $grpr2=mysqli_fetch_array($grpresult);

      $sql="SELECT xstudname,xstudemail,xstudage,xstudcontact from tblXStudent INNER JOIN tblXGroupstud ON tblXStudent.xstudemail=tblXGroupstud.xgstudemail where tblXGroupstud.xsgid='$grpr2[0]' AND xgstudstatus=1 ORDER BY xstudname";
     
       $result=$conn->query($sql);
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['xstudname'].'</b></td>';
            echo '<td>'.$row['xstudemail'].'</td>';
            echo '<td>'.$row['xstudage'].'</td>';
            echo '<td>'.$row['xstudcontact'].'</td></tr>';
            
         }


      ?>
       
    </table>
 </div>
  
</body>

</html>