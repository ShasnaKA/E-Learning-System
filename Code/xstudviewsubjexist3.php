<?php
//requested count alert
include 'connection.php';
session_start();

$uid=$_SESSION['userid'];
 
$sql="SELECT count(xgid) from tblXGroup JOIN tblXGroupstud ON tblXGroupstud.xsgid=tblXGroup.xgid where xgstatus=1 AND tblXGroupstud.xgstudemail='$uid' AND tblXGroupstud.xgstudstatus=0";

$result=$conn->query($sql);
$r=mysqli_fetch_array($result);

if($r[0]>0)
{
	echo '<script>location.href="xstudviewsubjrequested.php"</script>';
}
else
{
    echo '<script>alert("You Haven\'t Requested to Join in Any Groups")</script>';	
    echo '<script>location.href="xstudhome.php"</script>';
}

?>