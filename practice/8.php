<?php
session_start();
if(isset($_SESSION['username']))
{
    echo "YOU HAVE ALREADY REGISTERED";
}	

else if($_SERVER['REQUEST_METHOD']=='POST')
{
 
 $uname=htmlentities($_POST['username']);
 $email=htmlentities($_POST['email']);
 
$_SESSION['username']=$uname;

 echo "thanxx for reg $uname";

}

else{
	echo"please fill the form";

?>
<form action="8.php" method="post">
<label for="user">username:</label>
<input type="text" name="username">
<label for="em">email:</label>
<input type="text" name="email">
<input type="submit" value="login">



<?php }