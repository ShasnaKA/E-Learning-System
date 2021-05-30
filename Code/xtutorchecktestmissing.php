<?php
include 'connection.php';
 $gstudid=$_GET['gstudid'];
 $testid=$_GET['testid'];
 $gname=$_GET['gname'];
 $gid=$_GET['gid'];
 $marks=$_GET['marks'];

 $check2="SELECT count(xtestmrkid) from tblXTestmark where xtestmrkgid='$gid' AND xtestmrktestid='$testid' AND xtestmrkgstudid='$gstudid' AND xtestmrkstatus=1 ";
 $checkresult2=$conn->query($check2);
 $r2=mysqli_fetch_array($checkresult2);

 if($r2[0]>0)
   {
      echo '<script>alert("You Have Already Recorded 0 points for this Student")</script>';
    echo '<script>location.href="xtutorviewtestresponsemissing.php?gname='.$gname.'& testid='.$testid.'"</script>';
   }
 else
 {
   $sql="INSERT into tblXTestmark (xtestmrkgid,xtestmrktestid,xtestmrkgstudid,xtestmrk,xtestmrkstatus)VALUES('$gid','$testid','$gstudid','$marks','1')";
 	if($conn->query($sql)===TRUE)
  {
 	echo '<script>alert("Score Recorded Successfully");';
    echo 'location.href="xtutorviewtestresponsemissing.php?gname='.$gname.'& testid='.$testid.'"</script>';
  }
  else
  {
 		echo '<script>alert("Sorry ,Something Went Wrong!!")</script>';
 	 }
  }

?>