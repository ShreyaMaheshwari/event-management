<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Payment Form</title>
  <link rel="stylesheet" type="text/css" href="css/home_css.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="header" align="right">
    <a href="home_stu.php" class="header_links">Home</a>
    <a href="logout.php" class="header_links">Logout</a>
    <a href="myacc.php" class="header_links">My Account</a>
    <a href="book_stu.php" class="header_links" style="color: #e15b00; border-bottom: 2px solid #e15b00;">Book an event</a>
    <a href="home.html" class="header_links">About</a>
    <i class='fas fa-calendar-alt' style='font-size:35px;color:#E5E8E8;position: absolute;left: 25px; top: 8px'><span style="font-size: 25px; font-weight: 500">&nbsp;&nbsp;EM</span></i>
  </div>

    <div style="margin-top: 30px;">
      <h2>Payment Details</h2>
      <form action="payment.php" method="POST">
      <!-- <label>
        <span>Amount</span>
        <?php  
        echo '<input type="text" name="amount" value="'.$_SESSION['fee'].'"  disabled />';
        ?>
      </label> -->
      <label>
        <span>Card number</span>
        <input type="text" name="cardnum"  placeholder="0000-1111-2222-3333" required />
      </label>
      <label>
        <span>Name</span>
        <input type="text" name="name" required />
      </label>
      <label>
        <span>CVV</span>
        <input type="password" name="password" required />
      </label>
      <label>
        <span>Expiry Date</span>
        <input type="datetime" name="expdate" required />
      </label>
      <br>
      <button type="submit" class="submit">Confirm Payment</button>
    </form>
    </div>
  </div>
</div>
</body>

</html