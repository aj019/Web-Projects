<?php
	require_once('mysqlconnect.php');
 	$term=$_GET["term"];

 	if(substr($term, 0, 1) === '#'){
 		$query=mysql_query("SELECT DISTINCT tag FROM tag_used where tag LIKE '%".$term."%' AND tag !='' order by TRIM(tag) ASC LIMIT 5");
 
	    while($row=mysql_fetch_array($query)){
	        $result[]=array(
	            'value'=> $row["tag"],
	            'label'=>$row["tag"]
	        );
	    }
 	}

 	else{

 		$query1 = mysql_query("SELECT DISTINCT title FROM articles where title LIKE '%".strtoupper($term)."%' AND title !='' order by TRIM(title) ASC LIMIT 5");

 		while($row=mysql_fetch_array($query1)){
	        $result[]=array(
	            'value'=> $row["title"],
	            'label'=>$row["title"]
	        );
	    }

	    $query2 = mysql_query("SELECT DISTINCT tag FROM tag_used where tag LIKE '%".$term."%' AND tag !='' order by TRIM(tag) ASC LIMIT 5");
 		
 		while($row=mysql_fetch_array($query2)){
	        $result[]=array(
	            'value'=> $row["tag"],
	            'label'=>$row["tag"]
	        );
	    }

 	}
 echo json_encode($result);
 
?>