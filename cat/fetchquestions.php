<?php 

	include('dbConnect.php');	

	$topic = $_GET['topic'];
	$sub_topic = $_GET['sub_topic'];
	
	$query = "SELECT * FROM `cat` WHERE topic = '$topic' AND sub_topic= '$sub_topic' ORDER BY RAND() LIMIT 5";

	$result = mysqli_query($conn,$query);
	
	$response = array();

	if(mysqli_num_rows($result) > 0){

		$questions = $conn->query($query);
		$questiondetails = array();	
		
		$questiondetails['connection_status'] = '200'; 
		while($row = $questions->fetch_assoc()){
			$questiondetails[] = $row; 
		}

		echo json_encode($questiondetails);

	}else{
		$response['connection_status'] = "0";
		echo json_encode($response);
	}


?>