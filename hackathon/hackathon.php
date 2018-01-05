<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
	  die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db('hackathon');
	
	$sql = "SELECT * FROM `review` INNER JOIN `driver` ON review.driver_id = driver.id WHERE review.driver_id = '1' ORDER BY review.id DESC LIMIT 1 ";
	$retval = mysql_query( $sql, $conn ) or die("Error in query".mysql_error());

	while($row = mysql_fetch_array($retval))
	{
	    echo $row['review']."<br>";
	    $fragments = explode ('but' , $row['review']);

	}

	//echo $fragments[0] . "<br>". $fragments[1];

	$query6 = mysql_query("INSERT INTO `formatted_sentence`(`driver_id`, `review_id`, `noun_token`, `adjective_token`, `score`) VALUES ('1' , '1' , '' , '' , '0') ");
	
	foreach ($fragments as $fragment) {
		
		$words = explode(' ' , $fragment);
		//print_r($words);
		foreach ($words as $word) {
			 	
			$query1 = mysql_query("SELECT * FROM `noun` WHERE LOWER(display_noun) = '".strtolower($word)."' OR LOWER(syn1) = '".strtolower($word)."' OR LOWER(syn2) = '".strtolower($word)."' OR LOWER(syn3) = '".strtolower($word)."' OR LOWER(syn4) = '".strtolower($word)."' OR LOWER(syn5) = '".strtolower($word)."' ");
			if(mysql_num_rows($query1)){	
				while($row1 = mysql_fetch_array($query1)){
					$query2 = mysql_query("UPDATE `formatted_sentence` SET noun_token = '".$row1['display_noun']."' WHERE driver_id = '1' AND review_id = '1'  ");				
				}	
			}

			
			$query1 = mysql_query("SELECT * FROM `adjective` WHERE LOWER(display_adjective) = '".strtolower($word)."' OR LOWER(syn_adj1) = '".strtolower($word)."' OR LOWER(syn_adj2) = '".strtolower($word)."' OR LOWER(syn_adj3) = '".strtolower($word)."' OR LOWER(syn_adj4) = '".strtolower($word)."' OR LOWER(syn_adj5) = '".strtolower($word)."' ");
			if(mysql_num_rows($query1)){
				while($row1 = mysql_fetch_array($query1)){
					$query2 = mysql_query("UPDATE `formatted_sentence` SET adjective_token = '".$row1['display_adjective']."' WHERE driver_id = '1' AND review_id = '1'  ");
				
					if($row['rating'] === '5' || $row['rating'] === '1'){
						$score = ((5 * $row['weight'])+10)/4;
						$query3 = mysql_query("UPDATE 'formatted_sentence' SET score = '".$score."' ");
					}
					else if($row['rating'] === '4' || $row['rating'] === '2'){
						$score = ((4 * $row['weight'])+10)/4;
						$query3 = mysql_query("UPDATE 'formatted_sentence' SET score = '".$score."' ");
					}

					else if($row['rating'] === '3'){
						$score = ((3 * $row['weight'])+10)/4;
						$query3 = mysql_query("UPDATE 'formatted_sentence' SET score = '".$score."' ");
					}
				}
			}
		}
	}

	$query4 = mysql_query(" SELECT noun_token , AVG(score) FROM `formatted_sentence` GROUP BY noun_token HAVING driver_id = '1' ");
	while($row4 = mysql_fetch_array($query4)){
		if($row4['noun_token'] < 2.5){		
			echo 'Negatives: '.'<br>';
			echo $row4['noun_token']." - ".$row['avg'];
		}
	}

	while($row5 = mysql_fetch_array($query4)){
		if($row5['noun_token'] >= 2.5){
			echo 'Positives: '.'<br>';
			echo $row4['noun_token']." - ".$row['avg']; 
		}
	}

	$query5 = mysql_query("SELECT count(score) AS n , SUM(score) AS total_score WHERE driver_id = '1' ");
	$row7 = mysql_fetch_array($query5);

	$rating = $row['total_score'] / $row['n'];
	echo '<br>';
	echo $rating;

	mysql_close($conn);
?>	