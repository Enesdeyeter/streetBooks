<head>
 <link href="css/main.css" rel="stylesheet">
</head>
<?php
	include('../inc/baglan.php');
	
	if(@$_GET[id]){
		mysqli_query($conn,"delete from uyeler where id='$_GET[id]'");
		header("location:uyeSil.php");
	}
	
?>