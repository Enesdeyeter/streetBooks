<head>
 <link href="css/main.css" rel="stylesheet">
</head>
<?php
	include('../inc/baglan.php');
	
	if(@$_GET[id]){
		mysqli_query($conn,"delete from sss where id='$_GET[id]'");
		header("location:sssSil.php");
	}
	
?>