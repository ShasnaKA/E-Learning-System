<?php
include 'connection.php';
session_start();
$uid=$_SESSION['userid'];
$sql="SELECT count(xgstudid)FROM tblXGroupstud JOIN tblXStudent ON tblXGroupstud.xgstudemail=tblXStudent.xstudemail JOIN tblXGroup ON tblXGroup.xgid=tblXGroupstud.xsgid where tblXGroup.xtutorhostemail='$uid' AND tblXGroup.xgstatus=1 AND xgstudstatus=1";
$result=$conn->query($sql);
$row=mysqli_fetch_array($result);

if($row[0]>0)
{
   echo '<script>location.href="xtutorviewstudaccepted.php"</script>';	
}
else
 {
 	echo '<script>alert("You Haven\'t Accepted Any of the Students")</script>';
 	echo '<script>location.href="xtutorhome.php"</script>';
 }
?>