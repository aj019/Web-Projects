<?php
	session_start();
	ob_start();
	require_once('mysqlconnect.php');

	function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/gif': return '.gif';
           case 'image/jpg' : return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }

     $user_id = $_SESSION['userprofile']['id'];

     if(!empty($_FILES["meme"]["name"]) && !empty($_POST['title'])){

     	$mv = 1;//1 ->meme
     	$title = $_POST['title'];

     	$title = mysql_real_escape_string(trim($title));

     	if(isset($_POST['nsfw']))
			$nsfw=1;
		else
			$nsfw=0;


		if(!empty($_POST['tag1'])){
			$tag1 = $_POST['tag1'];
			
			if(substr($tag1, 0, 1) === '#'){
				$tag1 = str_replace('#','', $tag1);
			}

			$tag1 = '#' . $tag1;
			$tag1 = strtolower($tag1);

			if(strpos($tag1,' ')!==false){
				$tag1 = str_replace(' ','', $tag1);
			}
		}

		else{
			$tag1 = '';
		}

		if(!empty($_POST['tag2'])){
			$tag2 = $_POST['tag2'];
			
			if(substr($tag2, 0, 1) === '#'){
				$tag2 = str_replace('#','', $tag2);
			}
			$tag2 = '#' . $tag2;
			$tag2 = strtolower($tag2);

			if(strpos($tag2,' ')!==false){
				$tag2 = str_replace(' ','', $tag2);
			}
		}

		else
			$tag2 = '';


		if(!empty($_POST['tag3'])){
			$tag3 = $_POST['tag3'];
			
			if(substr($tag3, 0, 1) === '#'){
				$tag3 = str_replace('#','', $tag3);
			}
			$tag3 = '#' . $tag3;
			$tag3 = strtolower($tag3);

			if(strpos($tag3,' ')!==false){
				$tag3 = str_replace(' ','', $tag3);
			}
		}

		else
			$tag3 = '';


		if(isset($_POST['credit'])){
			$credit = $_POST['credit'];
			$credit = mysql_real_escape_string(trim($credit));

		}
		else
			 $credit = '';




		$file_name=$_FILES["meme"]["name"];
		$temp_name=$_FILES["meme"]["tmp_name"];
		$imgtype=$_FILES["meme"]["type"];
		$ext= GetImageExtension($imgtype);
		
		if(!strcmp($ext,".gif")){
			$gif=1;
			$name = explode(".", $file_name);

			$imagename = date("d-m-Y")."-".time();
			$target_path = "uploads/".$imagename.$name[0].$ext;



			if(move_uploaded_file($temp_name, $target_path)) {

				$query_upload = "INSERT INTO `articles`(`user_id`,`mv`, `url`, `title`, `nsfw`, `gif`, `tag1`, `tag2`, `tag3`, `credit`, `date_creation`) 
				VALUES ( '".$user_id."' , '".$mv."' , '".$target_path."' , '".$title."' , '".$nsfw."' , '".$gif."' , '".$tag1."' , '".$tag2."' , '".$tag3."' , '".$credit."' , '".date('Y-m-d H:i:s')."')";			
				

				mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error());  

				echo "Successful";

				$article_id = 0;
				$get_article_id_query = "SELECT `article_id` FROM `articles` WHERE `url`= '".$target_path."' ";
				$retval = mysql_query($get_article_id_query,$conn) or die("error in $get_article_id_query == ----> ".mysql_error());

				while($row = mysql_fetch_assoc($retval)){
					$article_id = $row['article_id'];
				}


				if(!empty($tag1)){
					$checktag_query = "SELECT COUNT(*) AS id FROM `tags` WHERE `tag` = '".$tag1."' ";
					$checktag = mysql_query($checktag_query,$conn);
					$counter = mysql_fetch_array($checktag);
					$count = $counter['id'];
					echo $count;

					if($count == 0){
						$instag_query = "INSERT INTO `tags`(`tag` , `total_counter` , `current_score`) VALUES ( '".$tag1."' , '1' , '1')";
						mysql_query($instag_query) or die("error in $instag_query == ----> ".mysql_error());
					}

					else if($count != 0){
						$update_counter = mysql_query("UPDATE `tags` SET total_counter = total_counter+1 , current_score = current_score+1 
						WHERE `tag` = '".$tag1."' " ,$conn);
					}
				

					$get_tag_id = mysql_query("SELECT `tag_id` FROM `tags` WHERE `tag` = '".$tag1."' " , $conn );
					while($row = mysql_fetch_assoc($get_tag_id)){
						$tag_id = $row['tag_id'];
					}

					$tag_used_query = "INSERT INTO `tag_used`(`tag_id`, `tag`, `article_id`) VALUES ( '".$tag_id."' , '".$tag1."' , '".$article_id."' )";
					mysql_query($tag_used_query) or die("error in $tag_used_query == ----> ".mysql_error());
				}


				if(!empty($tag2)){
					$checktag_query = "SELECT COUNT(*) AS id FROM `tags` WHERE `tag` = '".$tag2."' ";
					$checktag = mysql_query($checktag_query,$conn);
					$counter = mysql_fetch_array($checktag);
					$count = $counter['id'];

					if($count == 0){
						$instag_query = "INSERT INTO `tags`(`tag` , `total_counter` , `current_score`) VALUES ( '".$tag2."' , '1' , '1')";
						mysql_query($instag_query) or die("error in $instag_query == ----> ".mysql_error());
					}

					else if($count != 0){
						$update_counter = mysql_query("UPDATE `tags` SET total_counter = total_counter+1 , current_score = current_score+1 
						WHERE `tag` = '".$tag2."' " ,$conn);
					}


					$get_tag_id = mysql_query("SELECT `tag_id` FROM `tags` WHERE `tag` = '".$tag2."' " , $conn );
					while($row = mysql_fetch_assoc($get_tag_id)){
						$tag_id = $row['tag_id'];
					}

					$tag_used_query = "INSERT INTO `tag_used`(`tag_id`, `tag`, `article_id`) VALUES ( '".$tag_id."' , '".$tag2."' , '".$article_id."' )";
					mysql_query($tag_used_query) or die("error in $tag_used_query == ----> ".mysql_error());
				}


				if(!empty($tag3)){
					$checktag_query = "SELECT COUNT(*) AS id FROM `tags` WHERE `tag` = '".$tag3."' ";
					$checktag = mysql_query($checktag_query,$conn);
					$counter = mysql_fetch_array($checktag);
					$count = $counter['id'];

					if($count == 0){
						$instag_query = "INSERT INTO `tags`(`tag` , `total_counter` , `current_score`) VALUES ( '".$tag3."' , '1' , '1')";
						mysql_query($instag_query) or die("error in $instag_query == ----> ".mysql_error());
					}

					else if($count != 0){
						$update_counter = mysql_query("UPDATE `tags` SET total_counter = total_counter+1 , current_score = current_score+1 
						WHERE `tag` = '".$tag3."' " ,$conn);
					}

					$get_tag_id = mysql_query("SELECT `tag_id` FROM `tags` WHERE `tag` = '".$tag3."' " , $conn );
					while($row = mysql_fetch_assoc($get_tag_id)){
						$tag_id = $row['tag_id'];
					}

					$tag_used_query = "INSERT INTO `tag_used`(`tag_id`, `tag`, `article_id`) VALUES ( '".$tag_id."' , '".$tag3."' , '".$article_id."' )";
					mysql_query($tag_used_query) or die("error in $tag_used_query == ----> ".mysql_error());
				}




				if(($article_id % 20) == 0){

					$truncate_table = mysql_query("TRUNCATE TABLE `trending_tags`" , $conn);

					$article_id_range_start = $article_id - 2;
					$article_id_range_end = $article_id;

					$article_id_current = $article_id_range_start;
					
					$get_tot_articles = mysql_query("SELECT COUNT(*) AS total_articles FROM `articles`",$conn);
					$counter = mysql_fetch_array($get_tot_articles);
					$total_articles = $counter['total_articles']; //count of total number of articles for average

					while($article_id_current <= $article_id_range_end){
						
						$tag_select = mysql_query("SELECT `tag_id`, `tag` FROM `tag_used` WHERE `article_id` = '".$article_id_current."' ",$conn);
						
						while ($row1 = mysql_fetch_assoc($tag_select)) {
							$current_tag = $row1['tag'];
							$current_tag_id = $row1['tag_id'];

							$get_counters = mysql_query("SELECT `total_counter` , `current_score` FROM `tags` WHERE tag_id = '".$current_tag_id."' ",$conn);
							$total_counter = (int)0;
							$current_score = (int)0;
							while($ret_counters = mysql_fetch_assoc($get_counters)){
								$total_counter = $ret_counters['total_counter']; 
								$current_score = $ret_counters['current_score'];
							}
							

							$avg = (float) ($total_counter / $total_articles);
							$update_avg = mysql_query("UPDATE `tags` SET average= '".$avg."' WHERE tag_id = '".$current_tag_id."' " , $conn);

							
						}

						$article_id_current++;

					}

					$ins_trending_tag = mysql_query("INSERT INTO `trending_tags` SELECT DISTINCT tags.* FROM `tags` INNER JOIN `tag_used`
					ON tags.tag_id = tag_used.tag_id 
					WHERE  tag_used.article_id BETWEEN '".$article_id_range_start."' AND '".$article_id_range_end."' ",$conn) 
					or die("error in query".mysql_error());


					$reset_current_score = mysql_query("UPDATE `tags` SET current_score = 0 WHERE tag_id IN (SELECT DISTINCT tag_id FROM `tag_used` 
						WHERE article_id BETWEEN '".$article_id_range_start."' AND '".$article_id_range_end."' ) ", $conn) 
					or die("Error in sql query".mysql_error());

				}


			}
			else{
   				exit("Error While uploading image on the server");
			}

		}

		else{
			
			$gif = 0;

			$fileName = $_FILES["meme"]["name"]; // The file name
			$fileTmpLoc = $_FILES["meme"]["tmp_name"]; // File in the PHP tmp folder
			$fileType = $_FILES["meme"]["type"]; // The type of file it is
			$fileSize = $_FILES["meme"]["size"]; // File size in bytes
			$fileErrorMsg = $_FILES["meme"]["error"]; // 0 for false... and 1 for true
			$fileName = preg_replace('#[^a-z.0-9]#i', '', $fileName); // filter
			$kaboom = explode(".", $fileName); // Split file name into an array using the dot
			$fileExt = end($kaboom); // Now target the last array element to get the file extension


			// START PHP Image Upload Error Handling -------------------------------
			if (!$fileTmpLoc) { // if file not chosen
			    echo "ERROR: Please browse for a file before clicking the upload button.";
			    exit();
			} else if($fileSize > 1048576) { // if file size is larger than 1 Megabyte
			    echo "ERROR: Your file was larger than 5 Megabytes in size.";
			    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
			    exit();
			} else if (!preg_match("/.(gif|jpg|png|jpeg)$/i", $fileName) ) {
			     // This condition is only if you wish to allow uploading of specific file types    
			     echo "ERROR: Your image was not .gif, .jpg, or .png.";
			     unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
			     exit();
			} else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
			    echo "ERROR: An error occured while processing the file. Try again.";
			    exit();
			}
			// END PHP Image Upload Error Handling ---------------------------------
			// Place it into your "uploads" folder mow using the move_uploaded_file() function

			$moveResult = move_uploaded_file($fileTmpLoc, "uploads/$fileName");
			// Check to make sure the move result is true before continuing
			if ($moveResult != true) {
			    echo "ERROR: File not uploaded. Try again.";
			    exit();
			}
		
			// Include the file that houses all of our custom image functions
			include_once("ak_php_img_lib_1.0.php");
			// ---------- Start Universal Image Resizing Function --------
			$target_file = "uploads/$fileName";
			$resized_file = "uploads/resized_$fileName";
			$wmax = 750;
			$hmax = 750;
			ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
			unlink($target_file);
			// ----------- End Universal Image Resizing Function ----------
			// ---------- Start Convert to JPG Function --------
			if ((strtolower($fileExt) != "jpg")) {
			    $target_file = "uploads/resized_$fileName";
			    $new_jpg = "uploads/resized_".$kaboom[0].".jpg";
			    ak_img_convert_to_jpg($target_file, $new_jpg, $fileExt);
			    unlink($target_file);
			}


			// ----------- End Convert to JPG Function -----------
			// ---------- Start Image Watermark Function --------
			$target_file = "uploads/resized_".$kaboom[0].".jpg";
			$wtrmrk_file = "memeveme_watermark.png";
			$imagename=date("d-m-y")."-".time();
			$new_file = "uploads/".$imagename.$kaboom[0].".jpg";
			ak_img_watermark($target_file, $wtrmrk_file, $new_file);
			// ----------- End Image Watermark Function -----------
			// Display things to the page so you can see what is happening for testing purposes
			unlink($target_file);
			echo "Successful";

			$query_upload = "INSERT INTO `articles`(`user_id`,`mv`, `url`, `title`, `nsfw`, `gif`, `tag1`, `tag2`, `tag3`, `credit`, `date_creation`) 
			VALUES ('".$user_id."' ,'".$mv."' , '".$new_file."' , '".$title."' , '".$nsfw."' , '".$gif."' , '".$tag1."' , '".$tag2."' , '".$tag3."' , '".$credit."' , '".date('Y-m-d H:i:s')."')";			
			mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error());  
			echo "Successful";

			$article_id = 0;
			$get_article_id_query = "SELECT `article_id` FROM `articles` WHERE `url`= '".$new_file."' ";
			$retval = mysql_query($get_article_id_query,$conn) or die("error in $get_article_id_query == ----> ".mysql_error());

			while($row = mysql_fetch_assoc($retval)){
				$article_id = $row['article_id'];
			}


			if(!empty($tag1)){
				$checktag_query = "SELECT COUNT(*) AS id FROM `tags` WHERE `tag` = '".$tag1."' ";
				$checktag = mysql_query($checktag_query,$conn);
				$counter = mysql_fetch_array($checktag);
				$count = $counter['id'];

				if($count == 0){
						$instag_query = "INSERT INTO `tags`(`tag` , `total_counter` , `current_score`) VALUES ( '".$tag1."' , '1' , '1')";
						mysql_query($instag_query) or die("error in $instag_query == ----> ".mysql_error());
					}

				else if($count != 0){
					$update_counter = mysql_query("UPDATE `tags` SET total_counter = total_counter+1 , current_score = current_score+1 
					WHERE `tag` = '".$tag1."' " ,$conn);
				}
				

				$get_tag_id = mysql_query("SELECT `tag_id` FROM `tags` WHERE `tag` = '".$tag1."' " , $conn );
				while($row = mysql_fetch_assoc($get_tag_id)){
					$tag_id = $row['tag_id'];
				}

				$tag_used_query = "INSERT INTO `tag_used`(`tag_id`, `tag`, `article_id`) VALUES ( '".$tag_id."' , '".$tag1."' , '".$article_id."' )";
				mysql_query($tag_used_query) or die("error in $tag_used_query == ----> ".mysql_error());
			}


			if(!empty($tag2)){
				$checktag_query = "SELECT COUNT(*) AS id FROM `tags` WHERE `tag` = '".$tag2."' ";
				$checktag = mysql_query($checktag_query,$conn);
				$counter = mysql_fetch_array($checktag);
				$count = $counter['id'];

				if($count == 0){
					$instag_query = "INSERT INTO `tags`(`tag` , `total_counter` , `current_score`) VALUES ( '".$tag2."' , '1' , '1')";
					mysql_query($instag_query) or die("error in $instag_query == ----> ".mysql_error());
				}

				else if($count != 0){
					$update_counter = mysql_query("UPDATE `tags` SET total_counter = total_counter+1 , current_score = current_score+1 
					WHERE `tag` = '".$tag2."' " ,$conn);
				}

				$get_tag_id = mysql_query("SELECT `tag_id` FROM `tags` WHERE `tag` = '".$tag2."' " , $conn );
				while($row = mysql_fetch_assoc($get_tag_id)){
					$tag_id = $row['tag_id'];
				}

				$tag_used_query = "INSERT INTO `tag_used`(`tag_id`, `tag`, `article_id`) VALUES ( '".$tag_id."' , '".$tag2."' , '".$article_id."' )";
				mysql_query($tag_used_query) or die("error in $tag_used_query == ----> ".mysql_error());
			}


			if(!empty($tag3)){
				$checktag_query = "SELECT COUNT(*) AS id FROM `tags` WHERE `tag` = '".$tag3."' ";
				$checktag = mysql_query($checktag_query,$conn);
				$counter = mysql_fetch_array($checktag);
				$count = $counter['id'];

				if($count == 0){
					$instag_query = "INSERT INTO `tags`(`tag` , `total_counter` , `current_score`) VALUES ( '".$tag3."' , '1' , '1')";
					mysql_query($instag_query) or die("error in $instag_query == ----> ".mysql_error());
				}

				else if($count != 0){
					$update_counter = mysql_query("UPDATE `tags` SET total_counter = total_counter+1 , current_score = current_score+1 
					WHERE `tag` = '".$tag3."' " ,$conn);
				}

				$get_tag_id = mysql_query("SELECT `tag_id` FROM `tags` WHERE `tag` = '".$tag3."' " , $conn );
				while($row = mysql_fetch_assoc($get_tag_id)){
					$tag_id = $row['tag_id'];
				}

				$tag_used_query = "INSERT INTO `tag_used`(`tag_id`, `tag`, `article_id`) VALUES ( '".$tag_id."' , '".$tag3."' , '".$article_id."' )";
				mysql_query($tag_used_query) or die("error in $tag_used_query == ----> ".mysql_error());
			}


			if(($article_id % 20) == 0){

					$truncate_table = mysql_query("TRUNCATE TABLE `trending_tags`" , $conn);

					$article_id_range_start = $article_id - 2;
					$article_id_range_end = $article_id;

					$article_id_current = $article_id_range_start;
					
					$get_tot_articles = mysql_query("SELECT COUNT(*) AS total_articles FROM `articles`",$conn);
					$counter = mysql_fetch_array($get_tot_articles);
					$total_articles = $counter['total_articles']; //count of total number of articles for average

					while($article_id_current <= $article_id_range_end){
						
						$tag_select = mysql_query("SELECT `tag_id`, `tag` FROM `tag_used` WHERE `article_id` = '".$article_id_current."' ",$conn);
						
						while ($row1 = mysql_fetch_assoc($tag_select)) {
							$current_tag = $row1['tag'];
							$current_tag_id = $row1['tag_id'];

							$get_counters = mysql_query("SELECT `total_counter` , `current_score` FROM `tags` WHERE tag_id = '".$current_tag_id."' ",$conn);
							$total_counter = (int)0;
							$current_score = (int)0;
							while($ret_counters = mysql_fetch_assoc($get_counters)){
								$total_counter = $ret_counters['total_counter']; 
								$current_score = $ret_counters['current_score'];
							}
							

							$avg = (float) ($total_counter / $total_articles);
							$update_avg = mysql_query("UPDATE `tags` SET average= '".$avg."' WHERE tag_id = '".$current_tag_id."' " , $conn);

							
						}

						$article_id_current++;

					}

					$ins_trending_tag = mysql_query("INSERT INTO `trending_tags` SELECT DISTINCT tags.* FROM `tags` INNER JOIN `tag_used`
					ON tags.tag_id = tag_used.tag_id 
					WHERE  tag_used.article_id BETWEEN '".$article_id_range_start."' AND '".$article_id_range_end."' ",$conn) 
					or die("error in query".mysql_error());


					$reset_current_score = mysql_query("UPDATE `tags` SET current_score = 0 WHERE tag_id IN (SELECT DISTINCT tag_id FROM `tag_used` 
						WHERE article_id BETWEEN '".$article_id_range_start."' AND '".$article_id_range_end."' ) ", $conn) 
					or die("Error in sql query".mysql_error());

				}

		}
		
	}

	header("Location: ../index1.php");

?>