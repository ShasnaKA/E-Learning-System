<?php
 //session_start();Already given below in useridnote
 include 'connection.php';
 //session_start();
 $gname=$_GET['gname'];


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

    <link rel="stylesheet" href="mystyles2.css">

     <!--Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@700&display=swap" rel="stylesheet"> 

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
       <a class="#">Classroom <?php echo $gname ?> </a>
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

    <li><a href="#"><i class="fa fa-newspaper-o"></i>Notes</a>
           <ul class="sublist">
              <li><a href="xtutoraddmtrl.php?gname=<?php echo "$gname" ?>">Add</a></li>
              <li><a href="xtutordelmtrl.php?gname=<?php echo "$gname" ?>">Delete</a></li>            
             </ul>        
    </li>

		<li><a href="#"><i class="fa fa-question-circle"></i>Tests</a>
           	 <ul class="sublist">
           	 	<li><a href="xtutoraddtestchoose.php?gname=<?php echo "$gname" ?>">Add</a></li>
           	 	<li><a href="xtutordeltestchoose.php?gname=<?php echo "$gname" ?>">Delete</a></li>    
             </ul>
		</li>

		<li><a href="#"><i class="fa fa-pencil-square"></i>To-Do</a> 
            <ul class="sublist">
              <li><a href="xtutoraddassign.php?gname=<?php echo "$gname" ?>">Add</a></li>
              <li><a href="xtutordelassignchoose.php?gname=<?php echo "$gname" ?>">Delete</a></li>    
             </ul>  
		</li>

    <li><a href="#"><i class="fa fa-users"></i>Students</a>
             <ul class="sublist">
              <li><a href="xtutorviewgstudexist.php?gname=<?php echo "$gname" ?>">View</a></li>    
             </ul> 
    </li>

    <li><a href="#"><i class="fa fa-reply"></i>Responses</a>
          <ul class="sublist">
            <li><a href="xtutorviewtestresponsechoose.php?gname=<?php echo "$gname" ?>">Tests</a></li>
            <li><a href="xtutorviewassignresponsechoose.php?gname=<?php echo "$gname" ?>">To-Do</a></li>
          </ul>   
    </li>

		
	</ul>
  </div>


  <div class="sidebar">
  	<header>Menu Bar</header>
  	<ul>
      <li><a href="index.php"><i class="fa fa-sign-out"></i>Logout</a></li>
      <li><a href="xtutorinsidegrp.php?gname=<?php echo "$gname" ?>"><i class="fa fa-th-large"></i>Workspace</a></li>
      <li><a href="xtutorhome.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <?php
      $uid=$_SESSION['userid'];
      $grpid="SELECT xgid from tblXGroup where xgname='$gname' AND xgstatus=1 AND xtutorhostemail='$uid'";
     $grpresult=$conn->query($grpid);
     $grpr2=mysqli_fetch_array($grpresult);
      ?>
      <li><a href="xtutorviewtestcal.php?gname=<?php echo "$gname" ?>&gid=<?php echo "$grpr2[0]" ?>"><i class="fa fa-calendar"></i>Calendar</a></li>
  	</ul>
  </div>

  

</body>
</html>