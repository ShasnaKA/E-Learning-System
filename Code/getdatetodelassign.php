<?php
  include 'connection.php';
  $topicid=$_GET['gettopicid'];
  $sql="SELECT assigndate from tblAssignment where assignid='$topicid' AND assignstatus=1";
  $result=$conn->query($sql);
  $row=mysqli_fetch_array($result);
 
  $date=$row[0];
  $day=date('j', strtotime($date));
  $month=date('F', strtotime($date));
  $month3=substr($month,0,3);
  $year=date('Y', strtotime($date));
  
  echo $day." ".$month3." ".$year;

?>