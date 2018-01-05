<?php
	include('dbConnect.php');

	$user_id = $_POST['user_id'];
	$booking_id = $_POST['booking_id'];

	$query = "UPDATE `booking` set status =1 WHERE id ='$booking_id' AND user_id='$user_id'  ";
	if($conn->query($query)){
		echo "Successfull";
	}else{
		echo "error";
	}

?>
