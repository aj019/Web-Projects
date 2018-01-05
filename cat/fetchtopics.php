<?php

	include('dbConnect.php');

	$query = "SELECT * FROM `cat` WHERE topic ='Quantitative Aptitude' ORDER BY RAND() LIMIT 1";
	$query1 = "SELECT * FROM `cat` WHERE topic ='Verbal Reasoning' ORDER BY RAND() LIMIT 1";
	$query2 = "SELECT * FROM `cat` WHERE topic ='Logical Reasoning' ORDER BY RAND() LIMIT 1";

	$result = $conn->query($query);
	$result1 = $conn->query($query1);
	$result2 = $conn->query($query2);
	
	if(mysqli_num_rows($result) > 0){

		$questions= array();
		$questions['connection_status'] = '200';	
		while ($row = $result->fetch_assoc()) {
			$questions[] = $row;
		}

		while ($row1 = $result1->fetch_assoc()) {
			$questions[] = $row1;
		}

		while ($row2 = $result2->fetch_assoc()) {
			$questions[] = $row2;
		}
		
		echo json_encode($questions);

	}else{
		$questions['connection_status'] = '404';	
		echo json_encode($questions);
	}

?>
