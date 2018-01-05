<?php
	require_once('mysqlconnect.php');

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		if(!empty($_POST['video_url']) && !empty($_POST['title'])){
			
			if(strpos($_POST['video_url'],"youtube.com/watch?")===false){

				echo "Enter a valid youtube url";

			}
			
			else{
				$user_id = 10;

				$mv=2; //1->meme  2->video
				$url = $_POST['video_url'];
				$title = $_POST['title'];

				if(isset($_POST['nsfw']))
					$nsfw=1;
				else
					$nsfw=0;

				$gif=0;

				if(!empty($_POST['tag1']))
					$tag1 ='#' . $_POST['tag1'];
				else
					$tag1 = '';


				if(!empty($_POST['tag2']))
					$tag2 ='#' . $_POST['tag2'];
				else
					$tag2 = '';


				if(!empty($_POST['tag3']))
					$tag3 ='#' . $_POST['tag3'];
				else
					$tag3 = '';


				if(isset($_POST['credit']))
					$credit = $_POST['credit'];
				else
					$credit = '';



				$query_upload = "INSERT INTO `articles`(`user_id` , `mv`, `url`, `title`, `nsfw`, `gif`, `tag1`, `tag2`, `tag3`, `credit`, `date_creation`) 
				VALUES ( '".$user_id."' , '".$mv."' , '".$url."' , '".$title."' , '".$nsfw."' , '".$gif."' , '".$tag1."' , '".$tag2."' , '".$tag3."' , '".$credit."' , '".date('Y-m-d H:i:s')."')";

				mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error());

				echo "Successful";  
			}
		}

		else
			echo "Please fill the form completely";

	}

	else
		include 'upload.html';

?>