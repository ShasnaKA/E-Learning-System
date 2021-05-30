<?php
 include 'connection.php';
 session_start();

 $uid=$_SESSION['userid'];
 $instqry="SELECT teachinstemail from tblTeacher where teachemail='$uid'";
 $instrslt=$conn->query($instqry);
 $r=mysqli_fetch_array($instrslt);

 $getcourseid=$_GET['getcourseid'];

 echo '<option value="none" selected>--Available Semesters--</option>';
  $sql="SELECT subjsem from tblSubject INNER JOIN tblCourse ON tblCourse.cid=tblSubject.subjcid where subjteachemail='$uid' AND subjinstemail='$r[0]' AND subjcid='$getcourseid' AND tblCourse.coursestatus=1 AND subjstatus=1 ORDER BY subjsem";
  $result=$conn->query($sql);
  while($row=mysqli_fetch_array($result))
  {
  	echo '<option value="'.$row['subjsem'].'" >'.$row['subjsem'].'</option>';
  }
//echo '<script>alert("'.$row['subjsem']'")</script>';

?>