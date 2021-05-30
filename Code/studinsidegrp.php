<?php
 //student inside grp homepge workspace
 //session_startAlready given below in useridnote
 include 'connection.php';
 $gname=$_GET['gname'];
 session_start();
 $uid=$_SESSION['userid'];
 $inst="SELECT studinstemail from tblStudent where studemail='$uid'";
 $instresult=$conn->query($inst);
 $instr1=mysqli_fetch_array($instresult);

 $grpid="SELECT gid from tblGroup INNER JOIN tblGroupstud ON tblGroup.gid=tblGroupstud.sgid where gname='$gname' AND ginstemail='$instr1[0]' AND tblGroupstud.gstudemail='$uid'";
 $grpresult=$conn->query($grpid);
 $grpr2=mysqli_fetch_array($grpresult); 

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!--font awesome cdn--> 
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     <!--Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css.css">


    <style>
             *{
  padding:0;
  margin:0;
}

body{
  margin:0;
  
  background-position:cover;
  background-size: cover;
  background-repeat: no-repeat;
  

}

.nav{
  width:100%;
  background-color:#000033;
  height:80px;
  position:fixed;
  margin-top:0px;
}

.nav .logosmall{
  margin-left:-30px;
  width:300px;
  height:80px;
}

.nav .welcomenote{
  color:#63ab27;
  margin-top:15px;
  margin-left:-22px;
  font-size:27px;
  font-family:Century Gothic;
}

.nav .welcomenote a:hover{
  background-color:#000033;
  color:#63ab27;
}


.nav .useridnote{
  font-size:14px;
  color:#fff;
  margin-left:-210px;
  margin-top:50px;

}

.nav .useridnote a:hover{
  background-color:#000033;
  color:#fff;
}


.nav .mainlist{
  list-style:none;
  padding:0;
  margin-left:40%;
  position:absolute;
}

.nav .sublist{
  list-style:none;
  margin-top:-4px;
}

.hide{
  background-color:#000033;
  cursor:auto;
}

.hide a:hover{
  background-color:#000033;
    cursor:auto;
}

.nav ul li{
  float:left;
  margin-top:20px;
}

.nav ul li a{
  width:150px;
  color:#fff;
  display:block;
  text-decoration:none;
  font-size:16px;
  text-align:center;
  padding:10px;
  border-radius:10px;
  font-family:Century Gothic;
  
}

.nav a:hover{
  background-color:#63ab27; 
  color:#fff;
  text-decoration:none;

}

.nav ul li ul {
  background-color:#000033; 
}

.nav ul li ul li{
  float:none;
}

.nav ul li ul{
   display:none;
}

.nav ul li:hover ul{
  display:block;
}

.nav ul a i{
  margin-right:5px;
}


.sidebar{
  position:fixed;
  left:0;
  width:250px;
  height:100%;
  background-color:#000033;
  margin-top:80px;
  
}

.sidebar ul{
   list-style:none;
}


.sidebar header{
  font-size:22px;
  color:#fff;
  text-align:center;
  line-height:70px;
  background:#063146;
  user-select:none;
}

.sidebar ul a{
  text-decoration:none;
  display:block;
  height:100%;
  width:100%;
  line-height:65px;
  font-size:20px;
  color:white;
  padding-left:40px;
  box-sizing:border-box;
  border-top:1px solid rgba(255,255,255,.1);
  border-bottom: 1px solid black;

}

.sidebar ul li:hover a{
  padding-left:50px;
  color:#63ab27;

}

.sidebar ul a i{
  margin-right:16px;
}

.useridnote,.welcomenote a{
  font-family: 'Kumbh Sans', sans-serif;
}


.tabnotestable{
  margin-left:15px;
  margin-top:-80px;
  border:solid 1px black;
  min-width:1050px;
  max-width:1060px;
 // min-width:1025px;
 // max-width:1025px;
  //max-width:95%;
  //width:955px;
  font-size:18px;
  background-attachment:fixed;

}

.tabnotestable tr th{
  margin-left: 0px;
  padding:5px;
  text-align:left;


}


.tabnotestable tr td{
  padding:18px;
  color:black;
  text-align:left;
  
  color:black;

}

.tabnotestable th{
  background-color: #2d2178 ;
}

.tabdatarows{
  padding:12px 15px;
}

