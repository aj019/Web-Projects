<?php

require('init.php');

$item_id = $_GET["id"];

		//get the user id from the session 
		$user_id = 10;
		

		$sql = "Select * FROM favorites WHERE user_id = '$user_id' AND item_id = '$item_id'";
		$res = mysql_query($sql, $conn);
		$num_rows = mysql_num_rows($res);

		if($num_rows == 0) {

			$sql= "INSERT INTO `favorites` (item_id, store, user_id)values('$item_id','$item_store','$user_id')";
			$save_favorite = mysql_query($sql, $conn);
			
		}
		elseif($num_rows == 1){
		
			$sql = "DELETE FROM favorites WHERE user_id = '$user_id' AND item_id = '$item_id'";
			$delete_favorite = mysql_query($sql, $conn);
			
		}



?>