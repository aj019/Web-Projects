<?php

include('dbConnect.php');

$query = "Select * From `men_watch`";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0){

	foreach ($result as $result) {
		$query1 = "UPDATE `men_watch` SET mImageDisplayUrl = '".$result['mImageUrl']."' WHERE mid = '".$result['mid']."' ";
		if($conn->query($query1)){
			echo "Success";
		}else{
			echo "error";
		}
	}
}

?>