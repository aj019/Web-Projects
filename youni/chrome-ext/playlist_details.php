<?php
	include('dbConnect.php');
	$title = $_GET['title'];
	$playlist_id = $_GET['playlist_id'];
	$no_of_videos = $_GET['no_of_videos'];
	$total_duration = $_GET['total_duration'];

	$query = "SELECT * FROM `chrome_ext` WHERE topic_playlist_id='$playlist_id'";
	$res = mysqli_query($conn,$query);

	if(mysqli_num_rows($res) > 0){
		echo "Already Exists";	
	}else{
		$query = "INSERT INTO `chrome_ext`(topic_name,topic_playlist_id,videos_number,total_duration) VALUES('$title','$playlist_id','$no_of_videos','$total_duration')";

		if($conn->query($query)==true){

			echo "Inserted Successfully";
		}else{

			echo "Insertion error";
		}
	}
?>