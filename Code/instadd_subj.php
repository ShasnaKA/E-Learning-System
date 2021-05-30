<?php
 include 'connection.php';
 include 'insthome1.php';
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
        	margin-top:140px;
            margin-left:40px;
        	width:640px;
    		height:450px;
    		background-color:  #787c81;
            box-shadow:5px 5px #C70039 ;
        }

        .formspace:hover{
            width:650px;
            height:455px;
            background-color:#626669  ;
        }

    	.deptform{
    		margin-top:-10px;
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
 			    <b><h1>Add Subjects Here</h1></b>
 				<form action="" method=POST>

 				  <div class="form-group">
  	  				<label>Select Course</label>
                    <select name="txtcourseforsubjadd" class="form-control" required>
                        <option value="none">--Available Courses--</option>
                        <?php

                          $uid=$_SESSION['userid'];
                          $sql="SELECT cid,cname from tblCourse where coursestatus=1 AND instemail='$uid'";
                          $result=$conn->query($sql);
                          while($row=mysqli_fetch_array($result))
                          {
                        echo '<option value="'.$row['cid'].'">'.$row['cname'].'</option>';
                          }
                       ?>          
                    </select>
  	  			  </div>


              <div class="form-group">
              <label>Select Semester</label>
                    <select name="txtsemforsubjadd" class="form-control" required>
                        <option value="none">--Available Semesters--</option>
                        <option value="Semester 1">Semester 1</option>
                        <option value="Semester 2">Semester 2</option>
                        <option value="Semester 3">Semester 3</option>
                        <option value="Semester 4">Semester 4</option>
                        <option value="Semester 5">Semester 5</option>
                        <option value="Semester 6">Semester 6</option>  
                    </select>
              </div>

                  <div class="form-group">
                    <label>Subject</label>
                    <input type="text" name="txtadd_subj" class="form-control" placeholder="Enter Subject Name" required>
                  </div>

                  <div class="form-group">
  	  				<input type="submit" name="subj_submit" class="btn btn-primary" value="Add">&nbsp&nbsp	
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
 if(isset($_POST['subj_submit']))
 {
    $courseforsubjadd=$_POST['txtcourseforsubjadd'];
    $semforsubjadd=$_POST['txtsemforsubjadd'];
 	  $add_subj=$_POST['txtadd_subj'];
    $uid=$_SESSION['userid'];//already given

    
  if($courseforsubjadd=="none")
    echo '<script>alert("Please Choose a Course")</script>';
  else if($semforsubjadd=="none")
    echo '<script>alert("Please Choose a Semester")</script>';
  else
  {

    //To check whether the Subject to add is already deleted,if yes change subjstatus from -1 to 1
    $check="SELECT COUNT(*) from tblSubject where subjcid='$courseforsubjadd' AND subjname='$add_subj'  AND subjstatus=-1 AND subjsem='$semforsubjadd' AND subjinstemail='$uid'  ";
    $checkresult=$conn->query($check);
    $r=mysqli_fetch_array($checkresult);

    //To check whether the Subject to add  already exist,if yes print a message
    $check2="SELECT count(*) from tblSubject where subjcid='$courseforsubjadd' AND subjname='$add_subj' AND subjstatus=1 AND subjsem='$semforsubjadd' AND subjinstemail='$uid' ";
    $checkresult2=$conn->query($check2);
    $r2=mysqli_fetch_array($checkresult2);

    if($r[0]>0)
    {
        $sql="UPDATE tblSubject set subjstatus=1 where subjcid='$courseforsubjadd' AND subjname='$add_subj' AND  subjsem='$semforsubjadd' AND subjstatus=-1 AND subjinstemail='$uid'";
        if($conn->query($sql)===TRUE)
        echo '<script>var choice=confirm("One Subject Added Successfully.Do You want to add More?");
    if(choice==true){location.href="instadd_subj.php"}else{ location.href="instview_subj.php"}</script>';
    }
    else if($r2[0]>0)
    {
      echo '<script>alert("Subject already exists!!")</script>';
      echo '<script>location.href="instview_subj.php"</script>';
    }

  else
  {
  

 	$sql="INSERT into tblSubject(subjinstemail,subjcid,subjsem,subjname,subjstatus)VALUES('$uid','$courseforsubjadd','$semforsubjadd','$add_subj',1)";
 	if($conn->query($sql)===TRUE)
 		echo '<script>var choice=confirm("One Subject Added Successfully.Do You want to add More?");
 	if(choice==true){location.href="instadd_subj.php"}else{ location.href="instview_subj.php"}</script>';

 	else{
 		echo '<script>alert("Sorry ,Something Went Wrong!!")</script>';
 	 }

  }//else block for check if course already deleted
 } //else block for  none ie,for sem selected or not
  
 }//isset if



?>

</body>

</html>