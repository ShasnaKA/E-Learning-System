<!--Teacherhome page for other pages(add /del) without group modules -->
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

    <style>

      *{
  padding:0;
  margin:0;
}

body{
  margin:0;
  
  background-position:cover;
  background-size: cover;
  background-repeat: no-repeat;
  

}

.nav{
  width:100%;
  background-color:#000033;
  height:80px;
  position:fixed;
  margin-top:0px;
}

.nav .logosmall{
  margin-left:-30px;
  width:300px;
  height:80px;
}

.nav .welcomenote{
  color:#63ab27;
  margin-top:15px;
  margin-left:-22px;
  font-size:27px;
  font-family:Century Gothic;
}

.nav .welcomenote a:hover{
  background-color:#000033;
  color:#63ab27;
}


.nav .useridnote{
  font-size:14px;
  color:#fff;
  margin-left:-210px;
  margin-top:50px;

}

.nav .useridnote a:hover{
  background-color:#000033;
  color:#fff;
}


.nav .mainlist{
  list-style:none;
  padding:0;
  margin-left:50%;
  position:absolute;
}

.nav .sublist{
  list-style:none;
  margin-top:-4px;
}

.hide{
  background-color:#000033;
  cursor:auto;
}

.hide a:hover{
  background-color:#000033;
    cursor:auto;
}

.nav ul li{
  float:left;
  margin-top:20px;
}

.nav ul li a{
  width:150px;
  color:#fff;
  display:block;
  text-decoration:none;
  font-size:16px;
  text-align:center;
  padding:10px;
  border-radius:10px;
  font-family:Century Gothic;
  
}

.nav a:hover{
  background-color:#63ab27; 
  color:#fff;
  text-decoration:none;

}

.nav ul li ul {
  background-color:#000033; 
}

.nav ul li ul li{
  float:none;
}

.nav ul li ul{
   display:none;
}

.nav ul li:hover ul{
  display:block;
}

.nav ul a i{
  margin-right:5px;
}


.sidebar{
  position:fixed;
  left:0;
  width:250px;
  height:100%;
  background-color:#000033;
  margin-top:80px;
  
}

.sidebar ul{
   list-style:none;
}


.sidebar header{
  font-size:22px;
  color:#fff;
  text-align:center;
  line-height:70px;
  background:#063146;
  user-select:none;
}

.sidebar ul a{
  text-decoration:none;
  display:block;
  height:100%;
  width:100%;
  line-height:65px;
  font-size:20px;
  color:white;
  padding-left:40px;
  box-sizing:border-box;
  border-top:1px solid rgba(255,255,255,.1);
  border-bottom: 1px solid black;

}

.sidebar ul li:hover a{
  padding-left:50px;
  color:#63ab27;

}

.sidebar ul a i{
  margin-right:16px;
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
  <br><br>

  

</body>
</html>