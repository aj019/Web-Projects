<?php

session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
		$note=$_POST['note'];
		$name=$_POST['name'];
		$uid=$_SESSION['uid'];


		if (empty($note)||empty($name)) 
		{
		echo "
		
			<script type='text/javascript'>
			alert('Note empty');
			</script>
	";
		

	
		

		}
		
	
		else
		{	

			$link = mysql_connect('localhost','root','');
			mysql_select_db('souvenir');
			$query = "INSERT INTO note(uid,name,note) VALUES ('$uid','$name','$note')";
			mysql_query($query);
			echo mysql_error($link);


			echo "
		
			<script type='text/javascript'>
			alert('Note created');
			</script>
	";
	
		}

		



}

else 
	
header('location: sidebar.php');

?>



