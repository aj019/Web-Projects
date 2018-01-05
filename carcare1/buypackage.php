<?php 
//This file enter the details regarding the package brought by the user in the package table  
include('dbConnect.php'); //For connecting to the database

$phone_no = $_GET['phone_no']; 
$address = $_GET['address'];
$from_date = $_GET['from_date'];
$months = $_GET['months'];

// Code to get the end date using the From date and No of Months
$date = explode('-', $from_date); //Splits the date 2016-12-12 into data = {'2016','12','12'}

$mm = $date[1]+ $months;

if($mm >12){
	$mm = $mm-12; //If the no of months exceed 12 then we have to start again from 1
	$mm = sprintf("%02d", $mm); // To store a single digit number as two digit number. For eg 2 -> 02
	$date[0]++;
}else{
	$mm = sprintf("%02d", $mm);

}

$to_date = $date[0].'-'.$mm.'-'.$date[2];

//Query to search for user with the following phone no
$query = "SELECT * FROM `users` WHERE phone_number = '$phone_no'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

$response = array();

if(mysqli_num_rows($result) > 0){
	$user_id = $row['id'];
	//Query Insert in the Booking table the user_id,address,date and time of the car wash
	$query1 ="INSERT INTO `package` (`user_id`,`address`,`from_date`,`to_date`,`months`) VALUES ('$user_id','$address','$from_date','$to_date','$months')";
	
	if($conn->query($query1) == true){
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