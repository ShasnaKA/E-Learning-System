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

    <style>

        body{
        	
        	background-color:#1a2935 ;
        	background-size:cover;
        }

        .formspace{
        	margin-top:110px;
            margin-left:40px;
        	width:640px;
    		height:430px;
    		background-color:  #787c81;
            box-shadow:5px 5px #C70039 ;
        }

        .formspace:hover{
            width:650px;
            height:445px;
            background-color:#626669  ;
        }

    	.deptform{
    		margin-top:15px;
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
 			    <b><h1>Add Groups Here</h1></b>
 				<form action="" method=POST>


            <div class="form-group">
               <label>Group Title</label>
                 <input type="text" name="txtgrp_add" class="form-control" placeholder="Enter Group name" required="">
            </div>

            <div>
              <label>Group Description</label>
                <textarea name="txtgrp_desc" class="form-control" placeholder="Give Description Here" rows="2" cols="20" required></textarea>
            </div>

            <br> 
            <div class="form-group">
  	  			<input type="submit" name="grp_submit" class="btn btn-primary" value="Create">&nbsp&nbsp	
  	  				<input type="reset" class="btn btn-primary" value="Reset">&nbsp&nbsp	
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
    $grp_add=$_POST['txtgrp_add'];
    $grp_desc=$_POST['txtgrp_desc'];

    
  if($grp_add=="none")
    echo '<script>alert("Group Name Missing!!Enter a Group Name")</script>';
  else
  {
      $uid=$_SESSION['userid'];

       $sql="INSERT INTO tblXGroup(xgname,xgdesc,xtutorhostemail,xgstatus) VALUES ('$grp_add','$grp_desc','$uid',1)";
       if($conn->query($sql)===TRUE)
       {
          echo '<script>alert("Group Created Successfully")</script>';
          echo '<script>location.href="xtutorview_grpall.php"</script>';
       }
       else
       {
         echo '<script>alert("Something Went Wrong!!")</script>';
       }
    

   } //else block for none ie,for sem selected or not
  
 }//isset if



?>

</body>

</html>