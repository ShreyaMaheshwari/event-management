<?php 
   session_start();
   $db = pg_connect("host=localhost port=5432 dbname=event_management user=postgres password=saipriya@143");
  $id = $_SESSION['sid'];
  $eid = $_SESSION['eid'];

  $sql = "SELECT * from registration;";
  $q = pg_query($db,$sql);
  $count = pg_num_rows($q) + 1;
  
  $check = 1; 
  for ($i=1; $i < $_SESSION['esize'] ; $i++) { 
    $str = 'p'.$i;
      $x = $_POST[$str];
      $sql1 = "select * from student where sid = '$x';";

      $res1 = pg_query($db, $sql1);

      if(pg_num_rows($res1) == 0) {
          $check = 3;
          break;
      }
      else {
          $sql = "select * from registration r, team_mem m where m.sid = '$x' and r.rid = m.rid and r.revid='$eid';";
          $res = pg_query($db ,$sql);
          if(pg_num_rows($res) != 0) {
            $check = 2;
            break;
          }
      }
}


if($check == 1) {
  $sql = "insert into registration(revid,rid) values('$eid','$count');";
  $q = pg_query($db,$sql);

  $sql = "insert into team_mem(rid,sid) values('$count','$id');";
  pg_query($db,$sql);
  
  for ($i=1; $i < $_SESSION['esize'] ; $i++) { 
    $str = 'p'.$i;
      $x = $_POST[$str];
      $sql = "INSERT INTO TEAM_MEM VALUES('$count', '$x');";
      $res = pg_query($db,$sql);
    }
}

if($check == 1) {
  header('location: home_stu.php');
}

if($check == 2) {
  echo "One or more of the members entered are already a part of another team";
  echo "<br><a href='home_stu.php'>Back to home page</a>";
}

if($check == 3) {
  echo "User has entered invalid details";
  echo "<br><a href='home_stu.php'>Back to home page</a>";
}
if($check == 1) {
header("Location home_stu.php");
}

 ?>