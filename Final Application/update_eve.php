<html>
<head>
  <title>home</title>
  <link rel="stylesheet" type="text/css" href="css/home_css.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
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
    <a href="home_org.php" class="header_links">Home</a>
    <a href="logout.php" class="header_links">Logout</a>
    <a href="myacc_org.php" class="header_links" style="color: #e15b00; border-bottom: 2px solid #e15b00;">My Account</a>
    <a href="create.php" class="header_links">Create Event</a>
    <a href="home_org.php" class="header_links">About</a>
    <i class='fas fa-calendar-alt' style='font-size:35px;color:#E5E8E8;position: absolute;left: 25px; top: 8px'><span style="font-size: 25px; font-weight: 500">&nbsp;&nbsp;EM</span></i>
  </div>
  <div class="cont" style="padding: 20px;height: auto;" align="center">
    <h2 style="background-color: #E5E8E8; color: #17202A; padding: 10px;border-radius: 10px;">Update registration</h2>

<?php  
   session_start();
   $db = pg_connect("host=localhost port=5432 dbname=event_management user=postgres password=saipriya@143");
   $eid = $_POST['eid2'];
   $sql = "SELECT r.rid from registration r where r.revid = '$eid';";
   $result = pg_query($db, $sql);
   echo "<form action='updation.php' method='POST'>";
   echo "<label>Team  &nbsp;<select name='team'>";
   while($row = pg_fetch_row($result)) {
   		echo "<option value='".$row[0]."'>".$row[0];
   }
   echo "</select></label>";
   echo "<br>Certificate";
   echo "<input style='display: inline-block;width: 5%' type='radio' name='certificate[]' value='yes' checked>Yes";
   echo "<input style='display: inline-block;width: 5%' type='radio' name='certificate[]' value='no'>No";
   echo "<br><label>Prize <input type='text' name='prize' required /></label>";
   echo "<br><button style='background-color:#17202A' type='submit'>Submit</button>";
   echo "</form>";
 ?>
</div>
</body>
</html>