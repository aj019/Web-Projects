<?php
	include('dbConnect.php');

	$user_id = $_POST['user_id'];
	$package_id = $_POST['package_id'];

	$query = "UPDATE `package` set status =1 WHERE id ='$package_id' AND user_id='$user_id'  ";
	if($conn->query($query)){
		echo "Successfull";
	}else{
		echo "error";
	}

?>
