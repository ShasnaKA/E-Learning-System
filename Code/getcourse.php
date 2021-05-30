<?php
  include 'connection.php';
  session_start();
  $uid=$_SESSION['userid'];
  $deptforcoursedel=$_GET['getdepid'];
  echo '<option value="none" selected>--Available Courses--</option>';
  $sql="SELECT * from tblCourse where depid='$deptforcoursedel' AND instemail='$uid' AND coursestatus=1";
  $result=$conn->query($sql);
  while($row=mysqli_fetch_array($result))
  {
  	echo '<option value="'.$row['cid'].'" >'.$row['cname'].'</option>';
  }

?>