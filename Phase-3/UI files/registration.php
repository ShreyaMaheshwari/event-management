<html>
<head>
	<title>home</title>
	<link rel="stylesheet" type="text/css" href="css/home_css.css">
<!-- 	<link rel="stylesheet" type="text/css" href="css/style.css">  -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
		<a href="home_stu.php" class="header_links">Home</a>
		<a href="logout.php" class="header_links">Logout</a>
		<a href="myacc.php" class="header_links">My Account</a>
		<a href="book_stu.php" class="header_links" style="color: #e15b00; border-bottom: 2px solid #e15b00;">Book an event</a>
		<a href="home.html" class="header_links">About</a>
		<i class='fas fa-calendar-alt' style='font-size:35px;color:#E5E8E8;position: absolute;left: 25px; top: 8px'><span style="font-size: 25px; font-weight: 500">&nbsp;&nbsp;EM</span></i>
	</div>
<div class="cont">
    <h2 style="background-color: #E5E8E8; color: #17202A; padding: 10px;border-radius: 10px;">Events</h2>
    <?php 
    	  error_reporting(0);
    	  session_start(); 
          $db = pg_connect("host=localhost port=5432 dbname=event_management user=postgres password=saipriya@143");
          if (isset($_SESSION['check']) && $_SESSION['check']==0) {
            echo 'alert("invalid credentials")';
          }
    	  $eid=$_POST['EId'];
          $sql="SELECT EName,ECollege,EId,Esize,Efee from EVENT WHERE EId='$eid';";
            $result=pg_query($db,$sql);
            $count = pg_num_rows($result);
            if($count==1){
              $row = pg_fetch_row($result);
              $_SESSION['ename'] = $row[0];
              $_SESSION['cname'] = $row[1];
              $_SESSION['eid'] = $row[2];
              $_SESSION['esize'] = $row[3];
              $_SESSION['efee'] = $row[4];
            }
    echo '<form action="regphp.php" method="post">';
    echo '<label>';
    echo '<label for ="number">Event name</label>';
		echo '<input type="text" id="ename" name="ename" value="'.$_SESSION['ename'].'"disabled = "disabled">';
    echo '<label for ="expmonth">College Name</label>';
         echo '<input type="text" id="cname" name="cname" value="'.$_SESSION['cname'].'"disabled = "disabled">';
            echo '<div class="row">';
              echo '<div class="col-50">';
    echo '<label for="expyear">Event fee</label>';
       echo '<input type="number" id="fee" name="fee" value="'.$_SESSION['efee'].'"disabled = "disabled">';
    
       
                echo '<label for="cvv">Event Id</label>';
                echo '<input type="text" id="id" name="id" value="'.$_SESSION['eid'].'"disabled = "disabled">';
    echo '</label>';
		
echo '<label for="amount">Team size</label>';
       echo '<input type="number" id="amt" name="amount" value="'.$_SESSION['esize'].'"disabled = "disabled"></label>';
echo '</div>';
    $i = 0;
    $count = $_SESSION['esize'];
    //$count = $row[3];
    for($i = 0; $i < $count; $i++) {
      $str = 'p'.$i;
      echo "Participant ".($i + 1)." id";
      if($i == 0){
        echo '<input type="text" name="'.$str.'" disabled value="'.$_SESSION['sid'].'"/> ';
      } 
      else{
      echo "<input type='text' name='".$str."' required>";} 
      echo "<br>"; 
    }  
echo '<button type="submit" class="submit">REGISTER</button><br><br></form>';
?>

    <button class="button"><a href= "recommend.php">FIND TEAM MATES</a></button>
  </div>

        
    </form>

</body>


</html>