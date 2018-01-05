<?php
	session_start();
	// check to see if user is logged in. If not, redirect to admin page
	if(!isset($_SESSION['admin'])) {
		header("Location:index.php?page=admin");
	}
?>
<h1>Add new category</h1>
<form method="post" action="index.php?page=entercategory" />
<p><input type="text" name="name" size="40" maxlength="50" /></p>
<p><input type="submit" name="submit" value="Add category" /></p>

</form>
