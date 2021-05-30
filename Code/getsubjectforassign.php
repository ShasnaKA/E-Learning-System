<?php
  include 'connection.php';
  session_start();
  $uid=$_SESSION['userid'];
  $instemail_ofHOD="SELECT HODinstemail from tblHOD where HODemail='$uid'";
  $result=$conn->query($instemail_ofHOD);
  $r=mysqli_fetch_array($result);


  $getcourseid=$_GET['getcourseid'];
  $getsemid=$_GET['getsemid'];

  echo '<option value="none" selected>--Available Subjects--</option>';
  $sql="SELECT * from tblSubject where subjinstemail='$r[0]' AND subjcid='$getcourseid' AND subjsem='$getsemid' AND subjstatus=1";
  $result=$conn->query($sql);
  while($row=mysqli_fetch_array($result))
  {
  	echo '<option>'.$row['subjname'].'</option>';
  }

?>