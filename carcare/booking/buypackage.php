<?php 
//This file enter the details regarding the package brought by the user in the package table  
include('dbConnect.php'); //For connecting to the database

$phone_no = $_GET['phone_no']; 
$address = $_GET['address'];
$from_date = $_GET['from_date'];
$months = $_GET['months'];
$carModel = $_GET['car_model'];
$carNumber = $_GET['car_number'];
$packageType = $_GET['packageType'];
$payment = $_GET['payment'];

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

function sendMail($user_id,$user_name,$user_phoneno,$address,$from_date,$to_date,$packageType,$payment){

	
    $message = 'New Package Order'.'<br>';
    $message .= 'user_id : '.$user_id.'<br>';
    $message .= 'username : '.$user_name.'<br>';
    $message .= 'phone no : '.$user_phoneno.'<br>';
    $message .= 'address : '.$address.'<br>';
    $message .= 'From date : '.$from_date.'<br>';
    $message .= 'To date : '.$to_date.'<br>';
    $message .= 'Package Type : '.$packageType.'<br>';
    $message .= 'Payment : '.$payment.'<br><br><br>';
    $message .= 'Link  : <a href="youni.co.in/carcare/booking/newpackages.php">Check out Package Details </a><br>';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= 'From: FreshRide <freshride.in>' . "\r\n";
    
    
    mail('junagupta19@gmail.com', 'Freshride New Package Order Imp', $message, $headers);
    mail('sameer.sadana9@gmail.com', 'Freshride New Package Order Imp', $message, $headers);
    mail('kushansingh22@gmail.com', 'Freshride New Package Order Imp', $message, $headers);
    
}


//Query to search for user with the following phone no
$query = "SELECT * FROM `users` WHERE phone_number = '$phone_no'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

$response = array();

if(mysqli_num_rows($result) > 0){
	$user_id = $row['id'];
	//Query Insert in the Booking table the user_id,address,date and time of the car wash
	$query1 ="INSERT INTO `package` (`user_id`,`address`,`from_date`,`to_date`,`months`,`car_model`,`car_number`,`package_type`,`payment`) VALUES ('$user_id','$address','$from_date','$to_date','$months','$carModel','$carNumber','$packageType','$payment')";
	
	if($conn->query($query1) == true){
		sendMail($user_id,$row['name'],$phone_no,$address,$from_date,$to_date,$packageType,$payment);
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