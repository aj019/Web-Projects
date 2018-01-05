<?php 
	
	require_once('init.php');

	$ip =$_SERVER["REMOTE_ADDR"];

	$timestamp = date("Y-m-d h:m:s");


	$query= "SELECT * FROM visitors WHERE ip= '$ip' ";
 	$result = $conn->query($query);


	if($result->num_rows > 0){

		$visitor = mysqli_fetch_assoc($result);
		$id = $visitor['id'];
		$count = $visitor['count'] + 1;
				$query= "UPDATE `visitors` SET count = '$count', last_login = '$timestamp' WHERE id = '$id' ";
				$result1 = $conn->query($query);
				if(!$result1){

					die("UPDATION ERROR".mysqli_error($conn));

				}
				
	}	

	else{

		$query = "INSERT INTO `visitors`(id,ip,last_login,count) VALUES('','".$ip."','".$timestamp."','1')";
				$result2 = $conn->query($query);

				if(!$result2){

					die("INSERTION ERROR".mysqli_connect($conn));

				}

				
	}

		
?>