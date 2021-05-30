<?php
 include 'xtutorinsidegrpcommon.php';// insidegrpcommon.php already has session_start()
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
          margin-top:54px;
          margin-left:40px;
          width:640px;
          height:545px;
          background-color:#787c81  ;
          box-shadow:5px 5px #C70039 ;
        }

        .formspace:hover{
            width:640px;
            height:545px;
            background-color: #626669;
        }

      .deptform{
        margin-top:-30px;
        margin-left:50px;
        
      }

      .form-control{
        width:500px;
      }
        
      h1{
           color: #fff ;
           font-family:century Gothic;

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
        margin-left:40px;
        margin-top:-5px;
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

      .clstestlabel{
        margin-top:-10px;
      }

      .clstestlabel{
        margin-top:10px;
      }

      .clsdatebox{
        width:560px;
      }

      .clstimebox{
        width:240px;
      }
      
      input[type="file"] {
        display: none;
      }

    .custom-file-upload {
      margin-top:10px;
       border: 1px dotted #ccc;
       display: inline-block;
       padding: 6px 12px;
       cursor: pointer;
       background-color:#fff;
       color:#C70039;
       font-size:13px;
     }

     .custom-file-upload:hover{
      color:blue;
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
          <b><h1>Schedule New Tests Here</h1></b>
        <form action="" method=POST enctype="multipart/form-data">
              <div class="row">

                  <div class="col-md-6">
                    <div class="test-group">
                      <label class="clstestlabel">Topic </label>
                      <input type="text" name="txttestname" autofocus class="clstextbox1" placeholder="  Topic for the Test" size="25px" required>            
                    </div>
                    <div class="test-group">
                      <label class="clstestlabel">Maximum Marks</label>
                      <input type="number" name="txttestmax" size="25px" placeholder=" Total Marks" required>
                    </div>
                  </div>

                 <div class="col-md-6">
                   <div class="test-group">
                      <label class="clstestlabel">Event Description</label>
                      <textarea name="txttestdesc" class="clstextarea" placeholder=" Test Description / Portions" rows="4" cols="25" required></textarea>
                   </div>
                 </div>

              </div>
              
              <div class="row">
                <div class="col-md-6">
                 <div class="form-group">
                    <label class="clstestlabel">Due Date</label>
                    <input type="date" name="txttestdate" class="clsdatebox" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Schedule From :</label>
                    <input type="time" name="txtteststarttime" class="clstimebox" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Time Allowed Up-To :</label>
                    <input type="time" name="txttestendtime" class="clstimebox" required>
                  </div>
                </div>
              </div>

                 <div class="form-group">
                    <label for="file-upload" class="custom-file-upload"><b>Click here to Upload Questions</b> (<em>You can Skip this step and attach it later on</em>)</label>
                    <input type="file" name="txtqpaper" id="file-upload" size="600" class="clsdatebox">
                  </div>

                <div class="form-group">
              <input type="submit" name="testsubmit" class="btn btn-primary" value="Set Event">&nbsp&nbsp  
              <input type="reset" class="btn btn-primary" value="Reset">&nbsp&nbsp 
              </div>

        </form>
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
 </div>

<?php
 
 if(isset($_POST['testsubmit']))
 {
    $testname=$_POST['txttestname'];
    $testmax=$_POST['txttestmax'];
    $testdesc=$_POST['txttestdesc'];
    $testdate=$_POST['txttestdate'];
    $teststarttime=$_POST['txtteststarttime'];
    $testendtime=$_POST['txttestendtime'];
    
    

  $folder='xtests/';
  $file=$_FILES['txtqpaper']['name'];
  
    $uid=$_SESSION['userid'];

    $grpid="SELECT xgid from tblXGroup where xgname='$gname' AND xtutorhostemail='$uid'";
    $grpresult=$conn->query($grpid);
    $grpr2=mysqli_fetch_array($grpresult);
  

  //$cdate=date('Y-m-d');
 if($file==NULL)
 {
  $sql1="INSERT INTO tblXTest(xtestgid,xtestname,xtestdesc,xtestdate,xteststarttime,xtestendtime,xtestmax,xteststatus)VALUES('$grpr2[0]','$testname','$testdesc','$testdate','$teststarttime','$testendtime','$testmax',1)";

  if($conn->query($sql1)===TRUE)
    echo '<script>var choice=confirm("Test Scheduled Successfully.Do You want to add More Events?");
  if(choice==true){location.href="xtutoraddnewtest.php?gname='.$gname.'"}else{ location.href="xtutorinsidegrp.php?gname='.$gname.'"}</script>';

  else{
    echo '<script>alert("Sorry Something Went Wrong!!")</script>';
     }

 }
 else
 {

  $explode_result=explode('.',$file);//contains two parts filename and ext exploded 
  $lowercase=strtolower(end($explode_result));//convert ext to lower case
  $allowed=array('pdf','txt','png','jpeg','jpg');

if (in_array($lowercase,$allowed))
{

$filepath=$folder.basename($_FILES['txtqpaper']['name']);
 move_uploaded_file($_FILES['txtqpaper']['tmp_name'],$filepath);

  
$sql="INSERT INTO tblXTest(xtestgid,xtestname,xtestdesc,xtestdate,xteststarttime,xtestendtime,xtestmax,xqpaper,xqpaperpath,xteststatus)VALUES('$grpr2[0]','$testname','$testdesc','$testdate','$teststarttime','$testendtime','$testmax','$file','$filepath',1)";

  if($conn->query($sql)===TRUE)
    echo '<script>var choice=confirm("Test Scheduled Successfully.Do You want to add More Events?");
  if(choice==true){location.href="xtutoraddnewtest.php?gname='.$gname.'"}else{ location.href="xtutorinsidegrp.php?gname='.$gname.'"}</script>';

  else{
    echo '<script>alert("Something Went Wrong!!")</script>';
     }
}
else{
    echo '<script>alert("You cannot Upload this File type!")</script>';
    echo '<script>location.href="xtutoraddnewtest.php?gname='.$gname.'"</script>';
  }
 }
 

 }//isset if



?>

</body>

</html>