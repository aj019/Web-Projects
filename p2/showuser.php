<?php

require_once('init.php');

$case_id = $_POST['case_id'];

  $result[]= array();

		$articlesquery1=
						$conn->query("SELECT distinct user_response.user_id
					     FROM user_response 
					     INNER JOIN case_question ON user_response.question_id=case_question.question_id AND user_response.answer_id=case_question.answer_id 
					     WHERE case_id = $case_id
					     ");

		while($row = $articlesquery1->fetch_object()){							
		$result[] = $row->user_id;
		}						
		
		foreach ($result as $result) {
		

			$articlesquery12=
						"SELECT *
					     FROM user_data
					     WHERE user_data.id=$result->user_id
					     ";

					$result123 = mysqli_query($conn, $articlesquery12);
					$row3 = mysqli_fetch_assoc($result123);





		echo "<button>".$row3['username']."</button><br>";

		}


			


?>