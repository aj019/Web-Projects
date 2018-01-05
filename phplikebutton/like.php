<?php

  require_once 'init.php';

  if(isset($_GET['type'],$_GET['id'])){

  	$type=   $_GET['type'];
  	$id=   (int)$_GET['id'];
  }


  switch($type)
  {

  	case 'article':

  			$db->query("

  					INSERT INTO articles_likes(user,article)
  					SELECT {$_SESSION['user_id']},{$id}
  					FROM articles
  					
  					
  				");

  			break;
  }


  header('Location:index.php');

  ?>