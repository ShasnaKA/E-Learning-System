<?php
 include 'connection.php';
 $file=$_GET['assignfile'];
?>
<!DOCTYPE html>
<head>
 <title>View Assignments</title>
</head>
<body>
	<div class="filecontainer">
	 <!--embed src="materials/18.e-certificate(nss).pdf" type="application/pdf" width="100%" height="700px" /-->
	    <?php
		 echo '<embed src="xsubmassign/'.$file.'" type="application/pdf" width="100%" height="650px" />';
	
		?>
	</div>
</body>
</html>