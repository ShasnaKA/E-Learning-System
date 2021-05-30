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
          <b><h1>Quick Upload Section for Tests</h1></b>
        <form action="" method=POST enctype="multipart/form-data">

                   <div class="form-group">
                    <label>Select Topic</label>

                    <select name="txtmidtestname" class="form-control" required>
                        <option value="none">--Newly Sheduled Test Events--</option>
                        <?php
                         

                           $uid=$_SESSION['userid'];

                           $grpid="SELECT xgid from tblXGroup where xgname='$gname' AND xtutorhostemail='$uid'";
                          $grpresult=$conn->query($grpid);
                          $grpr2=mysqli_fetch_array($grpresult);

                          date_default_timezone_set('Asia/Kolkata');
                        $cdateandtime=date('Y-m-d').' '.date('H:i:s');

                          $sql="SELECT xtestid,xtestname from tblXTest where xteststatus=1 AND xqpaper IS NULL AND xtestgid='$grpr2[0]' AND CONCAT(CONCAT(xtestdate,' '),xteststarttime) >='$cdateandtime'";
                          $result=$conn->query($sql);
                          while($row=mysqli_fetch_array($result))
                          {
                        echo '<option value="'.$row['xtestid'].'">'.$row['xtestname'].'</option>';
                          }
                       ?>          
                    </select>
                  </div>
         

                  <div class="form-group">
                    <label>Upload Questions</label>
                    <input type="file" name="txtadd_test" class="form-control" required>
                  </div>

                  <div class="form-group">
              <input type="submit" name="testsubmit" class="btn btn-primary" value="Upload">&nbsp&nbsp  
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
 
 if(isset($_POST['testsubmit']))
 {
    $midtestname=$_POST['txtmidtestname'];

  $folder='tests/';
  $file=$_FILES['txtadd_test']['name'];

  $explode_result=explode('.',$file);//contains two parts filename and ext exploded 
  $lowercase=strtolower(end($explode_result));//convert ext to lower case
  $allowed=array('pdf','txt','png','jpeg','jpg');

  if (in_array($lowercase,$allowed))
  {
 
  $filepath=$folder.basename($_FILES['txtadd_test']['name']);
  move_uploaded_file($_FILES['txtadd_test']['tmp_name'],$filepath);

    
  if($midtestname=="none")
    echo '<script>alert("Please Select a Topic")</script>';
  else if($file=="none")
    echo '<script>alert("Please Choose a File")</script>';
  else
  {
  
  //$cdate=date('Y-m-d');
  

$sql2="UPDATE tblXTest SET xqpaper='$file',xqpaperpath='$filepath' where xtestgid='$grpr2[0]' AND xtestid='$midtestname' AND xqpaper IS NULL AND xqpaperpath IS NULL";

  if($conn->query($sql2)===TRUE)
  {
    echo '<script>alert("Questions Uploaded Successfully")</script>';
    echo '<script>location.href="xtutorinsidegrp.php?gname='.$gname.'"</script>';
  }
  else{
    echo '<script>alert("Something Went Wrong!!")</script>';
     }
  
  
 } //else block for none

}
else
{
   echo '<script>alert("You cannot Upload this File type!")</script>';
   echo '<script>location.href="xtutoraddmidtest.php?gname='.$gname.'"</script>';
}
  
 }//isset if



?>

</body>

</html>