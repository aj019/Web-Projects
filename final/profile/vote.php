<?php
session_start();
if(!empty($_POST["article_id"])) {

	require_once("../init1.php");

	$article_id=$_POST["article_id"];
	$rank=(int)$_POST["vote_rank"];
    $user_id=$_SESSION['userprofile']['id'];
    $timestamp = date('Y-m-d H:i:s');

    $query0=("SELECT user_id FROM articles WHERE article_id = '$article_id' ");
    $result0=$db->query($query0);
    $row0 = mysqli_fetch_assoc($result0);
    $uploader_id=$row0['user_id'];

    
    $query =(" SELECT * FROM `votes` WHERE article_id= '$article_id' AND user_id = '$user_id' " );

		  	$result = $db->query($query);
		  	

		if($result->num_rows > 0){

			$row = mysqli_fetch_assoc($result);

			if($rank==1 && $row['status']==1){

				$query1="UPDATE votes SET status=0 WHERE article_id='$article_id' ";
				$query2="UPDATE articles SET total_downvotes = total_downvotes  WHERE article_id='$article_id' ";
				$query3="UPDATE articles SET  total_upvotes=total_upvotes - 1 WHERE article_id='$article_id' ";
				$db->query($query1);
			    $db->query($query2);
			    $db->query($query3);
				echo "0,";
			}

			else if($rank==1 && $row['status']==0){

				$query1="UPDATE votes SET status=1 AND datetime='$timestamp' WHERE article_id='$article_id' ";
				$query2="UPDATE articles SET total_downvotes = total_downvotes   WHERE article_id='$article_id' ";
				$query3="UPDATE articles SET  total_upvotes=total_upvotes + 1 WHERE article_id='$article_id' ";
				$db->query($query1);
				$db->query($query2);
				$db->query($query3);
				echo "1,";
			}

			else if($rank==1 && $row['status']==2){

				$query1="UPDATE votes SET status=1 AND datetime='$timestamp' WHERE article_id='$article_id' ";
				$query2="UPDATE articles SET total_downvotes = total_downvotes - 1  WHERE article_id='$article_id' ";
				$query3="UPDATE articles SET  total_upvotes=total_upvotes + 1 WHERE article_id='$article_id' ";
				$db->query($query1);
				$db->query($query2);
				$db->query($query3);
				echo "1,";

			}

			else if($rank==2 && $row['status']==0){

				$query1="UPDATE votes SET status=2 WHERE article_id='$article_id' ";
				$query2="UPDATE articles SET total_downvotes = total_downvotes + 1  WHERE article_id='$article_id' ";
				$query3="UPDATE articles SET  total_upvotes=total_upvotes  WHERE article_id='$article_id' ";
				$db->query($query1);
				$db->query($query2);
				$db->query($query3);
				echo "2,";
			}

			else if($rank==2 && $row['status']==1){

				$query1="UPDATE votes SET status=2 WHERE article_id='$article_id' ";
				$query2="UPDATE articles SET total_downvotes = total_downvotes + 1  WHERE article_id='$article_id' ";
				$query3="UPDATE articles SET  total_upvotes=total_upvotes - 1 WHERE article_id='$article_id' ";
				$db->query($query1);
				$db->query($query2);
				$db->query($query3);
			echo "2,";
			}

			else if($rank==2 && $row['status']==2){

				$query1="UPDATE votes SET status=0 WHERE article_id='$article_id' ";
				$query2="UPDATE articles SET total_downvotes = total_downvotes - 1  WHERE article_id='$article_id' ";
				$query3="UPDATE articles SET  total_upvotes=total_upvotes WHERE article_id='$article_id' ";
				$db->query($query1);
				$db->query($query2);
				$db->query($query3);
				echo "0,";
			}


		}

		else{
				$query = "INSERT INTO `votes` (article_id,user_id,status,datetime) VALUES ('$article_id','$user_id','$rank','$timestamp')";
				$db->query($query) ;
				$query1 = "INSERT INTO `notification` (article_id,upvote_share,uploader_id,user_id,status,datetime) VALUES ('$article_id','1','$uploader_id','$user_id','1','$timestamp')";
				$db->query($query1) ;
				

				if($rank==1){

					$query3="UPDATE articles SET  total_upvotes=total_upvotes + 1 WHERE article_id='$article_id' ";
						$db->query($query3);
						echo "1,";

				}
				else if($rank==2){

					$query3="UPDATE articles SET  total_upvotes=total_downvotes + 1 WHERE article_id='$article_id' ";
					$db->query($query3);
						echo "2,";
					}		
			}

			/*  Query for entering in notifications*/
			$query =(" SELECT total_upvotes FROM `articles` WHERE article_id= '$article_id' " );

		  	$result = $db->query($query);
		  	$row = mysqli_fetch_assoc($result);

		  	echo $row['total_upvotes'];

		  	/*  Query for entering in top page*/
		  	$query1=("SELECT article_id , total_upvotes - total_downvotes AS df FROM `articles` WHERE top = '0' AND article_id='$article_id'");
		  	$result1 = $db->query($query1);

			if($result1->num_rows > 0){
				$row1 = mysqli_fetch_assoc($result1);

				if($row1['df']>50){
					$query2=" UPDATE `articles` SET top = '1' WHERE article_id ='$article_id' ";
					$query3="INSERT INTO `top` (article_id,datetime) VALUES ( '$article_id' , '$timestamp' )";
					$db->query($query2);
					$db->query($query3);
					
				}	
			}
			else{ }

		/*  Query for entering in popular page*/
			require_once('mysqlconnect.php');

		$current_date = date("Y-m-d H:i:s");
	
		$popular_check_query = mysql_query( "SELECT article_id , total_upvotes-total_downvotes AS df , date_creation FROM `articles` WHERE popular= '0' AND article_id='$article_id' " , $conn)
		or die("Error in query".mysql_error());

		$row = mysql_fetch_assoc($popular_check_query);

		$date_creation = $row['date_creation'];

		$dbt = explode(" ", $current_date );
		$current_date = $dbt[0];

		$dbt = explode(" ", $date_creation);
		$date_creation = $dbt[0];


		$diff = abs(strtotime($current_date) - strtotime($date_creation));

		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));


		if($days <= 2){
			if($row['df']>25){


				$popular_make_query = mysql_query("UPDATE `articles` SET popular = '1' WHERE article_id = '".$article_id."' " , $db) 
				or die("Error in query".mysql_error());			


				$ins_popular_table = mysql_query("INSERT INTO `popular` VALUES ('".$article_id."' , '".date("Y-m-d H:i:s")."' ) " , $db) 
				or die("Error in query".mysql_error());
			}

			else{
				
			}
		}

		else{
			
		}

	

	/*  Query for entering in popular page ends*/

	}


 ?>   