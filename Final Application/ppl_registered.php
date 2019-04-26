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
    <a href="home_org.php" class="header_links" style="color: #e15b00; border-bottom: 2px solid #e15b00;">Home</a>
    <a href="logout.php" class="header_links">Logout</a>
    <a href="myacc_org.php" class="header_links">My account</a>
    <a href="create.php" class="header_links">Create Event</a>
    <a href="home_org.php" class="header_links">About</a>
    <i class='fas fa-calendar-alt' style='font-size:35px;color:#E5E8E8;position: absolute;left: 25px; top: 8px'><span style="font-size: 25px; font-weight: 500">&nbsp;&nbsp;EM</span></i>
  </div>
<div class="cont">
  <h2 style="background-color: #E5E8E8; color: #17202A; padding: 10px;border-radius: 10px;">Registered students</h2>
<?php 
	
	session_start(); 
    $db = pg_connect("host=localhost port=5432 dbname=event_management user=postgres password=saipriya@143");			


    if(isset($_POST['eid'])) {
    	$id = $_POST['eid'];
		$sql="SELECT r.rid, s.sname from student s, team_mem m, registration r where s.sid = m.sid and r.rid = m.rid and r.revid = '$id'";
	    $result=pg_query($db,$sql);
	    $i = 1;
	    $row = pg_fetch_row($result);
	    echo "<div class='eves'><table><tr><th>Team number</th><th>Team id</th><th>Member Names</th></tr><tr>";
	    $team_prev = $row[0];
	    echo "<td>".$i."</td><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
		while($row = pg_fetch_row($result)) {
			if($team_prev == $row[0]) {
				echo "<tr><td></td><td></td><td>".$row[1]."</td></tr>";
			}
			else {
				echo "<tr><td>".$i."</td><td>".$row[0]."</td><td>".$row[1]."</td></tr></table></div>";
				$team_prev = $row[0];
			}
			$i=$i+1;
		}
		// echo '<a href="home_org.php">Get back home!</a>';
	}
?>
</div>
</body>
</html>
