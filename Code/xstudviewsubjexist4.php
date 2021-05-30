<?php
//enroll-others count alert
include 'connection.php';
session_start();

$uid=$_SESSION['userid'];
 
$sql="SELECT count(xgid) from tblXGroup where xgstatus=1 AND xgid NOT IN (SELECT xsgid from tblXGroupstud where xgstudemail='$uid')";

$result=$conn->query($sql);
$r=mysqli_fetch_array($result);

if($r[0]>0)
{
	echo '<script>location.href="xstudviewsubjothers.php"</script>';
}
else
{
    echo '<script>alert("No Such Group List Available")</script>';	
    echo '<script>location.href="xstudhome.php"</script>';
}

?>