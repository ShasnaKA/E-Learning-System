<!DOCTYPE HTML>
<head>
	<title>External Tutor Registration</title>

	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!--font awesome cdn--> 
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="formstyles.css" >


    <!--Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>

</head>

<body>

<div class="container">
  	  <div class="row">
  	  	<div class="col-md-6 " id="form">
  	  		<center>
  	  			<b><h2>External Tutor Registration Form</h2></b>
  	  		</center>
  	  		<form method="POST" enctype="multipart/form-data" action="">
  	  			<div class="form-group">
  	  				<label>Name</label>
  	  				<input type="text" name="txtxtutorname" class="form-control" placeholder="Your Name" pattern="[a-zA-Z ]+" required="">
  	  			</div>
  	  			<div class="form-group">
  	  			    <label>E-mail</label>
  	  			  <input type="email" name="txtxtutoremail" class="form-control" placeholder="example@gmail.com" required="">
  	  			</div>
  	  			<div class="form-group">
  	  				<label>Upload Photo</label>
  	  				<input type="file" name="txtxtutorpic" class="form-control">
  	  			</div>
            <div class="form-group">
              <label>Qualification</label>
              <select name="txtxtutorqualf" class="form-control" required="">
                <option value="none" selected>--Your Highest Qualification--</option>
                <option value="Degree">Bachelors Degree</option>
                <option value="PG">Masters Degree</option>
                <option value="B-Tech">Bachelor of Engineering</option>
                <option value="M-Tech">Master of Engineering</option>
                <option value="Phd">Phd and Above</option>
                <option value="Others">Others</option>
              </select> 
            </div>
  	  			<div class="form-group">
  	  				<label>Contact Number</label>
  	  			<input type="text" name="txtxtutorcontact" class="form-control" placeholder="Your Contact" pattern="[6789][0-9]{9}" required="">
  	  			</div>
  	  			<div class="form-group">
  	  				<label>Password</label>
  	  			  <input type="password" name="txtxtutorpswd" id="pswd" class="form-control" placeholder="Set a Password" required="">
  	  			</div>
  	  			<div class="form-group">
  	  				<label>Confirm Password</label>
  	  				<input type="password" name="txtxtutorcnfrmpswd" id="cnfpswd" class="form-control" placeholder="Confirm Your Password Here" required="">
  	  			</div>
  	 
  	  			<div class="form-group">
  	  			<input type="submit" name="xtutorreg" class="btn btn-primary" value="Register">&nbsp&nbsp
  	  			</div>
  	  		</form>
  	  	</div>
  	  </div>
  </div>


<?php

if(isset($_POST['xtutorreg']))
{
	include 'connection.php';

	$xtutoremail=$_POST['txtxtutoremail'];
	$xtutorname=$_POST['txtxtutorname'];
  $xtutorqualf=$_POST['txtxtutorqualf'];
	$xtutorcontact=$_POST['txtxtutorcontact'];
	$xtutorpswd=$_POST['txtxtutorpswd'];
  $xtutorcnfrmpswd=$_POST['txtxtutorcnfrmpswd'];
 

  //image upload
  $folder='images/';
  $file=$folder.basename($_FILES['txtxtutorpic']['name']);
  move_uploaded_file($_FILES['txtxtutorpic']['tmp_name'],$file);

  if($xtutorpswd!=$xtutorcnfrmpswd)
    echo '<script>alert("Incorrect Password!! Please Re-enter the Password")</script>';

	else
  {
	$sql="INSERT  INTO tblXTutor (xtutoremail,xtutorname,xtutorqualf,xtutorcontact,xtutorpic) VALUES ( '$xtutoremail' , '$xtutorname','$xtutorqualf','$xtutorcontact','$file')";
	if($conn->query($sql)===TRUE)
	{    
		 $sql="INSERT INTO tblLogin (uname,pswd,utype,status) values ('$xtutoremail','$xtutorpswd','xtutor','0')";
		 if($conn->query($sql)===TRUE)
		 {
		  echo '<script>alert("Your Registration as a Tutor is Successfull")</script>';
          echo '<script>location.href="login.php"</script>';
	     }
	    else
        {
           echo '<script>alert("Registration failed")</script>'; 
         }
    }
    else
    {
        echo '<script>alert("Sorry some error occured")</script>';
    }
  }
  $conn->close();  
}

?>

</body>
</html>
