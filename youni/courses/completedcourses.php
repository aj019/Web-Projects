<?php

include('dbConnect.php');
$email = $_GET['email'];
$state = "completed";

$query = "SELECT course_name FROM `mycourses` WHERE user ='$email' AND state='$state'";

//$coursesquery= $conn->query($query);
	
	$result=mysqli_query($conn,$query);
	
		
		$reponse = array();
	   if(mysqli_num_rows($result) > 0 ){
			$coursesquery= $conn->query($query);
				$mycourses= array();
			  while ($row3= $coursesquery->fetch_array()) {
  	
			  	$mycourses[]= $row3;
			  }

			    echo json_encode($mycourses); 

		}
		else{
			 $reponse['coursename'] = "404";
			 $array = json_decode(json_encode($reponse), true);
			    echo json_encode($array);

		}	


?>