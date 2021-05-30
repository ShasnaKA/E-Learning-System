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
      <td colspan="5"><h2 style="text-align:center">Feedback Details</h2></td>
    </tr>
    <tr>
      <th>E-mail</th>
      <th>Feedback</th>
      <th>Rating Message</th>
    </tr>

    <?php
 
       include 'connection.php';
       $sql="SELECT * FROM tblFeedback JOIN tblRating ON tblFeedback.feedbackemail=tblRating.ratingemail";
       $result=$conn->query($sql);
       while($row=mysqli_fetch_array($result))
        { 
            echo '<tr class="datarows"><td>'.$row['feedbackemail'].'</td>';
            echo '<td>'.$row['feedback'].'</td>';
            if($row['rating']==5)
              $row['rating']="Outstanding";
            else if($row['rating']==4)
              $row['rating']="Excellent";
            else if($row['rating']==3)
              $row['rating']="Its Okay";
            else if($row['rating']==2)
              $row['rating']="Needs Improvement";
            else if($row['rating']==1)
              $row['rating']="Very Poor";
            else $row['rating']="none";

            echo '<td>'.$row['rating'].'</td></tr>';
         }

    ?>
       
       
    </table>
 </div>
  
</body>

</html>
