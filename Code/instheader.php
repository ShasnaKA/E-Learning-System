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
       <a class="#">Welcome Principal</a>
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
		<li><a href="#"><i class="fa fa-user-plus"></i>HODs</a>
           	 <ul class="sublist">
           	 	<li><a href="viewHOD.php">Accepted</a></li>
           	 	<li><a href="viewHODrqst.php">New</a></li> 
              <li><a href="viewHODdeleted.php">Deleted</a></li>         	 	
           	 </ul>
		</li>
		<li><a href="#"><i class="fa fa-street-view"></i>Teachers</a>
             <ul class="sublist">
           	 	<li><a href="viewteach.php">Accepted</a></li>
           	 	<li><a href="viewteachrqst.php">New</a></li>
              <li><a href="viewteachdeleted.php">Deleted</a></li>
           	 </ul>
		</li>
		<li><a href="#"><i class="fa fa-users"></i>Students</a>
             <ul class="sublist">
           	 	<li><a href="viewstud.php">Accepted</a></li>
           	 	<li><a href="viewstudrqst.php">New</a></li>
              <li><a href="viewstuddeleted.php">Deleted</a></li>
              <li><a href="selectcourse.php">Class Wise</a></li>
           	 </ul>
		</li>
    <li><a href="#"><i class="fa fa-stack-exchange"></i>Courses</a>
             <ul class="sublist">
              <li><a href="instadd_course.php">Add</a></li>
              <li><a href="instdel_course.php">Delete</a></li>
              <li><a href="instview_course.php">View</a></li>
             </ul>
    </li>
        <li><a href="#"><i class="fa fa-book"></i>Subjects</a>
             <ul class="sublist">
              <li><a href="instadd_subj.php">Add</a></li>
              <li><a href="instdel_subj.php">Delete</a></li>
              <li><a href="instview_subj.php">View</a></li>
             </ul>
    </li>
		
	</ul>
  </div>


  <div class="sidebar">
  	<header>Menu Bar</header>
  	<ul>
      <li><a href="index.php"><i class="fa fa-sign-out"></i>Logout</a></li>
      <li><a href="instprofile.php"><i class="fa fa-user"></i>Profile</a></li>
      <li><a href="instviewresult.php"><i class="fa fa-trophy"></i>Results</a></li>
      <!--li><a href="instviewcomments.php"><i class="fa fa-comment"></i>Comments</a></li-->
  	</ul>
  </div>

  

</body>
</html>