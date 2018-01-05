<style type="text/css">
	form{
		
	}
</style>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){

	}
	else{


?>
	<form method="post">
		<input type="text" name="username"  placeholder="Username">
		<input type="password" name="password" placeholder="Password">
		<input type="submit" value="Log In">
	</form>
<?php 
	}
?>
	