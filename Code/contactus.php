
<?php
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
        	margin-top:70px;
            margin-left:-30px;
        	width:640px;
    		height:550px;
    		background-color:  #cb6f85   ;
            box-shadow:5px 5px #C70039 ;
        }

        .formspace:hover{
            width:645px;
            height:550px;
            background-color: #e57561   ;
        }

    	.deptform{
    		margin-top:-20px;
    		margin-left:50px;
    		
    	}

        label{
            margin-top: 20px;
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
    		margin-left:170px;
    		margin-top:20px;
    	}

    	.btn-danger{
    		background-color: #C70039 ;
    		border-color: #C70039 ;
    		width:200px;
    		margin-left:260px;
    		margin-top:-68px;

    	}
    	
    </style>

</head>

<body style="background-color: #dccdd4">
 
<header>
     <nav>
  	  <div class="main">
  	    <div class="skilp">
  	    	<img src="images/logosmall.png">
  	    </div>
  	  	 <ul>
  	  	   <li class="active"><a href="index.php"><i class="fa fa-home"></i><b>Home</b></a></li>	
  	  	   <li><a href="about.php"><i class="fa fa-info-circle"></i><b>About</b></a></li>
  	  	   <li><a href="contactus.php"><i class="fa fa-phone"></i><b>Contact Us</b></a></li>
  	  	   <li><a href="login.php"><i class="fa fa-user"></i><b>Login</b></a></li>
                   <li><a href="signup.php"><i class="fa fa-sign-in"></i><b>Signup</b></a></li>
  	  	   <li><a href="feedback.php"><i class="fa fa-comment"></i><b>Feedback</b></a></li>
  	  	</ul>
  	  </div>
  	 </nav>
  	  <div class="title">
  	  	  <h1 class="text-nowrap">Develop Your Skills Here</h1>
  	  </div>

  
            <div class="frontblock">
                <div class="para1" class="text-center">
  	    	  	    <h3>Looking for a Resource Person to Conquer Your Interest ? Join us with Full Pleasure</h3>
  	    	  	    <div class="cssbutton">
  	    	  	  	  <a href="signup.php" class="btn">Here We Go</a>
  	    	  	    </div>
  	    	  	</div>
  	    	  	<div class="para2" class="text-center">
  	    	  	   <h3>Choose Online Career Theories and Make it a Virtual Institution.Its Your Space, Your Choice</h3>
  	    	  	    <div class="cssbutton">
  	    	  	  	  <a href="signup.php" class="btn">Get Started</a>
  	    	  	    </div>
  	    	  	</div>
  	   	    </div>
 
  	</header>


 <div class="container">
 	<div class="row">
 		<div class="col-md-3"></div>
 		<div class="col-md-6">
 		  <div class="formspace">
 		    <br><br>
 			<div class="deptform">
 			    <b><h1>24*7 Technical Support Available</h1></b>
                <h4>We are Here to Help You Out</h4>
 				<form action="" method=POST>

 				<div class="form-group">
  	  				<label>E-mail</label>
  	  				<input type="text" name="txtemail" class="form-control" placeholder="Your E-mail" required>
  	  			  </div>

 				  <div class="form-group">
  	  				<label>Leave a Message</label>
  	  				<textarea name="txtaddmsg" class="form-control" placeholder="Comment Your Suggestion or Requests" required rows="4" cols="6"></textarea>
  	  			  </div>

                  <div class="form-group">
  	  			<input type="submit" name="deptsubmit" class="btn btn-primary" value="POST">&nbsp&nbsp	
  	  			  </div>

 				</form>
 			  </div>
 			</div>
 		</div>
 		<!--div class="col-md-3" style="margin:-40px;margin-top: 80px;margin-right:30px"><img src="images/explore.jpg" width="500px" height="500px"></div-->
 	</div>
 </div>

  
<?php
 if(isset($_POST['deptsubmit']))
 {
 	$msg=$_POST['txtaddmsg'];
 	$email=$_POST['txtemail'];
 	$sql="INSERT into tblContactus(cemail,msg)VALUES('$email','$msg')";
 	if($conn->query($sql)===TRUE)
 	{
 		echo '<script>alert("We will Contact You Soon for Your Queries if Any.Thanks For Your Support")</script>';
 		echo '<script>location.href="index.php"</script>';
 	}

 	else{
 		echo '<script>alert("Sorry ,Something Went Wrong !!")</script>';
 	}

}

?>

</body>

</html>