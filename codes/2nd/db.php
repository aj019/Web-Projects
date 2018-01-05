<?php
	$link = mysql_connect('localhost','root','');
	mysql_select_db('webdev');
	if(!$link){
		echo "Connection Error";
	}
	else{
		$query = "SELECT name,email,number FROM users";		
		$result = mysql_query($query);
		while($row = mysql_fetch_array($result)){
			echo $row['name'];
			echo "<br>";
			echo $row['email'];
			echo '<br>';
			echo $row['number'];
			echo '<br>';
		}
	}
?>