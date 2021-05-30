<?php
  include 'connection.php';
  session_start();

  $uid=$_SESSION['userid'];
  $sql="SELECT COUNT(gid) FROM tblGroup INNER JOIN tblSubject ON tblSubject.subjid=tblGroup.gsubjid INNER JOIN tblCourse ON tblCourse.cid=tblSubject.subjcid where tblGroup.g_host_email='$uid' AND gstatus=1";
  $result=$conn->query($sql);
  $r=mysqli_fetch_array($result);

  if($r[0]>0)
  {
  	echo '<script>location.href="teachview_grpall.php"</script>';
  }
  else
  {
  	echo '<script>alert("No Groups Created Yet!!")</script>';
  	echo '<script>location.href="teacherhome.php"</script>';
  }
?>