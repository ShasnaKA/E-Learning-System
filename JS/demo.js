

<script type="text/javascript">
<?php
include 'connection.php';
$dd=$_GET['id'];
session_start();
$email=$_SESSION['email'];
$qry="select lDate from tblleavedates where eEmail='$email'";
$res=mysql_query($qry);
$row=mysql_fetch_array($res);
?>
    var jArray = <?php echo json_encode($row); ?>;

    for(var i=0; i<jArray.length; i++){
    var events=[
        {'Date': new Date(jArray[i])}
    ];
        
var settings = {};
var element = document.getElementById('caleandar');
caleandar(element, events, settings);

 </script>
 
 

