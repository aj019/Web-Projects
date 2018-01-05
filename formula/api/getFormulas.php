<?php

	include('../dbConnect.php');

	$topic_id = $_GET['topic_id'];

	$query = "SELECT formula_formulas.* 
				From formula_formulas
				INNER JOIN topics_formulas ON topics_formulas.formula_id = formula_formulas.id
				WHERE topic_id = $topic_id
				GROUP BY formula_formulas.id" ;

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