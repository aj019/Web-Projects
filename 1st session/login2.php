
<?php


if ($_SERVER['REQUEST_METHOD']=='POST') {
	$username=$_POST['username'];
    $password=$_POST['password'];
	if ($password=="anuj") {
		setcookie('user',$username,time()+(24*60*60));
	     header('Location:logintest.php');
	}       
}
?>

<div class="box">

<form  method="post">
<input type="text"  placeholder="username" name="username"> <br /> 
<input type="password" placeholder="password" name="password"><br />
<button>login</button>
</form>
</div>
<?php

?>
