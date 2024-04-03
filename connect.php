<?php 
	$connection = new mysqli('localhost', 'root','','dbomictinf3');
	
	if (!$connection){
		die (mysqli_error($mysqli));
		
	}
		
?>