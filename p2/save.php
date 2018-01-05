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
$draft_id=$_POST['draft_id'];

	if($draft_id==''){

	$query = "INSERT INTO `draft` (id,draft_title,draft_content,create_date,status) VALUES ('','$draft_title','$draft','$timestamp','$status')";
		$conn->query($query) ;

	}
	else{

		$query1="UPDATE draft SET draft_content='$draft' WHERE id='$draft_id' ";
		$conn->query($query1);
	}

?>