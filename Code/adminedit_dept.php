<?php
 include 'connection.php';
 include 'adminhome1.php';
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
        margin-top:160px;
        margin-left:40px;
        width:640px;
    		height:400px;
    		background-color:#787c81;
        box-shadow:5px 5px #C70039 ;
        }


       .formspace:hover{
        width:650px;
        height:410px;
        background-color:#626669 ;
        }

    	.deptform{
    		margin-top:20px;
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
 			    <b><h1>Edit Departments Here</h1></b>
 				<form action="" method=POST>

 				    <div class="form-group">
  	  				<label>Current Department Name</label>
              <?php
                    $whichdept=$_GET['whichdept'];
                    echo '<input type="text" name="txtold_dept" value="'.$whichdept.'" class="form-control" required readonly="">';
                                      
               ?> 
  	  				
              
  	  			</div>

            <div class="form-group">
              <label>Updated Deparment Name</label>
              <input type="text" name="txtedited_dept" class="form-control" placeholder="Edit Here" required>
            </div>


              <div class="form-group">
              <br>
  	  				<input type="submit" name="deptsubmit" class="btn btn-primary" value="Update">&nbsp&nbsp	
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
 if(isset($_POST['deptsubmit']))
 {
  $old_dept=$_POST['txtold_dept'];
 	$edited_dept=$_POST['txtedited_dept'];
 
 	$sql="UPDATE tblDepartment set depname='$edited_dept' where depname='$old_dept'";
 	if($conn->query($sql)===TRUE)
  {
 		echo '<script>alert("Department Updated Successfully.")</script>';
    echo '<script>location.href="adminview_dept.php"</script>';
  }

 	else{
 		echo '<script>alert("Sorry ,Something Went Wrong !!")</script>';
 	}
 
 }

?>

</body>

</html>