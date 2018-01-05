<?php

require_once('init.php');

$str = $_POST['str'];
$case_id =$_POST['case_id'];


		$articlesquery1=
						$conn->query("SELECT distinct user_response.user_id
					     FROM user_response 
					     INNER JOIN case_question ON user_response.question_id=case_question.question_id AND user_response.answer_id=case_question.answer_id 
					     WHERE case_id = $case_id
					     ");

		while($row = $articlesquery1->fetch_object()){							
		$result[] = $row;
		}						
		
		foreach ($result as $result) {
		

			$articlesquery12=
						"SELECT *
					     FROM user_data
					     WHERE username LIKE '%".$str."%' AND user_data.id=$result->user_id
					     ";

					$result123 = mysqli_query($conn, $articlesquery12);
					$row3 = mysqli_fetch_assoc($result123);





		echo "<p>".$row3['username']."</p>";

		}


?>