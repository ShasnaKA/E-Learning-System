<?php
  include 'connection.php';
  session_start();
  $uid=$_SESSION['userid'];

  $instemail_ofHOD="SELECT HODinstemail from tblHOD where HODemail='$uid'";
  $result=$conn->query($instemail_ofHOD);
  $r=mysqli_fetch_array($result);

  $getcourseid=$_GET['getcourseid'];

  $sql="SELECT subjsem,count(subjsem) from tblSubject where subjinstemail='$r[0]' AND subjcid='$getcourseid' AND subjstatus=1 group by subjsem ";
  $result=$conn->query($sql);

  
  echo '<option value="none">--Available Semesters--</option>';
  while($row=mysqli_fetch_array($result))
  {
    $q="SELECT count(subjid) from tblSubject where subjcid='$getcourseid' AND subjsem='".$row['subjsem']."' AND subjstatus=1";
    $qresult=$conn->query($q);
    $qrow=mysqli_fetch_array($qresult);

    $q_second="SELECT count(rprtid) from tblReportstatus where rprtcid='$getcourseid' AND rprtsem='".$row['subjsem']."' AND HOD_rprtstatus=1";
    $q_secondrslt=$conn->query($q_second);
    $q_secondrow=mysqli_fetch_array($q_secondrslt);

    if($qrow[0]==$q_secondrow[0])
    {
      echo '<option>'.$row['subjsem'].'</option>';
    }
    else
    {
      echo '<option value="unavailable">'.$row['subjsem'].' Not Available</option>';
    }
  }
  
?>