<?php
  session_start();
  include 'connection.php';
  $uid=$_SESSION['userid'];

  $xgid=$_GET['grpid'];
  $sql0="SELECT xgname from tblXGroup where xgid='$xgid'";
  $result0=$conn->query($sql0);
  $row=mysqli_fetch_array($result0);

  $sql="INSERT INTO tblXGroupstud(xsgid,xgstudemail,xgstudstatus) VALUES('$xgid','$uid','0')";
  if($conn->query($sql)===TRUE)
  {
  	echo '<script>alert("Your Request to Enroll for -'.$row[0].' is Processed.You can Join Once you are Approved By the Tutor")</script>';
  	echo '<script>location.href="xstudviewsubjrequested.php"</script>';
  }
  else
  	echo '<script>alert("Something Went Wrong")</script>';
?>
