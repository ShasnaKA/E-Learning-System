<?php
 //student inside grp homepge workspace
 //session_startAlready given below in useridnote
 include 'connection.php';
 session_start();
 $uid=$_SESSION['userid'];
 $gname=$_GET['gname'];
 $grpid="SELECT xgid from tblXGroup INNER JOIN tblXGroupstud ON tblXGroup.xgid=tblXGroupstud.xsgid where xgname='$gname' AND tblXGroupstud.xgstudemail='$uid'";
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
  margin-left:25px;
  margin-top:-80px;
  border:solid 1px black;
  min-width:1025px;
  max-width:95%;
  //width:955px;
  font-size:18px;
  background-attachment:fixed;

}

.tabnotestable tr th{
  margin-left: 0px;
  padding:10px;
  text-align:left;


}


.tabnotestable tr td{
  padding:24px;
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
        
    <li><a href="xstudhome.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

    <li><a href="xstudinsidegrp.php?gname=<?php echo "$gname" ?>"><i class="fa fa-th-large"></i>Workspace</a></li>

    <li><a href="#"><i class="fa fa-question-circle"></i>Tests</a>
             <ul class="sublist">
              <li><a href="xstudsubmittest.php?gname=<?php echo "$gname" ?>">Submit</a></li>
              <li><a href="xstuddeltest.php?gname=<?php echo "$gname" ?>">Remove</a></li>
             </ul>
    </li>

   <li><a href="#"><i class="fa fa-pencil-square"></i>To-Do</a>
             <ul class="sublist">
              <li><a href="xstudsubmitassign.php?gname=<?php echo "$gname" ?>">Submit</a></li>
              <li><a href="xstuddelassign.php?gname=<?php echo "$gname" ?>">Remove</a></li>
             </ul>
    </li> 

   <li><a href="xstudviewgstud.php?gname=<?php echo "$gname" ?>"><i class="fa fa-users"></i>Students</a>
    </li> 

    </ul>
  </div>


  <div class="sidebar">
    <header>Menu Bar</header>
    <ul>
      <li><a href="index.php"><i class="fa fa-sign-out"></i>Log Out</a></li>
      <li><a href="xstudviewmark.php?gname=<?php echo "$gname" ?>"><i class="fa fa-graduation-cap"></i>Marks</a></li>
        <li><a href="xstudviewtestcal.php?gname=<?php echo "$gname" ?>&gid=<?php echo "$grpr2[0]" ?>"><i class="fa fa-calendar"></i>Calendar</a></li>
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

      $grpid="SELECT xgid from tblXGroup INNER JOIN tblXGroupstud ON tblXGroup.xgid=tblXGroupstud.xsgid where xgname='$gname' AND tblXGroupstud.xgstudemail='$uid'";
      $grpresult=$conn->query($grpid);
      $grpr2=mysqli_fetch_array($grpresult);
    
      $sql="SELECT xmtrldate,xmtrlname,xattchmtrl FROM tblXMaterial where xmtrlgid='$grpr2[0]' AND xmtrlstatus=1 ORDER BY xmtrldate DESC";
      $result=$conn->query($sql);
      

      while($row=mysqli_fetch_array($result))
      {
        
        echo '<tr class="tabdatarows"><td><b>'.$row['xmtrlname'].'</b></td>';
        $date=$row['xmtrldate'];
        $day=date('j', strtotime($date));
        $month=date('F', strtotime($date));
        $month3=substr($month,0,3);
        $year=date('Y', strtotime($date));
        echo '<td>'.$day.' '.$month3.' '.$year.'</td>';
        echo '<td><a href="xtutorviewmtrl.php?mtrlfile='.$row['xattchmtrl'].'"><b style="color: #1e40eb ">'.$row['xattchmtrl'].'</b></a></td>';
        
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


      $sql1="SELECT xgstudid from tblXGroupstud where xsgid='$grpr2[0]' AND xgstudemail='$uid' AND xgstudstatus=1";
      $sql1result=$conn->query($sql1);
      $sql1row=mysqli_fetch_array($sql1result);//to use gstudid in nxt query $sql


     //$sql="SELECT xtestid,xtestname,xtestdesc,xtestdate,xteststarttime,xtestendtime,xtestmax,xqpaper,CONCAT(CONCAT(xtestdate,' '),xteststarttime),tblXSubmtest.xtest_answr,tblXSubmtest.xtest_answr_status,tblXSubmtest.xsubmtest_gstudid FROM tblXTest LEFT JOIN tblXSubmtest ON tblXTest.xtestid=tblXSubmtest.xsubm_testid where (tblXSubmtest.xsubmtest_gstudid='$sql1row[0]' OR xtestgid='$grpr2[0]')AND xteststatus=1 ORDER BY CONCAT(CONCAT(xtestdate,' '),xteststarttime) DESC"; 

     $sql="SELECT xtestid,xtestname,xtestdesc,xtestdate,xteststarttime,xtestendtime,xtestmax,xqpaper,CONCAT(CONCAT(xtestdate,' '),xteststarttime),tblXSubmtest.xtest_answr,tblXSubmtest.xtest_answr_status,tblXSubmtest.xsubmtest_gstudid FROM tblXTest LEFT JOIN tblXSubmtest ON tblXTest.xtestid=tblXSubmtest.xsubm_testid where (tblXSubmtest.xsubmtest_gstudid='$sql1row[0]' AND tblXSubmtest.xsubmtest_gid='$grpr2[0]') OR xtestgid='$grpr2[0]' AND xteststatus=1 ORDER BY CONCAT(CONCAT(xtestdate,' '),xteststarttime) DESC"; 
     $result=$conn->query($sql);
      $result=$conn->query($sql);

      date_default_timezone_set('Asia/Kolkata');
      $cdateandtime=date('Y-m-d').' '.date('H:i:s');
      $cdate=date('Y-m-d');//now
      $ctime=date('H:i:s');//now

      $q1="SELECT count(xtestid) from tblXTest where xteststatus=1 AND xtestgid='$grpr2[0]'";
      $q1rslt=$conn->query($q1);
      $q1rowcount=mysqli_fetch_array($q1rslt);
    
      $query2="SELECT CONCAT(CONCAT(xtestdate,' '),xteststarttime),CONCAT(CONCAT(xtestdate,' '),xtestendtime) FROM tblXTest where xtestgid='$grpr2[0]' AND xteststatus=1 ORDER BY CONCAT(CONCAT(xtestdate,' '),xteststarttime) DESC";
      $queryresult=$conn->query($query2);//to compare date and time combined to give new/closed status


        
      $i=0;
      $testname=array();

      while($row=mysqli_fetch_array($result))
      {
        if($row['xtest_answr_status']==1 AND  $row['xsubmtest_gstudid']!=$sql1row[0])
        {
          array_push($testname,$row['xtestid']);
          continue;
        }
        if($row['xtest_answr_status']==-1 AND  $row['xsubmtest_gstudid']!=$sql1row[0])
        {
          array_push($testname,$row['xtestid']);
          continue;
        }
        
        echo '<tr class="tabdatarows"><td><b>'.$row['xtestname'].'</b></td>';
        echo '<td>'.$row['xtestdesc'].'</td>';
        echo '<td>'.$row['xtestmax'].'</td>';
         $date=$row['xtestdate'];
         $day=date('j', strtotime($date));
         $month=date('F', strtotime($date));
         $month3=substr($month,0,3);
         $year=date('Y', strtotime($date));
         $dayname=date('l', strtotime($date));
         $dayname3=substr($dayname,0,3);
        echo '<td>'.$day.' '.$month3.' '.$year.' ('.$dayname3.')</td>';
        echo '<td>'.date("g:i a" ,strtotime($row['xteststarttime'])).' - '.date("g:i a",strtotime($row['xtestendtime'])). '</td>';
        
 
        $queryrow=mysqli_fetch_array($queryresult);//row for new/closed  

        //To check if testdate is today and curently available for submission ie,time
        /*if($row['xtestdate']==$cdate AND $row['xteststarttime']<=$ctime AND $row['xtestendtime']>=$ctime)
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

        if($row['xqpaper']==NULL)
          echo '<td><em style="color:gray">-Not Uploaded-</em></td>';
        else if($row['xqpaper']!=NULL AND $cdateandtime<$queryrow[0])
        {
          echo '<td><a href="xstudnotviewqpaper.php?gname='.$gname.'"><b style="color: #1e40eb ">'.$row['xqpaper'].'</b></a></td>';
        }
        else
        echo '<td><a href="xtutorviewqpaper.php?qpaperfile='.$row['xqpaper'].'"><b style="color: #1e40eb ">'.$row['xqpaper'].'</b></a></td>';
          
         
        //student attachment 
        if($row['xtest_answr']==NULL)//no record in subm table corresponding to a given testid
        {
          echo '<td><em style="color:gray">-Not Attached-</em></td>';
         }
         else if($row['xtest_answr_status']==-1)//ur deleted
         {
          echo '<td><label style="color:red">Deleted!</label></td>';
         }
        else if($row['xtest_answr_status']==1)//ur attachmnt
        {
          echo '<td><a href="xstudviewqpaper.php?qpaperfile='.$row['xtest_answr'].'"><b style="color: #1e40eb ">'.$row['xtest_answr'].'</b></a></td>';
         }
        else
        {                                                                 //someone else's attchmnt ie,
           echo '<td><em style="color:gray">-----</em></td>';//answr status=1 but gstudid!=
        }

        $i=$i+1;

   }  
      
       if($i < $q1rowcount[0] )
       {

        $myq="SELECT xtestid,xtestname,xtestdesc,xtestdate,xteststarttime,xtestendtime,xtestmax,xqpaper,CONCAT(CONCAT(xtestdate,' '),xteststarttime) from tblXTest JOIN tblXSubmtest ON tblXTest.xtestid=tblXSubmtest.xsubm_testid where xtestgid='$grpr2[0]' AND xteststatus=1 AND xtestid NOT IN (SELECT xsubm_testid from tblXSubmtest where xsubmtest_gid='$grpr2[0]' AND xsubmtest_gstudid='$sql1row[0]')";
        $myqresult=$conn->query($myq);

        $query2="SELECT CONCAT(CONCAT(xtestdate,' '),xteststarttime),CONCAT(CONCAT(xtestdate,' '),xtestendtime) FROM tblXTest where xtestgid='$grpr2[0]' AND xteststatus=1 ORDER BY CONCAT(CONCAT(xtestdate,' '),xteststarttime) DESC";
      $queryresult=$conn->query($query2);//to compare date and time combined to give new/closed status

        while($myqrow=mysqli_fetch_array($myqresult))
        {
           foreach($testname as $value)
           {
             if($value==$myqrow[0])
             {
              // echo '<script>alert("'.$myqrow['testid'].'AND '.$myqrow['testname'].'")</script>';
              echo '<tr class="tabdatarows"><td><b>'.$myqrow['xtestname'].'</b></td>';
        echo '<td>'.$myqrow['xtestdesc'].'</td>';
        echo '<td>'.$myqrow['xtestmax'].'</td>';
         $date=$myqrow['xtestdate'];
         $day=date('j', strtotime($date));
         $month=date('F', strtotime($date));
         $month3=substr($month,0,3);
         $year=date('Y', strtotime($date));
         $dayname=date('l', strtotime($date));
         $dayname3=substr($dayname,0,3);
        echo '<td>'.$day.' '.$month3.' '.$year.' ('.$dayname3.')</td>';
        echo '<td>'.date("g:i a" ,strtotime($myqrow['xteststarttime'])).' - '.date("g:i a",strtotime($myqrow['xtestendtime'])). '</td>';
        
 
        $queryrow=mysqli_fetch_array($queryresult);//row for new/closed  

        //To check if testdate is today and curently available for submission ie,time
        /*if($myqrow['xtestdate']==$cdate AND $myqrow['xteststarttime']<=$ctime AND $myqrow['xtestendtime']>=$ctime)
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

        if($myqrow['xqpaper']==NULL)
          echo '<td><em style="color:gray">-Not Uploaded-</em></td>';
        else if($myqrow['xqpaper']!=NULL AND $cdateandtime<$queryrow[0])
        {
          echo '<td><a href="xstudnotviewqpaper.php?gname='.$gname.'"><b style="color: #1e40eb ">'.$myqrow['xqpaper'].'</b></a></td>';
        }
        else
        echo '<td><a href="xtutorviewqpaper.php?qpaperfile='.$myqrow['xqpaper'].'"><b style="color: #1e40eb ">'.$myqrow['xqpaper'].'</b></a></td>';

        echo '<td><em style="color:gray">-Not Attached-</em></td>';
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
      <th>Student Attachment</th>
    </tr>
    <?php
    

     $sql3="SELECT xassignid,xassignname,xassigndesc,xassigndate,xassigntime,xassignmax,xassignattach,CONCAT(CONCAT(xassigndate,' '),xassigntime),tblXSubmassign.xassign_answr,tblXSubmassign.xassign_answr_status,tblXSubmassign.xsubmassign_gstudid FROM tblXAssignment LEFT JOIN tblXSubmassign ON tblXAssignment.xassignid=tblXSubmassign.xsubm_assignid where (tblXSubmassign.xsubmassign_gstudid='$sql1row[0]' AND tblXSubmassign.xsubmassign_gid='$grpr2[0]') OR xassigngid='$grpr2[0]' AND xassignstatus=1 ORDER BY CONCAT(CONCAT(xassigndate,' '),xassigntime) DESC"; 
      $result3=$conn->query($sql3);


       date_default_timezone_set('Asia/Kolkata');
      $cdateandtime2=date('Y-m-d').' '.date('H:i:s');

      $q2="SELECT count(xassignid) from tblXAssignment where xassignstatus=1 AND xassigngid='$grpr2[0]'";
      $q2rslt=$conn->query($q2);
      $q2rowcount=mysqli_fetch_array($q2rslt);
    
    
      $query3="SELECT CONCAT(CONCAT(xassigndate,' '),xassigntime) FROM tblXAssignment where xassigngid='$grpr2[0]' AND xassignstatus=1 ORDER BY CONCAT(CONCAT(xassigndate,' '),xassigntime) ASC";
      $queryresult3=$conn->query($query3);

      $j=0;
      $todoname=array();

      while($row3=mysqli_fetch_array($result3))
      {
        if($row3['xassign_answr_status']==1 AND  $row3['xsubmassign_gstudid']!=$sql1row[0])
        {
          array_push($todoname,$row3['xassignid']);
          continue;//someone else's submission
        }
        if($row3['xassign_answr_status']==-1 AND  $row3['xsubmassign_gstudid']!=$sql1row[0])
        {
          array_push($todoname,$row3['xassignid']);
          continue;//someone else's submission deleted
        }
        echo '<tr class="tabdatarows"><td><b>'.$row3['xassignname'].'</b></td>';
        echo '<td>'.$row3['xassigndesc'].'</td>';
        echo '<td>'.$row3['xassignmax'].'</td>';
        $date=$row3['xassigndate'];
        $day=date('j', strtotime($date));
        $month=date('F', strtotime($date));
        $month3=substr($month,0,3);
        $year=date('Y', strtotime($date));
        $dayname=date('l', strtotime($date));
        $dayname3=substr($dayname,0,3);
        echo '<td>'.$day.' '.$month3.' '.$year.' ('.$dayname3.')</td>';
        echo '<td>'.date("g:i a" ,strtotime($row3['xassigntime'])).'</td>';


      $queryrow3=mysqli_fetch_array($queryresult3);  
     // echo '<script>alert("check for closed Time '.$queryrow3[0].' ctime='.$cdateandtime2.'")</script>';
       /*if($queryrow3[0]>=$cdateandtime2) 
       {   // echo '<script>alert("YES")</script>';
          echo '<td><label style="color:#151be1"><b>Open Now2</b></label></td>';
        }
        else 
        {
          echo '<td><label style="color:red">Closed</label></td>';
        }*/
        
        //Questionairre
        if($row3['xassignattach']==NULL)
        {
          echo '<td><em style="color:gray">-Not Uploaded-</em></td>';
        }
        else
        {
          echo '<td><a href="xtutorviewassign.php?assignfile='.$row3['xassignattach'].'"><b style="color: #1e40eb ">'.$row3['xassignattach'].'</b></a></td>';
        }

        //Student submission
        if($row3['xassign_answr']==NULL)//no record in subm table corresponding to a given testid
        {
          echo '<td><em style="color:gray">-Not Attached-</em></td>';
         }
         else if($row3['xassign_answr_status']==-1)//ur deleted
         {
          echo '<td><label style="color:red">Deleted!</label></td>';
         }
        else if($row3['xassign_answr_status']==1)//ur attachmnt
        {
          echo '<td><a href="xstudviewassign.php?assignfile='.$row3['xassign_answr'].'"><b style="color: #1e40eb ">'.$row3['xassign_answr'].'</b></a></td>';
         }
        else
        {                                                      
           echo '<td><em style="color:gray">-----</em></td>';
        }
 
        $j=$j+1;
       
    }
    if($j < $q2rowcount[0] )
      {
         $myq2="SELECT xassignid,xassignname,xassigndesc,xassigndate,xassigntime,xassignmax,xassignattach,CONCAT(CONCAT(xassigndate,' '),xassigntime) from tblXAssignment JOIN tblXSubmassign ON tblXAssignment.xassignid=tblXSubmassign.xsubm_assignid where xassigngid='$grpr2[0]' AND xassignstatus=1 AND xassignid NOT IN (SELECT xsubm_assignid from tblXSubmassign where xsubmassign_gid='$grpr2[0]' AND xsubmassign_gstudid='$sql1row[0]')";
         $myq2result=$conn->query($myq2);

         $query3="SELECT CONCAT(CONCAT(xassigndate,' '),xassigntime) FROM tblXAssignment where xassigngid='$grpr2[0]' AND xassignstatus=1 ORDER BY CONCAT(CONCAT(xassigndate,' '),xassigntime) DESC";
        $queryresult3=$conn->query($query3);

        while($myq2row=mysqli_fetch_array($myq2result))
        {
           foreach($todoname as $value1)
           {
             if($value1==$myq2row[0])
             {
              //echo '<script>alert("'.$myq2row['xassignid'].'AND '.$myq2row['xassignname'].'")</script>';
               echo '<tr class="tabdatarows"><td><b>'.$myq2row['xassignname'].'</b></td>';
        echo '<td>'.$myq2row['xassigndesc'].'</td>';
        echo '<td>'.$myq2row['xassignmax'].'</td>';
        $date=$myq2row['xassigndate'];
        $day=date('j', strtotime($date));
        $month=date('F', strtotime($date));
        $month3=substr($month,0,3);
        $year=date('Y', strtotime($date));
        $dayname=date('l', strtotime($date));
        $dayname3=substr($dayname,0,3);
        echo '<td>'.$day.' '.$month3.' '.$year.' ('.$dayname3.')</td>';
        echo '<td>'.date("g:i a" ,strtotime($myq2row['xassigntime'])).'</td>';


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
        if($myq2row['xassignattach']==NULL)
        {
          echo '<td><em style="color:gray">-Not Uploaded-</em></td>';
        }
        else
        {
          echo '<td><a href="xtutorviewassign.php?assignfile='.$myq2row['xassignattach'].'"><b style="color: #1e40eb ">'.$myq2row['xassignattach'].'</b></a></td>';
        }

        echo '<td><em style="color:gray">-Not Attached-</em></td>';

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