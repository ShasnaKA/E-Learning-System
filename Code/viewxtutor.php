<?php

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
      <td colspan="6"><h2 style="text-align:center">External Tutor Details</h2></td>
    </tr>
    <tr>
      <th>Name</th>
      <th>E-mail</th>
      <th>Qualification</th>
      <th>Contact Number</th>
      <th>Photo</th>
      <th>Action</th>
    </tr>

    <?php
 
       include 'connection.php';
       $sql="SELECT * FROM tblXTutor where xtutoremail in(select uname from tblLogin where status='1')";
       $result=$conn->query($sql);
       $place='viewxtutor.php';
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['xtutorname'].'</b></td>';
            echo '<td>'.$row['xtutoremail'].'</td>';
            echo '<td>'.$row['xtutorqualf'].'</td>';
            echo '<td>'.$row['xtutorcontact'].'</td>';
            echo '<td><img src="' .$row['xtutorpic']. '" height="150px" width="150px"></td>';

            echo '<td><b><a href="adminapprovextutor.php?id='.$row['xtutoremail'].' & status=-1 & place='.$place.'" class="red">Delete</a></b></td></tr>';
        
         }

    ?>
       
       
    </table>
 </div>
  
</body>

</html>