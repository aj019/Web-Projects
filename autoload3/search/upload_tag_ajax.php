<?php
require_once 'config.php';

if($_GET['type'] == 'search-sugg'){

	$data = array();
		$j=0;
		$result2 = mysql_query("SELECT DISTINCT tag FROM tag_used where tag LIKE '%".strtoupper($_GET['name_startsWith'])."%' AND tag !='' order by TRIM(tag) ASC");
		while($row = mysql_fetch_array($result2)){
			if($j<5){
				$tag = $row['tag'];
				$good_tag = str_replace('#', '' , $tag);
				array_push($data, $good_tag);
				$j++;
			}

			else
				break;

		}		
	
		echo json_encode($data);

	}


?>