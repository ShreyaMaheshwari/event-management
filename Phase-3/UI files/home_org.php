<html>
<head>
	<title>home</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/home_css.css">
  <link rel="stylesheet" type="text/css" href="css/style.css"> 
	<meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
</head>
<body>
    
  <?php
            session_start(); 
            $db = pg_connect("host=localhost port=5432 dbname=event_management user=postgres password=saipriya@143");			
            $user_check = $_SESSION['login_user'];
        	$id=$_SESSION['oid'];    
   ?>
	<div id="header" align="right">
		<a href="home_org.php" class="header_links" style="color: #e15b00; border-bottom: 2px solid #e15b00;">Home</a>
		<a href="logout.php" class="header_links">Logout</a>
		<a href="myacc_org.php" class="header_links">My Account</a>
		<a href="create.php" class="header_links">Create Event</a>
		<a href="home_org.html" class="header_links">About</a>
		<i class='fas fa-calendar-alt' style='font-size:35px;color:#E5E8E8;position: absolute;left: 25px; top: 8px'><span style="font-size: 25px; font-weight: 500">&nbsp;&nbsp;EM</span></i>
    <h3 style="text-align: left;position: relative; color: white;"> Welcome <?php echo $user_check; ?></h3>
	</div>


<div class="row">
    <div class="column left" style="background-color: #E5E8E8; text-align: center;border-right: solid 4px #17202A;">
  </div>
  <div class="column middle" style="background-color: white; text-align: center;width:59.9%;">
    <h3>YOUR EVENTS</h3>
    <?php
    	$sql="SELECT EName ,ECollege, EVenue, e.EId FROM EVENT e, CREATES c WHERE e.eid = c.eid and c.oid = '$id'";
        $result=pg_query($db,$sql);
		$count = pg_num_rows($result);
        
        while($row = pg_fetch_row($result)){
            echo '<div class="eves"><form action="ppl_registered.php" method="POST">';  
            $sql1 = "SELECT edate FROM EVDATE WHERE id = '$row[3]';";
            $result1 = pg_query($db, $sql1);
            $count1 = pg_num_rows($result);
            echo $row[0]."<br>".$row[1]."<br>".$row[2]."<br>";
            while($row1 = pg_fetch_row($result1)) {
              echo $row1[0]."<br>";
            }
            echo '<br><button style="float:right;color:white;font-size:10px;width:175px" type="submit" class = "submit" name="eid" value="'.$row[3].'">View Registrations</button>';
            echo '</form>';
            echo "<form method='POST' action='update_eve.php'>";
            echo '<button style="color:white;font-size:10px;width:175px;" type="submit" class = "submit" name="eid2" value="'.$row[3].'">Update Registrations</button>';
            echo "</form>";
    
            echo '<form method="POST" action="funds.php">';
            echo '<button style="float:right;margin-top:0;color:white;font-size:10px;width:175px;" type="submit" class = "submit" name="eid1" value="'.$row[3].'">Allocate Funds</button>';
            echo "</form>";
            echo '<form method="POST" action="get_profit.php">';
            echo '<button style="margin-top:0;color:white;font-size:10px;width:175px;" class="submit" name="eid" value="'.$row[3].'"> Profit </button></form></div>';
        }
    ?>
</div>
  <div class="column right" style="background-color: #E5E8E8; border-left: solid 4px #17202A;">
  </div>
</div>



</body>
</html>