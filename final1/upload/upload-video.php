<?php
  session_start();
  ob_start();
	require_once('mysqlconnect.php');

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		if(!empty($_POST['video_url']) && !empty($_POST['title'])){
			
			if(strpos($_POST['video_url'],"youtube.com/watch?")===false){

				echo "Enter a valid youtube url";

			}
			
			else{
				$user_id = $_SESSION['userprofile']['id'];

				$mv=2; //1->meme  2->video
				$url = $_POST['video_url'];
				$title = $_POST['title'];
				$title = mysql_real_escape_string(trim($title));


				if(isset($_POST['nsfw']))
					$nsfw=1;
				else
					$nsfw=0;

				$gif=0;

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



				$query_upload = "INSERT INTO `articles`(`user_id` , `mv`, `url`, `title`, `nsfw`, `gif`, `tag1`, `tag2`, `tag3`, `credit`, `date_creation`) 
				VALUES ( '".$user_id."' , '".$mv."' , '".$url."' , '".$title."' , '".$nsfw."' , '".$gif."' , '".$tag1."' , '".$tag2."' , '".$tag3."' , '".$credit."' , '".date('Y-m-d H:i:s')."')";

				mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error());

				echo "Successful";  


				
				$article_id = 0;
				$get_article_id_query = "SELECT `article_id` FROM `articles` WHERE `url`= '".$url."' ";
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

		else
			echo "Please fill the form completely";

	}

	header("Location:../index1.php");

?>