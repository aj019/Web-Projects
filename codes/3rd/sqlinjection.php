<?php
	//SQL Injection
	$link = mysql_connect('localhost','root','');
	mysql_select_db('webdev');
	$tid="9' OR '1=1";
	$query = "SELECT * FROM test WHERE tid='$tid'";
	echo $query;
	$result = mysql_query($query);
	echo "<br>";
	while ($row = mysql_fetch_array($result)) {
		echo $row['tid'];
	}
	echo mysql_error();
?>