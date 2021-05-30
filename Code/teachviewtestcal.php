<!DOCTYPE html>
<?php
$gname=$_GET['gname'];
include 'connection.php';
include "insidegrpcommon.php";

$gname=$_GET['gname'];
$gid=$_GET['gid'];
$uid=$_SESSION['userid'];
?>
  <head>
    <!--<title>Hello</title>-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="css1/demo.css"/>
    <link rel="stylesheet" href="css1/theme3.css"/>
  </head>
  <body style="color:black">
      <br>
  <center>
    <div id="caleandar" style="margin-left:200px;margin-top:70px;background-color: green">
    
    </div>
  </center>
    <script type="text/javascript" src="js1/caleandar.js"></script>
    
    <?php
/*include 'connection.php';

$email=$_SESSION['email'];
$qry="delete from tblleavecount";
$res=mysql_query($qry);
$qry="select lid,leaveType,daysAllowed from tblleave where status='1'";
$res=mysql_query($qry);
 while ($row=mysql_fetch_array($res))
 {
    $qryy="insert into tblleavecount(lId,leaveType,daysAllowed) values('$row[0]','$row[1]','$row[2]') ";
    $ress=mysql_query($qryy);
 }
$qry="select lid,daysAllowed from tblleavecount";
$res=mysql_query($qry);
while ($row=mysql_fetch_array($res))
 {
    $qryy="select count(*) from tblleavedates where leaveId in(select leaveId from tblleaveapplied where eEmail='$email' and lId='$row[0]') ";
    $ress=mysql_query($qryy);
    while ($roww=mysql_fetch_array($ress))
    {
        $qry11="update tblleavecount set daystaken='$roww[0]',balance=('$row[1]'-'$roww[0]') where lId='$row[0]'";
        $res11=mysql_query($qry11);
    }
 }
*/

date_default_timezone_set('Asia/Kolkata');
$cdateandtime=date('Y-m-d').' '.date('H:i:s');

/*$uid=$_SESSION['userid'];
$inst="SELECT teachinstemail from tblTeacher where teachemail='$uid'";
$instresult=$conn->query($inst);
$instr1=mysqli_fetch_array($instresult);

$grpid="SELECT gid from tblGroup where gname='$gname' AND ginstemail='$instr1[0]' AND g_host_email='$uid'";
$grpresult=$conn->query($grpid);
$grpr2=mysqli_fetch_array($grpresult);*/

$qry="SELECT DATE_FORMAT(testdate,'%Y,%m,%d'),CONCAT(CONCAT(CONCAT(CONCAT(testname,'<br>'),DATE_FORMAT(teststarttime,'%I %p'),' -- '),DATE_FORMAT(testendtime,'%I %p'))) from tblTest where testgid='$gid' and teststatus=1 AND CONCAT(CONCAT(testdate,' '),teststarttime)>='$cdateandtime'";
//$res=mysql_query($qry);
$res=$conn->query($qry);
$a=array();
while($row=mysqli_fetch_array($res))
{
    
    array_push($a,$row[0],$row[1]);
}
?>

<script type="text/javascript">
debugger;
    var jArray = <?php echo json_encode($a); ?>;
var events=[];
    for(var i=0; i<jArray.length; i+=2){
     events.push({'Date': new Date(jArray[i]),'Title':jArray[i+1]});
//        {'Date': new Date('2020/06/12')}
 
    }    
var settings = {};
var element = document.getElementById('caleandar');
caleandar(element, events, settings);

 </script>

 <!--br>
  <center>
 <div style="padding: 10px; margin-top: 400px;" >
        <table border='1' style="background-color: #efefef;">
            <tr style="background-color: #ca0000; color: white;">
            <th colspan='34'>Your leave status</th>
        </tr>
        <tr>
            <th>Leave type</th>
            <th>Days allowed</th>
            <th>Leave taken</th>
            <th>Leave balance</th>
        </tr>
        <?php 
        /*$qryy="select * from tblleavecount";
        $ress=mysql_query($qryy);
        while ($roww=mysql_fetch_array($ress))
        {
            echo '<tr>';
            echo '<td>'.$roww[1].'</td>';
            echo '<td>'.$roww[2].'</td>';
            echo '<td>'.$roww[3].'</td>';
            echo '<td>'.$roww[4].'</td>';
            echo '</tr>';
        }*/
        ?>
    </table>
 </div>
  </center-->
  </body>
</html>
