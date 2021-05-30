<?php
 include 'connection.php';
 include 'adminheader.php';
?>

<!DOCTYPE html>

<head>
	<link rel="stylesheet" type="text/css" href="displaytable.css">
</head>

<body class="tablebody">

  <div>
  <table align="center">
    <tr class="main_title">
      <td colspan="5"><h2 style="text-align:center">Department Details</h2></td>
    </tr>
    <tr>
      <th>Department Name</th>
      <th>Action</th>
    </tr>

    <?php
 
       include 'connection.php';
       $sql="SELECT * FROM tblDepartment where depstatus=1 ORDER BY depname";

       $result=$conn->query($sql);
       
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['depname'].'</b></td>'; 

            echo '<td><b><a href="adminedit_dept.php?whichdept='.$row['depname'].'" class="red">Edit</a></td></b></tr>';     
         }

    ?>
       
       
  </table>
 </div>
  
	
</body>



</html>