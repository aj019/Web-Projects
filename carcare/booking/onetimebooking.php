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

function sendMail($user_id,$user_name,$user_phoneno,$address,$payment,$date,$time){

	
	$to = 'junagupta19@gmail.com';
    $message = 'New order'.'<br>';
    $message .= 'user_id : '.$user_id.'<br>';
    $message .= 'username : '.$user_name.'<br>';
    $message .= 'phone no : '.$user_phoneno.'<br>';
    $message .= 'payment : '.$payment.'<br>';
    $message .= 'address : '.$address.'<br>';
    $message .= 'date : '.$date.'<br>';
    $message .= 'time : '.$time.'<br><br>';
    $message .= 'Link  : <a href="youni.co.in/carcare/booking/neworders.php">Check out Free Car Wash Booking Details </a><br>';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= 'From: FreshRide <freshride.in>' . "\r\n";
    
    
    mail('junagupta19@gmail.com', 'Freshride New Order Imp', $message, $headers);
    mail('sameer.sadana9@gmail.com', 'Freshride New Order Imp', $message, $headers);
    mail('kushansingh22@gmail.com', 'Freshride New Order Imp', $message, $headers);
    
}

if(mysqli_num_rows($result) > 0){
	$user_id = $row['id'];
	$free_wash_status = $row['free_wash_status'];

	//Query Insert in the Booking table the user_id,address,date and time of the car wash
	$query1 ="INSERT INTO `booking` (`user_id`,`address`,`payment`,`date`,`time`,`car_model`,`car_number`) VALUES ('$user_id','$address','$payment','$date','$time','$carModel','$carNumber')";
	
	

	if($conn->query($query1) == true){
		
		$query2 = "Select * FROM users WHERE id = $user_id";
	  	$result = mysqli_query($conn,$query2);
	  	$user = mysqli_fetch_assoc($result);

		sendMail($user_id,$user['name'],$user['phone_number'],$address,$payment,$date,$time);	

		if($free_wash_status == 0){
			$query3 = "UPDATE `users` SET free_wash_status = 1 WHERE id = '$user_id'";
			$conn->query($query3);
		}

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