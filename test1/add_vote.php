<?php
if(!empty($_POST["id"])) {
	require_once("dbcontroller.php");
	$db_handle = new DBController();
	$query = "INSERT INTO ipaddress_vote_map (user_id,link_id,vote_rank) VALUES ('" . $_SESSION['user_id'] . "','" . $_POST["id"] . "','" . $_POST["vote_rank"] . "')";
	$result = $db_handle->insertQuery($query);
	if(!empty($result)) {
		$query = "SELECT SUM(vote_rank) as vote_rank FROM ipaddress_vote_map  WHERE link_id = '" . $_POST["id"] . "' and user_id = '" . $_SESSION['user_id'] . "'";
		$row = $db_handle->runQuery($query);
		
		switch($_POST["vote_rank"]) {
			case "1":
				$update_query ="UPDATE links SET votes = votes+1 WHERE id='" . $_POST["id"] . "'";
			break;
			case "-1":
				$update_query ="UPDATE links SET votes = votes-1 WHERE id='" . $_POST["id"] . "'";
			break;
		}
		
		$result = $db_handle->updateQuery($update_query);	
		print $row[0]["vote_rank"];
	}
}
?>