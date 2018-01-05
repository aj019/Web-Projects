<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$filename=$_FILES['profile']['name'];
	$temp_name=$_FILES['profile']['tmp_name'];

	$type=$_FILES['profile']['type'];
//	echo $type;
	if($type=="image/png" || $type=='image/jpg'|| $type=="image/JPEG" || $type=="image/PNG" || $type=="image/jpeg" || $type=="JPG")
	{
	move_uploaded_file($temp_name, "resources/$filename");
		$url="resources/$filename";
		$name=$_POST['name'];
		$date=$_POST['dob'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$repassword=$_POST['repassword'];
		if (empty($name)||empty($date)||empty($username)||empty($password)||empty($repassword)) 
		{
		echo "Please fill the complete form";	
		}
		
		elseif($password!=$repassword){
			echo "Please enter the same password";
		}

		else
		{
			$link = mysql_connect('localhost','root','');
			mysql_select_db('webdev');
			$query = "INSERT INTO signup(name,dob,username,password,profile) VALUES ('$name','$date','$username','$password','$url')";
			mysql_query($query);
			echo mysql_error($link);
		}
	}

	else{
		echo "Only JPG's and PNG's allowed";
	}
}

else{
	include '1.html';
}

function sanitize($entity){

$entity=strip_tags(mysql_real_escape_string($entity));
}

?>