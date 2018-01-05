<?php
session_start();
if(!empty($_POST["article_id"])) {
	require_once("init2.php");
	$article_id=$_POST["article_id"];
	$rank=$_POST["vote_rank"];
    $user_id=$_SESSION['userprofile']['id'];
    $timestamp = date('Y-m-d H:i:s');
	switch ($rank) {
		case '-2':
			$status=2;
			$query =(" SELECT * FROM votes WHERE article_id= '".$article_id."' AND user_id = '".$user_id."' " );

		  	$result = $conn->query($query);

		if($result->num_rows > 0){

		$query1="UPDATE votes SET status='$status' WHERE article_id='$article_id' ";
		$query2="UPDATE articles SET total_downvotes = total_downvotes + 1  WHERE article_id='$article_id' ";
		$query3="UPDATE articles SET  total_upvotes=total_upvotes - 1 WHERE article_id='$article_id' ";
		   if ($conn->query($query1) === TRUE) {
			    echo "Record query1 status=2 successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
			if ($conn->query($query2) === TRUE) {
			    echo "Record query2 successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
			if ($conn->query($query3) === TRUE) {
			    echo "Record query3 successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
		}else{
		    
	
		$query = "INSERT INTO `votes` (article_id,user_id,status,datetime) VALUES ('$article_id','$user_id','$status','$timestamp')";
		$query2="UPDATE articles SET total_downvotes=total_downvotes + 1 AND total_upvotes=total_upvotes-1 WHERE article_id='$article_id' ";
		
		if ($conn->query($query2) === TRUE) {
				    echo "New record created successfully";
				} else {
				    echo "Error: " . $query . "<br>" . $conn->error;
				}
			}	

			break;

		case '-1':
			$status=2;
				$query =(" SELECT * FROM votes WHERE article_id= '$article_id' AND user_id = '$user_id' " );

  				$result = $conn->query($query);

		if($result->num_rows > 0){

		$query1="UPDATE votes SET status='$status' WHERE article_id='$article_id' ";
		$query2="UPDATE articles SET total_downvotes=total_downvotes + 1  WHERE article_id='$article_id' ";
		   if ($conn->query($query1) === TRUE) {
			    echo "Record stausstatus=2  changed";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
			if ($conn->query($query2) === TRUE) {
			    echo "Record no of votes updated";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
		}else{
		    
	
		$query = "INSERT INTO `votes` (article_id,user_id,status,datetime) VALUES ('$article_id','$user_id','$status','$timestamp')";
		$query2="UPDATE articles SET total_downvotes=total_downvotes + 1  WHERE article_id='$article_id' ";
		
		if ($conn->query($query2) === TRUE) {
				    echo "New record created successfully";
				} else {
				    echo "Error: " . $query . "<br>" . $conn->error;
				}
			}

			break;
		case '0.1':
			$status=0;
				$query =(" SELECT * FROM votes WHERE article_id= '$article_id' " );

  	       $result = $conn->query($query);

		if($result->num_rows > 0){

		$query1="UPDATE votes SET status='$status' WHERE article_id='$article_id' ";
		$query2="UPDATE articles SET total_upvotes=total_upvotes-1 WHERE article_id='$article_id' ";
		   if ($conn->query($query1) === TRUE) {
			    echo "Record updated status=0 successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
			if ($conn->query($query2) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
		}else{
		    
	
		$query = "INSERT INTO `votes` (article_id,user_id,status,datetime) VALUES ('$article_id','$user_id','$status','$timestamp')";
		$query2="UPDATE articles SET total_upvotes=total_upvotes-1 WHERE article_id='$article_id' ";
		
		if ($conn->query($query2) === TRUE) {
				    echo "New record created successfully";
				} else {
				    echo "Error: " . $query . "<br>" . $conn->error;
				}
			}
			break;
		case '0.2':
			$status=0;
				$query =(" SELECT * FROM votes WHERE article_id= '$article_id' " );

  				$result = $conn->query($query);

		if($result->num_rows > 0){

		$query1="UPDATE votes SET status='$status' WHERE article_id='$article_id' ";
		$query2="UPDATE articles SET total_downvotes=total_downvotes - 1  WHERE article_id='$article_id' ";
		   if ($conn->query($query1) === TRUE) {
			    echo "Record updatedstatus=0 successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
			if ($conn->query($query2) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
		}else{
		    
	
		$query = "INSERT INTO `votes` (article_id,user_id,status,datetime) VALUES ('$article_id','$user_id','$status','$timestamp')";
		$query2="UPDATE articles SET total_downvotes=total_downvotes - 1  WHERE article_id='$article_id' ";
		
		if ($conn->query($query2) === TRUE) {
				    echo "New record created successfully";
				} else {
				    echo "Error: " . $query . "<br>" . $conn->error;
				}
			}
			break;
		case '1':
			$status=1;
				$query =(" SELECT * FROM votes WHERE article_id= '$article_id'  ");

	  	$result = $conn->query($query);

		if($result->num_rows > 0){

		$query1="UPDATE votes SET status='$status' WHERE article_id='$article_id' ";
		$query2="UPDATE articles SET total_upvotes=total_upvotes+1 WHERE article_id='$article_id' ";
		   if ($conn->query($query1) === TRUE) {
			    echo "Record updated status=1 successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}

			if ($conn->query($query2) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
		}else{
		    
	
		$query = "INSERT INTO `votes` (article_id,user_id,status,datetime) VALUES ('$article_id','$user_id','$status','$timestamp')";
		$query2="UPDATE articles SET total_upvotes=total_upvotes+1 WHERE article_id='$article_id' ";
		
		if ($conn->query($query) === TRUE) {
				    echo "New record created successfully";
				} else {
				    echo "Error: " . $query . "<br>" . $conn->error;
				}
			}
			break;
		case '2':
			$status=1;
				$query =(" SELECT * FROM votes WHERE article_id= '$article_id' AND user_id = '$user_id' " );

  	$result = $conn->query($query);

		if($result->num_rows > 0){

		$query1="UPDATE votes SET status='$status' WHERE article_id='$article_id' ";
		$query2="UPDATE articles SET total_upvotes=total_upvotes + 1 WHERE article_id='$article_id' ";
		$query3="UPDATE articles SET total_downvotes=total_downvotes - 1  WHERE article_id='$article_id' ";
		   if ($conn->query($query1) === TRUE) {
			    echo "Record query1 status=1  successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
			if ($conn->query($query2) === TRUE) {
			    echo "Record query2 successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
			if ($conn->query($query3) === TRUE) {
			    echo "Record query3 successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
		}else{
		    
	
		$query = "INSERT INTO `votes` (article_id,user_id,status,datetime) VALUES ('$article_id','$user_id','$status','$timestamp')";
		$query2="UPDATE articles SET total_downvotes = total_downvotes - 1 AND total_upvotes=total_upvotes + 1 WHERE article_id='$article_id' ";
		
		if ($conn->query($query2) === TRUE) {
				    echo "New record created successfully";
				} else {
				    echo "Error: " . $query . "<br>" . $conn->error;
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