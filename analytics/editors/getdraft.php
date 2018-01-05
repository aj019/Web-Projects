<?php

require_once('init.php');
$case_id=$_POST['case_id'];

	$query = $conn->query("SELECT draft_id from `client_requirement` where `case_id`=$case_id ");
							
	while($row = $query->fetch_object()){							
		$result[] = $row;
	}

	foreach ($result as $result) {

		$articlesquery1=
						"SELECT draft.*
					     FROM draft 
					     INNER JOIN client_requirement ON draft.id=client_requirement.draft_id 
					     WHERE client_requirement.draft_id=$result->draft_id
					     GROUP BY draft.id";

					$result3 = mysqli_query($conn, $articlesquery1);
					$row2 = mysqli_fetch_assoc($result3);

		echo "<button onclick='showdraft(".$row2['id'].");'>".$row2['draft_title']."</button>";
	}


?>