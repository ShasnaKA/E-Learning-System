
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
      .useridnote,.welcomenote a{
        font-family: 'Kumbh Sans', sans-serif;
        }

        .nav .mainlist{
          margin-left:60%;
        }
    </style>


</head>

<body>

  <div class="nav">
    <img src="images/logosmall.png" class="logosmall">
    <div class="welcomenote">
       <a class="#">Welcome Student</a>
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

    <li><a href="studhome.php"><i class="fa fa-dashboard"></i>Dashboard</a>        
    </li>


    <li><a href="studviewsubjexist.php"><i class="fa fa-book"></i>Subjects</a>
    </li>

    <li><a href="index.php"><i class="fa fa-sign-out"></i>Log Out</a>
    </li>

		
	</ul>
  </div>


  <div class="sidebar">
  	<header>Menu Bar</header>
  	<ul>
      <li><a href="studviewprofile.php"><i class="fa fa-user"></i>Profile</a></li>
      <!--li><a href="teachviewmark.php"><i class="fa fa-graduation-cap"></i>Marks</a></li-->
      <li><a href="studviewresult.php"><i class="fa fa-trophy"></i>Results</a></li>
      <li><a href="studviewgraph.php"><i class="fa fa-bar-chart"></i>Graph</a></li>
  	</ul>
  </div>

  

</body>
</html>