
<?php
/*$db = pg_connect("host=localhost port=5432 dbname=eventmanagement user=postgres password=qwer1234");

$x="STUDENT";
$y="SName";
$result = pg_query($db,"SELECT * FROM $x");
echo "<table>";
while($row=pg_fetch_row($result)){echo "<tr>";
echo "<td align='left' width='1000'>" . implode(" ",$row) . "</td>";

echo "</tr>";}echo "</table>";*/?>


<?php
   session_start();
   $db = pg_connect("host=localhost port=5432 dbname=event_management user=postgres password=saipriya@143");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form    
	  $user = $_POST['email'];
	  $password = $_POST['password']; 
      $role = $_POST['role'];


      if($role == 'student') {   
         $sql = "SELECT * FROM student WHERE SEmail = '$user' and SPassword = '$password'";
         $result = pg_query($db,$sql);
         $row = pg_fetch_row($result);
         $count = pg_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
         if($count == 1) {
            $_SESSION['login_user'] = $row[0];
            $_SESSION['sid']=$row[4];
            
            header("location: home_stu.php");
         }
         else {
            $_SESSION['valid'] = 0;
            header("location: login.php");
         }
      }
      else {
         $sql = "SELECT * FROM organiser WHERE OEmail = '$user' and OPassword = '$password'";
         $result = pg_query($db,$sql);
         $row = pg_fetch_row($result);
         $count = pg_num_rows($result);
      
      // If result matched $myuserame and $mypassword, table row must be 1 row
      
         if($count == 1) {
            $_SESSION['login_user'] = $row[0];
            $_SESSION['oid']=$row[3];
            header("location: home_org.php");
         }
         else {
            $_SESSION['valid'] = 0;
            header("location: login.php");
         }
      }
   }
?>