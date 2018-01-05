<?php 

	$name = $_GET['username'];
	$storename = $_GET['storename'];
	$storeaddress = $_GET['storeaddress'];
	$storephoneno = $_GET['storephoneno'];
	$email = $_GET['email'];
	$pass = $_GET['password'];
	$date_time = date("Y-m-d H:i:s");
	$status = 1;
	$response = array();	
  	$conn=new mysqli('localhost','anuj','9654018751','webscraper');

	if(!$conn){

		die("Connection error:".mysqli_connect_error());
	}

if(empty($name) || empty($email) || empty($pass)){
	
	$response["message"] = "100";
	echo json_encode($response);	  
}
else{

	
	$query = "INSERT INTO `seller` (id,name,store_name,store_address,store_phone_no,email_id,password,status,date_time) VALUES ('','".$name."','".$storename."','".$storeaddress."','".$storephoneno."','".$email."','".$pass."','".$status."','".$date_time."')";

		  if ($conn->query($query) === TRUE) {
		    $response["message"] = "200";
		    echo json_encode($response);
		} else {
		    $response["message"] = "404";
		    echo json_encode($response);
		}
}

?>