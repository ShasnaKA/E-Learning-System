<?php
include 'connection.php';
session_start();

$uid=$_SESSION['userid'];
 
$instqry="SELECT teachinstemail FROM tblTeacher where teachemail='$uid'";
$instrslt=$conn->query($instqry);
$r=mysqli_fetch_array($instrslt);

$sql="SELECT subjid FROM tblSubject INNER JOIN tblCourse ON tblSubject.subjcid=tblCourse.cid INNER JOIN tblDepartment ON tblCourse.depid=tblDepartment.depid LEFT JOIN tblGroup on tblGroup.gsubjid=tblSubject.subjid where tblSubject.subjteachemail='$uid' AND subjinstemail='$r[0]' AND tblCourse.coursestatus=1 AND subjstatus=1 ";

$result=$conn->query($sql);
$r=mysqli_fetch_array($result);

if($r[0]>0)
{
	echo '<script>location.href="teachviewsubj.php"</script>';
}
else
{
    echo '<script>alert("Sorry , No Subjects Alloted for '.$uid.'")</script>';	
    echo '<script>location.href="teacherhome.php"</script>';
}

?>