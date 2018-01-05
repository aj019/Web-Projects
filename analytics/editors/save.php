<?php

$conn=new mysqli('localhost','root','','analytics');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";



$draft = $_POST['cleanText'];
$status = 0;
$timestamp = date('Y-m-d H:i:s');
$draft_title=$_POST['draft_title'];
$count=0;

$query = $conn->query("SELECT * from `draft` ");
							
	while($row = $query->fetch_object()){							
		$result[] = $row;
	}

	foreach ($result as $result) {

		if($result->draft_title==$draft){

			$count++;
		}
		else{

		
		}
	}

	if($count==0){

	$query = "INSERT INTO `draft` (id,draft_title,draft_content,create_date,status) VALUES ('','$draft_title','$draft','$timestamp','$status')";
		$conn->query($query) ;

	}	
?>