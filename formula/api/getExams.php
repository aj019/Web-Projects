<?php 

	include('../dbConnect.php');

	$query = "SELECT * FROM `formula_exams`";

	$result = mysqli_query($conn,$query);

	if(mysqli_num_rows($result) > 0 ){

		$queryres = $conn->query($query);
		$row = array();

		$row['count'] = mysqli_num_rows($result);
		$row['status'] = "200";
		
		while ($res = $queryres->fetch_assoc()) {
			$row[] = $res;
		}

		echo json_encode($row);

	}else{

		$row = array();
		$row['count'] = 0;
		$row['status'] = "404";
		echo json_encode($row);
	}
?>