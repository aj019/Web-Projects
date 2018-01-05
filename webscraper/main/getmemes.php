<?php

	include('dbConnect.php');


	$query = "SELECT * FROM `memes`";

	$result = $conn->query($query);

	if($result->num_rows > 0){

		$row1 = array();	

		$row1['count'] = $result->num_rows;
		while($row = $result->fetch_assoc()){
			$row1[] = $row;
		}

		echo json_encode($row1);
	}



?>