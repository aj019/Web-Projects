<!--<style type="text/css">
	
.box
{
margin-top: 70px;
height:120px ;
width: 500px;
border:20px ;
margin-left:200px ;
background-color:blue; 

}
</style>
-->

<?php


if ($_SERVER['REQUEST_METHOD']=='POST') {
	$username=$_POST['username'];
    $password=$_POST['password'];
	if ($password=="anuj") 
		echo "welcome $username";
		else
			header('Location:login.php?error');
		}
		elseif(isset($_GET['error'])){
	echo "some errror";
}
else{
?>

<div class="box">

<form  method="post">
<input type="text"  name="username"> <br /> 
<input type="password" name="password"><br />
<button>login</button>
</form>
</div>
<?php
}
?>


