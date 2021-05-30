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
      <td colspan="7"><h2 style="text-align:center">New Students To Be Acccepted</h2></td>
    </tr>
    <tr>
      <th>Name</th>
      <th>E-mail</th>
      <th>Age</th>
      <th>Contact Number</th>
      <th colspan=2>Action</th>
    </tr>

    <?php
 
       include 'connection.php';
       $sql="SELECT * FROM tblXStudent where xstudemail in(select uname from tblLogin where status='0')";

       $result=$conn->query($sql);
       $place='viewxstudrqst.php';

       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td><b>'.$row['xstudname'].'</b></td>';
            echo '<td>'.$row['xstudemail'].'</td>';
            echo '<td>'.$row['xstudage'].'</td>';
            echo '<td>'.$row['xstudcontact'].'</td>';

            echo '<td><b><a href="adminapprovexstud.php?id='.$row['xstudemail'].'& status=1 & place='.$place.'" class="green">Approve</a></b></td>';
            echo '<td><b><a href="adminapprovexstud.php?id='.$row['xstudemail'].'& status=-1 & place='.$place.'" class="red">Reject</a></b></td>';
        
         }

    ?>

       
       
    </table>
 </div>
  
</body>

</html>