<?php
 include 'xtutorinsidegrpcommon.php';// insidegrpheaderforadd.php already has session_start()
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

     <!--Google fonts-->
    <!--link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@700&display=swap" rel="stylesheet"--> 

    <style>

        body{
          
          background-color:#1a2935 ;
          background-size:cover;
        }

        .formspace{
          margin-top:110px;
          margin-left:40px;
          width:640px;
          height:400px;
          background-color:#787c81  ;
          box-shadow:5px 5px #C70039 ;
        }

        .formspace:hover{
            width:641px;
            height:410px;
            background-color: #626669;
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
        margin-left:330px;
        margin-top:10px;
      }

      .btn-primary:hover{
        background-color: #062b86;
      }

      .btn-danger{
        background-color: #C70039 ;
        border-color: #C70039 ;
        width:200px;
        margin-left:260px;
        margin-top:-68px;

      }

      .radio{
        font-size:24px;
        font-weight:50;
        text-transform: capitalize;
        display:block;
        vertical-align: middle;
        color:#fff;
        position:relative;
        padding-left: 30px;
        cursor: pointer;

      }

      .radio + .radio{
        margin-left: 0px;
      }

      .radio input[type="radio"]{
        display: none;
      }

      .radio span{
        height:20px;
        width:20px;
        border-radius:50%;
        border:3px solid #C70039 ;
        display: block;
        position: absolute;
        left:0;
        top:7px;
      }

      .radio span:after{
        content:"";
        height: 8px;
        width: 8px;
        background:#062b86 ;
        display: block;
        position: absolute;
        left: 50%;
        top:50%;
        transform: translate(-50%,-50%)scale(0);
        border-radius:50%;
        transition:300ms ease-in-out 0s;
      }
       
      .radio input[type="radio"]:checked ~ span:after{
        transform: translate(-50%,-50%) scale(1.2);
      }
    
      .radiolabel{
        color:   #990d44  ;
        font-family: sans-serif;
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
          <b><h1>Choose One to Delete Assignments</h1></b>
          <br><br>
        <form action="" method=POST>

                   <div class="radio-group">
                    <label class="radio">
                     <input type="radio" name="txtoptionassign2" value="pendingassign" required><label class="radiolabel"><b>Delete Any Pending Works</b></label>
                     <span></span>
                    </label>

                    <label class="radio">
                    <input type="radio" name="txtoptionassign2" value="attemptedassign" required><label class="radiolabel"><b>Remove Any of the Attempted Works</b></label>
                     <span></span>
                    </label>
                  </div>

                  <div class="form-group">
              <input type="submit" name="optionassignsubmit2" class="btn btn-primary" value="Next">&nbsp&nbsp 
              </div>

        </form>
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
 </div>

<?php
 
 if(isset($_POST['optionassignsubmit2']))
 {
    $optionassign2=$_POST['txtoptionassign2'];
    //$uid=$_SESSION['userid'];
    if($optionassign2==NULL)
      echo '<script>alert("Choose any one option to Procede Further")</script>';
    else
   {
    if($optionassign2=="pendingassign")
    {
      echo '<script>location.href="xtutordelpendingassign.php?gname='.$gname.'"</script>';
    }
    else if($optionassign2=="attemptedassign")
    {
       echo '<script>location.href="xtutordelattemptedassign.php?gname='.$gname.'"</script>';
    }
    else
    {
       echo '<script>alert("Wrong type")</script>';
    }
  }
  
 }//isset if



?>

</body>

</html>