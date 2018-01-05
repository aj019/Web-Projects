<?php 
	  $qstring = $_GET['qstring'] ;
	$conn = new mysqli('localhost','root','','hackathon');

	if(!$conn){

		die("Connection error");
	}

	$query= "SELECT review.* FROM review INNER JOIN driver on driver.id=review.driver_id Where driver.qstring ='".$qstring."'  ";
	$result = $conn->query($query);

	while($row as $result->fetch_object){
		$res1[] = $row;
	}

	print_r($res);
?>