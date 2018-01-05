<?php 

	
	$book_id = $_GET['book_id'];
	
	$book_price = $_GET['book_price'];
	$book_quantity = $_GET['book_quantity'];
	$response = array();	
  	$conn=new mysqli('localhost','anuj','9654018751','webscraper');

	if(!$conn){

		die("Connection error:".mysqli_connect_error());
	}

if(empty($book_quantity) && empty($book_price) && !empty($book_id)){

	$query = "SELECT quantity,price FROM `book` WHERE id = '".$book_id."' ";
	$result = mysqli_query($conn,$query);

		if($result->num_rows > 0){
		    $response["message"] = "200";
		    $row = mysqli_fetch_assoc($result);
		    $response['book_quantity'] = $row['quantity'];
		    $response['book_price'] = $row['price'];
		    echo json_encode($response);
		} else {
		    $response["message"] = "404";
		    echo json_encode($response);
		}

}
else{

		if(empty($book_id) && empty($book_quantity) &&empty($book_price) ){
			
			$response["message"] = "100";
			echo json_encode($response);	  
		}
		else{

			
			$query = "UPDATE `book` SET quantity ='".$book_quantity."',price = '".$book_price."' WHERE id = '".$book_id."' ";
			
				if($conn->query($query) === TRUE){
				    $response["message"] = "200";
				    echo json_encode($response);
				} else {
				    $response["message"] = "404";
				    echo json_encode($response);
				}
		}
}
?>