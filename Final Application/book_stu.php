
<html>
<head>
	<title>home</title>
	<link rel="stylesheet" type="text/css" href="css/home_css.css">
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
<!-- 	<script type="text/javascript">
		function open(id) {
		sessionStorage.setItem("EId", id);
		window.open("localhost/event/registration.php");
		}

	</script> -->
	<div id="header" align="right">
		<a href="home_stu.php" class="header_links">Home</a>
		<a href="logout.php" class="header_links">Logout</a>
		<a href="myacc.php" class="header_links">My Account</a>
		<a href="book_stu.php" class="header_links" style="color: #e15b00; border-bottom: 2px solid #e15b00;">Book an event</a>
		<a href="home_stu.php" class="header_links">About</a>
		<i class='fas fa-calendar-alt' style='font-size:35px;color:#E5E8E8;position: absolute;left: 25px; top: 8px'><span style="font-size: 25px; font-weight: 500">&nbsp;&nbsp;EM</span></i>
	</div>
	<div class="cont" style="padding: 20px;height: auto;">
		<h2 style="background-color: #E5E8E8; color: #17202A; padding: 10px;border-radius: 10px; text-align: center;">Events</h2>
	
<?php 
	session_start(); 
   	$db = pg_connect("host=localhost port=5432 dbname=event_management user=postgres password=saipriya@143");
	//$user_check = $_SESSION['login_user'];
	$user_check = '1';
	$sql = "SELECT EName, ECollege, EType, EId, EVenue, ESize from EVENT e where e.eid not in (select r.revid from registration r,team_mem t where t.sid='$user_check' and r.rid=t.rid );"; 
	$result = pg_query($db, $sql);
    $count = pg_num_rows($result);
    while($row = pg_fetch_row($result)) {
    				echo '<form action="registration.php" method="POST" class="myForm">';
    				echo '<div class="eves">';
        			$sql1 = "SELECT edate FROM EVDATE WHERE id = '$row[3]';";
        			$result1 = pg_query($db, $sql1);
        			$count1 = pg_num_rows($result);
        			echo $row[0]."<br>".$row[1]."<br>".$row[2]."<br>".$row[4]."<br>";
        			while($row1 = pg_fetch_row($result1)) {
        				echo $row1[0]."<br>";
        			}
        			echo '<br><button type="submit" class="submit" name="EId" value="'.$row[3].'"> Register </button>';
        			echo "<br></div>";
        			echo '</form>';
}
?>


			
	
	</div>
</body>
</html>