<?php
 include 'connection.php';
 include 'teacherhomecommon.php';
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
        	margin-top:100px;
            margin-left:40px;
        	width:640px;
    		height:370px;
    		background-color:  #787c81;
            box-shadow:5px 5px #C70039 ;
        }

        .formspace:hover{
            width:650px;
            height:375px;
            background-color:#626669  ;
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
 			    <b><h1>Report Subject Groups Here</h1></b>
 				<form action="" method=POST>

 				  <div class="form-group">
  	  				<label>Select Classroom</label>
                    <select name="txtsubjforgrp" id="subjid" class="form-control" required>
                        <option value="none">--Available Classrooms--</option>
                        <?php

                          $uid=$_SESSION['userid'];//HOD username

                          $sql="SELECT subjid,subjname from tblSubject INNER JOIN tblGroup ON tblSubject.subjid=tblGroup.gsubjid where subjteachemail='$uid' AND subjstatus=1 AND subjid IN(SELECT gsubjid FROM tblGroup where g_host_email='$uid' AND gstatus=1)";
                          $result=$conn->query($sql);
                          while($row=mysqli_fetch_array($result))
                          {
                        echo '<option value="'.$row['subjid'].'">'.$row['subjname'].'</option>';
                          }
                       ?>          
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

<?php
 include 'connection.php';
 if(isset($_POST['grp_submit']))
 {
    $subjforgrp=$_POST['txtsubjforgrp'];
    //$stud=$_POST['txtstud'];

  if($subjforgrp=="none")
    echo '<script>alert("Please Choose a Subject Class")</script>';
  else //if($stud=="allstud")
  {

    $instqry="SELECT subjinstemail,subjcid,subjsem FROM tblSubject where subjid='$subjforgrp' AND subjteachemail='$uid'";//To find inst of which the subj belongs
    $instrslt=$conn->query($instqry);
    $r=mysqli_fetch_array($instrslt);

    $gid="SELECT gid from tblGroup where gsubjid='$subjforgrp' AND gstatus=1";
    $gresult=$conn->query($gid);
    $grpr2=mysqli_fetch_array($gresult);

    $query="SELECT gstudid,studname,count(studemail) from tblStudent INNER JOIN tblGroupstud ON tblStudent.studemail=tblGroupstud.gstudemail where studcid='".$r['subjcid']."' AND studsem='".$r['subjsem']."' AND studemail in (SELECT uname from tblLogin where status=1)AND studemail IN ( SELECT gstudemail from tblGroupstud where tblGroupstud.sgid='$grpr2[0]' AND  tblGroupstud.gstudstatus=1)GROUP BY studname";
    $queryresult=$conn->query($query);

   while($queryrow=mysqli_fetch_array($queryresult))
   {
      //Test Mark Conversion
      $maxtst="SELECT testmax,testname from tblTest where testgid='$grpr2[0]' AND teststatus=1";
      $maxtstresult=$conn->query($maxtst);

      $maxtest=0;
      while($maxtstrow=mysqli_fetch_array($maxtstresult))//individual test conducted out of(max)
      {
        $maxtest=$maxtest + $maxtstrow[0];//Sum of max marks of available tests
      }


      $stud_tstmrk="SELECT testmrk from tblTestmark where testmrkgid='$grpr2[0]' AND testmrkgstudid='".$queryrow['gstudid']."'";
      $stud_tstmrkresult=$conn->query($stud_tstmrk);

      $studtestmark=0;
      while($stud_tstmrkrow=mysqli_fetch_array($stud_tstmrkresult))//Indvdual stud test mark in each tst
      {
         $studtestmark=$studtestmark + $stud_tstmrkrow[0];//Sum of tst marks of all tst scored by student
      }
 
      $testconv=($studtestmark * 10) / $maxtest ;//testconverted out of 10 for internal of stud



      //Assignment Mark Conversion
      $maxassign="SELECT assignmax,assignname from tblAssignment where assigngid='$grpr2[0]' AND assignstatus=1";
      $maxassignresult=$conn->query($maxassign);

      $maxassign=0;
      while($maxassignrow=mysqli_fetch_array($maxassignresult))//individual assign conducted out of(max)
      {
        $maxassign=$maxassign + $maxassignrow[0];//Sum of max marks of available assignments
      }


      $stud_assignmrk="SELECT assignmrk from tblAssignmark where assignmrkgid='$grpr2[0]' AND assignmrkgstudid='".$queryrow['gstudid']."'";
      $stud_assignmrkresult=$conn->query($stud_assignmrk);

      $studassignmark=0;
      while($stud_assignmrkrow=mysqli_fetch_array($stud_assignmrkresult))//Indvdual stud test mark in 
      {                                                                   //each test

         $studassignmark=$studassignmark + $stud_assignmrkrow[0];//Sum of tst marks of all tst scored by
      }                                                          //student
 
      $assignconv=($studassignmark * 10) / $maxassign ;//assign converted out of 10 for internal of stud


      $totalconv=$testconv+$assignconv;//totalconverted of stud (test+assign totals)
      if($totalconv<16)
        $rsltstatus="FAILED";
      else
        $rsltstatus='PASSED';


      $query2="SELECT COUNT(rsltid) from tblResult where rsltgid='$grpr2[0]' AND rsltgstudid='$queryrow[0]'";
      $rslt=$conn->query($query2);
      $countquery2r=mysqli_fetch_array($rslt);

      if($countquery2r[0]==0)//if slcted student not reported for this grp so no record in Result(dont update),so insert it one by one (since select all)
      {
         $sql3="INSERT INTO tblResult(rsltinst,rsltcid,rsltsem,rsltsubjid,rsltgid,rsltgstudid,testconv,assignconv,totalconv,rsltstatus) VALUES ('".$r['subjinstemail']."','".$r['subjcid']."','".$r['subjsem']."','$subjforgrp','$grpr2[0]','$queryrow[0]','$testconv','$assignconv','$totalconv','$rsltstatus')";
         if($conn->query($sql3)===TRUE)
         {
           //echo '<script>alert("One by one adding to tblresult! one complete")</script>';
         }
        //else
       // {
       // echo '<script>alert("Something Went Wrong for one by one adding to result!!")</script>';
        //}
      }
      else
      {
         $sql4="UPDATE tblResult set testconv='$testconv',assignconv='$assignconv',totalconv='$totalconv',rsltstatus='$rsltstatus' where rsltgid='$grpr2[0]' AND rsltgstudid='$queryrow[0]'";
         if($conn->query($sql4)===TRUE)
         {
           //echo '<script>alert("One by one/ One(not sure) Updating since already results reported to tblResult exists! one stud updation complete for adding updated marks")</script>';///////
         }
       // else
        //{
         //  echo '<script>alert("Something Went Wrong 4 one/one Updating for new mrks")</script>';/////
       // }

      }
    }

      //To check weather that group already reported by teacher
      $check="SELECT count(rprtid) FROM tblReportstatus where rprtsubjid='$subjforgrp' AND teach_rprtstatus=1";
      $checkresult=$conn->query($check); 
      $row=mysqli_fetch_array($checkresult);
      
      if($row[0]>0)
      {
        $sql="UPDATE tblReportstatus set teach_rprtstatus=1,HOD_rprtstatus=0 where rprtsubjid='$subjforgrp' AND teach_rprtstatus=1";
       if($conn->query($sql)===TRUE)
       {
       echo '<script>alert("This Group is Already Reported. Reporting again may result in Changes in Marksheet (if any Updation given).  Press Ok to Continue")</script>';
       echo '<script>alert("Group Reported Successfully")</script>';
        echo '<script>location.href="teacherhome.php"</script>';
       }
      else
      {
        echo '<script>Something went wrong for Report tbl Updation</script>';
      }
    }
     else
     {
 
       $sql="INSERT INTO tblReportstatus(rprtinst,rprtcid,rprtsem,rprtsubjid,rprtgid,teach_rprtstatus,HOD_rprtstatus,rowstatus) VALUES ('$r[0]','$r[1]','$r[2]','$subjforgrp','$grpr2[0]','1','0',1)";
       if($conn->query($sql)===TRUE)
       {
          echo '<script>alert("Selected Group\'s Activities Reported Successfully")</script>';
          echo '<script>location.href="teacherhome.php"</script>';
       }
       else
       {
         echo '<script>alert("Something Went Wrong!!")</script>';
       }
    }


  }//end of allstud

  
 }//isset if



?>

</body>

</html>