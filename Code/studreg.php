<?php
 include 'connection.php';

?>
<!DOCTYPE HTML>
<head>
  <title>Student Registration</title>

  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!--font awesome cdn--> 
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="formstyles.css" >

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/bootstrap/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script src="bootstrap/js/bootstrap.min.js"></script>

     <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>

</head>

<body>

<div class="container">
      <div class="row">
        <div class="col-md-6 " id="form">
          <center>
            <b><h2>Student Registration Form</h2></b>
          </center>
          <form method="POST" action="">
           <div class="form-group">
              <label>Name</label>
              <input type="text" name="txtstudname" class="form-control" placeholder="Your Name" pattern="[a-zA-Z ]+" required="">
            </div>

            <div class="form-group">
                <label>E-mail</label>
              <input type="email" name="txtstudemail" class="form-control" placeholder="Your E-mail" required="">
            </div>     

            <div class="form-group">
              <label>Institution Name</label>

              <select name="txtstudinstemail" id="txtstudinstemail" class="form-control" required="">
              <option value="none" selected>--Your Current Institution--</option>
               <?php

                    $sql="select instname,instemail from tblInstitution where instemail in(select uname from tblLogin where status=1)";
                    $result=$conn->query($sql);
                    while($row=mysqli_fetch_array($result))
                    {
                        echo '<option value="'.$row['instemail'].'">'.$row['instname'].'</option>';
                    }
                ?>
              </select> 

            </div>


            <div class="form-group">
                <label>Register Number</label>
              <input type="text" name="txtstudreg" class="form-control" placeholder="Your Register Number" required>
            </div>     



            <div class="form-group">
              <label>Course</label>
              <select name="txtstudcid" id="txtstudcid" class="form-control" required="">
            
                
              </select> 
            </div>

           
           
            <div class="form-group">
              <label>Semester</label>
              <select name="txtstudsem" class="form-control" required="">
                <option value="none" selected>--Your Current Semester--</option>
                <option value="Semester 1">Semester 1</option>
                <option value="Semester 2">Semester 2</option>
                <option value="Semester 3">Semester 3</option>
                <option value="Semester 4">Semester 4</option>
                <option value="Semester 5">Semester 5</option>
                <option value="Semester 6">Semester 6</option>
              </select> 
            </div>
            <div class="form-group">
              <label>Contact Number</label>
            <input type="text" name="txtstudcontact" class="form-control" placeholder="Your Contact Number" pattern="[6789][0-9]{9}" required>
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" name="txtstudpswd" class="form-control" placeholder="Set a Password" required="">
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" name="txtstudcnfrmpswd" class="form-control" placeholder="Confirm Your Password" required="">
            </div>
     
            <div class="form-group">
              <input type="submit" name="studreg" class="btn btn-primary" value="Register">&nbsp&nbsp
            </div>
          </form>
        </div>
      </div>
  </div>



  <script>
        $(document).ready(function() {

      $( "#txtstudinstemail" ).change(function () {
         debugger;
      var sinstemail = $("#txtstudinstemail").val();

      $.ajax({
      url: "getcoursevia_inst.php?getinstemail="+sinstemail,
      type:'POST',
      success: function(data) 
      { 
        var dt=$.trim(data);
        $("#txtstudcid").html(dt);
      },error:function(xhr,error)
        {
            alert(error); 
        }

      });// ajax close
  });// change fn close

  
}); //ready fn close

</script>




<?php

if(isset($_POST['studreg']))
{
  include 'connection.php';

  $studemail=$_POST['txtstudemail'];
  $studname=$_POST['txtstudname'];
  $studsem=$_POST['txtstudsem'];
  $studreg=$_POST['txtstudreg'];
  $studcontact=$_POST['txtstudcontact'];
  $studpswd=$_POST['txtstudpswd'];
  $studinstemail=$_POST['txtstudinstemail'];
  $studcid=$_POST['txtstudcid'];

  
$sql="INSERT INTO tblStudent(studinstemail,studcid,studemail,studname,studsem,studreg,studcontact) VALUES ('$studinstemail','$studcid' , '$studemail' , '$studname','$studsem','$studreg','$studcontact')";
  if($conn->query($sql)===TRUE)
  {    
     $sql="INSERT INTO tblLogin (uname,pswd,utype,status) values ('$studemail','$studpswd','student','0')";
     if($conn->query($sql)===TRUE)
     {
      echo '<script>alert("Your Registration as a Student is Successfull")</script>';
          echo '<script>location.href="login.php"</script>';
     }
     else
     {
           echo '<script>alert("Registration Failed")</script>'; 
      }
  }
  else
    {
        echo '<script>alert("Sorry Something went Wrong")</script>';
    }
    $conn->close();  
}

?>

</body>
</html>

