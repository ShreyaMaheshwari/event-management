
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
    <a href="myacc_org.php" class="header_links">My Account</a>
    <a href="create.php" class="header_links">Create Event</a>
    <a href="home.html" class="header_links">About</a>
    <i class='fas fa-calendar-alt' style='font-size:35px;color:#E5E8E8;position: absolute;left: 25px; top: 8px'><span style="font-size: 25px; font-weight: 500">&nbsp;&nbsp;EM</span></i>
  </div>
<div class="cont">
  <h2 style="background-color: #E5E8E8; color: #17202A; padding: 10px;border-radius: 10px;">Profits</h2>
<?php 

$eid = $_POST['eid'];
session_start();
$db = pg_connect("host=localhost port=5432 dbname=event_management user=postgres password=saipriya@143");     
echo "<div class='eves'>";
echo "<table>";

$sql = "SELECT efund,efee from event where eid='".$eid."';";
$result = pg_query($db, $sql);
$row = pg_fetch_row($result);
$fund = $row[0];
$per_reg = $row[1];

echo "<tr><th>Funds</th>";
echo "<td>".$fund."</td>";
echo "</tr>";

$expenditure = 0;
$sql = "SELECT factivity, famount FROM FUNDS WHERE eid='".$eid."';";
$result = pg_query($db, $sql);
while($row = pg_fetch_row($result)) {
  $expenditure = $expenditure + $row[1];
  echo "<tr><th>(-)".$row[0].":</th>";
  echo "<td>".$row[1]."</td>";
  echo "</tr>";
}


$reg = 0;
$sql = "SELECT * FROM registration where revid = '".$eid."';";
$result = pg_query($db, $sql);
$num = pg_num_rows($result);
$reg = $num * $per_reg;

echo "<tr><th>(+)Amount from registrations</th>";
echo "<td>".$reg."</td></tr>";

$total = $fund - $expenditure + $reg;
echo "<tr class='eves' style='background-color:white;'><th>Total</th>";
echo "<td>".$total."</td></tr></table></div>"


?>
<a href="home_org.php">Get back to Home Page!</a>
</div>
</body>
</html>