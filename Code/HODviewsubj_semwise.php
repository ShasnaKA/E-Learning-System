<?php
 include 'connection.php';
 include 'HODhome1.php';//contains session_start()
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
        	margin-top:140px;
            margin-left:40px;
        	width:640px;
    		height:450px;
    		background-color:  #787c81;
            box-shadow:5px 5px #C70039 ;
        }

        .formspace:hover{
            width:650px;
            height:455px;
            background-color:#626669  ;
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
 			    <b><h1>View Subjects Semwise</h1></b>
 				<form action="" method=POST>

 				  <div class="form-group">
  	  				<label>Select Course</label>
                    <select name="txtcourseforsubjview" class="form-control" required>
                        <option value="none">--Available Courses--</option>
                        <?php

                           $uid=$_SESSION['userid'];//HOD username

                           $instemail_ofHOD="SELECT HODinstemail from tblHOD where HODemail='$uid'";
                           $rslt1=$conn->query($instemail_ofHOD);
                           $r1=mysqli_fetch_array($rslt1);

                          $depid_ofHOD="SELECT HODdepid from tblHOD where HODemail='$uid'";
                           $rslt2=$conn->query($depid_ofHOD);
                           $r2=mysqli_fetch_array($rslt2);

                          $sql="SELECT cid,cname from tblCourse where instemail='$r1[0]' AND depid='$r2[0]' AND coursestatus=1";
                          $result=$conn->query($sql);
                          while($row=mysqli_fetch_array($result))
                          {
                        echo '<option value="'.$row['cid'].'">'.$row['cname'].'</option>';
                          }
                       ?>          
                    </select>
  	  			  </div>


              <div class="form-group">
              <label>Select Semester</label>
                    <select name="txtsemforsubjview" class="form-control" required>
                        <option value="none">--Available Semesters--</option>
                        <option value="Semester 1">Semester 1</option>
                        <option value="Semester 2">Semester 2</option>
                        <option value="Semester 3">Semester 3</option>
                        <option value="Semester 4">Semester 4</option>
                        <option value="Semester 5">Semester 5</option>
                        <option value="Semester 6">Semester 6</option>  
                    </select>
              </div>

                 

              <div class="form-group">
  	  				<input type="submit" name="course&sem_submit" class="btn btn-primary" value="View">&nbsp&nbsp	
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
 if(isset($_POST['course&sem_submit']))
 {
    $courseforsubjview=$_POST['txtcourseforsubjview'];
    $semforsubjview=$_POST['txtsemforsubjview'];
   

    
  if($courseforsubjview=="none")
    echo '<script>alert("Please Choose a Course")</script>';
  else if($semforsubjview=="none")
    echo '<script>alert("Please Choose a Semester")</script>';
  else
  {
     
    $instemail_ofHOD="SELECT HODinstemail from tblHOD where HODemail='$uid'";
    $rslt2=$conn->query($instemail_ofHOD);
    $r2=mysqli_fetch_array($rslt2);


    $check="SELECT count(*) FROM tblSubject INNER JOIN tblCourse ON tblCourse.cid=tblSubject.subjcid LEFT JOIN tblTeacher ON tblTeacher.teachemail=tblSubject.subjteachemail where subjinstemail='$r2[0]' AND subjcid='$courseforsubjview' AND subjsem='$semforsubjview' AND subjstatus=1";


     $checkresult=$conn->query($check);
     $r=mysqli_fetch_array($checkresult);

     if($r[0]==0)
     {
      echo '<script>alert("No such Subject List Exists for the selected Semester!!")</script>';
      echo '<script>location.href="HODhome.php"</script>';
     }
     else
     {
    echo '<script>location.href="HODviewsubj_semwise2.php?cid='.$courseforsubjview.' & sem='.$semforsubjview.' "</script>';
    }

 } //else block for 2nd none ie,for sem selected or not
  
 }//isset if



?>

</body>

</html>