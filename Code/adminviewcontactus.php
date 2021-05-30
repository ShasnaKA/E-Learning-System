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
      <td colspan="5"><h2 style="text-align:center">Message Corner </h2></td>
    </tr>
    <tr>
      <th>E-mail</th>
      <th>Message</th>
    </tr>

    <?php
 
       include 'connection.php';
       $sql="SELECT * FROM tblContactus";
       $result=$conn->query($sql);
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td>'.$row['cemail'].'</td>';
            echo '<td>'.$row['msg'].'</td>';
         }

    ?>
       
       
    </table>
 </div>
  
</body>

</html>
