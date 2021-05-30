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
    		height:390px;
    		background-color: #787c81;
        box-shadow:5px 5px #C70039 ;
        }


       .formspace:hover{
        width:650px;
        height:395px;
        background-color:#626669 ;
        }

    	.deptform{
    		margin-top:40px;
    		margin-left:50px;
    		
    	}

      label{
        margin-top: 20px;
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
    		margin-top:20px;
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
 			    <b><h1>Delete Departments Here</h1></b>
 				<form action="" method=POST>

 				  <div class="form-group">
  	  				<label>Department Name</label>
  	  				<select name="txtdel_dept" class="form-control" required>
                       <option value="none" selected>Select Department Name</option>
                       <?php
                          $sql="select depname from tblDepartment where depstatus=1";
                          $result=$conn->query($sql);
                          while($row=mysqli_fetch_array($result))
                          {
                        echo '<option value="'.$row['depname'].'">'.$row['depname'].'</option>';
                          }
                       ?>           
                    </select>
  	  			  </div>

                  <div class="form-group">
                    <br>
  	  				<input type="submit" name="deptsubmit" class="btn btn-primary" value="Delete">&nbsp&nbsp	
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
 	$var=$_POST['txtdel_dept'];
  if($var=="none")
    echo '<script>alert("Please Choose a Department")</script>';
  else
  {
 	$sql="UPDATE tblDepartment set depstatus=-1 where depname='$var'";
 	if($conn->query($sql)===TRUE)
 		echo '<script>var choice=confirm("Department Deleted Successfully.Do You want to Delete More?");if(choice==true){location.href="admindel_dept.php"}else{ location.href="adminview_dept.php"}</script>';

 	else{
 		echo '<script>alert("Sorry ,Something Went Wrong !!")</script>';
 	}
 }

 echo '<script>location.href="admindel_dept.php"</script>';
 }

?>

</body>

</html>