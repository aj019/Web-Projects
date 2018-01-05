<?php
	$var = sanitize($_GET['uid']);
	$link = mysqli_connect('localhost','root','','webdev');
	$query = "SELECT name,email FROM users WHERE uid=?";
	$stmt = mysqli_prepare($link,$query);

	mysqli_stmt_bind_param($stmt,'i',$var);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt,$name,$email);		
	while(mysqli_stmt_fetch($stmt)){
		echo $name;
		echo "<br>";
		echo $email;
	}
	print_r($stmt);
	function sanitize($entity){
		$entity = strip_tags(mysql_real_escape_string($entity));
		return $entity;
	}
?>