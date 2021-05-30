<?php
 include 'connection.php';
 $file=$_GET['qpaperfile'];
?>
<!DOCTYPE html>
<head>
</head>
<body>
	<div class="filecontainer">
	    <?php
		 echo '<embed src="xsubmtest/'.$file.'" type="application/pdf" width="100%" height="600px" />';
	   // $f=fopen("tests/$file" , 'w');
	   // $txt="Hello World";
	   // fwrite($f,$txt);
		?>
	</div>
</body>
</html>