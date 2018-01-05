<?php

require_once('init.php');
$case_id=$_POST['case_id'];

	$query = $conn->query("SELECT draft_id from `case_draft` where `case_id`=$case_id ");
							
	while($row = $query->fetch_object()){							
		$result[] = $row;
	}

	foreach ($result as $result) {

		$articlesquery1=
						"SELECT draft.*
					     FROM draft 
					     INNER JOIN case_draft ON draft.id=case_draft.draft_id 
					     WHERE case_draft.draft_id=$result->draft_id
					     GROUP BY draft.id";

					$result3 = mysqli_query($conn, $articlesquery1);
					$row2 = mysqli_fetch_assoc($result3);

		echo "<button onclick='showdraft(".$row2['id'].");'>".$row2['draft_title']."</button>";
	}


?>