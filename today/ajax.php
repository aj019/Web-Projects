<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$username=$_POST['username'];
	$password=$_POST['password'];

   if($username=="praveer" && $password=="1234")
  {
     echo"welcoome praveer";
  }

}