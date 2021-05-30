<?php
 include 'connection.php';
 include 'HODhome1.php';
 //session_start();
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
        	margin-top:120px;
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
 			    <b><h1>Report Subject Groups Here</h1></b>
 				<form action="" method=POST>

         <div class="form-group">
              <label>Select Course</label>
                    <select name="txtcourseid" id="courseid" class="form-control" required>
                        <option value="none">--Available Courses--</option>
                        <?php

                           $uid=$_SESSION['userid'];//HOD username

                           $instemail_ofHOD="SELECT HODinstemail from tblHOD where HODemail='$uid'";
                           $rslt1=$conn->query($instemail_ofHOD);
                           $r1=mysqli_fetch_array($rslt1);

                          $depid_ofHOD="SELECT HODdepid from tblHOD where HODemail='$uid'";
                           $rslt2=$conn->query($depid_ofHOD);
                           $r2=mysqli_fetch_array($rslt2);

                          $sql="SELECT cid,cname from tblCourse where instemail='$r1[0]' AND depid='$r2[0]' AND coursestatus=1";
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
                    <select name="txtsem" id="sem" class="form-control" required>
                      
                    </select>
              </div>


            <br> 
            <div class="form-group">
  	  			<input type="submit" name="grp_submit" class="btn btn-primary" value="Report">&nbsp&nbsp	
  	  				<input type="reset" class="btn btn-primary" value="Reset">&nbsp&nbsp	
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

      $( "#courseid" ).change(function () {
         debugger;
      var courseid = $("#courseid").val();

      $.ajax({
      url: "getsemforreport.php?getcourseid=" +courseid,
      type:'POST',
      success: function(data) 
      { 
        var dt=$.trim(data);
        $("#sem").html(dt);
      },error:function(xhr,error)
        {
            alert(error); 
        }

    });// ajax close

  });// change fn close

  
}); //ready fn close



</script>

<?php
 include 'connection.php';
 if(isset($_POST['grp_submit']))
 {
    $courseid=$_POST['txtcourseid'];
    $sem=$_POST['txtsem'];

    
  if($courseid=="none")
    echo '<script>alert("Please Choose a Course")</script>';
  else if($sem=="none")
    echo '<script>alert("Please Choose a Semester")</script>';
  else if($sem=="unavailable")
  {
    echo '<script>alert("Sorry! Cannot Report this Classroom Now. There is still some Subject Groups Pending which is to be reported by the Teacher")</script>';
    echo '<script>location.href="HODhome.php"</script>';
  }
  else
  {
      $uid=$_SESSION['userid'];

      $q="SELECT count(subjid) from tblSubject where subjcid='$courseid' AND subjsem='$sem' AND subjstatus=1";
     $qresult=$conn->query($q);
     $qrow=mysqli_fetch_array($qresult);

      //To check weather that group already exists and gstatus=1
      $check="SELECT count(rprtid) FROM tblReportstatus where rprtcid='$courseid' AND rprtsem='$sem' AND HOD_rprtstatus=1 AND teach_rprtstatus=1";
      $checkresult=$conn->query($check); 
      $row=mysqli_fetch_array($checkresult);
      
      if($row[0]==$qrow[0])
      {
       echo '<script>alert("The Selected Classroom has already Reported to the Principal")</script>';
        echo '<script>location.href="HODhome.php"</script>';
      }
     else
     {
       $sql="UPDATE tblReportstatus set HOD_rprtstatus=1 where rprtcid='$courseid' AND rprtsem='$sem' AND HOD_rprtstatus=0";
       if($conn->query($sql)===TRUE)
       {
          echo '<script>alert("Selected Classroom is Reported to Principal Successfully")</script>';
          echo '<script>location.href="HODhome.php"</script>';
       }
       else
       {
         echo '<script>alert("Something Went Wrong!!")</script>';
       }
    }

   } //else block for none ie,for sem selected or not
  
 }//isset if



?>

</body>

</html>