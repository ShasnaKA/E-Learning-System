<?php
  include 'connection.php';
  session_start();

  $uid=$_SESSION['userid'];
  $sql="SELECT COUNT(xgid) FROM tblXGroup where xtutorhostemail='$uid' AND xgstatus=1";
  $result=$conn->query($sql);
  $r=mysqli_fetch_array($result);

  if($r[0]>0)
  {
  	echo '<script>location.href="xtutorview_grpall.php"</script>';
  }
  else
  {
  	echo '<script>alert("No Groups Created Yet!!")</script>';
  	echo '<script>location.href="xtutorhome.php"</script>';
  }
?>