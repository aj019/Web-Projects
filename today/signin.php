<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
		$username=$_POST['username'];
		$password=$_POST['password'];



		if (empty($username)||empty($password)) 
		{
		echo "Username or password not entered";	
		}


		else
			session_start();
			$link = mysql_connect('localhost','root','');
			mysql_select_db('webdev');
			if(!$link){
				echo "Connection Error";
			}
			else{
				$login = mysql_query("SELECT * FROM signup WHERE username = '".$username."' and password = '".$password."'");
				echo mysql_error();
				// Check username and password match
				if (mysql_num_rows($login) == 1) {
					// Set username session variable
					$_SESSION['username'] = $_POST['username'];
					header('Location: profile.php');
				}
				
				else{
					echo "Username or password incorrect";
				//	header('Location: 2.html');

				}

		}
	}