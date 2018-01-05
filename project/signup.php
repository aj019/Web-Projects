<?php
session_start();

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		
		if (empty($email)||empty($username)||empty($password)) 
		{
		echo "
		
			<script type='text/javascript'>
			alert('Please complete the form');
			window.location.assign('signup.html');
			</script>
			";	
		}
		
	
		else
		{	
			
			$link = mysql_connect('localhost','root','');
			mysql_select_db('souvenir');
			$query = "INSERT INTO user(email,username,password) VALUES ('$email','$username','$password')";
			mysql_query($query);
			echo mysql_error($link);

			$query1 = "SELECT `uid` FROM `user` WHERE `username`= '$username'";
			$result = mysql_query($query1);
			echo mysql_error();
			while($uid = mysql_fetch_array($result)){
					$_SESSION['uid'] = $uid['uid'];
					}

			
			header('Location: index.html');

	
		}
	}


	else{
		include 'signup.html';
	}

/*function sanitize($entity){

$entity=strip_tags(mysql_real_escape_string($entity));

}*/
?>