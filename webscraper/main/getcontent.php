<?php 
	require_once('init.php');
	$num= $_POST['num'];


	if($num==1){
		$num1 = rand(1,150);
		$query= "SELECT * From memes WHERE id = $num1";
		$result = $conn->query($query);
		$row = mysqli_fetch_assoc($result); 

		if(!$query){
			die("Retreival error".mysqli_error($conn));
		}

		echo "<h1>".$row['title']."<h1>";
		echo "<img class='img-responsive' src='".$row['image']."' >";
	}

	elseif($num==2){


		$num1 = rand(1,460);
		$query1= "SELECT * From `c&h` WHERE id = $num1";
		$result1 = $conn->query($query1);
		$row = mysqli_fetch_assoc($result1); 

		if(!$query1){
			die("Retreival error".mysqli_error($conn));
		}

		echo "<img class='img-responsive' src='".$row['image']."' >";

	}	 
	elseif($num==3){

		$num1 = rand(1,204);
		$query1= "SELECT * From `dailyhaha` WHERE id = $num1";
		$result1 = $conn->query($query1);
		$row = mysqli_fetch_assoc($result1); 

		if(!$query1){
			die("Retreival error".mysqli_error($conn));
		}

		$video =preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"100%\" height=\"440\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$row['url']);
		echo $video;
	}

	elseif($num==4){


		$num1 = rand(1,1130);
		$query1= "SELECT * From `8fact` WHERE id = $num1";
		$result1 = $conn->query($query1);
		$row = mysqli_fetch_assoc($result1); 

		if(!$query1){
			die("Retreival error".mysqli_error($conn));
		}

		echo "<img class='img-responsive' id='fact_image' src='".$row['image']."' >";

	}

	elseif($num==5){

		$num1 = rand(1,200);
		$query1= "SELECT * From `funnyyoutube` WHERE id = $num1";
		$result1 = $conn->query($query1);
		$row = mysqli_fetch_assoc($result1); 

		if(!$query1){
			die("Retreival error".mysqli_error($conn));
		}

		$video =preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"100%\" height=\"440\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$row['url']);
		echo $video;
	}







// Visitors database
	$ip =$_SERVER["REMOTE_ADDR"];

	$timestamp = date("Y-m-d h:m:s");


	$query= "SELECT * FROM clicks WHERE ip= '$ip' ";
 	$result = $conn->query($query);


	if($result->num_rows > 0){

		$clicks = mysqli_fetch_assoc($result);
		$id = $clicks['id'];
		$count = $clicks['clicks'] + 1;
				$query= "UPDATE `clicks` SET clicks = '$count' WHERE id = '$id' ";
				$result1 = $conn->query($query);
				if(!$result1){

					die("UPDATION ERROR".mysqli_error($conn));

				}
				
	}	

	else{

		$query = "INSERT INTO `clicks`(id,ip,clicks) VALUES('','".$ip."','1')";
				$result2 = $conn->query($query);

				if(!$result2){

					die("INSERTION ERROR".mysqli_connect($conn));

				}

				
	}

?>

