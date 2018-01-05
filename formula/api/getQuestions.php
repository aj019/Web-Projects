<?php

	include('../dbConnect.php');

	$formula_id = $_GET['formula_id'];

	$query = "SELECT formula_questions.* 
				From formula_questions
				INNER JOIN formulas_questions ON formulas_questions.question_id = formula_questions.id
				WHERE formula_id = $formula_id
				GROUP BY formula_questions.id" ;

	$result = mysqli_query($conn,$query);
	$row = array();

	if(mysqli_num_rows($result) > 0){
	
		$row['count'] = mysqli_num_rows($result);
		$row['status'] = "200";
		
		while($row1 = $result->fetch_assoc()){
			$row[] = $row1;
		}

		echo json_encode($row);

	}else{

		$row['count'] = 0;
		$row['status'] = "404";
		echo json_encode($row);
	}				  

?>