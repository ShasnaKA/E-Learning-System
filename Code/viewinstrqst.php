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
      <td colspan="7"><h2 style="text-align:center">New Institutions To Be Accepted</h2></td>
    </tr>
    <tr>
      <th>Institution</th>
      <th>E-mail</th>
      <th>Address</th>
      <th>Principal</th>
      <th>Contact Number</th>
      <th colspan=2>Action</th>
      
    </tr>

    <?php
 
       include 'connection.php';
       $sql="SELECT * FROM tblInstitution where instemail in(select uname from tblLogin where status='0')";
       $result=$conn->query($sql);
       $place='viewinstrqst.php';
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['instname'].'</b></td>';
            echo '<td>'.$row['instemail'].'</td>';
            echo '<td>'.$row['instaddress'].'</td>';
            echo '<td><b>'.$row['instprinc'].'</b></td>';
            echo '<td>'.$row['instcontact'].'</td>';
            
echo '<td><b><a href="adminapproveinst.php?id='.$row['instemail'].' & status=1 & place='.$place.'" class="green">Approve</a></b></td>';
echo '<td><b><a href="adminapproveinst.php?id='.$row['instemail'].'& status=-1 & place='.$place.'" class="red">Reject</a></b></td>';
        
         }

    ?>

       
       
    </table>
 </div>
  
</body>

</html>