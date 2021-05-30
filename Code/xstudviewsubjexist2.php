<?php
//rejected count alert
include 'connection.php';
session_start();

$uid=$_SESSION['userid'];
 

$sql="SELECT count(xgid) from tblXGroup JOIN tblXGroupstud ON tblXGroupstud.xsgid=tblXGroup.xgid where xgstatus=1 AND tblXGroupstud.xgstudemail='$uid' AND tblXGroupstud.xgstudstatus=-1";

$result=$conn->query($sql);
$r=mysqli_fetch_array($result);

if($r[0]>0)
{
	echo '<script>location.href="xstudviewsubjrejected.php"</script>';
}
else
{
    echo '<script>alert("You are not Rejected for any Group")</script>';	
    echo '<script>location.href="xstudhome.php"</script>';
}

?>