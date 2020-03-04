<?php
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );

	$conn = mysqli_connect("localhost","root", "", "streetbooks") or die ('Sunucuya Bağlanamadım.'); 
	
	
?>