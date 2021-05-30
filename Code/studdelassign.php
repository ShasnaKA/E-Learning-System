<?php
 include 'studinsidegrpcommon.php';// insidegrpcommon.php already has session_start()
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
          <b><h1>Delete Submitted Works Here</h1></b>
        <form action="" method=POST enctype="multipart/form-data">

                   <div class="form-group">
                    <label>Select Assignment Topic</label>

                    <select name="txtdelsubmission" class="form-control" required>
                        <option value="none">--Attempted Assignments--</option>
                        <?php
                         

                           $uid=$_SESSION['userid'];
                           $inst="SELECT studinstemail from tblStudent where studemail='$uid'";
                           $instresult=$conn->query($inst);
                           $instr1=mysqli_fetch_array($instresult);

                           $grpid="SELECT gid from tblGroup where gname='$gname' AND ginstemail='$instr1[0]' AND gstatus=1";
                          $grpresult=$conn->query($grpid);
                          $grpr2=mysqli_fetch_array($grpresult);

                          $gstudquery="SELECT gstudid from tblGroupstud where sgid='$grpr2[0]' AND gstudemail='$uid'";
                          $gstudresult=$conn->query($gstudquery);
                          $gstudrow=mysqli_fetch_array($gstudresult);
                             
                          date_default_timezone_set('Asia/Kolkata');
                          $cdateandtime=date('Y-m-d').' '.date('H:i:s');
                          $cdate=date('Y-m-d');//now
                          $ctime=date('H:i:s');//now
                         

                          //$q1="SELECT gstudid from tblGroupstud where gstudemail='$uid' AND sgid='$grpr2[0]' AND gstudstatus=1";
                          //$q1result=$conn->query($sql);
                          //$q1row=mysqli_fetch_array($q1result);

                          $sql="SELECT assignid,assignname,assigndate,assigntime,tblSubmassign.assign_answr_id,tblSubmassign.assign_answr from tblAssignment INNER JOIN tblSubmassign ON tblSubmassign.subm_assignid=tblAssignment.assignid where assigngid='$grpr2[0]' AND  tblSubmassign.submassign_gstudid='$gstudrow[0]' AND  tblSubmassign.assign_answr_status=1 AND assignstatus=1";
                          $result=$conn->query($sql);
                          //$row=mysqli_fetch_array($result);

                          //echo '<script>alert("'.strtotime('Y-m-d',$row['testdate']).'")</script>';

                          while($row=mysqli_fetch_array($result))
                          {
                            $date=$row['assigndate'];
                            $day=date('j',strtotime($date));
                            $month=date('F',strtotime($date));
                            $month3=substr($month,0,3);
                            $year=date('Y',strtotime($date));

      echo '<option value="'.$row['assign_answr_id'].'|'.$row['assignid'].'">'.$row['assign_answr'].' -- '.$row['assignname'].'&nbsp &nbsp Due on: '.$day.'-'.$month3.'-'.$year.'   ( '.date("g:i a",strtotime($row['assigntime'])).' ) </option>';
                          }

                       ?>          
                    </select>
                  </div>
         

                  <div class="form-group">
            <input type="submit" name="delassign_submit" class="btn btn-primary" value="Remove">&nbsp&nbsp  
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
 //echo '<script>alert("'.$result.'")</script>';
 if(isset($_POST['delassign_submit']))
 {
    $delsubmission=$_POST['txtdelsubmission'];

    //$dropdownresult=$_POST['txtdelsubmission'];
    $explode_result=explode('|',$delsubmission);

  if($delsubmission=="none")
    echo '<script>alert("Select an Assignment to Delete")</script>';
  else
  {
  

$sql1="SELECT gstudid from tblGroupstud where sgid='$grpr2[0]' AND gstudemail='$uid' AND gstudstatus=1";
$sql1result=$conn->query($sql1);
$sql1row=mysqli_fetch_array($sql1result);

  $sql2="UPDATE tblSubmassign set assign_answr_status=-1 where submassign_gid='$grpr2[0]' AND submassign_gstudid='$sql1row[0]' AND subm_assignid='$explode_result[1]' AND assign_answr_status=1";
  if($conn->query($sql2)===TRUE)
  {
    echo '<script>alert("Your Selected file has been Removed Successfully")</script>';
    echo '<script>location.href="studinsidegrp.php?gname='.$gname.'"</script>';
  }
  else
  {
    echo '<script>alert("Something Went Wrong in updation!!")</script>';
  }
  
 } //else block for none
  
 }//isset if



?>

</body>

</html>