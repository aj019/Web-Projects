<?php 

	$seller_id = $_GET['seller_id'];
	$isbn_no = $_GET['isbn_no'];
	$title = $_GET['title'];
	$author = $_GET['author'];
	$price = $_GET['price'];
	$quantity = $_GET['quantity'];
	$date_time = date("Y-m-d H:i:s");
	$status = 1;
	$response = array();	
  	$conn=new mysqli('localhost','anuj','9654018751','webscraper');

	if(!$conn){

		die("Connection error:".mysqli_connect_error());
	}

if(empty($seller_id) || empty($isbn_no) || empty($title)){
	
	$response["message"] = "100";
	echo json_encode($response);	  
}
else{

	
	$query = "INSERT INTO `book` (id,seller_id,isbn_no,title,author,price,quantity,status,date_time) VALUES ('','".$seller_id."','".$isbn_no."','".$title."','".$author."','".$price."','".$quantity."','".$status."','".$date_time."')";

		  if ($conn->query($query) === TRUE) {
		    $response["message"] = "200";
		    echo json_encode($response);
		} else {
		    $response["message"] = "404";
		    echo json_encode($response);
		}
}

?>