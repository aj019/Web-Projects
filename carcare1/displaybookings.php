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

	$query2 = "SELECT * FROM `booking` WHERE user_id='$user_id' ";
	$result2 = mysqli_query($conn,$query2);

	if(mysqli_num_rows($result2) > 0){

		$bookings = $conn->query($query2);
		$user_bookings= array();
		$user_bookings['connection_status'] = '200';	
		$user_bookings['count'] = mysqli_num_rows($result2);
		
		while ($row3= $bookings->fetch_assoc()) {
		$user_bookings[]= $row3;
   		 }

   		echo json_encode($user_bookings); 


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