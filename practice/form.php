<style type="text/css">
	form{
		width: 200px;
		margin: auto;
		margin-top: 100px;
		border: 1px solid black;
		padding: 5px;
		font-size: 18px;
	}
	input{
		border: 1px solid;
		margin: 5px;
		padding: 4px;

	}
	form input[type="submit"]{
		margin-left: 140px;
	}
</style>

<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($password=="PRAVEER")
			echo "Welcome $username";
		else
			header('Location:form.php?error');
	}
	elseif (isset($_GET['error'])) {
		echo "Some error occurred please try
		again";
	}
	
?>
<form method="post">
	<input type="text" name="username" placeholder="Username..">
	<input type="password" name="password" placeholder="Password..">
	<input type="submit" value="Log In">
</form>
