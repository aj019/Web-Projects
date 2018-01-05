<?php

include('dbConnect.php');

$name = $_GET['name'];
$email = $_GET['email'];
$number = $_GET['number'];
$pass = md5($_GET['pass']);
$timestamp = date("Y-m-d h:i:s");
 $query = "INSERT INTO `users`(id,name,email,phone_number,password,create_date) VALUES('','$name','$email','$number','$pass','$timestamp')";
 
 if($conn->query($query)==TRUE){
		$response = array();
		$response['response'] = "200";
		echo json_encode($response);
	}
	else{
		$response = array();
		$response['response'] = "404";
		echo json_encode($response); 
	}

?>