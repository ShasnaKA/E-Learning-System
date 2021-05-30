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
            width:645px;
            height:400px;
            background-color:#626669 ;
        }

    	.deptform{
    		margin-top:30px;
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
 			    <b><h1>Add Departments Here</h1></b>
 				<form action="" method=POST>

 				  <div class="form-group">
  	  				<label>Department</label>
  	  				<input type="text" name="txtadd_dept" class="form-control" placeholder="Enter Department Name" required>
  	  			  </div>

                  <div class="form-group">
  	  			<input type="submit" name="deptsubmit" class="btn btn-primary" value="Add">&nbsp&nbsp	
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
 	$var=$_POST['txtadd_dept'];
    
    $check="SELECT count(*) from tblDepartment where depname='$var' AND depstatus=-1";
    $checkresult=$conn->query($check);
    $r=mysqli_fetch_array($checkresult);


    $check2="SELECT count(*) from tblDepartment where depname='$var' AND depstatus=1";
    $checkresult2=$conn->query($check2);
    $r2=mysqli_fetch_array($checkresult2);

    if($r[0]>0)
    {
        $sql="update tblDepartment set depstatus=1 where depname='$var' AND depstatus=-1";
        if($conn->query($sql)===TRUE)
        echo '<script>var choice=confirm("Department Added Successfully.Do You want to add More?");
    if(choice==true){location.href="adminadd_dept.php"}else{ location.href="adminview_dept.php"}</script>';
    }
    else if($r2[0]>0)
    {
        echo '<script>alert("Department Already Exists!!")</script>';
        echo '<script>location.href="adminview_dept.php"</script>';
    }
    else
    {
 	$sql="INSERT into tblDepartment(depname,depstatus)VALUES('$var','1')";
 	if($conn->query($sql)===TRUE)
 		echo '<script>var choice=confirm("Department Added Successfully.Do You want to add More?");
 	if(choice==true){location.href="adminadd_dept.php"}else{ location.href="adminview_dept.php"}</script>';

 	else{
 		echo '<script>alert("Sorry ,Something Went Wrong !!")</script>';
 	}

 }
}

?>

</body>

</html>