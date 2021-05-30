<?php
 include 'teacherhomecommon.php';// insidegrpcommon.php already has session_start()
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

     <!--Google fonts-->
    <!--link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@700&display=swap" rel="stylesheet"--> 

    <style>

        body{
          
          background-color:#1a2935 ;
          background-size:cover;
        }

        .formspace{
          margin-top:45px;
          margin-left:40px;
          width:640px;
          height:540px;
          background-color:#787c81  ;
          box-shadow:5px 5px #C70039 ;
        }

        .formspace:hover{
            width:640px;
            height:540px;
            background-color: #626669;
        }

      .deptform{
        margin-top:-20px;
        margin-left:50px;
        
      }

      .form-control{
        width:500px;
      }
        
      h1{
           color: #fff ;
           font-family:century Gothic;
           margin-left:90px;
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
        margin-left:160px;
        margin-top:15px;
      }

      .btn-danger{
        background-color: #C70039 ;
        border-color: #C70039 ;
        width:200px;
        margin-left:260px;
        margin-top:-68px;

      }

      .btn-primary:hover{
        background-color: #062b86;
      }
       
      .btn-danger:hover{
        background-color: #062b86;
      }
      
      .clstextarea{
        margin-left:-18px;
        margin-top: 44px;
      }

       .clstestlabel{
        margin-top:0px;
      }

          .clsdatebox{
        width:260px;
      }

      .namecls{
        width:570px;
      }
 
      input[type="file"] {
        display: none;
      }
      
    .custom-file-upload {
      margin-top:10px;
      margin-left:20px; 
       border: 1px dotted #ccc;
       display: inline-block;
       padding: 6px 12px;
       cursor: pointer;
       background-color:#fff;
       color:#C70039;
       font-size:13px;
       width:500px;
     }

    .custom-file-upload:hover{
      color:blue;
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
          <b><h1>Teacher Profile</h1></b>
        <form action="" method="POST" >

                   <div class="form-group">
                    <label>Name</label>
                    <?php
                    $uid=$_SESSION['userid'];

                     $sql="SELECT teachname,teachemail,teachqualf,tblDepartment.depname,tblInstitution.instname,tblInstitution.instaddress,teachcontact from tblTeacher INNER JOIN tblDepartment ON tblDepartment.depid=tblTeacher.teachdepid INNER JOIN tblInstitution ON tblInstitution.instemail=tblTeacher.teachinstemail where teachemail='$uid' AND teachemail in (select uname from tblLogin where status=1)";
                     $result=$conn->query($sql);
                     $row=mysqli_fetch_array($result);
                    echo '<input type="text"  class="namecls" value="'.$row['teachname'].'" readonly>';
                    ?>
                  </div>
         
              <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                    <label class="clstestlabel">Institution</label>
                    <?php
                    echo '<input type="text" class="clsdatebox" value="'.$row['instname'].' '.$row['instaddress'].'"readonly>';
                    ?>
                  </div>

                  <div class="form-group">
                    <label class="clstestlabel">Department</label>
                    <?php
                    echo '<input type="text" class="clsdatebox" value="'.$row['depname'].'" readonly="">';
                    ?>
                  </div>

                  <div class="form-group">
                    <label class="clstestlabel">Qualification</label>
                    <?php
                    echo '<input type="text" class="clsdatebox" value="'.$row['teachqualf'].'"readonly>';
                    ?>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="clstestlabel">E-mail</label>
                    <?php
                    echo '<input type="text" class="clsdatebox" value="'.$row['teachemail'].'" readonly>';
                    ?>
                  </div>
                  
                  <div class="form-group">
                    <label class="clstestlabel">Contact Number</label>
                    <?php
                    echo '<input type="number" class="clsdatebox" value="'.$row['teachcontact'].'" readonly>';
                    ?>
                  </div>
                </div>

           <div class="form-group">
            <input type="submit" name="profile_edit" class="btn btn-primary" value="Click To Edit">&nbsp&nbsp  
           </div>
          </div>

        </form>
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
 </div>

<?php
 
 if(isset($_POST['profile_edit']))
 {
     echo '<script>alert("You can Edit only the fields marked as \'Editable\'. Click to Proceed")</script>';
     echo '<script>location.href="teacheditprofile.php"</script>';
 }
?>

</body>

</html>