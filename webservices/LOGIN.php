<?php 

	
	$email = $_GET['email'];
	$password = $_GET['password'];
	$response = array();	
  	$conn=new mysqli('localhost','anuj','9654018751','webscraper');

	if(!$conn){

		die("Connection error:".mysqli_connect_error());
	}

if(empty($email) || empty($password)){
	
	$response["message"] = "100";
	echo json_encode($response);	  
}
else{

	
	$query = "SELECT id FROM `seller` WHERE email_id = '".$email."' AND password = '".$password."'";
	$result = mysqli_query($conn,$query);

		if($result->num_rows > 0){
		    $response["message"] = "200";
		    $row = mysqli_fetch_assoc($result);
		    $response['seller_id'] = $row['id'];
		    echo json_encode($response);
		} else {
		    $response["message"] = "404";
		    echo json_encode($response);
		}
}

?>