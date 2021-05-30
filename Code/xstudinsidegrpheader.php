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

    <li><a href="xstudhome.php"><i class="fa fa-dashboard"></i>Dashboard</a>       
    </li>

    <li><a href="xstudinsidegrp.php?gname=<?php echo "$gname" ?>"><i class="fa fa-th-large"></i>Workspace</a>
    </li>

		<li><a href="#"><i class="fa fa-question-circle"></i>Tests</a>
           	 <ul class="sublist">
           	 	<li><a href="xstudsubmittest.php?gname=<?php echo "$gname" ?>">Submit</a></li>
              <li><a href="xstuddeltest.php?gname=<?php echo "$gname" ?>">Remove</a></li>   
             </ul>
		</li>

		<li><a href="#"><i class="fa fa-pencil-square"></i>To-Do</a> 
            <ul class="sublist">
              <li><a href="xstudsubmitassign.php?gname=<?php echo "$gname" ?>">Submit</a></li> 
              <li><a href="xstuddelassign.php?gname=<?php echo "$gname" ?>">Remove</a></li>    
             </ul>  
		</li>

   <li><a href="xstudviewgstud.php?gname=<?php echo "$gname" ?>"><i class="fa fa-users"></i>Students</a>
    </li>

		
	</ul>
  </div>


  <div class="sidebar">
  	<header>Menu Bar</header>
  	<ul>
      <li><a href="index.php"><i class="fa fa-sign-out"></i>Log Out</a></li>
      <li><a href="xstudviewmark.php?gname=<?php echo "$gname" ?>"><i class="fa fa-graduation-cap"></i>Marks</a></li>
      <?php
      $uid=$_SESSION['userid'];
       $grpid="SELECT xgid from tblXGroup INNER JOIN tblXGroupstud ON tblXGroup.xgid=tblXGroupstud.xsgid where xgname='$gname' AND tblXGroupstud.xgstudemail='$uid'";
      $grpresult=$conn->query($grpid);
      $grpr2=mysqli_fetch_array($grpresult); 
      ?>
      <li><a href="xstudviewtestcal.php?gname=<?php echo "$gname" ?>&gid=<?php  echo "$grpr2[0]" ?>"><i class="fa fa-calendar"></i>Calendar</a></li>
  	</ul>
  </div>

  

</body>
</html>