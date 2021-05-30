<?php
 include 'connection.php';
 include 'xtutorinsidegrpcommon.php';
 $gstudid=$_GET['gstudid'];
 $testid=$_GET['testid'];
 $gname=$_GET['gname'];
 $gid=$_GET['gid'];
 $test_answr=$_GET['test_answr'];
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

    <style>

        body{
        	
        	background-color:#1a2935 ;
        	background-size:cover;
        }

        .formspace{
        	margin-top:80px;
            margin-left:40px;
        	width:640px;
    		height:480px;
    		background-color:  #787c81;
            box-shadow:5px 5px #C70039 ;
        }

        .formspace:hover{
            width:650px;
            height:482px;
            background-color:#626669  ;
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
    		margin-left:50px;
    		margin-top:10px;
    	}

    	.btn-danger{
    		background-color: #C70039 ;
    		border-color: #C70039 ;
    		width:200px;
    		margin-left:260px;
    		margin-top:-68px;

    	}
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
 			    <b><h1>Check And Grade Submissions Here</h1></b>
 				<form action="" method=POST>
                        <?php

                          $uid=$_SESSION['userid'];
                          $sql="SELECT xtestname,xtestmax,tblXStudent.xstudname from tblXTest INNER JOIN tblXGroup ON tblXGroup.xgid=tblXTest.xtestgid INNER JOIN tblXGroupstud ON tblXGroupstud.xsgid=tblXGroup.xgid INNER JOIN tblXStudent ON tblXGroupstud.xgstudemail=tblXStudent.xstudemail where tblXGroupstud.xgstudid='$gstudid' AND xgid='$gid' AND xtestid='$testid'";
                          $result=$conn->query($sql);
                          $row=mysqli_fetch_array($result)
                        
                       ?>    

                  <div class="form-group">
                    <label>Student Name</label>
            <input type="text" name="txtstud" class="form-control" value="<?php echo $row['xstudname'] ?>" readonly>
                  </div>
                 
                 <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label>Test Event</label>
                    <input type="text" name="txttest"  value="<?php echo $row['xtestname'] ?>" readonly>
                  </div>

                  <div class="form-group">
                    <label>Max Marks</label>
                    <input type="text" name="txtmax"  value="<?php echo $row['xtestmax'] ?>" readonly>
                  </div>
                </div>
                     
                  <div class="col-md-6">
                   <div class="form-group">
                    <label>Submission</label>
                    <input type="text" name="txttest" value="<?php echo $test_answr ?>" readonly>
                  </div>

                   <div class="form-group">
                    <label>Marks Scored</label>
                    <input type="number" name="txtscored" required>
                  </div>
                </div>

                  <div class="form-group">
  	  				<input type="submit" name="subj_submit" class="btn btn-primary" value="POST">&nbsp&nbsp	
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
 include 'connection.php';
 if(isset($_POST['subj_submit']))
 {
   
 	  $scored=$_POST['txtscored'];
    $uid=$_SESSION['userid'];//already given

    if($scored>$row['xtestmax'])
    {
      echo '<script>alert("Invalid Score Entered! (See Maximimum Marks for the Test)")</script>';
    }
   else
  {
    //To check whether the Score is already provided for that student,if yes print a message and update new score
    $check2="SELECT count(xtestmrkid) from tblXTestmark where xtestmrkgid='$gid' AND xtestmrktestid='$testid' AND xtestmrkgstudid='$gstudid' AND xtestmrkstatus=1 ";
    $checkresult2=$conn->query($check2);
    $r2=mysqli_fetch_array($checkresult2);

   if($r2[0]>0)
    {
      echo '<script>alert("You Have Already Recorded Score for this Student!This New Response will Erase the Previously Recorded Score")</script>';
      $sql="UPDATE tblXTestmark set xtestmrk='$scored' where xtestmrkgid='$gid' AND xtestmrktestid='$testid' AND xtestmrkgstudid='$gstudid'";
      if($conn->query($sql)===TRUE)
      {
        echo '<script>alert("New Score Recorded Successfully");';
        echo 'location.href="xtutorviewtestresponse2.php?gname='.$gname.'"</script>';
      }
      else
      {
         echo '<script>alert("Sorry ,Something Went Wrong in Updation!!")</script>';
      }
   }
 else
 {
   $sql="INSERT into tblXTestmark (xtestmrkgid,xtestmrktestid,xtestmrkgstudid,xtestmrk,xtestmrkstatus)VALUES('$gid','$testid','$gstudid','$scored','1')";
 	if($conn->query($sql)===TRUE)
  {
 		echo '<script>alert("Score Recorded Successfully");';
    echo 'location.href="xtutorviewtestresponse2.php?gname='.$gname.'"</script>';
  }
  else
  {
 		echo '<script>alert("Sorry ,Something Went Wrong!!")</script>';
 	 }
  }
 } 
}//isset if


?>

</body>

</html>