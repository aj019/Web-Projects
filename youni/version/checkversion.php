<?php
	
	$playstore_version = '1.1';
	$user_app_version = $_GET['versioncode'];

	$response = array();
	if($playstore_version>$user_app_version){

		$response['upgradeStatus'] = 1; //Recommended Upgrade == 1   ,Force Upgrade == 2

		echo json_encode($response);
	}
	else{

		$response['upgradeStatus'] = 0;
		echo json_encode($response);
	}

?>