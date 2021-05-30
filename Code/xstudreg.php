<!DOCTYPE HTML>
<head>
	<title>External Student Registration</title>

	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!--font awesome cdn--> 
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="formstyles.css" >

</head>

<body>

<div class="container">
  	  <div class="row">
  	  	<div class="col-md-6 " id="form">
  	  		<center>
  	  			<b><h2>External Student Registration Form</h2></b>
  	  		</center>
  	  		<form method="POST" action="">
  	  			<div class="form-group">
  	  				<label>Name</label>
  	  				<input type="text" name="txtxstudname" class="form-control" placeholder="Your Name" pattern="[a-zA-Z ]+" required="">
  	  			</div>
  	  			<div class="form-group">
  	  			    <label>E-mail</label>
  	  			  <input type="email" name="txtxstudemail" class="form-control" placeholder="example@gmail.com" required="">
  	  			</div>
  	  			<div class="form-group">
  	  				<label>Age</label>
  	  				<input type="text" name="txtxstudage" class="form-control" placeholder="Your Age" required="">
  	  			</div>
  	  			<div class="form-group">
  	  				<label>Contact Number</label>
  	  			<input type="text" name="txtxstudcontact" class="form-control" placeholder="Your Contact" pattern="[6789][0-9]{9}" required="" pattern="">
  	  			</div>
  	  			<div class="form-group">
  	  				<label>Password</label>
  	  			  <input type="password" name="txtxstudpswd" class="form-control" placeholder="Set a Password" required="">
  	  			</div>
  	  			<div class="form-group">
  	  				<label>Confirm Password</label>
  	  				<input type="password" name="txtxstudcnfrmpswd" class="form-control" placeholder="Confirm Your Password" required="">
  	  			</div>
  	 
  	  			<div class="form-group">
  	  				<input type="submit" name="xstudreg" class="btn btn-primary" value="Register">&nbsp&nbsp
  	  			</div>
  	  		</form>
  	  	</div>
  	  </div>
  </div>



<?php

if(isset($_POST['xstudreg']))
{
	include 'connection.php';

	$xstudemail=$_POST['txtxstudemail'];
	$xstudname=$_POST['txtxstudname'];
	$xstudage=$_POST['txtxstudage'];
	$xstudcontact=$_POST['txtxstudcontact'];
	$xstudpswd=$_POST['txtxstudpswd'];

	
	$sql="INSERT  INTO tblXStudent (xstudemail,xstudname,xstudage,xstudcontact) VALUES ('$xstudemail','$xstudname',$xstudage,'$xstudcontact')";
	if($conn->query($sql)===TRUE)
	{    
		 $sql="INSERT INTO tblLogin (uname,pswd,utype,status) values ('$xstudemail','$xstudpswd','xstudent','0')";
		 if($conn->query($sql)===TRUE)
		 {
		  echo '<script>alert("Your Registration as a Student is Successfull")</script>';
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
  $conn->close();  
}

?>

</body>
</html>
