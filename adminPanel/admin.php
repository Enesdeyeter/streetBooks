<?php
  
  session_start();
  if(!isset($_SESSION["login"])){
	header("Location:block.php");
	header("Refresh: 2; url=index.php");
  }
  
  else{
	header('Location:icerik/index.php');
  }
   
?>
	

