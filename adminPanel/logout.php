<?php
  session_start();
  ob_start();
  session_destroy();
  header("Location:logoutt.php");
  ob_end_flush();
?>