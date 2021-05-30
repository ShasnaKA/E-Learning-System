<!DOCTYPE html>
<head>
	<style>

    h1{
        font-family: 'Goldman', cursive;
        color:#C70039;
        margin-left: -30px;
    }
		
		div .utype{
			margin-left:20px;
			margin-top:20px;
		}

        .btn-danger{
            background-color: #C70039 ;
            border-color: #C70039 ;
            width:200px;
            margin-left:40px;
            margin-top:40px;
         }
         .formspace{
            background-color:  #10a1bb ;
            width:500px;
            height:500px;
            margin-top: 90px;
            margin-left: 460px;
         }

         .deptform{
            margin-top: 10px;
            margin-left: 100px;
         }
	</style>


	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!--font awesome cdn--> 
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--font awesome cdn2--> 
   <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Goldman&display=swap" rel="stylesheet"> 

<style>
    li a{
        color:#fff;
        display:inline-block;
    }
</style>

</head>

<body style="background-color:  #d6958a ">
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
  	  	  <!--h1 class="text-nowrap">Develop Your Skills Here</h1-->
  	  </div>

  
            <!--div class="frontblock">
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
  	   	    </div-->
 
      </header>
      

       <div class="utype">
		<br>
		<h3>
        <form method="POST">
        <div class="formspace">
        <div class="deptform">
        <br>
        <center><h1>Sign Up For</h1></center>
        <br>
        <input type="radio" name="txt" value="inst">&nbsp Institution<br>
		<input type="radio" name="txt" value="stud">&nbsp Institutional Student<br>
		<input type="radio" name="txt" value="teach">&nbsp Institutional Teacher<br>
		<input type="radio" name="txt" value="HOD">&nbsp Departmental Head<br><br>
		
		<input type="radio" name="txt" value="xstud">&nbsp External Student<br>
		<input type="radio" name="txt" value="xtutor">&nbsp External Subject Expert<br>
		<input type="submit" name="btn-submit" class="btn btn-danger" value="Click To Signup">
        <br><br>
        </div>
		</div>
        </form>
        </h3>
      </div>

</body>
<?php

 if(isset($_POST['btn-submit']))
 {
    $var=$_POST['txt'];
   
   if($var=="stud")
    {
    	echo '<script>location.href="studreg.php"</script>';
    }
    else if($var=="teach")
    {
        echo '<script>location.href="teachreg.php"</script>';	
    }
    else if($var=="HOD")
    {
        echo '<script>location.href="HODreg.php"</script>';	
    }
    else if($var=="inst")
    {
        echo '<script>location.href="instreg.php"</script>';	
    }
    else if($var=="xstud")
    {
        echo '<script>location.href="xstudreg.php"</script>';	
    }
    else if($var=="xtutor")
    {
        echo '<script>location.href="xtutorreg.php"</script>';	
    }
    else
    {
    	echo '<script>alert("Wrong type")</script>';
    }

 }
 

?>



</html>
