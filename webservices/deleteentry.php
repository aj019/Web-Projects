<?php 

	$book_id= $_GET['book_id'];
	$response = array();	
  	$conn=new mysqli('localhost','anuj','9654018751','webscraper');

	if(!$conn){

		die("Connection error:".mysqli_connect_error());
	}

if(empty($book_id)){
	
	$response["message"] = "100";
	echo json_encode($response);	  
}
else{

	
	$query = "UPDATE `book` SET status = 0  WHERE id = '".$book_id."' ";
			
				if($conn->query($query) === TRUE){
				    $response["message"] = "200";
				    echo json_encode($response);
				} else {
				    $response["message"] = "404";
				    echo json_encode($response);
				}
}

?>