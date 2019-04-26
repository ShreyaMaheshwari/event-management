<html>
<head>
  <title>home</title>
  <link rel="stylesheet" type="text/css" href="css/home_css.css">
  <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
  <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <style type="text/css">
      body{
        background-color: #E5E8E8;
        background-image: none;
      }

    </style>

</head>
<body> 
  <div id="header" align="right">
    <a href="home_stu.php" class="header_links">Home</a>
    <a href="logout.php" class="header_links">Logout</a>
    <a href="myacc.php" class="header_links">My account</a>
    <a href="book_stu.php" class="header_links" style="color: #e15b00; border-bottom: 2px solid #e15b00;">Book an event</a>
    <a href="home.html" class="header_links">About</a>
    <i class='fas fa-calendar-alt' style='font-size:35px;color:#E5E8E8;position: absolute;left: 25px; top: 8px'><span style="font-size: 25px; font-weight: 500">&nbsp;&nbsp;EM</span></i>
  </div>
<div class="cont">
  <h2 style="background-color: #E5E8E8; color: #17202A; padding: 10px;border-radius: 10px;">Recommended Participants</h2>
<?php
	session_start();
   $db = pg_connect("host=localhost port=5432 dbname=event_management user=postgres password=saipriya@143");
   $id = '1';
   //$etype=$_SESSION['Etype'];
   $etype='Quiz';
   //$eid = $_SESSION['EId'];
   $eid = '1';
  
	$sql="SELECT SName, SEmail FROM STUDENT WHERE SId in (SELECT Id FROM HOBBY H WHERE hobby='$etype') and sid != '$id' and not exists(select * from registration r, team_mem m where r.revid = '$eid' and r.rid = m.rid and m.sid = STUDENT.SId);";
	$result=pg_query($db,$sql);
       		echo "<br>";
   while($row = pg_fetch_row($result)){
              echo'<div class="eves"><table>';
        			echo '<tr><td style="padding-left:100px">'.$row[0].'</td><td style="padding-left:300px;">'.$row[1].'</td></tr>';
              echo'</table></div>';
      }

 ?>
<br>
<a href="registration.php">Get back to registering!</a>
</div>
</body>
</html>
