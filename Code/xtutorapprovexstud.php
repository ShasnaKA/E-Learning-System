<?php
include 'connection.php';
$grpid=$_GET['grpid'];
$status=$_GET['status'];
$stud=$_GET['stud'];

$sql="UPDATE tblXGroupstud set xgstudstatus='$status' where xsgid='$grpid' AND xgstudid='$stud'";
if($conn->query($sql)===TRUE AND $status==1)
 {
    echo '<script>alert("One Student Has been Approved")</script>';
    echo '<script>location.href="xtutorviewstudaccepted.php"</script>';
  }
  else if($conn->query($sql)===TRUE AND $status==-1)
  {
  	echo '<script>alert("One Student Has been Rejected")</script>';
    echo '<script>location.href="xtutorviewstudrejected.php"</script>';
  }
  else
  	echo '<script>alert("Something Went Wrong")</script>';
?>