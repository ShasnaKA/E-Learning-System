<?php
include 'connection.php';
session_start();
$gname=$_GET['gname'];

$uid=$_SESSION['userid'];

$grpid="SELECT xgid from tblXGroup where xgname='$gname' AND xtutorhostemail='$uid'";
$grpresult=$conn->query($grpid);
$grpr2=mysqli_fetch_array($grpresult);

$sql="SELECT count(xgstudid)from tblXGroupstud where xsgid='$grpr2[0]' AND xgstudstatus=1";
$result=$conn->query($sql);
$row=mysqli_fetch_array($result);

if($row[0]>0)
{
	echo '<script>location.href="xtutorviewgstud.php?gname='.$gname.'"</script>';
}
else
{
	echo '<script>alert("No Students Enrolled For -'.$gname.'- Group")</script>';
    echo '<script>location.href="xtutorinsidegrp.php?gname='.$gname.'"</script>';
}

?>