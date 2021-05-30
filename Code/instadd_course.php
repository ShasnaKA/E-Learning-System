<?php
 include 'insthome1.php';// insthome already has session_start()
 include 'connection.php';
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
        	margin-top:160px;
          margin-left:40px;
        	width:640px;
    		  height:400px;
    		  background-color:#787c81  ;
          box-shadow:5px 5px #C70039 ;
        }

        .formspace:hover{
            width:650px;
            height:410px;
            background-color: #626669;
        }

    	.deptform{
    		margin-top:20px;
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
 			    <b><h1>Add Course Here</h1></b>
 				<form action="" method=POST>

 				  <div class="form-group">
  	  				<label>Select Deparment</label>
                    <select name="txtdeptforcourseadd" class="form-control" required>
                        <option value="none">--Available Departments--</option>
                        <?php
                          $sql="SELECT depid,depname from tblDepartment where depstatus=1";
                          $result=$conn->query($sql);
                          while($row=mysqli_fetch_array($result))
                          {
                        echo '<option value="'.$row['depid'].'">'.$row['depname'].'</option>';
                          }
                       ?>          
                    </select>
  	  			  </div>

                  <div class="form-group">
                    <label>Course</label>
                    <input type="text" name="txtadd_course" class="form-control" placeholder="Enter Course Name" required>
                  </div>

                  <div class="form-group">
  	  				<input type="submit" name="course_submit" class="btn btn-primary" value="Add">&nbsp&nbsp	
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
 if(isset($_POST['course_submit']))
 {
    $deptforcourseadd=$_POST['txtdeptforcourseadd'];
 	  $add_course=$_POST['txtadd_course'];
    $uid=$_SESSION['userid'];

    
  if($deptforcourseadd=="none")
    echo '<script>alert("Please Choose a Department")</script>';
  else
  {
    //To check whether the course to add is already deleted ,if yes change coursestatus to 1
    $check="SELECT count(*) from tblCourse where cname='$add_course' AND coursestatus=-1 AND instemail='$uid' AND depid='$deptforcourseadd' ";
    $checkresult=$conn->query($check);
    $r=mysqli_fetch_array($checkresult);

    //To check whether the course to add  already exist,if yes print a message
    $check2="SELECT count(*) from tblCourse where cname='$add_course' AND coursestatus=1 AND instemail='$uid' AND depid='$deptforcourseadd' ";
    $checkresult2=$conn->query($check2);
    $r2=mysqli_fetch_array($checkresult2);

  
    if($r[0]>0)
    {
        $sql="UPDATE tblCourse set coursestatus=1 where cname='$add_course' AND depid='$deptforcourseadd' AND instemail='$uid' AND coursestatus=-1";
        if($conn->query($sql)===TRUE)
        echo '<script>var choice=confirm("Course Added Successfully.Do You want to add More?");
    if(choice==true){location.href="instadd_course.php"}else{ location.href="instview_course.php"}</script>';
    }

  else if($r2[0]>0)
   {
    echo '<script>alert("Course Already Exists!!")</script>';
    echo '<script>location.href="instview_course.php"</script>';
   }

  else
  {
  

 	$sql="INSERT into tblCourse(instemail,depid,cname,coursestatus)VALUES('$uid','$deptforcourseadd','$add_course','1')";
 	if($conn->query($sql)===TRUE)
 		echo '<script>var choice=confirm("Course Added Successfully.Do You want to add More?");
 	if(choice==true){location.href="instadd_course.php"}else{ location.href="instview_course.php"}</script>';

 	else{
 		echo '<script>alert("Sorry ,Something Went Wrong!!")</script>';
 	   }
  
  }//else block for check if course already deleted
 } //else block for none
  
 }//isset if



?>

</body>

</html>