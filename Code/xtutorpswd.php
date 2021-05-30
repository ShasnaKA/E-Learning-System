<?php
 include 'connection.php';
 session_start();
 $uid=$_SESSION['userid'];

 $pswd=$_GET['pswd'];
 $cnfpswd=$_GET['cnfpswd'];

 if($pswd!=$cnfpswd)
 	echo '<script>alert("Incorrect Password!! Please Re-enter the Password")</script>';

?>