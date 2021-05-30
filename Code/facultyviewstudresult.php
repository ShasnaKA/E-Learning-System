<?php
 //session_start();Already given below in useridnote
//HOD view result
include 'HODhome1.php';
 include 'connection.php';
// session_start();
//$uid=$_SESSION['userid'];

$cid=$_GET['cid'];
$sem=$_GET['sem'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!--font awesome cdn--> 
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     <!--Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css.css">
    <style>
    .tabnotestable{
  margin-left:40px;
  margin-top:-70px;
  border:solid 1px black;
  width:955px;
  font-size:18px;
  background-attachment:fixed;

}

.tabnotestable tr th{
  margin-left: 0px;
  padding:10px;
  text-align:left;


}


.tabnotestable tr td{
  padding:24px;
  color:black;
  text-align:left;
  border:1px black;//
  color:black;

}

.tabnotestable th{
  background-color:  #1a5b9c ;//#0b447e ; //#2d2178 ;
  color:#fff;
}

.tabdatarows{
  padding:12px 15px;
}

.tabdatarows:nth-child(even)
{
  background-color: #d5c9c6  ;
}

.tabdatarows:nth-child(odd){
  background-color:#b9afad  ;
}

.tabdatarows:hover{
  background-color:  #9aa6c4    ;
}

.tabdatarows:last-of-type{
  border-bottom:2px solid  #101e89 ;
}

table th{
  background-color: gray;
  min-width:88px;
  max-width:88px;
}


</style>

</head>

<body style="background-color: #bdc6a8 ">
    <!--Notes Panel-Tab 1-->
    <br><br><br>
  <div class="tabPanel">
    <table class="tabnotestable" style="margin-top:20px;margin-left:300px;">
    <th colspan="10" style="background-color: #145b58 ;border:1px solid black;  "><center><h2>Internal Marks</h3></center></th>
    <col>
    <!--colgroup span="2"></colgroup>
    <colgroup span="2"></colgroup-->
    <tr>
    <th rowspan="2">Student</th>
    <th rowspan="2">Register No</th>
    <?php

    $sql1="SELECT subjname from tblSubject JOIN tblResult ON tblResult.rsltsubjid=tblSubject.subjid where tblResult.rsltcid='$cid' AND tblResult.rsltsem='$sem' AND subjstatus=1 group by subjname";
    $result1=$conn->query($sql1);
    //echo '<td rowspan="0"></td>';
    while($row1=mysqli_fetch_array($result1))
    {
      echo '<th colspan="4" style="margin-left:10px">------'.$row1['subjname'].'-------</th>';
    }
      
    ?>
    </tr>
    <tr>
    <?php
      echo '<th scope="col">Tasks</th>';
      echo '<th scope="col">Test</th>';
      echo '<th scope="col">Total</th>';
      echo '<th scope="col">Status</th>';
      echo '<th scope="col">Tasks</th>';
      echo '<th scope="col">Test</th>';
      echo '<th scope="col">Total</th>';
      echo '<th scope="col">Status</th>';
     ?>
    </tr>
    <?php
    
      $sql="SELECT tblStudent.studname,studreg,assignconv,testconv,totalconv,rsltstatus from tblResult JOIN tblGroupstud ON tblGroupstud.gstudid=tblResult.rsltgstudid JOIN tblStudent ON tblStudent.studemail=tblGroupstud.gstudemail JOIN tblSubject ON tblResult.rsltsubjid=tblSubject.subjid where rsltcid='$cid' AND rsltsem='$sem' AND tblGroupstud.gstudemail IN (SELECT uname from tblLogin where status=1) ORDER BY tblStudent.studname,tblSubject.subjname";
      $result=$conn->query($sql);

      $count=0;
      while($row=mysqli_fetch_array($result))
      {
        if($count%2==0)
        {
         echo '<tr class="tabdatarows"><td scope="row" ><b>'.$row['studname'].'</b></td>';
         echo '<td>'.$row['studreg'].'</td>';
         echo '<td style="border-left:1px solid gray">'.$row['assignconv'].'</td>';
         echo '<td>'.$row['testconv'].'</td>';
         echo '<td><b>'.$row['totalconv'].'</b></td>';
         if($row['rsltstatus']=="PASSED")
         echo '<td style="color:green">'.$row['rsltstatus'].'</td>';
         else
          echo '<td style="color:red">'.$row['rsltstatus'].'</td>';
         $count=$count+1;
        }
        else
        {
          echo '<td style="border-left:1px solid gray">'.$row['assignconv'].'</td>';
          echo '<td>'.$row['testconv'].'</td>';
          echo '<td><b>'.$row['totalconv'].'</b></td>';
          if($row['rsltstatus']=="PASSED")
           echo '<td style="color:green">'.$row['rsltstatus'].'</td></tr>';
          else
            echo '<td style="color:red">'.$row['rsltstatus'].'</td></tr>';
          $count=$count+1;
        }
      }
    

     ?>
    
    </table>
    </div>

</body>
</html>