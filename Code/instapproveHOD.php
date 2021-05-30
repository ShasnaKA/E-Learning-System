<?php
include 'connection.php';
$id=$_GET['id'];
$status=$_GET['status'];
$place=$_GET['place'];
$sql="update tblLogin set status='$status' where uname='$id'";
$result= mysqli_query($conn, $sql);
echo '<script>location.href="'.$place.'"</script>';
?>
