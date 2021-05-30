<?php
  session_start();
  $uid=$_SESSION['userid'];
  include 'connection.php';

  $cid=$_GET['cid'];
  $sem=$_GET['sem'];
  echo '<option value="none" selected>--Select Subject--</option>';
  $sql="SELECT * from tblSubject where subjinstemail='$uid' AND subjcid='$cid' AND subjsem='$sem' AND subjstatus=1 ";
  $result=$conn->query($sql);
  while($row=mysqli_fetch_array($result))
  {
  	echo '<option value="'.$row['subjid'].'" >'.$row['subjname'].'</option>';
  }

?>

