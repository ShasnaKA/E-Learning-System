<?php
 //HODhome.php already has a session_start()
 include 'connection.php';
 include 'HODhome1.php';
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
          height:530px;
          background-color:#787c81;
          box-shadow:5px 5px #C70039 ;
        }

        .formspace:hover{
            width:650px;
            height:545px;
            background-color:#626669 ;
        }

      .deptform{
        margin-top:-5px;
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
          <b><h1>Assign Teachers Here</h1></b>
        <form action="" method=POST>

          <div class="form-group">
              <label>Select Course</label>
                    <select name="txtcourseid" id="txtcourseid" class="form-control" required>
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
                    <select name="txtsem" id="txtsem" class="form-control" required>
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
                <label>Select Subject</label>
                   <select name="txtsubject" id="txtsubject" class="form-control" required>

                   </select>
              </div>



              <div class="form-group">
                <label>Select Teacher To Assign</label>
                   <select name="txtteach" id="txtteach" class="form-control" required>
                    <option value="none">--Available Teachers--</option>
                    <?php
                        
                     $sql="SELECT * from tblTeacher where teachinstemail='$r1[0]' AND teachemail in(select uname from tblLogin  where status=1)"; 
                     $result=$conn->query($sql);
                     while($row=mysqli_fetch_array($result))
                     {
                      echo '<option value="'.$row['teachemail'].'" >'.$row['teachname'].'</option>';
                     }

                   ?>
                   </select>
              </div>


            <div class="form-group">
              <input type="submit" name="submit" class="btn btn-primary" value="Assign">&nbsp&nbsp 
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

      $( "#txtsem" ).change(function () {
         debugger;
      var semid = $("#txtsem").val();
      var courseid = $("#txtcourseid").val();

      $.ajax({
      url: "getsubjectforassign.php?getsemid=" + semid + " & getcourseid=" +courseid,
      type:'POST',
      success: function(data) 
      { 
        var dt=$.trim(data);
        $("#txtsubject").html(dt);
       
      },error:function(xhr,error)
        {
            alert(error); 
        }

    });// ajax close

  });// change fn close

  
}); //ready fn close



</script>



<?php
 
 if(isset($_POST['submit']))
 {
    $courseid=$_POST['txtcourseid'];
    $sem=$_POST['txtsem'];
    $subject=$_POST['txtsubject'];
    $teach=$_POST['txtteach'];

    $uid=$_SESSION['userid'];

    
  if($courseid=="none")
    echo '<script>alert("Please Choose a Course")</script>';
  else if($sem=="none")
    echo '<script>alert("Please Choose a Semester")</script>';
  else if($subject=="none")
    echo '<script>alert("Please Choose a Subject")</script>';
  else if($teach=="none")
    echo '<script>alert("Please Choose a Teacher To Assign")</script>';
  else
  {

  $sql="UPDATE tblSubject set subjteachemail='$teach' where subjinstemail='$r1[0]' AND subjcid='$courseid' AND subjsem='$sem' AND subjname='$subject'";

  if($conn->query($sql)===TRUE)
    echo '<script>var choice=confirm("Subject Assigned to the Teacher Successfully.Do You want to Assign more Teachers?");
  if(choice==true){location.href="HODassignsubj.php"}else{ location.href="HODhome.php"}</script>';

  else{
    echo '<script>alert("Sorry ,Something Went Wrong!!")</script>';
   
   }
   

   

  }//else block 
 
  
 }//isset if



?>

</body>

</html>