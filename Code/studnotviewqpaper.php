<?php
 include 'connection.php';
 $gname=$_GET['gname'];
 echo '<script>alert("This Page will be available once the Scheduled Time Slot Begins !!")</script>';
 echo '<script>location.href="studinsidegrp.php?gname='.$gname.'"</script>';
?>