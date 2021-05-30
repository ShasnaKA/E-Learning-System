<?php
 include 'connection.php';
 include 'teacherhomecommon.php';
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

     <!--Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>

    <style>

        body{
        	
        	background-color:#1a2935 ;
        	background-size:cover;
        }

        .formspace{
        	margin-top:110px;
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
 			    <b><h1>View Students Semwise</h1></b>
 				<form action="" method=POST>

 				  <div class="form-group">
  	  				<label>Select Course</label>
                    <select name="txtcourseforstudview" id="txtcourse" class="form-control" required>
                        <option value="none">--Available Courses--</option>
                        <?php

                           $uid=$_SESSION['userid'];//Teacher username

                           $instqry="SELECT teachinstemail from tblTeacher where teachemail='$uid'";
                           $instrslt=$conn->query($instqry);
                           $r=mysqli_fetch_array($instrslt);


                          $sql="SELECT tblSubject.subjcid,tblCourse.cname from tblSubject INNER JOIN tblCourse on tblCourse.cid=tblSubject.subjcid where subjinstemail='$r[0]'  AND tblCourse.coursestatus=1 AND subjstatus=1 AND tblSubject.subjteachemail='$uid' GROUP BY cname";
                          $result=$conn->query($sql);
                          while($row=mysqli_fetch_array($result))
                          {
                        echo '<option value="'.$row['subjcid'].'">'.$row['cname'].'</option>';
                          }
                       ?>          
                    </select>
  	  			  </div>


              <div class="form-group">
              <label>Select Semester</label>
                    <select name="txtsemforstudview" id="txtsem" class="form-control" required>
                        
                          
                    </select>
              </div>

                 

              <div class="form-group">
  	  				<input type="submit" name="course&sem_submit" class="btn btn-primary" value="View">&nbsp&nbsp	
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
   $(document).ready(function(){
    $("#txtcourse").change(function(){
       var courseid=$("#txtcourse").val();
       $.ajax({
        url:"getsemforstudview.php?getcourseid="+courseid,
        type:'POST',
        success:function(data)
        {
          var dt=$.trim(data);
          $("#txtsem").html(dt);
        
        },error:function(xhr,error)
          {
             alert(error);
          }

       })//ajaxclose
     })//change close

   })//ready close

 </script>

<?php
 include 'connection.php';
 if(isset($_POST['course&sem_submit']))
 {
    $courseforstudview=$_POST['txtcourseforstudview'];
    $semforstudview=$_POST['txtsemforstudview'];
    $uid=$_SESSION['userid'];//already given

    
  if($courseforstudview=="none")
    echo '<script>alert("Please Choose a Course")</script>';
  else if($semforstudview=="none")
    echo '<script>alert("Please Choose a Semester")</script>';
  else
  {

       $check1="SELECT count(studemail) FROM tblStudent where studsem='$semforstudview' AND studcid='$courseforstudview' AND studinstemail='$r[0]' AND studemail in(select uname from tblLogin where status=1)";
       $checkresult1=$conn->query($check1);
       $r1=mysqli_fetch_array($checkresult1);


       if($r1[0]==0)
       {
        echo '<script>alert("No Student List Exists for the selected Semester!!")</script>';
        echo '<script>location.href="teacherhome.php"</script>';
       }
       else
       {
 
    echo '<script>location.href="teachviewstud_semwise2.php?cid='.$courseforstudview.' & sem='.$semforstudview.' "</script>';
      }

 } //else block for 2nd none ie,for sem selected or not
  
 }//isset if



?>

</body>

</html>