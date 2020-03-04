 <?php
 
  $user = "1";
  $pass = "1";
	
  session_start();
  ob_start();
  if(($_POST["user"]==$user) and ($_POST["password"]==$pass)){
	  $_SESSION["login"] = "true";
	  $_SESSION["user"] = $user;
	  $_SESSION["pass"] = $pass;
	  header("Location:admin.php");
  }
  else{
	  header("Location:wrongPass.php");
  }
  ob_end_flush();
  
  ?>