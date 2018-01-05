<?php

include('dbConnect.php');

$phone_no = $_GET['phone_no'];

//Query to search for user with the following  phone no
$query = "SELECT * FROM `users` WHERE phone_number = '$phone_no'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

$response = array();

if(mysqli_num_rows($result) > 0){
	
	$user_id = $row['id'];
	
	$query1 ="SELECT * FROM `package` WHERE user_id='$user_id'";
	$result1 = mysqli_query($conn,$query1);

	

	if(mysqli_num_rows($result1) > 0){
		$packages = $conn->query($query1);
		$user_packages= array();
		
		$user_packages['connection_status'] = '200';	
		$user_packages['count'] = mysqli_num_rows($result1);
		
		while ($row3= $packages->fetch_assoc()) {
		$user_packages[]= $row3;
   		 }

   		echo json_encode($user_packages); 


	}else{
		
		$response['connection_status'] = "404";
		echo json_encode($response).mysqli_error($conn);
	}



}else{
	//If user with phone no is not present
	$response['connection_status'] = "0";
	echo json_encode($response);
}

?>