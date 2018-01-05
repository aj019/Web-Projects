<?php
	require_once('mysqlconnect.php');
 	$term=$_GET["term"];
 	$result = array();
 		$query=mysql_query("SELECT DISTINCT tag FROM tag_used where tag LIKE '%".$term."%' AND tag !='' order by TRIM(tag) ASC LIMIT 5");
 
	    while($row=mysql_fetch_array($query)){
	        $tag = $row['tag'];
			$good_tag = str_replace('#', '' , $tag);
			array_push($result, $good_tag);
	    }
 	
		echo json_encode($result);

  
?>