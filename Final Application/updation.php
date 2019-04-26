<?php

	session_start();
	$db = pg_connect("host=localhost port=5432 dbname=event_management user=postgres password=saipriya@143");  
	$team = $_POST['team'];
	$cert = $_POST['certificate'];
	$prize = $_POST['prize'];
	$oid = $_SESSION['oid'];

	if($cert == 'yes') {
		$sql = "UPDATE REGISTRATION SET rcertificate = '$cert' where rid = '$team';";
		$result = pg_query($db, $sql);
		}
	
	if($prize) {
		$sql = "UPDATE REGISTRATION SET rprize = '$prize' where rid = '$team';";
		$result = pg_query($db, $sql);
	}
	
	$sql = "SELECT * FROM UPDATES WHERE oid = '$oid' and rid='$team'";
	$result = pg_query($db, $sql);
	$count = pg_num_rows($result);

	if($count == 0) {
		$sql = "INSERT INTO UPDATES VALUES($oid, $team)";
		$result = pg_query($db, $sql);
	}

	header("location:home_org.php")
?>