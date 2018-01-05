<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$uname = $_POST['username'];
		$pass = $_POST['password'];		
		if($pass=="Praveer"){
			setcookie('user',$uname,time()+(24*3600),'/');
		}
	}
?>
<form method="post">
	<input type="text" name="username"> 
	<input type="password" name="password"> 
	<input type="submit" value="submit" />
</form>