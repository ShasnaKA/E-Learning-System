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
      <td colspan="6"><h2 style="text-align:center">Institutions Approved</h2></td>
    </tr>
    <tr>
      <th>Institution</th>
      <th>E-mail</th>
      <th>Address</th>
      <th>Principal</th>
      <th>Contact Number</th>
      <th>Action</th>
    </tr>
   
    
       <?php
 
       include 'connection.php';
       $sql="SELECT * FROM tblInstitution where instemail in(select uname from tblLogin where status='1')";
       $result=$conn->query($sql);
       $place='viewinst.php';
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['instname'].'</b></td>';
            echo '<td>'.$row['instemail'].'</td>';
            echo '<td>'.$row['instaddress'].'</td>';
            echo '<td><b>'.$row['instprinc'].'</b></td>';
            echo '<td>'.$row['instcontact'].'</td>';

            echo '<td><b><a href="adminapproveinst.php?id='.$row['instemail'].' & status=-1 & place='.$place.'" class="red">Delete</a></b></td></tr>';

            

        
         }

        ?>
    </div>
       
    </table>
 </div>
  
</body>

</html>