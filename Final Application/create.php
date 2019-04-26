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
    <a href="myacc_org.php" class="header_links">My Account</a>
    <a href="create.php" class="header_links" style="color: #e15b00; border-bottom: 2px solid #e15b00;">Create Event</a>
    <a href="home_org.php" class="header_links">About</a>
    <i class='fas fa-calendar-alt' style='font-size:35px;color:#E5E8E8;position: absolute;left: 25px; top: 8px'><span style="font-size: 25px; font-weight: 500">&nbsp;&nbsp;EM</span></i>
  </div>
<div class="cont">
  <div class="form sign-in" style="width: 100%;">
    <h2 style="background-color: #E5E8E8; color: #17202A; padding: 10px;border-radius: 10px;">Create an Event</h2>
    <form action="create_event.php" method="post">
    <label>
      <span>Event Name</span>
      <input type="text" name="ename" required />
    </label>
    <label>
      <span>Maximum Participation</span>
      <input type="number" name="epar" required />
    </label>
    <label>
      <span>Fee</span>
      <input type="number" name="efee" required />
    </label>
    <label>
      <span>Team Size</span>
      <input type="number" name="esize" required />
    </label>
    <label>
      <span>Event Type</span>
      <input type="text" name="etype" required />
    </label>
    <label>
      <span>Venue</span>
      <input type="text" name="evenue" />
    </label>
    <label>
      <span>Funding</span>
      <input type="number" name="efunding" required />
    </label>
    <br>
    <button type="submit" class="submit">Create</button>
  </form>
  </div>
</div>
</body>
</html>
