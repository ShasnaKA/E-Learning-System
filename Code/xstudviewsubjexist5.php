<?php
//cancelled grps count alert
include 'connection.php';
session_start();

$uid=$_SESSION['userid'];
 
$sql="SELECT count(xgid) from tblXGroup JOIN tblXGroupstud ON tblXGroupstud.xsgid=tblXGroup.xgid where xgstatus=1 AND tblXGroupstud.xgstudemail='$uid' AND tblXGroupstud.xgstudstatus=-2";

$result=$conn->query($sql);
$r=mysqli_fetch_array($result);

if($r[0]>0)
{
	echo '<script>location.href="xstudviewsubjcancelled.php"</script>';
}
else
{
    echo '<script>alert("No Such Group List Available!")</script>';	
    echo '<script>location.href="xstudhome.php"</script>';
}

?>