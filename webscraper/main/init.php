<?php

	$conn=new mysqli('localhost','root','','webscraper');

	if(!$conn){

		die("Connection error:".mysqli_connect_error());
	}

?>