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
          height:400px;
          background-color:#787c81  ;
          box-shadow:5px 5px #C70039 ;
        }

        .formspace:hover{
            width:705px;
            height:410px;
            background-color: #626669;
        }

      .deptform{
        margin-top:-10px;
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
        margin-top:10px;
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
          <b><h1>Post Your Aswers Here</h1></b>
        <form action="" method=POST enctype="multipart/form-data">

                   <div class="form-group">
                    <label>Select Test Topic</label>

                    <select name="txtsubmtestname" class="form-control" required>
                        <option value="none">--Currently Open Test Events--</option>
                        <?php
                         

                           $uid=$_SESSION['userid'];
                           $inst="SELECT studinstemail from tblStudent where studemail='$uid'";
                           $instresult=$conn->query($inst);
                           $instr1=mysqli_fetch_array($instresult);

                           $grpid="SELECT gid from tblGroup where gname='$gname' AND ginstemail='$instr1[0]' AND gstatus=1";
                          $grpresult=$conn->query($grpid);
                          $grpr2=mysqli_fetch_array($grpresult);
                             
                          date_default_timezone_set('Asia/Kolkata');
                          $cdateandtime=date('Y-m-d').' '.date('H:i:s');
                          $cdate=date('Y-m-d');//now
                          $ctime=date('H:i:s');//now
                         

                          //$q1="SELECT gstudid from tblGroupstud where gstudemail='$uid' AND sgid='$grpr2[0]' AND gstudstatus=1";
                          //$q1result=$conn->query($sql);
                          //$q1row=mysqli_fetch_array($q1result);

                          $sql="SELECT testid,testname,testdate,teststarttime,testendtime from tblTest where testgid='$grpr2[0]' AND testdate='$cdate' AND  teststarttime<='$ctime' AND testendtime>='$ctime' AND testdate='$cdate' AND  teststatus=1";
                          $result=$conn->query($sql);
                          //$row=mysqli_fetch_array($result);

                          //echo '<script>alert("'.strtotime('Y-m-d',$row['testdate']).'")</script>';

                          while($row=mysqli_fetch_array($result))
                          {
                            $date=$row['testdate'];
                            $day=date('j',strtotime($date));
                            $month=date('F',strtotime($date));
                            $month3=substr($month,0,3);
                            $year=date('Y',strtotime($date));

      echo '<option value="'.$row['testid'].'">'.$row['testname'].' &nbsp &nbsp '.$day.'-'.$month3.'-'.$year.'   ( '.date("g:i a",strtotime($row['teststarttime'])).' -- '.date("g:i a",strtotime($row['testendtime'])).' ) </option>';
                          }

                       ?>          
                    </select>
                  </div>
         

                  <div class="form-group">
                    <label>Upload Answer Sheet <label style="color:black">(pdf, txt, png, jpg, jpeg files only)</label></label>
                    <input type="file" name="txtadd_submtest" class="form-control" required>
                  </div>

                  <div class="form-group">
              <input type="submit" name="submtest_submit" class="btn btn-primary" value="Upload">&nbsp&nbsp  
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
 if(isset($_POST['submtest_submit']))
 {
    $submtestname=$_POST['txtsubmtestname'];

  $folder='submtest/';
  $file=$_FILES['txtadd_submtest']['name'];
  $explode_result=explode('.',$file);//contains two parts filename and ext exploded 
  $lowercase=strtolower(end($explode_result));//convert ext to lower case
  $allowed=array('pdf','txt','png','jpeg','jpg');

  if (in_array($lowercase,$allowed))
   {
    $filepath=$folder.basename($_FILES['txtadd_submtest']['name']);
  move_uploaded_file($_FILES['txtadd_submtest']['tmp_name'],$filepath);

    
  if($submtestname=="none")
    echo '<script>alert("Please Select a Test")</script>';
  else
  {
  

$sql1="SELECT gstudid from tblGroupstud where sgid='$grpr2[0]' AND gstudemail='$uid' AND gstudstatus=1";
$sql1result=$conn->query($sql1);
$sql1row=mysqli_fetch_array($sql1result);

//Returns count of selected testrecord which is previously submitted and status=1 
$check="SELECT count(test_answr_id)from tblSubmtest where submtest_gid='$grpr2[0]' AND submtest_gstudid='$sql1row[0]' AND subm_testid='$submtestname' AND test_answr_status IN(SELECT subm_testid where test_answr_status=1)";
$checkresult=$conn->query($check);
$checkrow=mysqli_fetch_array($checkresult);

$check2="SELECT count(test_answr_id)from tblSubmtest where submtest_gid='$grpr2[0]' AND submtest_gstudid='$sql1row[0]' AND subm_testid='$submtestname' AND test_answr_status=-1";
$checkresult2=$conn->query($check2);
$checkrow2=mysqli_fetch_array($checkresult2);
//echo '<script>alert("'.$checkrow[0].'")</script>';
if($checkrow2[0]>0)
{

  $sql2="UPDATE tblSubmtest set test_answr='$file',test_answr_path='$filepath',test_answr_status=1 where submtest_gid='$grpr2[0]' AND submtest_gstudid='$sql1row[0]' AND subm_testid='$submtestname' AND test_answr_status=-1";
  if($conn->query($sql2)===TRUE)
  {
    echo '<script>alert("Answer Sheet Uploaded Successfully")</script>';
    echo '<script>location.href="studinsidegrp.php?gname='.$gname.'"</script>';
  }
  else
  {
    echo '<script>alert("Something Went Wrong in updation!!")</script>';
  }
}
else if($checkrow[0]>0)
{
  echo '<script>alert("You have Already Responded for this Test Event. This new Response will Erase Your Previous Submission.Press \'Ok\' to Proceed")</script>';

  $sql2="UPDATE tblSubmtest set test_answr='$file',test_answr_path='$filepath',test_answr_status=1 where submtest_gid='$grpr2[0]' AND submtest_gstudid='$sql1row[0]' AND subm_testid='$submtestname'";
  if($conn->query($sql2)===TRUE)
  {
    echo '<script>alert("New Answer Sheet Uploaded Successfully")</script>';
    echo '<script>location.href="studinsidegrp.php?gname='.$gname.'"</script>';
  }
  else
  {
    echo '<script>alert("Something Went Wrong in updation!!")</script>';
  }
  
}
else
{
$sql2="INSERT INTO tblSubmtest(submtest_gid,submtest_gstudid,subm_testid,test_answr,test_answr_path,test_answr_status) values('$grpr2[0]','$sql1row[0]','$submtestname','$file','$filepath',1)";

  if($conn->query($sql2)===TRUE)
  {
    echo '<script>alert("Answer Sheet Uploaded Successfully")</script>';
    echo '<script>location.href="studinsidegrp.php?gname='.$gname.'"</script>';
  }
  else
  {
    echo '<script>alert("Something Went Wrong!!")</script>';
    }
 } 
  
 } //else block for none
  

  }//if close for $allowed array (explode)
  else{
    echo '<script>alert("You cannot Upload this File type!")</script>';
    echo '<script>location.href="studsubmittest.php?gname='.$gname.'"</script>';
  }


  
 }//isset if



?>

</body>

</html>