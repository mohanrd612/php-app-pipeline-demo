<?php
	$conn = mysqli_connect("mysql-con", "root", "root", "lamp_task");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>
