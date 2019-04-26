

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
    <h2 style="background-color: #E5E8E8; color: #17202A; padding: 10px;border-radius: 10px;">My details</h2>
<?php
        session_start(); 
        $db = pg_connect("host=localhost port=5432 dbname=event_management user=postgres password=saipriya@143");
        //$user_check = $_SESSION['login_user'];
        $id=$_SESSION['oid'];
        $sql = "SELECT oname,ophone,oemail,opassword,ocollege FROM organiser WHERE oid='$id';";
        $result = pg_query($db, $sql);
        $row = pg_fetch_row($result);
        //echo '<div class="eves">'.$row[0].$row[1].$row[2].$row[3].$row[4].$row[5].'</div>';
        //echo $id;
            //echo "<hr>";

      echo '<form action="update_org.php" method="POST">';
      echo '<label>';
      echo '<span style="font-size:15px">Name</span>';
      echo '<input type="text" name="name" value="'.$row[0].'" disabled><br>';
      echo '</label>';

      echo '<label>';
      echo '<span style="font-size:15px">Phone number</span>';
      echo '<input type="tel" name="tel" value="'.$row[1].'" disabled><br>';
      echo '</label>';

      echo '<label>';
      echo '<span style="font-size:15px">e mail</span>';
      echo '<input type="email" name="email" value="'.$row[2].'" disabled><br>';
      echo '</label>';

      echo '<label>';
      echo '<span style="font-size:15px">password</span>';
      echo '<input type="password" name="password" value="'.$row[3].'" disabled><br>';
      echo '</label>';

      echo '<label>';
      echo '<span style="font-size:15px">college</span>';
      echo '<input type="text" name="college" value="'.$row[4].'" disabled><br>';
      echo '</label>';

      // echo '<label>';
      // echo '<span style="font-size:15px">Id</span>';
      // echo '<input type="text" name="sid" value="'.$row[6].'" disabled><br>';
      // echo '</label>';


      echo '<button type="button" style="background-color:#17202A; width:25%;" onClick="edit()">Edit</button>';
      echo '<br><button type="submit" style="background-color:#17202A; width:25%;">Submit</button>';


      echo '</form>';
    ?>
  <script type="text/javascript">
      function edit() {
        for (var i = 0; i < 7; i++) {
          document.getElementsByTagName("input")[i].removeAttribute("disabled");
          // document.getElementsByTagName("input")[i].setAttribute("value", "");     
        }
      }
    </script>
</div>

</body>
</html>