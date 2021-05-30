<!DOCTYPE html>
<head>

  <title>Institution Registration</title>

  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!--font awesome cdn--> 
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="formstyles.css" >
 </head>



 <body>

  <div class="container">
  	  <div class="row">
  	  	<div class="col-md-6 " id="form">
  	  		<center>
  	  			<b><h2>Institution Registration Form</h2></b>
  	  		</center>
  	  		<form method="POST" action="">
  	  			<div class="form-group">
  	  				<label>Name</label>
  	  				<input type="text" name="txtinstname" class="form-control text" placeholder="Institution Name" pattern="[a-zA-Z ]+" required="">
  	  			</div>
  	  			<div class="form-group">
  	  			    <label>Address</label>
  	  			 <textarea name="txtinstaddress" rows="2" class="form-control text" placeholder="Institution Address" required=""></textarea>
  	  			</div>
  	  			<div class="form-group">
  	  				<label>Institution Head</label>
  	  				<input type="text" name="txtinstprinc" class="form-control text" placeholder="Manager / Principal" required="">
  	  			</div><div class="form-group">
  	  				<label>Contact Number</label>
  	  				<input type="text" name="txtinstcontact" class="form-control text" placeholder="Institution Contact" pattern="[6789][0-9]{9}"  required="">
  	  			</div>
  	  			<div class="form-group">
  	  				<label>E-mail</label>
  	  				<input type="email" name="txtinstemail" class="form-control text" placeholder="abcdcollege@gmail.com" required="">
  	  			</div>
  	  			<div class="form-group">
  	  				<label>Password</label>
  	  				<input type="password" name="txtinstpswd" class="form-control text" placeholder="Set a Password" required="">
  	  			</div>
  	  			<div class="form-group">
  	  				<label>Confirm Password</label>
  	  				<input type="password" name="txtinstcnfrmpswd" class="form-control text" placeholder="Confirm Password" required="">
  	  			</div>
  	  			<div class="form-group">
  	  				<input type="submit" name="instreg" class="btn btn-primary" value="Register">&nbsp&nbsp
  	  			</div>
  	  		</form>
  	  	</div>
  	  </div>
  </div>


 <?php
 
 if(isset($_POST['instreg']))
 {

  include 'connection.php';

  $instemail=$_POST['txtinstemail'];
  $instname=$_POST['txtinstname'];
  $instaddress=$_POST['txtinstaddress'];
  $instprinc=$_POST['txtinstprinc'];
  $instcontact=$_POST['txtinstcontact'];
  $instpswd=$_POST['txtinstpswd'];


  $sql="INSERT INTO tblInstitution(instemail,instname,instaddress,instprinc,instcontact) VALUES('$instemail' ,'$instname', '$instaddress', '$instprinc', '$instcontact')";
  if($conn->query($sql)===TRUE)
   {
      $sql="INSERT INTO tblLogin(uname,pswd,utype,status) VALUES('$instemail','$instpswd' ,'institution', '0' )";
      if($conn->query($sql)===TRUE)
      {
        echo '<script>alert("Registration Successfull")</script>';
        echo '<script>location.href="login.php"</script>';

      }
      else{
        echo '<script>alert("Registration Failed")</script>';
      } 
   }
   else
   {
     echo '<script>alert("Sorry Some error occured")</script>';
    }
   $conn->close();
}

?>

</body>
</html>
