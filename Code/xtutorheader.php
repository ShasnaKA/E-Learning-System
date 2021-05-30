
<!DOCTYPE html>
<head>
   
   <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!--font awesome cdn--> 
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="mystyles2.css">

     <!--Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@700&display=swap" rel="stylesheet"> 

    <style>
       .nav .mainlist{
  
           margin-left:50%;
 
       }


      .useridnote,.welcomenote a{
        font-family: 'Kumbh Sans', sans-serif;
        }
    </style>


</head>

<body>

  <div class="nav">
    <img src="images/logosmall.png" class="logosmall">
    <div class="welcomenote">
       <a class="#">Welcome Teacher</a>
    </div>
     <div class="useridnote">
       <a class="#">Logged in as
                    <?php
                    session_start();
                    echo $_SESSION['userid'];
                   ?>
       </a>
    </div>
        
	<ul class="mainlist">

    <li><a href="xtutorhome.php"><i class="fa fa-dashboard"></i>Dashboard</a>        
    </li>

		<li><a href="#"><i class="fa fa-users"></i>Groups</a>
           	 <ul class="sublist">
           	 	<li><a href="xtutoraddgrp.php">Add</a></li>
           	 	<li><a href="xtutordelgrp.php">Delete</a></li> 
              <li><a href="xtutorview_grpallexists.php">View All</a></li>         	 	
           	 </ul>
		</li>


    <li><a href="#"><i class="fa fa-user"></i>Students</a>
             <ul class="sublist">
              <li><a href="xtutorviewstudnewexist.php">New Requests</a></li>
              <li><a href="xtutorviewstudacceptedexist.php">Accepted</a></li>
              <li><a href="xtutorviewstudrejectedexist.php">Rejected</a></li>
             </ul>
    </li>

    <li><a href="index.php"><i class="fa fa-sign-out"></i>Log Out</a>
    </li>
		
	</ul>
  </div>


  <div class="sidebar">
  	<header>Menu Bar</header>
  	<ul>
      <li><a href="xtutorviewprofile.php"><i class="fa fa-user"></i>Profile</a></li>
  	</ul>
  </div>

  

</body>
</html>