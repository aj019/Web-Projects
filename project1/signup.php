<?php
session_start();


if (isset($_SESSION['username'])) {
header('Location: profile.php');
}

else
{	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		if (empty($email)||empty($username)||empty($password)) 
		{
		echo "Please fill the complete form";	
		}
		
	
		else
		{
			$link = mysql_connect('localhost','root','');
			mysql_select_db('evernote');
			$query = "INSERT INTO user(email,username,password) VALUES ('$email','$username','$password')";
			mysql_query($query);
			echo mysql_error($link);
		}
	}


	else{
		include 'signup.html';
	}
}
/*function sanitize($entity){

$entity=strip_tags(mysql_real_escape_string($entity));

}*/
?>