<?php
   session_start();
   unset($_SESSION['userid']);
   session_destroy();
   // if(session_destroy())
   // {
   header("Location: login.php");
   // set($_SESSION['id']);
   // }
?>   
