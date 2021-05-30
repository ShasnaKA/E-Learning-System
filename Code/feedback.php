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
          
        }

        .formspace{
        margin-top:90px;                                                                                    
        width:500px;
        height:500px;
        //background-color:#8d9849;
        box-shadow:6px 6px #b71d08;
        }

        #formspace1{
          background-color:#8d9849;//#38906a;//#538f5d; 
        }


        #formspace2{
          background-color:#8d9849; 
        }

        .formspace:hover{
          width:510px;
          //background-color: #538f5d ; 
        }

      .deptform{
        margin-top:10px;
        margin-left:30px;
        
      }

      .form-control{
        width:450px;
      }
        
      h1{
           color: #b71d08 ;
           font-family:century Gothic;
      }


        h4{
          color: #813d0e ;
          font-family:arial;
        }

      label{
         color:#b71d08;
         font-size:20px;
         font-family:verdana;
      }   
        
        i {
          color:  #C70039;
            
        }

        .mk{
          width:130px;
          height:100px;
        } 

        img{
          width:90px;
          height:90px;
        }

      .btn-primary{
        background-color: #C70039 ;
        border-color: #C70039 ;
        width:200px;
        margin-left:10px;
        margin-top:10px;
        padding:12px;
        font-family:sans-serif;
      }

      .btn-danger{
        background-color: #C70039 ;
        border-color: #C70039 ;
        width:200px;
        margin-left:110px;
        margin-top:6px;
        padding:12px;
        font-family:sans-serif;

      }

      .btn-primary:hover{
        padding:10px;
        font-size:20px;
      }

      .btn-danger:hover{
        padding:12px;
        font-size:20px;
      }

      .black{
        background-color: black;
        width:400px;
        height:100px;
        padding:20px;
        margin-left:28px;
      }
      .first{
        margin-left:5px;
      }

    
    li a{
        color:#fff;
        display:inline-block;
    }
      
    </style>

</head>

<body>

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
  
  <div class="container">
  <div class="row">
    <div class="col-md-6">
            <div class="formspace" id="formspace1">
        <br><br>
      <div class="deptform">
       <form method="POST" onsubmit="return false;">
       <br><br><br>
          <b><h1>Give Us A Rating</h1></b>
                <h4>Please Provide Your Skillup Rating.It helps to improve the services provided by us</h4>
        
      
        <div class="form-group">
        <br>
        <div class="black">
          <input type="image" class="first" name="img" id="img1" src="images/blankstar.png" alt="Submit" width="46" height="46" onclick="func1()">&nbsp
          <input type="image" name="img" id="img2" src="images/blankstar.png" alt="Submit" width="48" height="48" onclick="func2()">&nbsp
          <input type="image" name="img" id="img3" src="images/blankstar.png" alt="Submit" width="48" height="48" onclick="func3()">&nbsp
          <input type="image" name="img" id="img4" src="images/blankstar.png" alt="Submit" width="48" height="48" onclick="func4()">&nbsp
          <input type="image" name="img" id="img5" src="images/blankstar.png" alt="Submit" width="48" height="48" onclick="func5()">&nbsp
        </div>  
      </div>

      </form>
   

        </div>
      </div>
   
    </div>

    <div class="col-md-6">
       <div class="formspace" id="formspace2">
        <br><br>
      <div class="deptform">
          <b><h1>Leave Your Feedback</h1></b>
          <h4>What do you feel about our Services.Feel free to let us know how much you value Skillup</h4>
        <form action="" method="POST">

          <div class="form-group">
            <label>E-mail</label>
            <input type="text" name="txtfeedbackemail" class="form-control" placeholder="Your E-mail" required="">
          </div>

          <div class="form-group">
            <label>Feedback</label>
            <textarea name="txtfeedback" class="form-control" placeholder="Leave a Comment" required=""></textarea>
          </div>
          <input type="text" name="hide" id="hide" hidden>
           
        <div class="form-group">
          <input type="submit" name="feedbacksubmit" class="btn btn-danger" value="POST">&nbsp&nbsp  
        </div>
      </form>
 
    </div>
      </div>  
    </div>
  </div>
 </div>

 <script>

 function func1()
 {
   document.getElementById("hide").value='1';
   var x1=document.getElementById("img1");
   x1.src="images/filledstar.png"; 
   x1.width="60";
   x1.height="50";
  } 

  function func2()
 {
   document.getElementById("hide").value='2';
   var x1=document.getElementById("img1");
   x1.src="images/filledstar.png"; 
   x1.width="60";
   x1.height="50";

   var x2=document.getElementById("img2");
   x2.src="images/filledstar.png"; 
   x2.width="60";
   x2.height="50";
  } 

  function func3()
 {
   document.getElementById("hide").value='3';
   var x1=document.getElementById("img1");
   x1.src="images/filledstar.png"; 
   x1.width="60";
   x1.height="50";

   var x2=document.getElementById("img2");
   x2.src="images/filledstar.png"; 
   x2.width="60";
   x2.height="50";

   var x3=document.getElementById("img3");
   x3.src="images/filledstar.png"; 
   x3.width="60";
   x3.height="50";
  } 

  function func4()
 {
   document.getElementById("hide").value='4';
   var x1=document.getElementById("img1");
   x1.src="images/filledstar.png"; 
   x1.width="60";
   x1.height="50";

   var x2=document.getElementById("img2");
   x2.src="images/filledstar.png"; 
   x2.width="60";
   x2.height="50";

   var x3=document.getElementById("img3");
   x3.src="images/filledstar.png"; 
   x3.width="60";
   x3.height="50";

   var x4=document.getElementById("img4");
   x4.src="images/filledstar.png"; 
   x4.width="60";
   x4.height="50";
  } 

  function func5()
 {
   document.getElementById("hide").value='5';
   var x1=document.getElementById("img1");
   x1.src="images/filledstar.png"; 
   x1.width="60";
   x1.height="50";

   var x2=document.getElementById("img2");
   x2.src="images/filledstar.png"; 
   x2.width="60";
   x2.height="50";

   var x3=document.getElementById("img3");
   x3.src="images/filledstar.png"; 
   x3.width="60";
   x3.height="50";

   var x4=document.getElementById("img4");
   x4.src="images/filledstar.png"; 
   x4.width="60";
   x4.height="50";

   var x5=document.getElementById("img5");
   x5.src="images/filledstar.png"; 
   x5.width="60";
   x5.height="50";
  } 
 



 </script>

 <?php
  
   if(isset($_POST['feedbacksubmit']))
   {
    $feedbackemail=$_POST['txtfeedbackemail'];
    $feedback=$_POST['txtfeedback'];
    $hidevalue=$_POST['hide'];

    $sql="INSERT INTO tblFeedback(feedbackemail,feedback) VALUES('$feedbackemail','$feedback')";
    if($conn->query($sql)===TRUE)
    {  
      $q="INSERT INTO tblRating(ratingemail,rating)VALUES('$feedbackemail','$hidevalue')";
      if($conn->query($q)===TRUE)
      {
       echo '<script>alert("Thanks for Your Valuable Feedback And Rating")</script>';
       echo '<script>location.href="index.php"</script>';
      }
      else
      echo '<scrpit>alert("Something Went Wrong for Rating")</script>';
    }
    else
      echo '<scrpit>alert("Something Went Wrong")</script>';
   }

 ?>


</body>


</html>