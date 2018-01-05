<?php 

	
	$email = $_GET['email'];
	$password = $_GET['password'];
	$response = array();	
  	$conn=new mysqli('localhost','root','','book');

	if(!$conn){

		die("Connection error:".mysqli_connect_error());
	}

if(empty($email) || empty($password)){
	
	$response["message"] = "100";
	echo json_encode($response);	  
}
else{

	
	$query = "SELECT id FROM `seller` WHERE email_id = '".$email."' AND password = '".$password."'";
	$result = $conn->query($query);
	$row = mysqli_fetch_assoc($result);
	echo $row['id'];

		
}

?>