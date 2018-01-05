<html>
<head>
	<title>Login Page</title>
</head>
<style type="text/css">

body{	

background-color: #e5e5e5;
}

button{
	color: white;
	background-color: #f65857;

}



button{
	color: white;
	background-color: #f65857;
	width: 320px;
	height: 50px;
	font-size: 16px;
	border:0;
	border-radius: 5px;
	outline: none;
}

.form{
	margin: auto;
	font-family: "";
	width: 400px;
	margin-top: 100px;
}


input
{


border:0;
outline:none;
color:#9e9e9e;
font-size: 18px;
margin-bottom: 20px;
width: 275px;
height: 45px;
border-radius: 5px;
padding-left: 5px;
border-top-left-radius: 0;
border-bottom-left-radius: 0;
}


.user-icon{
	display: inline;
	width: 45px; 
	height: 45px;
	background-color: white;
	float: left;
	border-bottom-left-radius: 5px;
	border-top-left-radius: 5px;
	background-image: url('1390735782_user.png');
	background-repeat: no-repeat;
	background-position: center;
	background-size: 22px;
	

}




.pass-icon
{
	display: inline;
	width: 45px;
	height: 45px;
	background-color: white;
	float: left;
	border-bottom-left-radius: 5px;
	border-top-left-radius: 5px;
	background-image: url('1390735829_Lock.png');
	background-repeat: no-repeat;
	background-position: center;
	background-size: 30px;
}
</style>
<body>

<?php
session_start();
$_SESSION['userid']=12;
echo $_SESSION['userid'];
?>


<div class="form">

<div class="username">
	<div class="user-icon">
	<!--<img src="1390735782_user.png">-->
	</div>
<input type="text" placeholder="username">
</div>

<div class="password">
	<div class="pass-icon">
	<!--<img src="1390735829_Lock.png">-->
	</div>
<input type="password" placeholder="password">
</div>

<button>SIGN IN </button>
</div>
</body>
</html>
