<?php
  session_start();
  include 'connection.php';
  $uid=$_SESSION['userid'];
  $xgid=$_GET['grpid'];
  $sql0="SELECT xgname from tblXGroup where xgid='$xgid'";
  $result0=$conn->query($sql0);
  $row=mysqli_fetch_array($result0);

  $sql="UPDATE tblXGroupstud set xgstudstatus=-2 where xsgid='$xgid' AND xgstudemail='$uid' AND xgstudstatus=0"; 
  if($conn->query($sql)===TRUE)
  {
  	echo '<script>alert("Your Request for -'.$row[0].' has been Cancelled")</script>';
  	echo '<script>location.href="xstudviewsubjexist5.php"</script>';
  }
  else
  	echo '<script>alert("Something Went Wrong")</script>';
?>
