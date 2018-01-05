<?php

if($_SERVER['REQUEST_METHOD']==['POST'])
{
    
	$name=htmlentities($POST['name']);
	$date=htmlentities($POST['dob']);
	$uname=htmlentities($POST['username']);
    $pass=htmlentities($POST['password']);
    $rpass=htmlentities($POST['repassword']);

    if($pass=$rpass)
    {
    		$link = mysql_connect('localhost','root','');
			mysql_select_db('mytable');
    
 			$query="INSERT into mytable values('$name','$uname','$date')";
 			mysql_query($query);

    }	




}


else{

	include 'form.html';
}