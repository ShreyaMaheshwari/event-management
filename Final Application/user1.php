<?php 
	session_start();
   $db = pg_connect("host=localhost port=5432 dbname=event_management user=postgres password=saipriya@143");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
   		
   		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$telephone = $_POST['tel'];
		$college = $_POST['college'];
		$stream = $_POST['stream'];
		$hobby = $_POST['hobby'];
		//echo $hobby;
		//$h = count($_POST);

		// echo $hobby;


		
 	/*if(isset($_POST['submit'])){
   		$hobby = $_POST['hobby'];
   		foreach ($hobby as $hobys=>$value) {
             echo "Hobby : ".$value."<br />";
        }
       
  	}
  	*/
		$sql = "SELECT * FROM STUDENT;";
		$result = pg_query($db, $sql);
		$row = pg_fetch_row($result);
        $count = pg_num_rows($result) + 1;
      

		$sql = "INSERT INTO STUDENT VALUES('$name', $telephone, '$email', '$stream', '$count', '$password', '$college');";
		$result1 = pg_query($db,$sql);


	foreach ($hobby as $value) {
  		//echo "$value <br>";
  		$sql = "INSERT INTO HOBBY VALUES('$count', '$value');";
		$result = pg_query($db, $sql);
	}

// $sql = "INSERT INTO HOBBY VALUES('$count', 'strval($i)');";
// 				$result = pg_query($db, $sql);

		$sql = "SELECT * FROM STUDENT WHERE SId = '$count';";
        $result = pg_query($db,$sql);
        $row = pg_fetch_row($result);
		
		$_SESSION['login_user'] = $row[0];
		$_SESSION['sid'] = $row[4]; //student name
			//student id
         
        header("location: home_stu.php");
}

?>