<?php
  include 'connection.php';
  $getinstemail=$_GET['getinstemail'];
  echo '<option value="none" selected>--Select Your Course Here--</option>';
  $sql="SELECT * from tblCourse where instemail='$getinstemail'";
  $result=$conn->query($sql);
  while($row=mysqli_fetch_array($result))
  {
  	echo '<option value="'.$row['cid'].'" >'.$row['cname'].'</option>';
  }

?>

