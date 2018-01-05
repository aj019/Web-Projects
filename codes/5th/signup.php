<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$filename = $_FILES['profile']['name'];
		$temp_name = $_FILES['profile']['tmp_name'];
		$type = $_FILES['profile']['type']; // Extension
		if($type == "image/png" || $type == "image/jpg" || $type=="image/PNG" || $type = "image/JPEG")
		{
			move_uploaded_file($temp_name,"resources/$filename");
		}
		else{
			echo "Only JPG's and PNG's allowed";
		}
	}
	else{
		include 'form.html';
	}
	function sanitize($entity){

	}
?>