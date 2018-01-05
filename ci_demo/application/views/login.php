<html>
<head>
	<title>Login</title></head>

<body>
<center>
<form action="<?=site_url('home/do_login')?>" method="post">
<h3 style="font-size:50px;"><b>Login</b> </h3>
Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="user_name">
<br><br>
Password:
<input type="password" name="password"><br><br>
<input type="submit" value="Submit"></form>
<h5><a href="<?=site_url('home/Register')?>">Registration</a></h5>

</center>
</body>
</html>

