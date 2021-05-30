<?php

 include 'insthome1.php';
 include 'connection.php';
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/bootstrap/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>

</head>

    <style>

        body{
        	
        	background-color:#1a2935 ;
        	background-size:cover;
        }

        .formspace{
        margin-top:170px;
        margin-left:40px;
        width:640px;
    		height:400px;
    		background-color: #787c81 ;
        box-shadow:5px 5px #C70039 ;
        }


       .formspace:hover{
        width:650px;
        height:410px;
        background-color:#626669 ;
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
    	
    </style>

    

<body>
 
 <div class="container">
 	<div class="row">
 		<div class="col-md-3"></div>
 		<div class="col-md-6">
 		  <div class="formspace">
 		    <br><br>
 			<div class="deptform">
 			    <b><h1>Delete Course Here</h1></b>
 				<form action="" method=POST>

 				     <div class="form-group">
  	  				<label>Select Department</label>
  	  				<select name="txtdeptforcoursedel" id="txtdeptforcoursedel" class="form-control" required>
                       <option value="none" selected>--Available Departments--</option>
                       <?php
                          $sql="SELECT depid,depname from tblDepartment where depstatus=1";
                          $result=$conn->query($sql);
                          while($row=mysqli_fetch_array($result))
                          {
                        echo '<option value="'.$row['depid'].'">'.$row['depname'].'</option>';
                          }

                       ?>           
                    </select>
  	  			  </div>

              <div class="form-group">
              <label>Select Course</label>
              <select name="txtdel_course" id="txtdel_course" class="form-control" required>
                       
                       



              </select>
              </div>

              <div class="form-group">
              <br>
  	  				<input type="submit" name="coursesubmit" class="btn btn-primary" value="Delete">&nbsp&nbsp	
  	  				<input type="reset" class="btn btn-primary" value="Cancel">&nbsp&nbsp	
  	  			  </div>

 				</form>
 			  </div>
 			</div>
 		</div>
 		<div class="col-md-3"></div>
 	</div>
 </div>

  
  <script>
        $(document).ready(function() {

      $( "#txtdeptforcoursedel" ).change(function () {
         debugger;
      var sdep = $("#txtdeptforcoursedel").val();

      $.ajax({
      url: "getcourse.php?getdepid="+sdep,
      type:'POST',
      success: function(data) 
      { 
        var dt=$.trim(data);
        $("#txtdel_course").html(dt);
       
      },error:function(xhr,error)
        {
            alert(error); 
        }

      });// ajax close
  });// change fn close

  
}); //ready fn close

</script>


<?php
 if(isset($_POST['coursesubmit']))
 {
  $deptforcoursedel=$_POST['txtdeptforcoursedel'];
 	$del_course=$_POST['txtdel_course'];

  if($depforcoursedel=="none")
    echo '<script>alert(" Choose a Department")</script>';

  else if($del_course=="none")
    echo '<script>alert("Please Choose a Course to Delete")</script>';

 else
 {
  
  $uid=$_SESSION['userid'];
 	$sql="UPDATE tblCourse set coursestatus=-1 where cid='$del_course' AND depid='$deptforcoursedel' AND instemail='$uid' AND coursestatus=1";
 	if($conn->query($sql)===TRUE)
 		echo '<script>var choice=confirm("Course Deleted Successfully.Do You want to Delete More?");if(choice==true){location.href="instdel_course.php"}else{ location.href="instview_course.php"}</script>';

 	else{
 		echo '<script>alert("Sorry ,Something Went Wrong !!")</script>';
 	  }
 }
}// isset

?>

</body>

</html>