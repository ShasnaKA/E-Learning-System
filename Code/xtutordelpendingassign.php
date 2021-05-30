<?php

 include 'xtutorinsidegrpcommon.php';//has sessionstart()
 include 'connection.php';
 $gname=$_GET['gname'];
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

     <!--Google fonts-->
    <!--link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@700&display=swap" rel="stylesheet"--> 

</head>

    <style>

        body{
        	
        	background-color:#1a2935 ;
        	background-size:cover;
        }

        .formspace{
        margin-top:100px;
        margin-left:40px;
        width:670px;
    		height:450px;
    		background-color: #787c81 ;
        box-shadow:5px 5px #C70039 ;
        }


       .formspace:hover{
        width:675px;
        height:455px;
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

      .btn-primary:hover{
        background-color: #062b86;
      }
       
      .btn-danger:hover{
        background-color: #062b86;
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
 			    <b><h1>Delete Pending Assignments</h1></b>
 				<form action="" method=POST>
             <br>
 				     <div class="form-group">
  	  				<label>Select Assignment Topic to Delete</label>
  	  				<select name="txttopicforassigndel" id="topictodel" class="form-control" required>
                       <option value="none" selected>--Recently Sheduled Works--</option>
                       <?php

                        $uid=$_SESSION['userid'];

                        $grpid="SELECT xgid from tblXGroup where xgname='$gname' AND xtutorhostemail='$uid'";
                        $grpresult=$conn->query($grpid);
                        $grpr2=mysqli_fetch_array($grpresult);
                   
                        date_default_timezone_set('Asia/Kolkata');
                        $cdateandtime=date('Y-m-d').date('h:i:s');

                          $sql="SELECT xassignid,xassignname from tblXAssignment where xassigngid='$grpr2[0]'  AND xassignstatus=1  AND CONCAT(xassigndate,xassigntime)>='$cdateandtime'";
                          $result=$conn->query($sql);
                          while($row=mysqli_fetch_array($result))
                          {
                        echo '<option value="'.$row['xassignid'].'">'.$row['xassignname'].'</option>';
                          }

                       ?>           
                    </select>
  	  			  </div>

              <div class="form-group">
                <label>Scheduled On:</label>
               <input type="text" name="txtdatedel" id="datedel" value="" class="form-control" readonly>
              </div>

              <div class="form-group">
              <br>
  	  				<input type="submit" name="assigndelsubmit" class="btn btn-primary" value="Delete Event">&nbsp&nbsp	
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

      $( "#topictodel" ).change(function () {
         debugger;
      var stopic = $("#topictodel").val();

      $.ajax({
      url: "getdatetodelxassign.php?gettopicid="+stopic,
      type:'POST',
      success: function(data) 
      { 
        var dt=$.trim(data);
        $("#datedel").val(dt);
       
      },error:function(xhr,error)
        {
            alert(error); 
        }

      });// ajax close
  });// change fn close

  
}); //ready fn close

</script>
  


<?php
 if(isset($_POST['assigndelsubmit']))
 {
  $topicforassigndel=$_POST['txttopicforassigndel'];

  if($topicforassigndel=="none")
    echo '<script>alert(" Choose an Event To Delete")</script>';

 else
 {
  
  $uid=$_SESSION['userid'];
 	$sql="UPDATE tblXAssignment set xassignstatus=-1 where xassignid='$topicforassigndel' AND xassigngid='$grpr2[0]' AND xassignstatus=1";
 	if($conn->query($sql)===TRUE)
 		echo '<script>var choice=confirm("One Event Deleted Successfully.Do You want to Create a new Assignment?");if(choice==true){location.href="xtutoraddassign.php?gname='.$gname.'"}else{ location.href="xtutorinsidegrp.php?gname='.$gname.'"}</script>';

 	else{
 		echo '<script>alert("Sorry ,Something Went Wrong !!")</script>';
 	  }
 }
}// isset

?>

</body>

</html>