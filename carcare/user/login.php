<?php

include('dbConnect.php');
$email = $_GET['email'];
$pass = md5($_GET['pass']);

$query = "Select * FROM users WHERE email = '$email' AND password= '$pass' ";
$result=mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) > 0 ){
		$response = array();
		$response['status'] = "200";
		$response['name'] = $row['name'];
        $response['number'] = $row['phone_number']; 
        $response['free_wash_status'] = $row['free_wash_status'];
		echo json_encode($response);
	}
	else{
		$response = array();
		$response['status'] = "404";
		echo json_encode($response); 
	}



?>