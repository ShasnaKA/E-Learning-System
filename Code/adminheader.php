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
       <a class="#">Welcome Admin</a>
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
		<li><a href="#"><i class="fa fa-university"></i>Institutions</a>
           	 <ul class="sublist">
           	 	<li><a href="viewinst.php">Accepted</a></li>
           	 	<li><a href="viewinstrqst.php">New</a></li> 
              <li><a href="viewinstdeleted.php">Deleted</a></li>          	 	
           	 </ul>
		</li>
		<li><a href="#"><i class="fa fa-street-view"></i>Tutors</a>
             <ul class="sublist">
           	 	<li><a href="viewxtutor.php">Accepted</a></li>
           	 	<li><a href="viewxtutorrqst.php">New</a></li>
              <li><a href="viewxtutordeleted.php">Deleted</a></li>
           	 </ul>
		</li>
		<li><a href="#"><i class="fa fa-users"></i>Students</a>
             <ul class="sublist">
           	 	<li><a href="viewxstud.php">Accepted</a></li>
           	 	<li><a href="viewxstudrqst.php">New</a></li>
              <li><a href="viewxstuddeleted.php">Deleted</a></li>
           	 </ul>
		</li>
    <li><a href="#"><i class="fa fa-stack-exchange"></i>Departments</a>
             <ul class="sublist">
              <li><a href="adminadd_dept.php">Add</a></li>
              <!--li><a href="admindel_dept.php">Delete</a></li-->
              <li><a href="adminview_dept.php">View</a></li>
             </ul>
    </li>
		<li><a href="index.php"><i class="fa fa-sign-out"></i>Logout</a></li>

	</ul>
  </div>


  <div class="sidebar">
  	<header>Messages</header>
  	<ul>
  		<li><a href="adminviewfeedback.php"><i class="fa fa-comments"></i>Feedback</a></li>
  		<li><a href="adminviewcontactus.php"><i class="fa fa-envelope"></i>Service Request</a></li>
  	</ul>
  </div>

  <div style="background-image:url(images/mybg.jpeg)"></div>

</body>
</html>