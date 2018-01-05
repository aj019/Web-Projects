<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
</head>
<body>

	<div>
		<?php if(isset($account_created))
				echo '<h3>$account_created</h3>';
			   else
			   echo '<h3>Login Please</h3>'	
		?>

		<?php 

			echo form_open('login/validate_credentials');
			echo form_input('username', 'Username');
			echo form_password('password', '');
			echo form_submit('submit','Login');
			echo anchor('login/signup', 'Create Account');

		?>

	</div>

</body>
</html>