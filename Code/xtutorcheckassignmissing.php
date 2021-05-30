<?php
include 'connection.php';
 $gstudid=$_GET['gstudid'];
 $assignid=$_GET['assignid'];
 $gname=$_GET['gname'];
 $gid=$_GET['gid'];
 $marks=$_GET['marks'];

 $check2="SELECT count(xassignmrkid) from tblXAssignmark where xassignmrkgid='$gid' AND xassignmrkassignid='$assignid' AND xassignmrkgstudid='$gstudid' AND xassignmrkstatus=1 ";
 $checkresult2=$conn->query($check2);
 $r2=mysqli_fetch_array($checkresult2);

 if($r2[0]>0)
   {
      echo '<script>alert("You Have Already Recorded 0 points for this Student")</script>';
    echo '<script>location.href="xtutorviewassignresponsemissing.php?gname='.$gname.'& assignid='.$assignid.'"</script>';
   }
 else
 {
   $sql="INSERT into tblXAssignmark (xassignmrkgid,xassignmrkassignid,xassignmrkgstudid,xassignmrk,xassignmrkstatus)VALUES('$gid','$assignid','$gstudid','$marks','1')";
 	if($conn->query($sql)===TRUE)
  {
 	echo '<script>alert("Score Recorded Successfully");';
    echo 'location.href="xtutorviewassignresponsemissing.php?gname='.$gname.'& assignid='.$assignid.'"</script>';
  }
  else
  {
 		echo '<script>alert("Sorry ,Something Went Wrong!!")</script>';
 	 }
  }

?>