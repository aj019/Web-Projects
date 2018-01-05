<?php 

require_once('init.php');

 $query ="SELECT SUM(count) FROM visitors";

 	$result = $conn->query($query);
 	$row = mysqli_fetch_row($result);
 	$sum = $row[0];

 	echo "Total no of visits: ".$sum."<br>";


 $query1 = "SELECT SUM(clicks) FROM clicks";
 
 $res1 = $conn->query($query1);

 $row1 = mysqli_fetch_row($res1);

 echo "Total no of clicks are:  ".$row1[0];	

?>