<?php 

	include('dbConnect.php');	
	$query = "SELECT * FROM `cat` WHERE topic = 'Quantitative Aptitude' ORDER BY RAND() LIMIT 5";

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