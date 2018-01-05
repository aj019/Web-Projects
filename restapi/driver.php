<?php

	$qstring = $_GET['qstring'];

	$conn=new mysqli('localhost','anuj','9654018751','webscraper');

	if(!$conn){

		die("Connection error:".mysqli_connect_error());
	}

	$query = "SELECT * FROM `driver` WHERE qstring='$qstring' ";
	$result =$conn->query($query);
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);

?>