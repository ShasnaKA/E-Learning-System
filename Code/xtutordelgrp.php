<?php
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

   
     <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>


    <style>

        body{
        	
        	background-color:#1a2935 ;
        	background-size:cover;
        }

        .formspace{
        	margin-top:120px;
            margin-left:40px;
        	width:640px;
    		height:350px;
    		background-color:  #787c81;
            box-shadow:5px 5px #C70039 ;
        }

        .formspace:hover{
            width:650px;
            height:355px;
            background-color:#626669  ;
        }

    	.deptform{
    		margin-top:30px;
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
 			    <b><h1>Delete Groups Here</h1></b>
 				<form action="" method=POST>

 				  <div class="form-group">
  	  				<label>Select Group</label>
                    <select name="txtdel_grp" class="form-control" required>
                        <option value="none">--Available Groups--</option>
                        <?php

                          $uid=$_SESSION['userid'];

                        $sql="SELECT xgid,xgname from tblXGroup where xgstatus=1 AND xtutorhostemail='$uid'";
                          $result=$conn->query($sql);
                          while($row=mysqli_fetch_array($result))
                          {
                            echo '<option value="'.$row['xgid'].'">'.$row['xgname'].'</option>';
                          }
                       ?>          
                    </select>
  	  			  </div>

            <div class="form-group">
  	  			<input type="submit" name="grp_submit" class="btn btn-primary" value="Delete">&nbsp&nbsp	
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
 include 'connection.php';
 if(isset($_POST['grp_submit']))
 {
 	  $del_grp=$_POST['txtdel_grp'];
    $uid=$_SESSION['userid'];//already given

    

  if($del_grp=="none")
    echo '<script>alert("Please Choose a Group to Delete")</script>';
  else
  {

    $sql="UPDATE tblXGroup set xgstatus=-1 where xgid='$del_grp' AND xgstatus=1 AND xtutorhostemail='$uid'";
    //echo $sql;
  
    if($conn->query($sql)==TRUE)
    {
     echo '<script>alert("One Group Deleted Successfully")</script>';
     echo '<script>location.href="xtutorview_grpallexists.php"</script>';
    }

 	  else{
 		    echo '<script>alert("Sorry ,Something Went Wrong!!")</script>';
 	     }

  } //else block for none ie,for subj selected or not
  
 }//isset if



?>

</body>

</html>