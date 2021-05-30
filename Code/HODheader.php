<!DOCTYPE html>
<head>
   
   <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!--font awesome cdn--> 
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     <!--Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@700&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="mystyles2.css">

    <style>
     .useridnote,.welcomenote a{
        font-family: 'Kumbh Sans', sans-serif;
      }

    </style>


</head>

<body>

  <div class="nav">
    <img src="images/logosmall.png" class="logosmall">
    <div class="welcomenote">
       <a class="#">Welcome HOD</a>
    </div>
     <div class="useridnote">
       <a class="#">Loggedin as
                    <?php
                    session_start();
                    echo $_SESSION['userid'];
                   ?>
       </a>
    </div>
        
	<ul class="mainlist">
		<li><a href="#"><i class="fa fa-street-view"></i>Teachers</a>
           	 <ul class="sublist">
           	 	<li><a href="HODassignsubj.php">Assign Teachers</a></li>
           	 	<li><a href="HODviewteach_semwise.php">View Semesterwise</a></li> 
              <li><a href="HODviewteachall.php">View All</a></li>         	 	
           	 </ul>
		</li>
		<li><a href="#"><i class="fa fa-users"></i>Students</a>
             <ul class="sublist">
           	 	<li><a href="HODviewstud_semwise.php">View Semesterwise</a></li>
           	 	<li><a href="HODviewstud_coursewise.php">View Coursewise</a></li>
              <li><a href="HODviewstudall.php">View All</a></li>
           	 </ul>
		</li>

		<li><a href="HODviewcourse.php"><i class="fa fa-stack-exchange"></i>Courses</a>   
		</li>

    <li><a href="#"><i class="fa fa-book"></i>Subjects</a>
             <ul class="sublist">
              <li><a href="HODviewsubj_semwise.php">View Semesterwise</a></li>
              <li><a href="HODviewsubjall.php">View All</a></li>
             </ul>
    </li>
    <li><a href="HODreportsem.php"><i class="fa fa-external-link-square"></i>Report</a>
            
    </li>
		
	</ul>
  </div>


  <div class="sidebar">
  	<header>Menu Bar</header>
  	<ul>
      <li><a href="index.php"><i class="fa fa-sign-out"></i>Logout</a></li>
      <li><a href="HODviewprofile.php"><i class="fa fa-user"></i>Profile</a></li>
      <li><a href="HODviewresult.php"><i class="fa fa-trophy"></i>Results</a></li>
      <li><a href="HODviewgraph.php"><i class="fa fa-bar-chart"></i>Graph</a></li>
  	</ul>
  </div>

  

</body>
</html>