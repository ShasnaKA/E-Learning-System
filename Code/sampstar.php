<?php
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

    <style>

        body{
          
          background-color:#1a2935 ;
          
        }

        .formspace{
        margin-top:90px;                                                                                    
        width:500px;
        height:500px;
        background-color:#8d9849;
        box-shadow:6px 6px #b71d08;
        }

        .formspace:hover{
          width:510px;
          background-color: #8e8380 ;//#6d6461 ; //#333235; //#538f5d ; 
        }

      .deptform{
        margin-top:10px;
        margin-left:30px;
        
      }

      .form-control{
        width:450px;
      }
        
      h1{
           color: #b71d08 ;
           font-family:century Gothic;
      }


        h4{
          color: black//#813d0e ;
          font-family:arial;
        }

        //.formspace:hover h4{
        //  color:white;
        //}

      label{
         color:#b71d08;
         font-size:20px;
         font-family:verdana;
      }   
        
        i {
          color:  #C70039;
            
        }

        .mk{
          width:130px;
          height:100px;
        } 

        img{
          width:90px;
          height:90px;
        }

      .btn-primary{
        background-color: #C70039 ;
        border-color: #C70039 ;
        width:200px;
        margin-left:10px;
        margin-top:10px;
        padding:12px;
        font-family:sans-serif;
      }

      .btn-danger{
        background-color: #C70039 ;
        border-color: #C70039 ;
        width:200px;
        margin-left:10px;
        margin-top:10px;
        padding:12px;
        font-family:sans-serif;

      }

      textarea{
        outline:none;
        color:#eee;
        padding:10px;
        border:1px solid #333;
      }

      .btn-primary:hover{
        padding:12px;
        font-size:20px;
      }

      .btn-danger:hover{
        padding:12px;
        font-size:20px;
      }

      .body{
        display:grid;
        height:100%;
        place-items:center;
        text-align:center;
        background:#000;
      }

      .starcontainer{
        position:relative;
        width:400px;
        background:#111;
        padding:20px 30px;
        border:1px solid  #444;
        border-radius:5px;
        display:flex;
        align-items:center;
        justify-content:center;
        flex-direction: column;
        //margin-right:30px;

      }

      .starcontainer .text{
        font-size:20px;
        color:#666;
        font-weight: 800;
      }

      .starcontainer .edit{
        position:absolute;
        right:10px;
        top:5px;
        font-size: 16px;
        color:#666;
        font-weight: 500;
        cursor: pointer;
      }

      .container .star-widget input{
        display: none;

      }

      .star-widget label{
        font-size: 40px;
        color:#444;
        padding:10px;
        float:right;
        //margin-left: 10px;
        transition:all 0.2s ease;
      }

      input:not(:checked) ~ label:hover,
      input:not(:checked) ~ label:hover ~ label{
        color:#fd4;
      }

      input#rate-5:checked ~ label{
        color:#fe7;
        text-shadow:0 0 20px #952;
      }

      #rate-1:checked ~ form header:before{
         content:"Its In Poor State";  
      }

      #rate-2:checked ~ form header:before{
         content:"I Dont Like It";  
      }

      #rate-3:checked ~ form header:before{
         content:"Expects Improvement";  
      }

      #rate-4:checked ~ form header:before{
         content:"I Just Like It";  
      }

      #rate-5:checked ~ form header:before{
         content:"Its Awesome";  
      }

      form header{
        width:100%;
        font-size:25px;
        color:white;//#fe7;
        font-weight:500;
        margin:8px 0 20px 0;
        text-align:center;
        transition:all 0.2s ease;
      }

      
    </style>

</head>

<body>
  
  <div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="formspace">
        <br><br>
      <div class="deptform">
          <b><h1>Leave Your Feedback</h1></b>
          <h4>What do you feel about our Services.Feel free to let us know how much you value Skillup</h4>
        <form action="" method=POST>

          <div class="form-group">
              <label>E-mail</label>
              <input type="text" name="txtfeedbackemail" class="form-control" placeholder="Your E-mail" required="">
              </div>

              <div class="form-group">
              <label>Feedback</label>
              <textarea name="txtfeedback" class="form-control" placeholder="Leave a Comment" required=""></textarea>
              </div>

                  <!--div class="form-group">
              <input type="submit" name="feedbacksubmit" class="btn btn-danger" value="Send">&nbsp&nbsp 
              </div-->

        </form>
        </div>
      </div>
    </div>

    <div class="col-md-6">
          <div class="formspace">
        <br><br>
      <div class="deptform">
          <b><h1>Give Us A Rating</h1></b>
                <h4>Please Provide Your Skillup Rating.It helps to improve the services provided by us</h4>
        <form action="" method=POST>


              <div class="form-group" class="body">
                <br>
                <div class="star-container">
                   <div class="text">Thanks For Rating Us</div>
                    <div class="star-widget">
                      <input type="radio" name="rate" id="rate-1">
                      <label for="rate-5" class="fa fa-star"></label>
                       <input type="radio" name="rate" id="rate-4">
                      <label for="rate-4" class="fa fa-star"></label>
                       <input type="radio" name="rate" id="rate-3">
                      <label for="rate-3" class="fa fa-star"></label>
                      <input type="radio" name="rate" id="rate-2">
                      <label for="rate-2" class="fa fa-star"></label>
                      <input type="radio" name="rate" id="rate-5">
                      <label for="rate-1" class="fa fa-star"></label>
                      <form action="">
                      <header></header>
                      <div class="textarea">
                        
                      </div>
                      </form>
                    </div>
                </div>
              </div>

              <div class="form-group" class="btn">
              <!--input type="submit" name="feedbacksubmit" class="btn btn-danger" value="POST"-->
              <button type="submit" name="feedbacksubmit" class="btn btn-danger">POST</button>&nbsp&nbsp  
              </div>

        </form>
        </div>
      </div>

    </div>
  </div>
 </div>
 <script>
   const btn = document.querySelector("button");
   const post=document.querySelector(".post");
   const widget=document.querySelector(".star-widget");
   btn.onclick = ()=>{
    widget.style.display="none";
    post.style.display ="block";
    return false;

   }
 </script>

 <?php
  
   if(isset($_POST['feedbacksubmit']))
   {
    $feedbackemail=$_POST['txtfeedbackemail'];
    $feedback=$_POST['txtfeedback'];

    $sql="INSERT INTO tblFeedback(feedbackemail,feedback) VALUES('$feedbackemail','$feedback')";
    if($conn->query($sql)===TRUE)
      echo '<script>alert("Thanks for Your Valuable Feedback");location.href="index.php"</script>';
    else
      echo '<scrpit>alert("Something Went Wrong")</script>';
   }

 ?>


</body>


</html>