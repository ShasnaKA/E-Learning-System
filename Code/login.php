<?php
  session_start();
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
     
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

     <!--font awesome cdn--> 
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
     <!-- Glyphicon Icons-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">

    
    <style>
        body{
            background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(images/handy.jpg);
            background-repeat:no-repeat;
            background-size:1500px;
        }

        #login_name{
            font-size:40px;
            font-family:sans-serif;
            /*border-bottom-style:ridge;*/
            color:  #C70039  ;
        }

        #login{
            margin-left:260px;
            margin-top:70px;
            background-color:black;
            min-height:500px;
            opacity:0.68;
            padding:40px 70px;

        }

        .usernm{
            font-size:20px;
            font-family:New Times Roman;
            color: #ed2f19 ;
            margin-top:10px;
            
            
        }

        i{
            width:30px;
        }

        .input-group-addon{
            background-color: #C70039;
            border-color:#ed2f19;
            color:#fff;
        }

        .form-control{
            border-radius:0px;
            height:50px;
        }
   
        .btn{
            width:48%;
            height:40px;
            font-size:20px;
            border-radius:0 px;
            font-family: New Times Roman;
            border-style:solid 1px;
            border:transparent;

        }

        .btn-success{
            margin-top:-10px;
            background-color:green;
            width:100%;
        }
       
        .btn-danger{
            background-color:#C70039;
        }

        a{
            text-decoration: none;
            color:#ed2f19;
            font-size:18px;
            float:right;
        }

        a:hover{
            color:#fff;
            font-size:20px;

        }
     
      
    </style>



</head>

<body>
    <div class="container"> 
       <br><br><br><br>
       
       <div class="row">
          <div class="col-md-6 col-md-offset-3" id="login">
            <h1><center><b id="login_name">Login</b></center></h1>
            <form>
                <div class=form-group>
                    <label class="usernm">Username</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="txtemail" placeholder="Your E-mail">
                    </div>
                </div>

                <div class=form-group>
                    <label class="usernm">Password</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" name="txtpswd" placeholder="Your Password">
                    </div>
                </div>

                <div class="form-group">
                    <br><br>
                    <input type="submit" class="btn btn-success" name="btnSubmit" value="Log In">
                    <!--input type="reset" class="btn btn-danger" value="Cancel"-->
                </div>

                <br>
                <a href="signup.php">Create a New Account</a>

            </form>
          </div>
       </div>
    </div>
    
    <?php
   
   // session_start(); //to start the session
    include 'connection.php';
    

   if(isset($_REQUEST['btnSubmit']))
   {
   
    

    $uname=$_REQUEST['txtemail'];
    $pswd=$_REQUEST['txtpswd'];
    
    $sql="select count(*) from tblLogin where uname='$uname'";
    $result=$conn->query($sql);
    $row= mysqli_fetch_array($result);
    

    if($row[0]==0)    //to check whether the username exist
    {
        echo '<script>alert("Username doesnt exist")</script>';
    }
    else
    {
        $_SESSION['uname']=$uname;    //creating a session variable
        $sql="SELECT * from tblLogin where uname='$uname'";
        $result=$conn->query($sql);
        $row= mysqli_fetch_array($result);
        
        if($row[1]==$pswd)  //to check the password entered by user with the password in database
        {
            if($row[3]=="1")  //to check the status of user
            {
                $_SESSION['userid']=$uname;
                
                if($row[2]=="admin")  //to check the usertye/role of the user
                {
                    echo '<script>location.href="adminhome.php"</script>';
                }
                else if($row[2]=="institution")
                {
                    echo '<script>location.href="insthome.php"</script>';
                }
                else if($row[2]=="HOD")
                {
                    echo '<script>location.href="HODhome.php"</script>';
                }
                else if($row[2]=="teacher")
                {
                    echo '<script>location.href="teacherhome.php"</script>';
                }
                else if($row[2]=="student")
                {
                    echo '<script>location.href="studhome.php"</script>';
                }
                else if($row[2]=="xtutor")
                {
                    echo '<script>location.href="xtutorhome.php"</script>';
                }
                else if($row[2]=="xstudent")
                {
                    echo '<script>location.href="xstudhome.php"</script>';
                }
            }
            else
            {
                echo '<script>alert("Your Account is Not Valid.You Need to Be Approved by Someone");location.href="index.php"</script>';
            }
        }
        else
        {
            echo '<script>alert("Incorrect password")</script>';
        }
    }
}
?>



</body>
</html>
