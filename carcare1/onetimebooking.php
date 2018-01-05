<?php 
//This file enter the booking details in the booking table inside
include('dbConnect.php');

$phone_no = $_GET['phone_no'];
$address = $_GET['address'];
$date = $_GET['date'];
$time = $_GET['time'];
$carModel = $_GET['car_model'];
$carNumber = $_GET['car_number'];
$payment = $_GET['payment'];

//Query to search for user with the following  phone no
$query = "SELECT * FROM `users` WHERE phone_number = '$phone_no'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

$response = array();

if(mysqli_num_rows($result) > 0){
	$user_id = $row['id'];
	$free_wash_status = $row['free_wash_status'];

	//Query Insert in the Booking table the user_id,address,date and time of the car wash
	$query1 ="INSERT INTO `booking` (`user_id`,`address`,`payment`,`date`,`time`,`car_model`,`car_number`) VALUES ('$user_id','$address','$payment','$date','$time','$carModel','$carNumber')";
	
	if($conn->query($query1) == true){
		
		if($free_wash_status == 0){
			$query3 = "UPDATE `users` SET free_wash_status = 1 WHERE id = '$user_id'";
			$conn->query($query3);
		}

		

	    $mail = "User : ".$row['name'] ."<br><br>"
	    		."Phone No : ".$phone_no."<br><br>";


		$headers = "From:Youni.co.in";
		$headers .= "MIME-Version: 1.0\r\n";

		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
	    mail("junagupta19@gmail.com","FreshRide New Order",$mail,$headers);
	    $response['status'] = "200";
	    echo json_encode($response);	
	}else{
		
		$response['status'] = "404";
		echo json_encode($response).mysqli_error($conn);
	}
}else{
	//If user with phone no is not present
	$response['status'] = "0";
	echo json_encode($response);
}

?>