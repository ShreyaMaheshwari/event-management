<?php
   //include('session.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
   	         <h1>Welcome 
   	         <?php
   	         session_start(); 
   	         $db = pg_connect("host=localhost port=5432 dbname=eventmanagement user=postgres password=qwer1234");

   	         $user_check = $_SESSION['login_user'];
			echo $user_check."\n"; 
				$id=$_SESSION['sid'];
				//echo $id;
				$sql="SELECT EName ,ECollege, EVenue, EId FROM EVENT,REGISTRATION, TEAM_MEM WHERE REvId=EId and TEAM_MEM.SId='$id' and TEAM_MEM.RId=REGISTRATION.RId;";
				$result=pg_query($db,$sql);

        		$count = pg_num_rows($result);
        		echo "<br>";
        		while($row = pg_fetch_row($result)){
        			echo "<div>";
        			$sql1 = "SELECT edate FROM EVDATE WHERE id = '$row[3]';";
        			$result1 = pg_query($db, $sql1);
        			$count1 = pg_num_rows($result);
        			echo $row[0]."<br>".$row[1]."<br>".$row[2]."<br>";
        			while($row1 = pg_fetch_row($result1)) {
        				echo $row1[0]."<br>";
        			}
        			echo "<br></div>";
        		}

        		echo "<hr>";
        		$sql = "SELECT EName , EVenue, EId FROM EVENT WHERE event.ECollege =  (SELECT SCollege FROM STUDENT WHERE student.sid = '$id') and EMaxPar>(SELECT count(*) FROM REGISTRATION as R WHERE R.REvId=EVENT.EId) and NOT EXISTS (SELECT * FROM TEAM_MEM,REGISTRATION WHERE TEAM_MEM.SId='$id' and TEAM_MEM.RId=REGISTRATION.RId and EVENT.EId=REGISTRATION.REvId );";
        		$result = pg_query($db, $sql);
        		$count = pg_num_rows($result);
        		while($row = pg_fetch_row($result)) {
        			$sql1 = "SELECT edate FROM EVDATE WHERE id = '$row[2]';";
        			$result1 = pg_query($db, $sql1);
        			$count1 = pg_num_rows($result);
        			echo $row[0]."<br>".$row[1]."<br>".$row[2]."<br>";
        			while($row1 = pg_fetch_row($result1)) {
        				echo $row1[0]."<br>";
        			}
        			echo "<br></div>";
        		}
      			
echo "<hr>";

      			$sql="SELECT EName, ECollege, EVenue, EId FROM EVENT WHERE EType in (SELECT hobby from HOBBY H WHERE H.Id='$id') and NOT EXISTS (SELECT * FROM TEAM_MEM,REGISTRATION WHERE TEAM_MEM.SId='$id' and TEAM_MEM.RId=REGISTRATION.RId and EVENT.EId=REGISTRATION.REvId );";
      			$result=pg_query($db,$sql);
        		$count = pg_num_rows($result);
        		while($row = pg_fetch_row($result)) {
        			$sql1 = "SELECT edate FROM EVDATE WHERE id = '$row[3]';";
        			$result1 = pg_query($db, $sql1);
        			$count1 = pg_num_rows($result);
        			echo $row[0]."<br>".$row[1]."<br>".$row[2]."<br>";
        			while($row1 = pg_fetch_row($result1)) {
        				echo $row1[0]."<br>";
        			}
        			echo "<br></div>";
        		}
        
          $eid=$_SESSION['EId'];
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


			?>
			</h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>