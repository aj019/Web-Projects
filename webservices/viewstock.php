<?php 

	$seller_id= $_GET['seller_id'];
	$response = array();	
  	$conn=new mysqli('localhost','anuj','9654018751','webscraper');
  	$status = 1;
	if(!$conn){

		die("Connection error:".mysqli_connect_error());
	}

if(empty($seller_id)){
	
	$response["message"] = "100";
	echo json_encode($response);	  
}
else{

	
	$query = "SELECT * FROM `book` WHERE seller_id = '".$seller_id."'  AND status = '".$status."'";
	$result = mysqli_query($conn,$query);
	$num_of_rows = $result->num_rows;
	

		if($result->num_rows > 0){
		    $response["message"] = "200";		    
		    $response["no_of_rows"] = $result->num_rows;
			while($row = $result->fetch_object()) {
		        $rows[] = $row;
		    }
		    $response["result"] = $rows;	    
		    echo json_encode($response);
		} else {
		    $response["message"] = "404";
		    $response["no_of_rows"] = $result->num_rows;
		    echo json_encode($response);
		}
}

?>