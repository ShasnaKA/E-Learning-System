<?php
 //insthome already has a session_start();
 include 'connection.php';
 include 'xtutorhomecommon.php';
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
        	background-size:cover;
        }

        .formspace{
        margin-top:120px;
        margin-left:40px;
        width:640px;
    		height:400px;
    		background-color: #787c81;
        box-shadow:5px 5px #C70039 ;
        }


       .formspace:hover{
        width:650px;
        height:410px;
        background-color:  #626669 ;
        }

    	.deptform{
    		margin-top:10px;
    		margin-left:50px;
    		
    	}

    	.form-control{
    		width:500px;
    	}
        
    	h1{
           color: #fff ;
           font-family:century Gothic;
    	}

    	label{
    	   color:#C70039;
    	   font-size:20px;
    	   font-family:verdana;
    	}   

    	.btn-primary{
    		background-color: #C70039 ;
    		border-color: #C70039 ;
    		width:200px;
    		margin-left:30px;
    		margin-top:10px;
    	}

    	.btn-danger{
    		background-color: #C70039 ;
    		border-color: #C70039 ;
    		width:200px;
    		margin-left:260px;
    		margin-top:-68px;

    	}
    	}
    </style>

</head>

<body>
 
 <div class="container">
 	<div class="row">
 		<div class="col-md-3"></div>
 		<div class="col-md-6">
 		  <div class="formspace">
 		    <br><br>
 			<div class="deptform">
 			    <b><h1>Edit Group Here</h1></b>
 				<form action="" method=POST>

 				    <div class="form-group">
  	  				<label>Current Group Name</label>
              <?php

                  $whichgrp=$_GET['whichgrp'];
                echo '<input type="text" name="txtold_grp" value="'.$whichgrp.'" readonly class="form-control" required>';  
              ?>           
  	  				
                       
  	  			</div>

            <div class="form-group">
              <label>Updated Group Name</label>
              <input type="text" name="txtedited_grp" class="form-control" placeholder="Edit Here" required>
            </div>


              <div class="form-group">
              <br>
  	  			<input type="submit" name="grp_submit" class="btn btn-primary" value="Update">&nbsp&nbsp	
  	  				<input type="reset" class="btn btn-primary" value="Cancel">&nbsp&nbsp	
  	  			  </div>

 				</form>
 			  </div>
 			</div>
 		</div>
 		<div class="col-md-3"></div>
 	</div>
 </div>

<?php
 if(isset($_POST['grp_submit']))
 {
  $old_grp=$_POST['txtold_grp'];
 	$edited_grp=$_POST['txtedited_grp'];

  $uid=$_SESSION['userid'];
 
 	$sql="UPDATE tblXGroup set xgname='$edited_grp' where xgname='$old_grp' AND xtutorhostemail='$uid'";
 	if($conn->query($sql)===TRUE)
  {
 		echo '<script>alert("One Group Updated Successfully.")</script>';
    echo '<script>location.href="xtutorview_grpall.php"</script>';
  }

 	else{
 		echo '<script>alert("Sorry ,Something Went Wrong !!")</script>';
 	}
 
 }

?>

</body>

</html>