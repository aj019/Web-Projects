<?php

 
if($_SERVER['REQUEST_METHOD']=='POST')
{
		$note=$_POST['editor1'];


		if (empty($note)) 
		{
		echo "
		
			<script type='text/javascript'>
			alert('Note empty');
			window.location.assign('test3.html');
			</script>
	";
		

	
		

		}
		
	
		else
		{	

			$link = mysql_connect('localhost','root','');
			mysql_select_db('souvenir');
			$query = "INSERT INTO note(note) VALUES ('$note')";
			mysql_query($query);
			echo mysql_error($link);
	
		}



}


	


?>



