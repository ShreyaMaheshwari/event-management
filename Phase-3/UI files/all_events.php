<?php 
	session_start(); 
   	$db = pg_connect("host=localhost port=5432 dbname=eventmanagement user=postgres password=qwer1234");
	//$user_check = $_SESSION['login_user'];
	$user_check = '1';
	$sql = "SELECT EName, ECollege, EType, EId, EVenue, ESize from EVENT e where e.eid not in (select r.revid from registration r,team_mem t where t.sid='$user_check' and r.rid=t.rid );"; 
	$result = pg_query($db, $sql);
    $count = pg_num_rows($result);
    while($row = pg_fetch_row($result)) {
    				echo "<div>";
        			$sql1 = "SELECT edate FROM EVDATE WHERE id = '$row[3]';";
        			$result1 = pg_query($db, $sql1);
        			$count1 = pg_num_rows($result);
        			echo $row[0]."<br>".$row[1]."<br>".$row[2]."<br>".$row[3]."<br>".$row[4]."<br>";
        			while($row1 = pg_fetch_row($result1)) {
        				echo $row1[0]."<br>";
        			}
        			echo "<br></div>";
}
?>