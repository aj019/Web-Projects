<?php
	$link = mysql_connect('localhost','root','');
	mysql_select_db('webdev');
	$var = sanitize($_GET['a']);
	$query = "SELECT tid,teststring FROM test WHERE tid='$var'";
	echo $query;
	$result = mysql_query($query);
	echo "<br>";
	while($row=mysql_fetch_array($result)){
		echo $row['tid'];
		echo "<br>";
		echo $row['teststring'];
		echo "<br>";
	}
	function sanitize($entity){
		$entity = strip_tags(mysql_real_escape_string($entity));
		return $entity;
	}
?>