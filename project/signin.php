<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
		$username=$_POST['username'];
		$password=md5($_POST['password']);



		if (empty($username)||empty($password)) 
		{
			echo "
		
			<script type='text/javascript'>
			alert('Please complete the form');
			window.location.assign('signin.html');
			</script>
			";
		}


		else
			session_start();
			$link = mysql_connect('localhost','root','');
			mysql_select_db('souvenir');
			if(!$link){
				echo "Connection Error";
			}
			else{
				$login = mysql_query("SELECT * FROM user WHERE username = '".$username."' and password = '".$password."'");
				echo mysql_error();
				// Check username and password match
				if (mysql_num_rows($login) == 1) {
					// Set username session variable
					$query1 = "SELECT `uid` FROM `user` WHERE `username`= '$username'";
					$result = mysql_query($query1);
					echo mysql_error();
					while($uid = mysql_fetch_array($result)){
					$_SESSION['uid'] = $uid['uid'];
					}
					
				header('Location: index.html');
				}
				
				else{
					echo "Username or password incorrect";
					header('Location: signin.html');

				}

		}
	}