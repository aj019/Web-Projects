<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
		$note=$_POST['editor1'];


		if (empty($note)) 
		{
		echo "Note empty";	
		}
		
	
		else
		{	

			$link = mysql_connect('localhost','root','');
			mysql_select_db('evernote');
			$query = "INSERT INTO note(note) VALUES ('$note')";
			mysql_query($query);
			echo mysql_error($link);
	
		}
}


	


?>



