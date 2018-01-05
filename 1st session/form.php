<?php
?>

<style type="text/css">
	
form{

	margin-top: 70px;
height:580px ;
width: 500px;
border:10px solid black;
margin-left:200px ;
background-color:; 

}	


</style>

<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
	$username=$_POST['username'];
    $password=$_POST['password'];
    $name=$_POST['name'];
    $class=$_POST['class'];
    $repassword=$_POST['repassword'];
    $place=$_POST['place'];

    if(empty($name)||empty($username)||empty($password)||empty($repassword)||empty($class)||empty($place))
    	echo "field empty";
	elseif($password=="anuj") 
		echo "welcome $username";
	else
		echo "wrong password";
		
		
}
else{
?>



<form method="post">

<p>NAME:</p><input type="text" placeholder="username" name="name"><br>
<p>CLASS:</p><input type="text" placeholder="username" name="class"><br>
<p>USERNAME:</p><input type="text" placeholder="username" name="username"><br>
<p>PASSWORD:</p><input type="password" placeholder="username" name="password"><br>
<p>RE_PASSORD:</p><input type="password" placeholder="username" name="repassword"><br>
<p>PLACE:</p><input type="radio" name="place" checked>Delhi</input><br>
<input type="radio" name="place">Mumbai</input><br>
<input type="radio" name="place" >Chennai</input><br>

<button>register</button>


</form>
<?php
}
?>