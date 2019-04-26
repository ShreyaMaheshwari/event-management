<!DOCTYPE html>
<html lang="en" >

<?php 
  session_start();
  if(isset($_SESSION['valid'])){

  //echo "<script>console.log(".$_SESSION['valid'].");</script>";
  
  if(!($_SESSION['valid'])){
  echo "<script language='javascript'>";
  echo "alert('Invalid credentials');";
  echo "</script>";}
  $_SESSION['valid'] = 1;

  if($_SESSION['valid'] and isset($_SESSION['oid'])) {
    header('Location: home_org.php');
  }
  if($_SESSION['valid'] and isset($_SESSION['sid'])) {
    header('Location: home_stu.php');
  }
  }
?>

<head>
  <meta charset="UTF-8">
  <title>Login/Registration Form</title>
  <link rel="stylesheet" type="text/css" href="css/home_css.css">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div id="header" align="right">
    <a href="home.html" class="header_links">About</a>
    <i class='fas fa-calendar-alt' style='font-size:35px;color:#E5E8E8;position: absolute;left: 25px; top: 8px'><span style="font-size: 25px; font-weight: 500">&nbsp;&nbsp;EM</span></i>
  </div>
<div class="cont">
  <div class="form sign-in">
    <h2>Welcome back,</h2>
    <form action="user.php" method="POST">
    <label>
      <span>Email</span>
      <input type="email" name="email" />
    </label>
    <label>
      <span>Password</span>
      <input type="password" name="password" />
    </label>
    <br>
    <label>
    <span style='text-align: middle;'>
      Organiser&nbsp;<input type='radio' name='role' value='organiser' style="display: inline-block;width: 5%" checked>
      &nbsp;&nbsp;
      Student&nbsp;<input type='radio' name='role' value='student' style="display: inline-block;width: 5%">
    </span>
  </label>
    <button type="submit" class="submit">Sign In</button>
  </form>
  </div>

  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <h2>New here?</h2>
        <p>Sign up and discover great amount of new opportunities!</p>
      </div>
      <div class="img__text m--in">
        <h2>One of us?</h2>
        <p>If you already has an account, just sign in. We've missed you!</p>
      </div>
      <div class="img__btn">
        <span class="m--up">Sign Up</span>
        <span class="m--in">Sign In</span>
      </div>
    </div>
    <div class="form sign-up">
      <h2>Time to feel like home,</h2>
      <form action="user1.php" method="POST">
      <label>
        <span>Name</span>
        <input type="text" name="name" required />
      </label>
      <label>
        <span>Email</span>
        <input type="email" name="email" required />
      </label>
      <label>
        <span>Password</span>
        <input type="password" name="password" required/>
      </label>
      <label>
        <span>Phone number</span>
        <input type="tel" name="tel" required />
      </label>
      <label>
        <span>College</span>
        <input type="text" name="college" required/>
      </label>
      <label>
        <span>Stream</span>
        <input type="text" name="stream" required />
      </label>
      <br>
    <div class="label">
    <span style='text-align: middle;'>
      Quiz&nbsp;<input type='checkbox' name='hobby[]' value='Quiz' style="display: inline-block;width: 5%">
      &nbsp;&nbsp;&nbsp;
      Robotics&nbsp;<input type='checkbox' name='hobby[]' value='Robotics' style="display: inline-block;width: 5%">
      &nbsp;&nbsp;&nbsp;
      Design&nbsp;<input type='checkbox' name='hobby[]' value='Design' style="display: inline-block;width: 5%">
      &nbsp;&nbsp;&nbsp;
      Music&nbsp;<input type='checkbox' name='hobby[]' value='Music' style="display: inline-block;width: 5%">
      &nbsp;&nbsp;&nbsp;
      Literary&nbsp;<input type='checkbox' name='hobby[]' value='Literary' style="display: inline-block;width: 5%">
      &nbsp;&nbsp;&nbsp;
      Sports&nbsp;<input type='checkbox' name='hobby[]' value='Sports' style="display: inline-block;width: 5%">
      &nbsp;&nbsp;&nbsp;
      Drama&nbsp;<input type='checkbox' name='hobby[]' value='Drama' style="display: inline-block;width: 5%">
      &nbsp;&nbsp;&nbsp;
      Technical&nbsp;<input type='checkbox' name='hobby[]' value='Technical' style="display: inline-block;width: 5%">
    </span>
    </div>
      <button type="submit" class="submit">Sign Up</button>
    </form>
    </div>
  </div>
</div>
<script src="js/index.js"></script>
</body>

</html>
