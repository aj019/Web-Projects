<?php 

require_once('init.php');

$case_id = $_POST['case_id'];
$count=0;
//$result0[]= array();

		$articlesquery1=
						$conn->query("SELECT distinct user_response.user_id
					     FROM user_response 
					     INNER JOIN case_question ON user_response.question_id=case_question.question_id AND user_response.answer_id=case_question.answer_id 
					     WHERE case_id = $case_id
					     ");

		while($row0 = mysqli_fetch_assoc($articlesquery1)){							
			$result0[] = $row0['user_id'];
		}						
		
	print_r($result0);
  $query = $conn->query("SELECT * FROM case_user_column WHERE case_id = $case_id");

  while($row = $query->fetch_object()){

  	$result[] = $row;
  }

  $result1 = array();
  $result2 = array();
  $result3 = array();
  $result4 = array();
   $result5 = array();
   $result6 = array();
   $result7 = array();
   $result8 = array();
   $arr = array();

  foreach ($result as $result ) {
  	
  	$user_column_id = $result->user_column_id;
  	$val = $result->user_column_value;
  
  	switch ($user_column_id) {
  		case '1':
  			  $query1 = $conn->query("SELECT * FROM user_data WHERE district = '".$val."' ");
  			    	if( !$query1)
					  die($conn->error);

					

					while ($row1 = mysqli_fetch_assoc($query1))
					{
					    $result1[] = $row1['id'];
					}

					$arr = array_merge($arr,$result1);
					$count++;
  			break;
  		
  		case '2':
  			  
  			    $query2 = $conn->query("SELECT * FROM user_data WHERE city = '".$val."' ");
  			    	if( !$query2)
					  die($conn->error);

					

					while ($row2 = mysqli_fetch_assoc($query2))
					{
					    $result2[] = $row2['id'];
					}
				    

					$arr = array_merge($arr,$result2);

					$count++;
  			break;

  		case '3':
  			  
  			  $query3 = $conn->query("SELECT * FROM user_data WHERE state = '".$val."' ");
  			    	if( !$query3)
					  die($conn->error);

					

					while ($row3 = mysqli_fetch_assoc($query3))
					{
					    $result3[] = $row3['id'];
					}

					$arr = array_merge($arr,$result3);
  			  		$count++;
  			break;	
  		
  		case '4':
  			  
  			  $query4 = $conn->query("SELECT * FROM user_data WHERE country = '".$val."' ");
  			    	if( !$query4)
					  die($conn->error);

					

					while ($row4 = mysqli_fetch_assoc($query4))
					{
					    $result4[] = $row4['id'];
					}

  			  		$arr = array_merge($arr,$result4);
  					$count++;
  			break;

  		case '5':
  			  
  			  $query5 = $conn->query("SELECT * FROM user_data WHERE school = '".$val."' ");
  			    	if( !$query5)
					  die($conn->error);

					

					while ($row5 = mysqli_fetch_assoc($query5))
					{
					    $result5[] = $row5['id'];
					}

  			  		$arr = array_merge($arr,$result5);
  			  		$count++;
  			break;
  			
  		case '6':
  			  
  			  $query6 = $conn->query("SELECT * FROM user_data WHERE current_education_status = '".$val."' ");
  			    	if( !$query6)
					  die($conn->error);

					

					while ($row6 =mysqli_fetch_assoc($query6))
					{
					    $result6[] = $row6['id'];
					}

  			  		$arr = array_merge($arr,$result6);
  			  		$count++;
  			break;
  			
  			case '7':
  			  
  			  $query7 = $conn->query("SELECT * FROM user_data WHERE stream = '".$val."' ");
  			    	if( !$query7)
					  die($conn->error);

					

					while ($row7 =mysqli_fetch_assoc($query7))
					{
					    $result7[] = $row7['id'];
					}

  			  		$arr = array_merge($arr,$result7);
  			  		$count++;
  			break;

  			case '8':
  			  
  			  $query8 = $conn->query("SELECT * FROM user_data WHERE career_choice = '".$val."' ");
  			    	if( !$query8)
					  die($conn->error);

					

					while ($row8 = mysqli_fetch_assoc($query8))
					{
					    $result8[] = $row8['id'];
					}

  			  		$arr = array_merge($arr,$result8);
  			  		$count++;
  			break;

  				
  		default:
  			# code...
  			break;
  	}

  }

  
 if($count>1){
  $arr =  array_unique( array_diff_assoc( $arr, array_unique( $arr) ) );
 }
 	
  	$user = array_intersect($result0,$arr);
  	

  	for($i=0;$i<count($user);$i++) {
  		
  		$query12 = $conn->query("SELECT * FROM user_data WHERE id ='".$user[$i]."' ");
		if( !$query12)
		  die($conn->error);
  		
  		$user_data = mysqli_fetch_assoc($query12);
  

 		echo "<button>".$user_data['username']."</button><br>";
  		
  		


  	}
	
?>