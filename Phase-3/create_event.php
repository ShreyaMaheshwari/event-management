<?php 
	
	session_start(); 
    $db = pg_connect("host=localhost port=5432 dbname=event_management user=postgres password=saipriya@143");			
    $ename = $_POST['ename'];
    $epar = $_POST['epar'];
    $efee = $_POST['efee'];
    $esize = $_POST['esize'];
    $etype = $_POST['etype'];
    $evenue = $_POST['evenue'];
    $efunding = $_POST['efunding'];
    $oid = $_SESSION['oid'];

    $sql = "SELECT * FROM event";
    $result=pg_query($db,$sql);
    $eid = pg_num_rows($result) + 1;

    $sql = "SELECT ocollege from organiser where OId = '$oid'";
    $result = pg_query($db, $sql);
    $row = pg_fetch_row($result);
    $ecollege = $row[0];

    $sql = "INSERT INTO EVENT VALUES('$ename', '$epar', '$efee', '$esize', '$etype', '$evenue', '$eid', '$efunding', '$ecollege');";
    $result = pg_query($db, $sql);

    $sql = "INSERT INTO CREATES VALUES('$eid', '$oid');";
    $result = pg_query($db, $sql);

    header("Location: create.php");
?>




