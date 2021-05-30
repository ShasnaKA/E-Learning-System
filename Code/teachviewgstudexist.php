<?php
  include 'connection.php';
  session_start();
  $gname=$_GET['gname'];


  $uid=$_SESSION['userid'];
  $inst="SELECT teachinstemail from tblTeacher where teachemail='$uid'";
  $instresult=$conn->query($inst);
  $instr1=mysqli_fetch_array($instresult);

  $grpid="SELECT gid from tblGroup where gname='$gname' AND ginstemail='$instr1[0]' AND g_host_email='$uid'";
  $grpresult=$conn->query($grpid);
  $grpr2=mysqli_fetch_array($grpresult);



  $sql="SELECT count(gstudid) from tblGroupstud  where sgid='$grpr2[0]' AND gstudstatus=1";
     
   $result=$conn->query($sql);
   $row=mysqli_fetch_array($result);
   if($row[0]>0)
   {
   	echo '<script>location.href="teachviewgstud.php?gname='.$gname.'"</script>';
   }	
   else
   {
   	echo '<script>alert("No Group Members Exists!")</script>';
   	echo '<script>location.href="insidegrp.php?gname='.$gname.'"</script>';
   }
   	

  
?>