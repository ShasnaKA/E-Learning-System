<?php
 include 'insthome1.php';
 session_start();
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
        	margin-top:125px;
          margin-left:40px;
          width:640px;
    		  height:400px;
    		  background-color: #787c81  ;
          box-shadow:5px 5px #C70039 ;
        }

        .formspace:hover{
            width:650px;
            height:410px;
            background-color: #626669   ;
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
 			    <b><h1>View Students Class Wise</h1></b>
 				<form action="" method=POST>

 				  <div class="form-group">
  	  				<label>Select Course</label>
                    <select name="txtcourseforstuddisplay" class="form-control" required>
                        <option value="none">--Available Courses--</option>
                        <?php

                          $uid=$_SESSION['userid'];
                          $sql="select cid,cname from tblCourse where coursestatus=1 AND instemail='$uid'";
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
                    <select name="txtsemforstuddisplay" class="form-control" required>
                        <option value="none">--Choose a Semester--</option>
                        <option value="Semester 1">Semester 1</option> 
                        <option value="Semester 2">Semester 2</option> 
                        <option value="Semester 3">Semester 3</option> 
                        <option value="Semester 4">Semester 4</option> 
                        <option value="Semester 5">Semester 5</option> 
                        <option value="Semester 6">Semester 6</option> 
                    </select>
              </div>

                 

           <div class="form-group">
  	  			<input type="submit" name="course&sem_submit" class="btn btn-primary" value="Finish">&nbsp&nbsp	
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
    $courseforstuddisplay=$_POST['txtcourseforstuddisplay'];
    $semforstuddisplay=$_POST['txtsemforstuddisplay'];
    $uid=$_SESSION['userid'];

    
  if($courseforstuddisplay=="none")
    echo '<script>alert("Please Choose a Course")</script>';
  else if($semforstuddisplay=="none")
    echo '<script>alert("Please Choose a Semester")</script>';
  else
  {
  
   $sql="SELECT count(*) from tblStudent where studinstemail='$uid' AND studcid='$courseforstuddisplay' AND studsem='$semforstuddisplay' AND studemail in(select uname from tblLogin where status=1)";
   
   $result=$conn->query($sql);
   $r=mysqli_fetch_array($result);

   if($r[0]>0)
   {
     echo '<script>location.href="viewstudcoursewise.php?course='.$courseforstuddisplay.' & sem='.$semforstuddisplay.' & uidforget='.$uid.'"</script>';
   }
   else
   {
    echo '<script>alert("Sorry , Such Student List doesnt exist!!")</script>';
    echo '<script>location.href="insthome.php"</script>';
   }


  }//close of else block
 }//isset if



?>

</body>

</html>