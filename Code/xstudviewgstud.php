<?php
//since teacherheader already has a session_start no need to give it here for  $SESSION['userid']
include 'connection.php';
include 'xstudinsidegrpheader.php';
//$cid=$_GET['cid'];
//$sem=$_GET['sem'];
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
      <td colspan="4"><h2 style="text-align:center">Group Students</h2></td>
    </tr>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Age</th>
      <th>Contact</th>   
    </tr>

       <?php
          
       
       $uid=$_SESSION['userid'];

      $grpid="SELECT xgid from tblXGroup where xgname='$gname' AND xgstatus=1";
      $grpresult=$conn->query($grpid);
      $grpr2=mysqli_fetch_array($grpresult);


      //To display login person as the 1st person in the student list
      $personq="SELECT xstudname,xstudemail,xstudage,xstudcontact from tblXStudent INNER JOIN tblXGroupstud ON tblXGroupstud.xgstudemail=tblXStudent.xstudemail where tblXGroupstud.xsgid='$grpr2[0]' AND xgstudstatus=1 AND xgstudemail='$uid'";
      $personresult=$conn->query($personq);
      $personrow=mysqli_fetch_array($personresult);

      echo '<tr class="datarows"><td><b>'.$personrow['xstudname'].' <em style="color:black">(You)</em>';
      echo '<td>'.$personrow['xstudemail'].'</td>';
      echo '<td>'.$personrow['xstudage'].'</td>';
      echo '<td>'.$personrow['xstudcontact'].'</td></tr>';


      $sql="SELECT xstudname,xstudemail,xstudage,xstudcontact from tblXStudent INNER JOIN tblXGroupstud ON tblXGroupstud.xgstudemail=tblXStudent.xstudemail where tblXGroupstud.xsgid='$grpr2[0]' AND xgstudstatus=1 AND xgstudemail!='$uid'";
     
       $result=$conn->query($sql);
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['xstudname'].'</b></td>';
            echo '<td>'.$row['xstudemail'].'</td>';
            echo '<td>'.$row['xstudemail'].'</td>';
            echo '<td>'.$row['xstudcontact'].'</td></tr>';
            
         }


      ?>
       
    </table>
 </div>
  
</body>

</html>