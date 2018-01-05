<?php

include('dbConnect.php');

$query = "Select * From `women_watch`";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0){

	foreach ($result as $result) {
		$query1 = "UPDATE `women_watch` SET wImageDisplayUrl = '".$result['wImageUrl']."' WHERE wid = '".$result['wid']."' ";
		if($conn->query($query1)){
			echo "Success";
		}else{
			echo "error";
		}
	}
}

?>