.tabdatarows:nth-child(even)
{
  background-color: #d5c9c6  ;
}

.tabdatarows:nth-child(odd){
  background-color:#b9afad  ;
}

.tabdatarows:hover{
  background-color:  #9aa6c4    ;
}

.tabdatarows:last-of-type{
  border-bottom:2px solid  #101e89 ;
}

.dwnldbtn{
  background-color:#d51411;
  width:110px;
  padding:5px;
  border:solid red 1px;
}



</style>

</head>

<body>

<div class="nav">
    <img src="images/logosmall.png" class="logosmall">
    <div class="welcomenote">
       <a class="#">Classroom <?php echo $gname ?> </a>
    </div>
    <div class="useridnote">
       <a class="#">Logged in as
                    <?php
                    
                    echo $_SESSION['userid'];
                    
                   ?>
       </a>
    </div>
        
    <ul class="mainlist">
        
    <li><a href="studhome.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

    <li><a href="studinsidegrp.php?gname=<?php echo "$gname" ?>"><i class="fa fa-th-large"></i>Workspace</a></li>

    <li><a href="#"><i class="fa fa-question-circle"></i>Tests</a>
             <ul class="sublist">
              <li><a href="studsubmittest.php?gname=<?php echo "$gname" ?>">Submit</a></li>
              <li><a href="studdeltest.php?gname=<?php echo "$gname" ?>">Remove</a></li>
             </ul>
    </li>

   <li><a href="#"><i class="fa fa-pencil-square"></i>To-Do</a>
             <ul class="sublist">
              <li><a href="studsubmitassign.php?gname=<?php echo "$gname" ?>">Submit</a></li>
              <li><a href="studdelassign.php?gname=<?php echo "$gname" ?>">Remove</a></li>
             </ul>
    </li> 

   <li><a href="studviewgstud.php?gname=<?php echo "$gname" ?>"><i class="fa fa-users"></i>Students</a>
    </li> 

    </ul>
  </div>


  <div class="sidebar">
    <header>Menu Bar</header>
    <ul>
      <li><a href="index.php"><i class="fa fa-sign-out"></i>Log Out</a></li>
      <li><a href="studviewmark.php?gname=<?php echo "$gname" ?>"><i class="fa fa-graduation-cap"></i>Marks</a></li>
        <li><a href="studviewtestcal.php?gname=<?php echo "$gname" ?>&gid=<?php echo "$grpr2[0]" ?>"><i class="fa fa-calendar"></i>Calendar</a></li>
    </ul>
  </div>
  
 <br><br><br><br>


<div class=dvtitle><h1 class="title">
<?php 
  echo $gname; 
 ?></h1>
 </div>

