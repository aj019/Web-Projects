<?php
session_start();
require('../init1.php');

      if (!empty($_POST['comment'])) {
        
       $comment=$_POST['comment'];
       $article_id=$_POST['article_id'];
       $user_id=$_SESSION['userprofile']['id'];
       $timestamp = date('Y-m-d H:i:s');

       $query = "INSERT INTO `report` (article_id,comments,user_id,datetime) VALUES ('$article_id','$comment','$user_id','$timestamp')";
				$db->query($query) ;
		
		
		}
		
				
		header("Location:../index1.php")				

      

?>