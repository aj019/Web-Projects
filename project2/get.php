

<?php



$link = mysql_connect('localhost','root','');
			mysql_select_db('souvenir');
			$query =mysql_query("SELECT * FROM note where nid = '3'");
			
			echo mysql_error($link);

	$rows= mysql_fetch_assoc($query);

	$note=$rows['note'];
	echo $note ;
	echo '<textarea>',  echo $note ; , '</textarea>';


?>
