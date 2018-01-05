<?php

  session_start();

  require 'init.php';

$id= $_SESSION['userprofile']['id'];

  $query = "SELECT  * FROM login WHERE user_id = '$id' ";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

	img{

		width: 20px;
	}	
	</style>
</head>
<body>
<h1>Name:<?php echo $row['username'] ?><br /> </h1>
<img src="<?php echo $row['profile_pic_url'] ?>">
</body>
</html>
