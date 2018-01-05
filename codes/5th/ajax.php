<?php
	header('');
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($username=="Praveer" && $password == "1234"){
			echo "Welcome $username";
		}
	}
?>