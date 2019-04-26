<?php 

session_start();
$db = pg_connect("host=localhost port=5432 dbname=event_management user=postgres password=shreya");  
$eid = $_SESSION['eid'];
$activity = $_POST['activity'];
$amount = $_POST['amount'];

$sql = "INSERT INTO FUNDS VALUES('$eid', '$activity', '$amount');";
echo $sql;
$result = pg_query($db, $sql);

header('Location:home_org.php');
?>
