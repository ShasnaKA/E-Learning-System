<?php
 include 'insidegrpcommon.php';// insidegrpcommon.php already has session_start()
 include 'connection.php';
 $gname=$_GET['gname'];
?>

<!DOCTYPE html>
<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!--font awesome cdn--> 
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     <!--Google fonts-->
    <!--link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@700&display=swap" rel="stylesheet"--> 

    <style>

        body{
          
          background-color:#1a2935 ;
          background-size:cover;
        }

        .formspace{
          margin-top:110px;
          margin-left:40px;
          width:690px;
          height:350px;
          background-color:#787c81  ;
          box-shadow:5px 5px #C70039 ;
        }

        .formspace:hover{
            width:705px;
            height:355px;
            background-color: #626669;
        }

      .deptform{
        margin-top:10px;
        margin-left:50px;
        
      }

      .form-control{
        width:500px;
      }
        
      h1{
           color: #fff ;
           font-family:century Gothic;
           margin-left:-10px;
      }

      label{
         color:#C70039;
         font-size:20px;
         font-family:verdana;
      }   

      .btn-primary{
        background-color: #C70039 ;
        border-color: #C70039 ;
        width:200px;
        margin-left:30px;
        margin-top:30px;
      }

      .btn-danger{
        background-color: #C70039 ;
        border-color: #C70039 ;
        width:200px;
        margin-left:260px;
        margin-top:-68px;

      }

      .btn-primary:hover{
        background-color: #062b86;
      }
       
      .btn-danger:hover{
        background-color: #062b86;
      }
      

    </style>

</head>

<body>
 
 <div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="formspace">
        <br><br>
      <div class="deptform">
          <b><h1>View Test Submissions</h1></b>
        <form action="" method="POST">

                   <div class="form-group">
                    <label>Select Test Topic</label>

                    <select name="txttestid" class="form-control" required>
                        <option value="none">--Test Events Conducted--</option>
                        <?php
                         

                           $uid=$_SESSION['userid'];
                           $inst="SELECT teachinstemail from tblTeacher where teachemail='$uid'";
                           $instresult=$conn->query($inst);
                           $instr1=mysqli_fetch_array($instresult);

                           $grpid="SELECT gid from tblGroup where gname='$gname' AND ginstemail='$instr1[0]' AND gstatus=1 AND g_host_email='$uid'";
                          $grpresult=$conn->query($grpid);
                          $grpr2=mysqli_fetch_array($grpresult);

                
                          date_default_timezone_set('Asia/Kolkata');
                          $cdateandtime=date('Y-m-d').' '.date('H:i:s');
                          $cdate=date('Y-m-d');//now
                          $ctime=date('H:i:s');//now
                         
                          $sql="SELECT testid,testname,testdate,teststarttime,testendtime,CONCAT(CONCAT(testdate,' '),teststarttime) , CONCAT(CONCAT(testdate,' '),testendtime) from tblTest  where testgid='$grpr2[0]' AND teststatus=1 AND CONCAT(CONCAT(testdate,' '),teststarttime)<'$cdateandtime'";
                          $result=$conn->query($sql);
                      

                          while($row=mysqli_fetch_array($result))
                          {
                            $date=$row['testdate'];
                            $day=date('j',strtotime($date));
                            $month=date('F',strtotime($date));
                            $month3=substr($month,0,3);
                            $year=date('Y',strtotime($date));
                            if($row[5]<=$cdateandtime AND $row[6]>$cdateandtime)
                            {
                              $displaystatus="<em> Open Now</em>";
                            }
                            else if($row[6]<=$cdateandtime)
                            {
                               $displaystatus='<em> Closed</em>';
                            }

      echo '<option value="'.$row['testid'].'">'.$row['testname'].' &nbsp &nbsp (<em>'.$displaystatus.'</em> ) </option>';

     //echo '<option value="'.$row['testid'].'">'.$row['testname'].' &nbsp &nbsp '.$day.'-'.$month3.'-'.$year.'   ( '.date("g:i a",strtotime($row['teststarttime'])).' -- '.date("g:i a",strtotime($row['testendtime'])).' ) </option>';
                          }

                       ?>          
                    </select>
                  </div>
         

                  <div class="form-group">
              <input type="submit" name="submit" class="btn btn-primary" value="View">&nbsp&nbsp  
              <input type="reset" class="btn btn-primary" value="Cancel">&nbsp&nbsp 
              </div>

        </form>
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
 </div>

<?php

 if(isset($_POST['submit']))
 {
    $testid=$_POST['txttestid'];

  if($testid=="none")
    echo '<script>alert("Select a Test To View Submissions")</script>';
  else
  {

    echo '<script>location.href="teachviewtestresponse2.php?id='.$testid.'& gname='.$gname.'"</script>';


 } //else block for none
  
 }//isset if



?>

</body>

</html>