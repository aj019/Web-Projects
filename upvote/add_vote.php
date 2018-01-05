<?php
if(!empty($_POST["id"])) {
	require_once("init2.php");
	$id=$_POST["id"];
	$rank=$_POST["vote_rank"];

	switch ($rank) {
		case '-2':
			$status=2;
			$query =(" SELECT * FROM articles WHERE article_id= '1' " );

		  	$result = $conn->query($query);

		if($result->num_rows > 0){

		$query1="UPDATE articles SET status='$status' WHERE article_id='1' ";
		$query2="UPDATE votes SET downvotes=downvotes + 1 AND upvotes=upvotes-1 WHERE article_id='1' ";
		   if ($conn->query($query1) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
			if ($conn->query($query2) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
		}else{
		    
	
		$query = "INSERT INTO `articles` (article_id,status) VALUES ('$id','$status')";
		$query2="UPDATE votes SET downvotes=downvotes + 1 AND upvotes=upvotes-1 WHERE article_id='1' ";
		
		if ($conn->query($query2) === TRUE) {
				    echo "New record created successfully";
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}

		if ($conn->query($query1) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}	

			break;
		case '-1':
			$status=2;
				$query =(" SELECT * FROM articles WHERE article_id= '1' " );

  	$result = $conn->query($query);

		if($result->num_rows > 0){

		$query1="UPDATE articles SET status='$status' WHERE article_id='1' ";
		$query2="UPDATE votes SET downvotes=downvotes + 1  WHERE article_id='1' ";
		   if ($conn->query($query1) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
			if ($conn->query($query2) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
		}else{
		    
	
		$query = "INSERT INTO `articles` (article_id,status) VALUES ('$id','$status')";
		$query2="UPDATE votes SET downvotes=downvotes + 1  WHERE article_id='1' ";
		
		if ($conn->query($query2) === TRUE) {
				    echo "New record created successfully";
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}

			break;
		case '0.1':
			$status=0;
				$query =(" SELECT * FROM articles WHERE article_id= '1' " );

  	$result = $conn->query($query);

		if($result->num_rows > 0){

		$query1="UPDATE articles SET status='$status' WHERE article_id='1' ";
		$query2="UPDATE votes SET upvotes=upvotes-1 WHERE article_id='1' ";
		   if ($conn->query($query1) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
			if ($conn->query($query2) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
		}else{
		    
	
		$query = "INSERT INTO `articles` (article_id,status) VALUES ('$id','$status')";
		$query2="UPDATE votes SET upvotes=upvotes-1 WHERE article_id='1' ";
		
		if ($conn->query($query2) === TRUE) {
				    echo "New record created successfully";
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
			break;
		case '0.2':
			$status=0;
				$query =(" SELECT * FROM articles WHERE article_id= '1' " );

  	$result = $conn->query($query);

		if($result->num_rows > 0){

		$query1="UPDATE articles SET status='$status' WHERE article_id='1' ";
		$query2="UPDATE votes SET downvotes=downvotes - 1  WHERE article_id='1' ";
		   if ($conn->query($query1) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
			if ($conn->query($query2) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
		}else{
		    
	
		$query = "INSERT INTO `articles` (article_id,status) VALUES ('$id','$status')";
		$query2="UPDATE votes SET downvotes=downvotes - 1  WHERE article_id='1' ";
		
		if ($conn->query($query2) === TRUE) {
				    echo "New record created successfully";
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
			break;
		case '1':
			$status=1;
				$query =(" SELECT * FROM articles WHERE article_id= '1' " );

  	$result = $conn->query($query);

		if($result->num_rows > 0){

		$query1="UPDATE articles SET status='$status' WHERE article_id='1' ";
		$query2="UPDATE votes SET upvotes=upvotes+1 WHERE article_id='1' ";
		   if ($conn->query($query1) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}

			if ($conn->query($query2) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
		}else{
		    
	
		$query = "INSERT INTO `articles` (article_id,status) VALUES ('$id','$status')";
		$query2="UPDATE votes SET upvotes=upvotes+1 WHERE article_id='1' ";
		
		if ($conn->query($query2) === TRUE) {
				    echo "New record created successfully";
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
			break;
		case '2':
			$status=1;
				$query =(" SELECT * FROM articles WHERE article_id= '1' " );

  	$result = $conn->query($query);

		if($result->num_rows > 0){

		$query1="UPDATE articles SET status='$status' WHERE article_id='1' ";
		$query2="UPDATE votes SET downvotes=downvotes - 1 AND upvotes=upvotes+1 WHERE article_id='1' ";
		   if ($conn->query($query2) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
			if ($conn->query($query1) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
		}else{
		    
	
		$query = "INSERT INTO `articles` (article_id,status) VALUES ('$id','$status')";
		$query2="UPDATE votes SET downvotes=downvotes - 1 AND upvotes=upvotes+1 WHERE article_id='1' ";
		
		if ($conn->query($query2) === TRUE) {
				    echo "New record created successfully";
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
			break;
		
		default:
			$status=0;
			break;
	}

	

		
			
		$conn->close();
	
}
?>