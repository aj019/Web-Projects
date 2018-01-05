<?php

	$conn = new mysqli('localhost','root','','solar_potential');

	if(!$conn){

		die("Connection error".mysqli_error($conn));
	}

?>