<?php

	include('../dbConnect.php');

	$exam_id = $_GET['exam_id'];

	$query = "SELECT formula_topics.*
					     FROM formula_topics 
					     INNER JOIN exams_topics ON formula_topics.id=exams_topics.topic_id 
					     WHERE exam_id = $exam_id
					     GROUP BY formula_topics.id";
	$result = mysqli_query($conn,$query);

	if(mysqli_num_rows($result) > 0){

		$row = array();
		$row['connection_status'] = "200";
		$row['count'] = mysqli_num_rows($result);
		while($row1 = $result ->fetch_assoc() ){
			$row[] = $row1;
				
		}

		echo json_encode($row);

	}else{

		$row = array();
		$row['count'] = 0;
		$row['connection_status'] = "404";
		echo json_encode($row);

	}


?>