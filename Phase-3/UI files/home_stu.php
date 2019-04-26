
<html>
<head>
	<title>home</title>
	<link rel="stylesheet" type="text/css" href="css/home_css.css">
	<meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
</head>
<body>
 <?php
             session_start(); 
             $db = pg_connect("host=localhost port=5432 dbname=event_management user=postgres password=saipriya@143");

             $user_check = $_SESSION['login_user'];
      //echo $user_check."\n"; 
        $id=$_SESSION['sid'];
        $q = "SELECT sname FROM student where sid='$id';";
        $r = pg_query($db,$q);
        $row = pg_fetch_row($r);
        $_SESSION['name'] = $row[0];
        //echo $id;
        

            //echo "<hr>";
            
            
      ?>
	<div id="header" align="right">
		<a href="home_stu.php" class="header_links" style="color: #e15b00; border-bottom: 2px solid #e15b00;">Home</a>
		<a href="logout.php" class="header_links">Logout</a>
		<a href="myacc.php" class="header_links">Your Account</a>
		<a href="book_stu.php" class="header_links">Book an event</a>
		<a href="home_stu.php" class="header_links">About</a>
		<i class='fas fa-calendar-alt' style='font-size:35px;color:#E5E8E8;position: absolute;left: 25px; top: 8px'><span style="font-size: 25px; font-weight: 500">&nbsp;&nbsp;EM</span></i>
    <h3 style="text-align: left;position: relative; color: white;"> Welcome <?php echo $user_check; ?></h3>
	</div>
<div class="row">
  <div class="column left" style="background-color: white; text-align: center;border-right: solid 4px #17202A;">
    <h3>COLLEGE EVENTS</h3>
    <?php 
      $sql = "SELECT EName , EVenue, EId FROM EVENT WHERE event.ECollege =  (SELECT SCollege FROM STUDENT WHERE student.sid = '$id') and EMaxPar>(SELECT count(*) FROM REGISTRATION as R WHERE R.REvId=EVENT.EId) and NOT EXISTS (SELECT * FROM TEAM_MEM,REGISTRATION WHERE TEAM_MEM.SId='$id' and TEAM_MEM.RId=REGISTRATION.RId and EVENT.EId=REGISTRATION.REvId );";
            $result = pg_query($db, $sql);
            $count = pg_num_rows($result);
            while($row = pg_fetch_row($result)) {
              echo '<form action="registration.php" method="POST">';
              echo '<div class="eves">';
              $sql1 = "SELECT edate FROM EVDATE WHERE id = '$row[2]';";
              $result1 = pg_query($db, $sql1);
              $count1 = pg_num_rows($result);
              echo $row[0]."<br>".$row[1]."<br>";
              while($row1 = pg_fetch_row($result1)) {
                echo $row1[0]."<br>";
              }
              echo '<br><button type="submit" class="submit" name="EId" value="'.$row[2].'"> Register </button>';
              echo "<br></div>";
              echo '</form>';

            }
    ?>
  </div>
  <div class="column middle" style="background-color: white; text-align: center;">
    <h3>YOUR EVENTS</h3>
    <?php
    $sql="SELECT EName ,ECollege, EVenue, EId FROM EVENT,REGISTRATION, TEAM_MEM WHERE REvId=EId and TEAM_MEM.SId='$id' and TEAM_MEM.RId=REGISTRATION.RId;";
        $result=pg_query($db,$sql);


            $count = pg_num_rows($result);
            while($row = pg_fetch_row($result)){
              echo '<div class="eves">';
              $sql1 = "SELECT edate FROM EVDATE WHERE id = '$row[3]';";
              $result1 = pg_query($db, $sql1);
              $count1 = pg_num_rows($result);
              echo $row[0]."<br>".$row[1]."<br>".$row[2]."<br>";
              while($row1 = pg_fetch_row($result1)) {
                echo $row1[0]."<br>";}
              echo '<form action="get_members.php" method="POST">';
              echo '<button style="margin-top:20px; font-size:10px;" type="submit" class="submit" name="eid" value="'.$row[3].'">team members</button></form></div>';
            }

    ?>
  </div>
  <div class="column right" style="background-color: white; text-align: center; border-left: solid 4px #17202A;">
    <h3>RECOMMENDED EVENTS</h3>
    <?php
            $sql="SELECT EName, ECollege, EVenue, EId FROM EVENT WHERE EType in (SELECT hobby from HOBBY H WHERE H.Id='$id') and NOT EXISTS (SELECT * FROM TEAM_MEM,REGISTRATION WHERE TEAM_MEM.SId='$id' and TEAM_MEM.RId=REGISTRATION.RId and EVENT.EId=REGISTRATION.REvId );";
            $result=pg_query($db,$sql);
            $count = pg_num_rows($result);
            while($row = pg_fetch_row($result)) {
              echo '<form action="registration.php" method="POST">';
              echo '<div class="eves">';
              $sql1 = "SELECT edate FROM EVDATE WHERE id = '$row[3]';";
              $result1 = pg_query($db, $sql1);
              $count1 = pg_num_rows($result);
              echo $row[0]."<br>".$row[1]."<br>".$row[2]."<br>";
              while($row1 = pg_fetch_row($result1)) {
                echo $row1[0]."<br>";
              }
              echo '<br><button type="submit" class="submit" name="EId" value="'.$row[3].'"> Register </button>';
              echo "<br></div>";
              echo '</form>';

            }
      ?>
  </div>
</div>
</body>
</html>