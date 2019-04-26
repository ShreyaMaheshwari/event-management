<?php
   session_start();
   
   session_destroy();
      header("Location: login.php");
   session_start();
   $_SESSION['valid']=1;
   
?>