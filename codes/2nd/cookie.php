<?php
	session_start();
	echo $_SESSION['userid'];
	setcookie('userid2','24',time()+(24*60*60),'/');
	session_destroy();
	//unset($_COOKIE['userid2']);
	unset($_COOKIE['userid2']);	
?>