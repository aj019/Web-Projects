<?php

   require 'init.php';
   
if($_SESSION['app']=='facebook')
{
     $url =  'https://graph.facebook.com/'.$_SESSION["userprofile"]['id'].'/picture';
}

  elseif($_SESSION['app']=='google'){

  	$url =  $_SESSION["userprofile"]['picture'];
  }

  else{

  	$url  = $_SESSION["userprofile"]['profile_image_url'];
  }

  $timestamp = date('Y-m-d H:i:s');
  $id= $_SESSION['userprofile']['id'];
  $name= $_SESSION['userprofile']['name'];



  	$query =(" SELECT * FROM login WHERE user_id= '$id' " );

  	$result = $conn->query($query);

		if($result->num_rows > 0){

		    echo "user already exists";
		}else{
		    // do something
		    $sql = "INSERT INTO `login` (user_id,username,profile_pic_url,date_creation,last_login,counter)
			VALUES ($id,'$name','$url','$timestamp','$timestamp','0')";

			if ($conn->query($sql) === TRUE) {
			    echo "New record created successfully";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}

		$conn->close();
  
?>