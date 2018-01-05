<?php
require_once 'config.php';

if($_GET['type'] == 'search-sugg'){

	$data = array();
	if(substr($_GET['name_startsWith'], 0, 1) === '#'){

		$result = mysql_query("SELECT DISTINCT tag FROM tag_used where tag LIKE '%".strtoupper($_GET['name_startsWith'])."%' AND tag !='' order by TRIM(tag) ASC");	
		$i=0;
		while ($row = mysql_fetch_array($result)) {
			if($i<5){
				$tag = $row['tag'];
				array_push($data, $tag);	
				$i++;
			}
			else
			 	break; 

		}
	}

	else{

		$result1 = mysql_query("SELECT DISTINCT title FROM articles where title LIKE '%".strtoupper($_GET['name_startsWith'])."%' AND title !='' order by TRIM(title) ASC");
		$j=0;
		while($row = mysql_fetch_array($result1)){
			if($j<5){
				$title = $row['title'];
				array_push($data, $title);
				$j++;
			}
			else
				break;
			
		}

		$result2 = mysql_query("SELECT DISTINCT tag FROM tag_used where tag LIKE '%".strtoupper($_GET['name_startsWith'])."%' AND tag !='' order by TRIM(tag) ASC");
		while($row = mysql_fetch_array($result2)){
			if($j<10){
				$tag = $row['tag'];
				array_push($data, $tag);
				$j++;
			}

			else
				break;

		}		
	}

	echo json_encode($data);
}

?>