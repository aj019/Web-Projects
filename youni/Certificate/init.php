<?php

	$conn=new mysqli('localhost','root','','youni');

	if(!$conn){

		die("Connection error:".mysqli_connect_error());
	}

?>