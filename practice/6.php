<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{

	echo "thanxx for registring <br/>",
  "username:",htmlentities($_POST['username']),"<br>",
  "email:",
  htmlentities($_POST['email']),"<br>";

}

else{

?>


<form action="6.php"   method="post">
	
<label for="username">username:</label>
<input type="text" name="username">
<label for="email">email:</label>
<input type="text" name="email">
<input type="submit" value="register!">



</form>



<?php }
