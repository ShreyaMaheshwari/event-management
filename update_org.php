<?php  
	session_start();
   $db = pg_connect("host=localhost port=5432 dbname=event_management user=postgres password=saipriya@143");
   		
   		if($_SERVER["REQUEST_METHOD"] == "POST"){
   		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$telephone = $_POST['tel'];
		$college = $_POST['college'];
		$id=$_SESSION['sid'];

		$sql = "UPDATE organiser SET oname='$name',ophone='$telephone', oemail='$email', opassword='$password', ocollege='$college' WHERE oid = '$id';";
		//echo "hello";
		$result = pg_query($db, $sql);}
		header("location: myacc_org.php");


 ?>