<div class="tabContainer">
    <div class="buttonContainer">
        <button onclick="showPanel(0,'#a89a40')"><label><b>Notes</b></label></button>
        <button onclick="showPanel(1,'#cb5b66')"><b>Tests</b></button>
        <button onclick="showPanel(2,'#7c934b')"><b>To-Do</b></button>
    </div>

    
    <!--Notes Panel-Tab 1-->
    <div class="tabPanel">
    <table class="tabnotestable">
    <tr>
      <th>Topic</th>
      <th>Uplaoded Date</th>
      <th>&nbspFile Uploaded</th>
    </tr>
    <?php

      $uid=$_SESSION['userid'];
      $inst="SELECT studinstemail from tblStudent where studemail='$uid'";
      $instresult=$conn->query($inst);
      $instr1=mysqli_fetch_array($instresult);

      $grpid="SELECT gid from tblGroup INNER JOIN tblGroupstud ON tblGroup.gid=tblGroupstud.sgid where gname='$gname' AND ginstemail='$instr1[0]' AND tblGroupstud.gstudemail='$uid'";
      $grpresult=$conn->query($grpid);
      $grpr2=mysqli_fetch_array($grpresult);
    
      $sql="SELECT mtrldate,mtrlname,attchmtrl FROM tblMaterial where mtrlgid='$grpr2[0]' AND mtrlstatus=1 ORDER BY mtrldate DESC";
      $result=$conn->query($sql);
      

      while($row=mysqli_fetch_array($result))
      {
        
        echo '<tr class="tabdatarows"><td><b>'.$row['mtrlname'].'</b></td>';
        $date=$row['mtrldate'];
        $day=date('j', strtotime($date));
        $month=date('F', strtotime($date));
        $month3=substr($month,0,3);
        $year=date('Y', strtotime($date));
        echo '<td>'.$day.' '.$month3.' '.$year.'</td>';
        echo '<td><a href="teachviewmtrl.php?mtrlfile='.$row['attchmtrl'].'"><b style="color: #1e40eb ">'.$row['attchmtrl'].'</b></a></td>';
      }

     ?>
    
    </table>
    </div>




    <!--Tests Panel-Tab 2-->
    <div class="tabPanel">
    <table class="tabnotestable">
    <tr>
      <th>Topic</th>
      <th>Portions</th>
      <th>Total Marks</th>
      <th>Test Date</th>
      <th>Time Allowed</th>
      <!--th>Status</th-->
      <th>Questions</th>
      <th>Your Attachment</th>
      
    </tr>
    <?php


      $sql1="SELECT gstudid from tblGroupstud where sgid='$grpr2[0]' AND gstudemail='$uid' AND gstudstatus=1";
      $sql1result=$conn->query($sql1);
      $sql1row=mysqli_fetch_array($sql1result);//to use gstudid in nxt query $sql

     $sql="SELECT testid,testname,testdesc,testdate,teststarttime,testendtime,testmax,qpaper,CONCAT(CONCAT(testdate,' '),teststarttime),tblSubmtest.test_answr,tblSubmtest.test_answr_status,tblSubmtest.submtest_gstudid FROM tblTest LEFT JOIN tblSubmtest ON tblTest.testid=tblSubmtest.subm_testid where (tblSubmtest.submtest_gstudid='$sql1row[0]' AND tblSubmtest.submtest_gid='$grpr2[0]') OR testgid='$grpr2[0]' AND teststatus=1 ORDER BY CONCAT(CONCAT(testdate,' '),teststarttime) DESC"; 
    $result=$conn->query($sql);

      date_default_timezone_set('Asia/Kolkata');
      $cdateandtime=date('Y-m-d').' '.date('H:i:s');
      $cdate=date('Y-m-d');//now
      $ctime=date('H:i:s');//now

      $q1="SELECT count(testid) from tblTest where teststatus=1 AND testgid='$grpr2[0]'";
      $q1rslt=$conn->query($q1);
      $q1rowcount=mysqli_fetch_array($q1rslt);
    
      $query2="SELECT CONCAT(CONCAT(testdate,' '),teststarttime),CONCAT(CONCAT(testdate,' '),testendtime) FROM tblTest where testgid='$grpr2[0]' AND teststatus=1 ORDER BY CONCAT(CONCAT(testdate,' '),teststarttime) DESC";
      $queryresult=$conn->query($query2);//to compare date and time combined to give new/closed status
      
      $i=0;
      $testname=array();

      while($row=mysqli_fetch_array($result))
      {
        if($row['test_answr_status']==1 AND  $row['submtest_gstudid']!=$sql1row[0])
        {
          array_push($testname,$row['testid']);
          continue;
        }
        if($row['test_answr_status']==-1 AND  $row['submtest_gstudid']!=$sql1row[0])
        {
          array_push($testname,$row['testid']);
          continue;
        }
        echo '<tr class="tabdatarows"><td><b>'.$row['testname'].'</b></td>';
        echo '<td>'.$row['testdesc'].'</td>';
        echo '<td>'.$row['testmax'].'</td>';
         $date=$row['testdate'];
         $day=date('j', strtotime($date));
         $month=date('F', strtotime($date));
         $month3=substr($month,0,3);
         $year=date('Y', strtotime($date));
         $dayname=date('l', strtotime($date));
         $dayname3=substr($dayname,0,3);
        echo '<td>'.$day.' '.$month3.' '.$year.' ('.$dayname3.')</td>';
        echo '<td>'.date("g:i a" ,strtotime($row['teststarttime'])).' - '.date("g:i a",strtotime($row['testendtime'])). '</td>';
        
 
        $queryrow=mysqli_fetch_array($queryresult);//row for new/closed  

        //To check if testdate is today and curently available for submission ie,time
        /*if($row['testdate']==$cdate AND $row['teststarttime']<=$ctime AND $row['testendtime']>=$ctime)
        { 
          echo '<td><label style="color:#151be1"><b>Open Now</b></label></td>';

        }
        else if($queryrow[0]>=$cdateandtime ) //New Test    
        {
          echo '<td><label style="color:green">New</label></td>';
        }
        else //Previous Test
        {
          echo '<td><label style="color:red">Closed</label></td>';
        }*/

        //Qpaper
        if($row['qpaper']==NULL)
          echo '<td><em style="color:gray">-Not Uploaded-</em></td>';

        else if($row['qpaper']!=NULL AND $cdateandtime<$queryrow[0])
        {
          echo '<td><a href="studnotviewqpaper.php?gname='.$gname.'"><b style="color: #1e40eb ">'.$row['qpaper'].'</b></a></td>';
        }
        else
        echo '<td><a href="teachviewqpaper.php?qpaperfile='.$row['qpaper'].'"><b style="color: #1e40eb ">'.$row['qpaper'].'</b></a></td>';
          
         
        //student attachment
        if($row['test_answr']==NULL)//no record in subm table corresponding to a given testid
        {
          echo '<td><em style="color:gray">-Not Attached-</em></td>';
          //array_push($testnull,$row['testid']);
         }
         else if($row['test_answr_status']==-1)//ur deleted
         {
          echo '<td><label style="color:red">Deleted!</label></td>';
         }
        else if($row['test_answr_status']==1)//ur attachmnt
        {
          echo '<td><a href="studviewqpaper.php?qpaperfile='.$row['test_answr'].'"><b style="color: #1e40eb ">'.$row['test_answr'].'</b></a></td>';
         }
        else
        {                                                      
           echo '<td><em style="color:gray">-----</em></td>';
        }
        $i=$i+1;


       }

       if($i < $q1rowcount[0] )
       {

        $myq="SELECT testid,testname,testdesc,testdate,teststarttime,testendtime,testmax,qpaper,CONCAT(CONCAT(testdate,' '),teststarttime) from tblTest JOIN tblSubmtest ON tblTest.testid=tblSubmtest.subm_testid where testgid='$grpr2[0]' AND teststatus=1 AND testid NOT IN (SELECT subm_testid from tblSubmtest where submtest_gid='$grpr2[0]' AND submtest_gstudid='$sql1row[0]')";
        $myqresult=$conn->query($myq);

        $query2="SELECT CONCAT(CONCAT(testdate,' '),teststarttime),CONCAT(CONCAT(testdate,' '),testendtime) FROM tblTest where testgid='$grpr2[0]' AND teststatus=1 ORDER BY CONCAT(CONCAT(testdate,' '),teststarttime) DESC";
        $queryresult=$conn->query($query2);

        while($myqrow=mysqli_fetch_array($myqresult))
        {
           foreach($testname as $value)
           {
             if($value==$myqrow[0])
             {
              // echo '<script>alert("'.$myqrow['testid'].'AND '.$myqrow['testname'].'")</script>';
               
        echo '<tr class="tabdatarows"><td><b>'.$myqrow['testname'].'</b></td>';
        echo '<td>'.$myqrow['testdesc'].'</td>';
        echo '<td>'.$myqrow['testmax'].'</td>';
         $date=$myqrow['testdate'];
         $day=date('j', strtotime($date));
         $month=date('F', strtotime($date));
         $month3=substr($month,0,3);
         $year=date('Y', strtotime($date));
         $dayname=date('l', strtotime($date));
         $dayname3=substr($dayname,0,3);
        echo '<td>'.$day.' '.$month3.' '.$year.' ('.$dayname3.')</td>';
        echo '<td>'.date("g:i a" ,strtotime($myqrow['teststarttime'])).' - '.date("g:i a",strtotime($myqrow['testendtime'])). '</td>';
        
 
        $queryrow=mysqli_fetch_array($queryresult);//row for new/closed  

        //To check if testdate is today and curently available for submission ie,time
        /*if($myqrow['testdate']==$cdate AND $myqrow['teststarttime']<=$ctime AND $myqrow['testendtime']>=$ctime)
        { 
          echo '<td><label style="color:#151be1"><b>Open Now</b></label></td>';

        }
        else if($queryrow[0]>=$cdateandtime ) //New Test    
        {
          echo '<td><label style="color:green">New</label></td>';
        }
        else //Previous Test
        {
          echo '<td><label style="color:red">Closed</label></td>';
        }*/

        //Qpaper
        if($myqrow['qpaper']==NULL)
          echo '<td><em style="color:gray">-Not Uploaded-</em></td>';

        else if($myqrow['qpaper']!=NULL AND $cdateandtime<$queryrow[0])
        {
          echo '<td><a href="studnotviewqpaper.php?gname='.$gname.'"><b style="color: #1e40eb ">'.$myqrow['qpaper'].'</b></a></td>';
        }
        else
        echo '<td><a href="teachviewqpaper.php?qpaperfile='.$myqrow['qpaper'].'"><b style="color: #1e40eb ">'.$myqrow['qpaper'].'</b></a></td>';
          
        //stud attachmnt
         echo '<td><em style="color:gray">-Not Attached-</em></td></tr>';

             }
           }
        }

       }
      
     ?>
  
    </table>
    </div>



    <!--To-Do Panel-Tab 3-->
    <div class="tabPanel">
      <table class="tabnotestable">
    <tr>
      <th>Topic</th>
      <th>Description</th>
      <th>Total Marks</th>
      <th>Due Date</th>
      <th>Time</th>
      <!--th>Status</th-->
      <th>Questions</th>
      <th>Your Attachment</th>
    </tr>
    <?php
    

     $sql1="SELECT gstudid from tblGroupstud where sgid='$grpr2[0]' AND gstudemail='$uid' AND gstudstatus=1";
      $sql1result=$conn->query($sql1);
      $sql1row=mysqli_fetch_array($sql1result);//to use gstudid in nxt query $sql

      $sql3="SELECT assignid,assignname,assigndesc,assigndate,assigntime,assignmax,assignattach,CONCAT(CONCAT(assigndate,' '),assigntime),tblSubmassign.assign_answr,tblSubmassign.assign_answr_status,tblSubmassign.submassign_gstudid FROM tblAssignment LEFT JOIN tblSubmassign ON tblAssignment.assignid=tblSubmassign.subm_assignid where (tblSubmassign.submassign_gstudid='$sql1row[0]' AND tblSubmassign.submassign_gid='$grpr2[0]') OR assigngid='$grpr2[0]' AND assignstatus=1 ORDER BY CONCAT(CONCAT(assigndate,' '),assigntime) DESC"; 
      $result3=$conn->query($sql3);

       date_default_timezone_set('Asia/Kolkata');
      $cdateandtime2=date('Y-m-d').' '.date('H:i:s');

      $q2="SELECT count(assignid) from tblAssignment where assignstatus=1 AND assigngid='$grpr2[0]'";
      $q2rslt=$conn->query($q2);
      $q2rowcount=mysqli_fetch_array($q2rslt);
    
      $query3="SELECT CONCAT(CONCAT(assigndate,' '),assigntime) FROM tblAssignment where assigngid='$grpr2[0]' AND assignstatus=1 ORDER BY CONCAT(CONCAT(assigndate,' '),assigntime) DESC";
      $queryresult3=$conn->query($query3);
     
      $j=0;
      $todoname=array();

      while($row3=mysqli_fetch_array($result3))
      {

        if($row3['assign_answr_status']==1 AND  $row3['submassign_gstudid']!=$sql1row[0])
        {
          array_push($todoname,$row3['assignid']);
          continue;//someone else's submission
        }
        if($row3['assign_answr_status']==-1 AND  $row3['submassign_gstudid']!=$sql1row[0])
        {
          array_push($todoname,$row3['assignid']);
          continue;//someone else's submission deleted
        }
        echo '<tr class="tabdatarows"><td><b>'.$row3['assignname'].'</b></td>';
        echo '<td>'.$row3['assigndesc'].'</td>';
        echo '<td>'.$row3['assignmax'].'</td>';
        $date=$row3['assigndate'];
        $day=date('j', strtotime($date));
        $month=date('F', strtotime($date));
        $month3=substr($month,0,3);
        $year=date('Y', strtotime($date));
        $dayname=date('l', strtotime($date));
        $dayname3=substr($dayname,0,3);
        echo '<td>'.$day.' '.$month3.' '.$year.' ('.$dayname3.')</td>';
        echo '<td>'.date("g:i a" ,strtotime($row3['assigntime'])).'</td>';


      $queryrow3=mysqli_fetch_array($queryresult3);  
      
       /*if($queryrow3[0]>=$cdateandtime2) 
       {    
          echo '<td><label style="color:#151be1"><b>Open Now</b></label></td>';
        }
        else 
        {
          echo '<td><label style="color:red">Closed</label></td>';
        }*/
        
        //Questionairre
        if($row3['assignattach']==NULL)
        {
          echo '<td><em style="color:gray">-Not Uploaded-</em></td>';
        }
        else
        {
          echo '<td><a href="teachviewassign.php?assignfile='.$row3['assignattach'].'"><b style="color: #1e40eb ">'.$row3['assignattach'].'</b></a></td>';
        }
         

       //Student submission
         if($row3['assign_answr']==NULL)//no record in subm table corresponding to a given testid
        {
          echo '<td><em style="color:gray">-Not Attached-</em></td>';
         }
         else if($row3['assign_answr_status']==-1)//ur deleted
         {
          echo '<td><label style="color:red">Deleted!</label></td>';
         }
        else if($row3['assign_answr_status']==1)//ur attachmnt
        {
          echo '<td><a href="studviewassign.php?assignfile='.$row3['assign_answr'].'"><b style="color: #1e40eb ">'.$row3['assign_answr'].'</b></a></td>';
         }
        else
        {                                                      
           echo '<td><em style="color:gray">-----</em></td>';
        }
 
        $j=$j+1;
        
      }

      if($j < $q2rowcount[0] )
      {
         $myq2="SELECT assignid,assignname,assigndesc,assigndate,assigntime,assignmax,assignattach,CONCAT(CONCAT(assigndate,' '),assigntime) from tblAssignment JOIN tblSubmassign ON tblAssignment.assignid=tblSubmassign.subm_assignid where assigngid='$grpr2[0]' AND assignstatus=1 AND assignid NOT IN (SELECT subm_assignid from tblSubmassign where submassign_gid='$grpr2[0]' AND submassign_gstudid='$sql1row[0]')";
         $myq2result=$conn->query($myq2);

         $query3="SELECT CONCAT(CONCAT(assigndate,' '),assigntime) FROM tblAssignment where assigngid='$grpr2[0]' AND assignstatus=1 ORDER BY CONCAT(CONCAT(assigndate,' '),assigntime) DESC";
         $queryresult3=$conn->query($query3);

        while($myq2row=mysqli_fetch_array($myq2result))
        {
           foreach($todoname as $value1)
           {
             if($value1==$myq2row[0])
             {

             // echo '<script>alert("'.$myq2row['assignid'].'AND'.$myq2row['assignname'].'")</script>';
               echo '<tr class="tabdatarows"><td><b>'.$myq2row['assignname'].'</b></td>';
        echo '<td>'.$myq2row['assigndesc'].'</td>';
        echo '<td>'.$myq2row['assignmax'].'</td>';
        $date=$myq2row['assigndate'];
        $day=date('j', strtotime($date));
        $month=date('F', strtotime($date));
        $month3=substr($month,0,3);
        $year=date('Y', strtotime($date));
        $dayname=date('l', strtotime($date));
        $dayname3=substr($dayname,0,3);
        echo '<td>'.$day.' '.$month3.' '.$year.' ('.$dayname3.')</td>';
        echo '<td>'.date("g:i a" ,strtotime($myq2row['assigntime'])).'</td>';


      $queryrow3=mysqli_fetch_array($queryresult3);  
      
       /*if($queryrow3[0]>=$cdateandtime2) 
       {    
          echo '<td><label style="color:#151be1"><b>Open Now</b></label></td>';
        }
        else 
        {
          echo '<td><label style="color:red">Closed</label></td>';
        }*/
        
        //Questionairre
        if($myq2row['assignattach']==NULL)
        {
          echo '<td><em style="color:gray">-Not Uploaded-</em></td>';
        }
        else
        {
          echo '<td><a href="teachviewassign.php?assignfile='.$myq2row['assignattach'].'"><b style="color: #1e40eb ">'.$myq2row['assignattach'].'</b></a></td>';
        }
         //stud attachmnt
         echo '<td><em style="color:gray">-Not Attached-</em></td></tr>';

             }
           }
        }
      }

     ?>
  
    </table>
    </div>
    
</div>
<script src="myScript.js"></script>

</body>
</html>
